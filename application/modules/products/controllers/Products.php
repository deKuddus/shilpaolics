<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
        //$this->load->module('cart');
        $this->load->model('products_model');
        $this->load->module('template');
    }

    public function index() {
    	$this->manage();
    }

    public function manage()
    {
        $this->data['token'] = 1;
        $this->data['new'] = 2;
        $this->data['view_module'] = 'products';
        $this->data['view_file'] = 'manage';
        $this->data['page_title'] = "Products | shilpaolic.com";
        $this->data['brands'] = $this->products_model->get_all_brand();
        $this->data['categories'] = $this->products_model->get_all_categories();
        $this->template->_shop_ui($this->data);
    }

    public function details($id)
    {

        $this->data['view_module'] = 'products';
        $this->data['view_file'] = 'product_details';
        $this->data['product'] = $this->products_model->get_product_by_id($id);
        $this->data['page_title'] = $this->data['product']->title .' | '.'shilpaolic.com';
        $this->template->_shop_ui($this->data);
	}

    public function filter_product()
    {

        $action = $this->input->post('action');
        $minimum_price = $this->input->post('minimum_price');
        $maximum_price = $this->input->post('maximum_price');
        $category = $this->input->post('category');
        $rowno = $this->input->post('pagno');

        // Row per page
        $rowperpage = 3;

        // Row position
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
      }

        global $query;
        if(isset($action)){
            $query = "SELECT `products`.*, `product_images`.`image` FROM `products` ";
             $query.= " RIGHT JOIN product_images ON products.id = product_images.product_id ";
             $query.="WHERE is_active = 1";
        }
        if(isset($minimum_price,$maximum_price) && !empty($minimum_price) && !empty($maximum_price)){
          $query .= " AND sale_price BETWEEN '".$minimum_price."' AND '".$maximum_price."'  ";
        }

        if(isset($category) && !empty($category)){
          $category_filter = implode("','", $category);
          $query .= " AND category_id IN('".$category_filter."')  ";
        }


       $query.= " ";
        // var_dump($query);
        $products = $this->products_model->get_product_by_filter($query,$rowperpage,$rowno);
          // All records count
        $allcount = $this->products_model->get_total_product_in_store();

        // Pagination Configuration
        $config['base_url'] = base_url().'product/filter_product';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $allcount;
        $config['per_page'] = $rowperpage;

        // Initialize
        $this->pagination->initialize($config);

        // Initialize $data Array
        $data['pagination'] = $this->pagination->create_links();
        $data['result'] = $products;
        $data['row'] = $rowno;

        echo json_encode($data);
    }

    public function newarraival()
    {
        $this->data['token'] = 2;
        $this->data['new'] = 1;
        $this->data['view_module'] = 'products';
        $this->data['view_file'] = 'manage';
        $this->data['brands'] = $this->products_model->get_all_brand();
        $this->data['categories'] = $this->products_model->get_all_categories();
        $this->data['newarraival'] = $this->products_model->new_arraival();
        $this->data['page_title'] = "New Arraival Products | ".'shilpaolic.com';
        $this->template->_shop_ui($this->data);
    }

    public function filter_products()
    {
        $html = '';
        $discount_type = get_discount_type();
        $dis_type = $discount_type;
        $filter_array = [
            'limit' => $this->input->post('limit'),
            'start'=> $this->input->post('start'),
            'category_id'=> $this->input->post('category'),
            'brand_id' => $this->input->post('brand'),
            'max_price' => $this->input->post('maximum_price'),
            'min_price' => $this->input->post('minimum_price'),
        ];
        $products = $this->products_model->filter_products($filter_array);
        if(count($products) > 0)
        {
         foreach($products as $product)
         {
            if($product->discount != 0){
                foreach ($dis_type as $key => $d_type) {
                    if($product->discount_type == $d_type->id){
                        $discounted_price_after_calculation = (($product->sale_price*$product->discount)/100);
                        $price =  "$".($product->sale_price - $discounted_price_after_calculation)."<span> $". $product->sale_price."</span>";
                    }else if($product->discount_type == "$"){
                        $price =  "$".($product->sale_price - $product->discount).' <span> $'. $product->sale_price.'</span>';
                    }
                }
            }

            $html .= ' <div class="col-9 col-sm-12 col-md-6 col-lg-4">
              <div class="single-product-area mb-30">
                 <div class="product_image">
                      <!-- Product Image -->
                      <img class="normal_img" src="'.FILE_UPLOAD_PATH.'/'.$product->feature_image1.'" alt="product image ">
                      <img class="hover_img" src="'. FILE_UPLOAD_PATH.'/'.$product->feature_image2.'" alt="product image">
                      <div class="product_badge">
                        <span>New</span>
                      </div>
                      <div class="product_wishlist">
                        <a href="#" onclick="add_to_wishlist('.$product->id.')"><i class="icofont-heart"></i></a>
                      </div>
                      <div class="product_compare">
                        <a href="#" onclick="add_to_compare('.$product->id.')"><i class="icofont-exchange"></i></a>
                      </div>
                    </div>
                    <div class="product_description">
                      <!-- Add to cart -->
                      <div class="product_add_to_cart">
                        <a href="#" onclick="add_to_cart('.$product->id.')"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                      </div>
                      <div class="product_quick_view">
                        <a href="#" onclick="product_quick_view('.$product->id.')" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                      </div>
                      <a href="#">'. $product->title.'</a>

                  </div>
              </div>
            </div>';
        }
    }
    echo $html;

    }


    public function category()
    {
      $query = $this->input->get('query');
      $category_id = $this->input->get('flag');

      if(isset($query) && isset($category_id)){
        $this->data['product_in_category'] = $this->products_model->product_by_category($category_id);
        $this->data['brands'] = $this->products_model->get_all_brand();
        $this->data['categories'] = $this->products_model->get_all_categories();
        $this->data['view_module'] = 'products';
        $this->data['view_file'] = 'product_in_category';
        $this->data['page_title'] = 'Products in Category | '.'shilpaolic.com';
        $this->template->_shop_ui($this->data);
      }
    }

    public function quick_view()
    {
      $product_id = $this->input->post('product_id');
      $product = $this->products_model->get_product_by_id($product_id);

      $output = '<div class="modal-body">
                    <div class="quickview_body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 col-lg-5">
                                    <div class="quickview_pro_img">
                                        <img class="first_img" src="'.FILE_UPLOAD_PATH.$product->feature_image1.'" alt="prodct_image">
                                        <img class="hover_img" src="'.FILE_UPLOAD_PATH.$product->feature_image2.'" alt="product image">
                                        <!-- Product Badge -->
                                        <div class="product_badge">
                                            <span class="badge-new">New</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-lg-7">
                                    <div class="quickview_pro_des">
                                        <h4 class="title">'.$product->title.'</h4>
                                        <div class="top_seller_product_rating mb-15">
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                            <i class="fa fa-star" aria-hidden="true"></i>
                                        </div>
                                        <h5 class="price">$120.99 <span>$130</span></h5>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia expedita quibusdam aspernatur, sapiente consectetur accusantium perspiciatis praesentium eligendi, in fugiat?</p>
                                        <a href="'.base_url('products/view/'.$product->id).'">View Full Product Details</a>
                                    </div>
                                    <!-- Add to Cart Form -->
                                    <div class="cart">
                                        <div class="quantity">
                                            <input type="number" class="qty-text" id="qty" step="1" min="1" max="12" name="quantity" value="1">
                                        </div>
                                        <button type="submit" name="addtocart" value="5" class="cart-submit" onClick="add_to_cart_with_quantity('.$product->id.')">Add to cart</button>
                                        <!-- Wishlist -->
                                        <div class="modal_pro_wishlist">
                                            <a href="#" onClick="add_to_wishlist('.$product->id.')"><i class="icofont-heart"></i></a>
                                        </div>
                                        <!-- Compare -->
                                        <div class="modal_pro_compare">
                                            <a href="#" onClick="add_to_compare('.$product->id.')"><i class="icofont-exchange"></i></a>
                                        </div>
                                    </div>
                                    <!-- Share -->
                                    <div class="share_wf mt-30">
                                        <p>Share with friends</p>
                                        <div class="_icon">
                                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                                            <a href="#"><i class="fa fa-envelope-o" aria-hidden="true"></i></a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>';

        echo $output;
    }

}
