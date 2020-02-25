<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- Breadcrumbs -->
<?php //$this->cart->destroy(); ?>
<div class="breadcrumbs">
    <div class="container">
        <div class="row">
            <div class="col-xs-12">
                <ul>
                    <li class="home"> <a title="Go to Home Page"
                            href="<?php echo base_url('/home'); ?>">Home</a><span>&raquo;</span></li>
                    <li class=""> <a title="Go to Home Page" href="#">best selling</a><span>&raquo;</span></li>
                </ul>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumbs End -->
<!-- Main Container -->
<div class="main-container col1-layout">
    <div class="container">
        <div class="row">
            <div class="col-main col-md-12 col-sm-12 col-xs-12">
                <div class="shop-inner">
                    <div class="page-title">
                        <h2>Best Selling</h2>
                    </div>
                    <div class="product-grid-area">
                        <ul class="products-grid">
                            <?php foreach($products as $product){ ?>
                            <li class="item col-md-3 col-sm-4 col-xs-6">
                                <div class="product-item">
                                    <div class="item-inner">
                                        <div class="product-thumbnail">
                                            <div class="icon-sale-label sale-left">Sale</div>
                                            <div class="pr-img-area">
                                                <a title="Product title here"
                                                    href="<?php echo base_url('products/details/'.$product->id); ?>">
                                                    <figure> <img class="first-img" height="250px" width="300px"
                                                            src="<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>"
                                                            alt="html theme"><img class="hover-img"
                                                            src="<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>"
                                                            height="250px" width="300px" alt="html Template"></figure>
                                                </a>
                                            </div>
                                            <div class="pr-info-area">
                                                <div class="pr-button">
                                                    <div class="mt-button add_to_wishlist"> <a
                                                            onclick="add_to_wishlist('<?php echo $product->id;?>')"><i class="fa fa-heart"></i>
                                                        </a> </div>
                                                    <div class="mt-button add_to_compare" style="cursor:pointer;"><a
                                                            onclick="add_to_compare('<?php echo $product->id;?>')"><i class="fa fa-link"></i> </a>
                                                    </div>
                                                    <div class="mt-button quick-view"><a
                                                            href="<?php echo base_url('products/details/'.$product->id); ?>"><i class="fa fa-search"></i> </a> </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item-info">
                                            <div class="info-inner">
                                                <div class="item-title"><a title="Product title here"
                                                        href="<?php echo base_url('products/details/'.$product->id); ?>"><?php echo $product->title; ?></a></div>
                                                <div class="item-content">
                                                    <div class="rating"><i class="fa fa-star-o"></i> <i
                                                            class="fa fa-star-o"></i><i class="fa fa-star-o"></i> <i
                                                            class="fa fa-star-o"></i> <i class="fa fa-star-o"></i>
                                                    </div>
                                                    <div class="item-price">
                                                        <div class="price-box"> <span class="regular-price"> <span
                                                                    class="price">$<?php echo $product->sale_price;?></span> </span> </div>
                                                    </div>
                                                    <div class="pro-action"> <button type="button" class="add-to-cart"
                                                            onclick="add_to_cart('<?php echo $product->id; ?>')"><span> Add to Cart</span> </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php }?>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
