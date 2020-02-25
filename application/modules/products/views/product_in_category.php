<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Breadcumb Area -->
<div class="breadcumb_area">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <h5>Product</h5>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('/home') ?>">Home</a></li>
          <li class="breadcrumb-item active">product by category</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Breadcumb Area -->

<!-- Shop List Area -->
<section class="shop_grid_area section_padding_100">
  <div class="container">
    <div class="row">
      <div class="col-12 col-sm-5 col-md-4 col-lg-3">
        <div class="shop_sidebar_area">

          <!-- Single Widget -->
          <div class="widget catagory mb-30">
            <h6 class="widget-title">Categories</h6>
            <div class="widget-desc">
              <?php foreach ($categories as $c_key => $category) {?>
                <!-- Single Checkbox -->
                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                  <input type="checkbox" value="<?php echo $category->id;?>" class="custom-control-input common_selector category " id="category<?php echo $c_key; ?>">
                  <label class="custom-control-label" for="category<?php echo $c_key; ?>"><?php echo $category->category_name; ?> <span class="text-muted"></span></label>
                </div>
              <?php } ?>
            </div>
          </div>

          <!-- Single Widget -->
          <div class="widget price mb-30">
            <h6 class="widget-title">Filter by Price</h6>
            <div class="widget-desc">
              <div class="slider-range">
                <div data-min="0" data-max="5000" data-unit="$" class="slider-range-price ui-slider ui-slider-horizontal ui-widget ui-widget-content ui-corner-all" data-value-min="0" data-value-max="5000" data-label-result="Price:">
                  <div class="ui-slider-range ui-widget-header ui-corner-all"></div>
                  <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                  <span class="ui-slider-handle ui-state-default ui-corner-all" tabindex="0"></span>
                  <input type="hidden" id="hidden_minimum_price" value="0" />
                  <input type="hidden" id="hidden_maximum_price" value="5000" class="common_selector" />
                </div>
                <div class="range-price">Price: 0 - 5000</div>
              </div>
            </div>
          </div>

          <!-- Single Widget -->
          <div class="widget brands mb-30">
            <h6 class="widget-title">Filter by brands</h6>
            <div class="widget-desc">
             <?php foreach ($brands as $b_key => $brand) { ?>
                <div class="custom-control custom-checkbox d-flex align-items-center mb-2">
                  <input type="checkbox" class="custom-control-input common_selector brand" id="brand<?php echo $b_key; ?>" value="<?php echo $brand->id;?>" >
                  <label class="custom-control-label" for="brand<?php echo $b_key; ?>"><?php echo $brand->name; ?></label>
                </div>
              <?php } ?>
            </div>
          </div>
        </div>
      </div>

      <div class="col-12 col-sm-7 col-md-8 col-lg-9">
        <!-- Shop Top Sidebar -->
        <div class="shop_top_sidebar_area d-flex flex-wrap align-items-center justify-content-between">
          <div class="view_area d-flex">
            <div class="grid_view">
              <a href="shop-grid-left-sidebar.html" data-toggle="tooltip" data-placement="top" title="Grid View"><i class="icofont-layout"></i></a>
            </div>
            <div class="list_view ml-3">
              <a href="shop-list-left-sidebar.html" data-toggle="tooltip" data-placement="top" title="List View"><i class="icofont-listine-dots"></i></a>
            </div>
          </div>
            <select class="small right">
              <option selected value="1">Short by Popularity</option>
              <option value="2">Short by Newest</option>
              <option value="3">Short by Sales</option>
              <option value="4">Short by Ratings</option>
            </select>
        </div>

        <div class="shop_grid_product_area">
          <?php if(isset($product_in_category) && !empty($product_in_category)){ ?>
          <div class="row justify-content-center">
            <!-- Single Product -->
            <?php
            $discount_type = get_discount_type();
             foreach ($product_in_category as $key => $product) { ?>
            <div class="col-9 col-sm-12 col-md-6 col-lg-4">
              <div class="single-product-area mb-30">
                 <div class="product_image">
                      <!-- Product Image -->
                      <img class="normal_img" src="<?php echo FILE_UPLOAD_PATH.'/'.$product->feature_image1; ?>" alt="product image ">
                      <img class="hover_img" src="<?php echo FILE_UPLOAD_PATH.'/'.$product->feature_image2 ?>" alt="product image">

                      <!-- Product Badge -->
                      <div class="product_badge">
                        <span>New</span>
                      </div>

                      <!-- Wishlist -->
                      <div class="product_wishlist">
                        <a href="#" onclick="add_to_wishlist('<?php echo $product->id;?>')"><i class="icofont-heart"></i></a>
                      </div>

                      <!-- Compare -->
                      <div class="product_compare">
                        <a href="#" onclick="add_to_compare('<?php echo $product->id; ?>')"><i class="icofont-exchange"></i></a>
                      </div>
                    </div>

                    <!-- Product Description -->
                    <div class="product_description">
                      <!-- Add to cart -->
                      <div class="product_add_to_cart">
                        <a href="#" onclick="add_to_cart('<?php echo $product->id; ?>')"><i class="icofont-shopping-cart"></i> Add to Cart</a>
                      </div>

                      <!-- Quick View -->
                      <div class="product_quick_view">
                        <a href="#" onclick="product_quick_view('<?php echo $product->id; ?>')" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                      </div>
                      <a href="#"><?php echo $product->title; ?></a>
                      <h6 class="product-price">
                        <?php if($product->discount != 0){
                        foreach ($discount_type as $key => $d_type) {
                          if($product->discount_type == $d_type->id){
                            $discounted_price_after_calculation = ($product->sale_price*$product->discount)/100;
                            echo "$".($product->sale_price - $discounted_price_after_calculation);
                          }else if($product->discount_type == "$"){
                            echo "$".($product->sale_price - $product->discount);
                          }
                        }
                        ?>
                        <span> $<?php echo $product->sale_price; ?></span>
                      <?php }else if ($product->discount == 0){ ?>
                        <span>$<?php echo $product->sale_price;?></span>
                      <?php } ?>
                    </h6>
                  </div>
              </div>
            </div>
          <?php } ?>
          </div>
        <?php }else{ ?>
            <h3 class="text-center">Woops! No Products Found From This Category</h3>
        <?php } ?>
        </div>
      </div>
    </div>
  </div>
</section>
<!-- Shop List Area -->
