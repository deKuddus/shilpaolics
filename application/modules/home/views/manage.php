<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

<!-- Welcome Slides Area -->
<section class="welcome_area">
    <div class="welSlideTwo owl-carousel">
        <?php foreach ($sliders as $key => $slider) {?>
            <!-- Single Slide -->
            <div class="single_slide home-3 bg-img" style="background-image: url(<?php echo FILE_UPLOAD_PATH.'/'.$slider->image; ?>);">
                <div class="container h-100">
                    <div class="row h-100 align-items-center">
                        <div class="col-12">
                            <div class="welcome_slide_text text-center">
                                <p data-animation="fadeInUp" data-delay="100ms"><?php echo $slider->title; ?></p>
                                <h2 data-animation="fadeInUp" data-delay="300ms"><?php echo $slider->description; ?></h2>
                                <a href="<?php echo $slider->url; ?>" class="btn btn-primary" data-animation="fadeInUp" data-delay="500ms">Buy Now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<!-- Welcome Slides Area -->

<!-- Shop Catagory Area -->
<div class="shop_by_catagory_area section_padding_100">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading mb-50">
                    <h5>Shop By Catagory</h5>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-12">
                <div class="shop_by_catagory_slides owl-carousel">
                    <?php foreach ($categories as $key => $category) {?>
                    <!-- Single Slide -->
                    <div class="single_catagory_slide">
                        <a href="<?php echo base_url('products/category?query=product-category&&flag='.$category->id); ?>">
                            <img src="<?php echo FILE_UPLOAD_PATH.$category->picture; ?>" alt="category image">
                        </a>
                        <p><?php echo $category->category_name; ?></p>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Shop Catagory Area -->


<?php if(config('new_arrival_show') == 1): ?>
<!-- New Products -->
<section class="best-selling-products-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading mb-50">
                    <h5 class="text-center font-weight-bold" style="text-transform: uppercase;">Newly Arrived Products</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php 
            if(isset($new_products)):
            foreach ($new_products as $key => $product) {?>
                <!-- Single Product -->
                <div class="col-9 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-product-area mb-30">
                        <div class="product_image">
                            <!-- Product Image -->
                            <img class="normal_img" height="974px" width="476" src="<?php echo FILE_UPLOAD_PATH.'/'.$product->feature_image1; ?>" alt="">

                            <!-- Product Badge -->
                            <div class="product_badge">
                                <span>NEW</span>
                            </div>

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="#" onclick="add_to_wishlist('<?php echo $product->id; ?>')"><i class="icofont-heart"></i></a>
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
                                <a href="#" onclick="add_to_cart('<?php echo $product->id; ?>')"><i class="icofont-cart"></i> Add to Cart</a>
                            </div>

                            <!-- Quick View -->
                            <div class="product_quick_view">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                            </div>

                            <a href="#"><?php echo $product->title; ?></a>
                            <h6 class="product-price">$<?php echo $product->sale_price; ?></h6>
                        </div>
                    </div>
                </div>
            <?php } endif ?>
        </div>
    </div>
</section>
<!-- Best Selling Products -->
<?php endif ?>
<?php if(config('hot_prouduct') == 1): ?>
<!-- Hot Products -->
<section class="best-selling-products-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading mb-50">
                    <h5 class="text-center font-weight-bold" style="text-transform: uppercase;">Trending Products</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">

            <?php
            if(isset($hot_product)):
             foreach ($hot_product as $key => $product) {?>
                <!-- Single Product -->
                <div class="col-9 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-product-area mb-30">
                        <div class="product_image">
                            <!-- Product Image -->
                            <img class="normal_img" height="974px" width="476" src="<?php echo FILE_UPLOAD_PATH.'/'.$product->feature_image1; ?>" alt="">

                            <!-- Product Badge -->
                            <div class="product_badge">
                                <span style="background-color: #e91e63 !important;">HOT</span>
                            </div>

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="#" onclick="add_to_wishlist('<?php echo $product->id; ?>')"><i class="icofont-heart"></i></a>
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
                                <a href="#" onclick="add_to_cart('<?php echo $product->id; ?>')"><i class="icofont-cart"></i> Add to Cart</a>
                            </div>

                            <!-- Quick View -->
                            <div class="product_quick_view">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                            </div>

                            <a href="#"><?php echo $product->title; ?></a>
                            <h6 class="product-price">$<?php echo $product->sale_price; ?></h6>
                        </div>
                    </div>
                </div>
            <?php } endif ?>
        </div>
    </div>
</section>
<!-- Best Selling Products -->
<?php endif ?>

<?php if(config('best_selling') == 1): ?>
<!-- Bestselling Products -->
<section class="best-selling-products-area mb-70">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading mb-50">
                    <h5 class="text-center font-weight-bold" style="text-transform: uppercase;">Best Seller Products</h5>
                </div>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php 
            if(isset($best_selling)):
            foreach ($best_selling as $key => $product) {?>
                <!-- Single Product -->
                <div class="col-9 col-sm-6 col-md-4 col-lg-3">
                    <div class="single-product-area mb-30">
                        <div class="product_image">
                            <!-- Product Image -->
                            <img class="normal_img" height="974px" width="476" src="<?php echo FILE_UPLOAD_PATH.'/'.$product->feature_image1; ?>" alt="">

                            <!-- Product Badge -->
                            <!-- <div class="product_badge">
                                <span>Top</span>
                            </div> -->

                            <!-- Wishlist -->
                            <div class="product_wishlist">
                                <a href="#" onclick="add_to_wishlist('<?php echo $product->id; ?>')"><i class="icofont-heart"></i></a>
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
                                <a href="#" onclick="add_to_cart('<?php echo $product->id; ?>')"><i class="icofont-cart"></i> Add to Cart</a>
                            </div>

                            <!-- Quick View -->
                            <div class="product_quick_view">
                                <a href="#" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>
                            </div>

                            <a href="#"><?php echo $product->title; ?></a>
                            <h6 class="product-price">$<?php echo $product->sale_price; ?></h6>
                        </div>
                    </div>
                </div>
            <?php } endif ?>
        </div>
    </div>
</section>
<!-- Best Selling Products -->
<?php endif ?>

<!-- Offer Area -->
<section class="offer_area section_padding_0_100">
    <div class="container">
        <div class="row">
            <!-- Beach Offer -->
            <div class="col-12 col-md-6 col-lg-4">
                <div class="beach_offer_area mb-4 mb-md-0">
                    <img src="<?php echo base_url() ?>public/assets/img/product-img/beach.png" alt="beach-offer">
                    <div class="beach_offer_info">
                        <p>Upto 70% OFF</p>
                        <h3>Beach Item</h3>
                        <a href="#" class="btn btn-primary btn-sm mt-15">SHOP NOW</a>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-4">
                <!-- Apparels Offer -->
                <div class="apparels_offer_area">
                    <img src="<?php echo base_url(); ?>public/assets/img/product-img/apparels.jpg" alt="Beach-Offer">
                    <div class="apparels_offer_info d-flex align-items-center">
                        <div class="apparels-offer-content">
                            <h4>Apparel &amp; <br><span>Garments</span></h4>
                            <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Deals of the Week -->
                <div class="weekly_deals_area mt-30">
                    <img src="<?php echo base_url(); ?>public/assets/img/product-img/weekly-offer.jpg" alt="weekly-deals">
                    <div class="weekly_deals_info">
                        <h4>Deals of the Week</h4>
                        <div class="deals_timer">
                            <ul data-countdown="2021/02/14 14:21:38">
                                <!-- Please use event time this format: YYYY/MM/DD hh:mm:ss -->
                                <li><span class="days">00</span>days</li>
                                <li><span class="hours">00</span>hours</li>
                                <li class="d-block blank-timer"></li>
                                <li><span class="minutes">00</span>min</li>
                                <li><span class="seconds">00</span>sec</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-lg-4">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-12">
                        <!-- Elect Offer -->
                        <div class="elect_offer_area mt-30 mt-lg-0">
                            <img src="<?php echo base_url(); ?>public/assets/img/product-img/elect.jpg" alt="Elect-Offer">
                            <div class="elect_offer_info d-flex align-items-center">
                                <div class="elect-offer-content">
                                    <h4>Electronics</h4>
                                    <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-12">
                        <!-- Backpack Offer -->
                        <div class="backpack_offer_area mt-30">
                            <img src="<?php echo base_url(); ?>public/assets/img/product-img/backpack.jpg" alt="Backpack-Offer">
                            <div class="backpack_offer_info">
                                <h4>Backpacks</h4>
                                <a href="#" class="btn">Buy Now <i class="icofont-rounded-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Offer Area End -->



<!-- Special Featured Area -->
<section class="special_feature_area pt-5">
    <div class="container">
        <div class="row">
            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-ship"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Free Shipping</h6>
                        <p>For orders above $ <?php echo config('free_shipping_limit'); ?></p>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-box"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Happy Returns</h6>
                        <p>7 Days free Returns</p>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-money"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>100% Money Back</h6>
                        <p>If product is damaged</p>
                    </div>
                </div>
            </div>

            <!-- Single Feature Area -->
            <div class="col-12 col-sm-6 col-lg-3">
                <div class="single_feature_area mb-5 d-flex align-items-center">
                    <div class="feature_icon">
                        <i class="icofont-live-support"></i>
                        <span><i class="icofont-check-alt"></i></span>
                    </div>
                    <div class="feature_content">
                        <h6>Dedicated Support</h6>
                        <p>We provide support 24/7</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <!-- Special Featured Area -->
