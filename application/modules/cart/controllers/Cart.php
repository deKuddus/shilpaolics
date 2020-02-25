<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('cart_model');
        $this->load->module('template');
    }

    public function index() {
    	$this->manage();
    }

    public function manage() {


        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'cart';
        $this->data['page_title'] = 'My Cart | shilpaolic.com';
        $this->data['view_file'] = 'cart';
        $this->template->_shop_ui($this->data);
    }

    public function contents()
    {
        $cart = $this->cart->contents();
        if(!empty($cart)){
         echo json_encode($cart);
        }else{
            echo json_encode(null);
        }
    }

    public function count_cart(){
        $size = count($this->cart->contents());
        if($size > 0){
            echo $size;
        }else{
            echo 0;
        }
    }


    public function remove_from_cart_by_row_id(){
        $row_id = $this->input->post('row_id');
        if($this->cart->remove($row_id)){
            $status = array('status'=>200,'message'=>'Product Removed From Your Cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }


    public function add_to_cart_with_default_quantity_1()
    {
        $product_id = $this->input->post('product_id');
        $product = $this->cart_model->get_product_by_id($product_id);
        global $price;
        if($product->discount != 0){
             if($product->discount_type == 2){
                  $discounted_price_after_calculation = ($product->sale_price*$product->discount)/100;
                  $price =  ($product->sale_price - $discounted_price_after_calculation);
                }else if($product->discount_type == 1){
                   $price = ($product->sale_price - $product->discount);
                }
        }else{
            $price = $product->sale_price;
        }

        $data = array(
            'id'      => $product->id,
            'qty'     => 1,
            'price'   => $price,
            'name'    => $product->title,
            'color'=>'',
            'size'=>'',
            'image' => $product->feature_image1,
            'vat' => ($product->tax)?$product->tax:'',
        );
        $rowid = $this->cart->insert($data);

        if(!empty($rowid)){
            $status = array('status'=>201,'message'=>'product added to your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else{
            $status = array('status'=>404,'message'=>'Failed added to your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }

    public function update_cart(){        

        $data = array(
            'rowid' =>$this->input->post('row_id') ,
            'qty'   =>$this->input->post('qty')
        );

       $rowid = $this->cart->update($data);
       if(!empty($rowid)){
            $status = array('status'=>201,'message'=>'Quantity updated to your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else{
            $status = array('status'=>404,'message'=>'Quantity update failed your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }
	
    public  function remove_all_from_cart(){
        $this->cart->destroy();
        $status = array('status'=>200,'message'=>'All Product Removed From Your Cart');
        header("Content-type: application/json");
        echo json_encode($status);
        exit();
    }

     public function add_to_cart_with_user_quantity(){
        $product_id = $this->input->post('product_id');
        $quantity = $this->input->post('quantity');
        if(!empty($this->input->post('size'))){
            $size = $this->input->post('size') ;
        }else{
            $size = 'no';        
        }
        if(!empty($this->input->post('color'))){
            $color = $this->input->post('color') ;
        }else{
            $color = 'no';        
        }
        $product = $this->cart_model->get_product_by_id($product_id);
        $discount_symbol = $this->cart_model->discount_type($product->discount_type)->symbol;
        global $price;
        if(!empty($product)){
            if($product->discount != 0){
                if($discount_symbol == "%"){
                    $discounted_price_after_calculation = ($product->sale_price*$product->discount)/100;
                    $price =  ($product->sale_price - $discounted_price_after_calculation);
                }else if($discount_symbol == "$"){
                    $price = ($product->sale_price - $product->discount);
                }
            }else{
                $price = $product->sale_price;
            }
            $data = array(
                'id'      => $product->id,
                'qty'     => $quantity,
                'price'   => $price,
                'name'    => $product->title,
                'color'=>$color,
                'size'=>$size,
                'image' => $product->feature_image1,

            );
            $row_id = $this->cart->insert($data);
            if($row_id ){
                $status = array('status'=>201,'message'=>'product added to your cart');
                header("Content-type: application/json");
                echo json_encode($status);
                exit();
            }
        }
    }
}
