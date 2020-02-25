<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php //print_r($this->cart->contents()); ?>

  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="index.html">Home</a><span>&raquo;</span></li>
            <li class=""> <a title="Go to Home Page" href="shop_grid.html">product</a><span>&raquo;</span></li>
            <li><strong><?php echo $product->title; ?></strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <div class="main-container col1-layout">
    <div class="container">
      <div class="row">
        <div class="col-main">
          <div class="product-view-area">
            <div class="product-big-image col-xs-12 col-sm-5 col-lg-5 col-md-5">
              <div class="icon-sale-label sale-left">Sale</div>
              <div class="large-image"> <a href="<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>" class="cloud-zoom" id="zoom1" rel="useWrapper: false, adjustY:0, adjustX:20"> <img class="zoom-img" src="<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>" alt="products"> </a> </div>
              <div class="flexslider flexslider-thumb">
                <ul class="previews-list slides">
                  <li><a  class='cloud-zoom-gallery' rel="useZoom: 'zoom1', smallImage: '<?php echo FILE_UPLOAD_PATH.$product->feature_image2; ?>' "><img src="<?php echo FILE_UPLOAD_PATH.$product->feature_image2; ?>" alt = "Thumbnail 2"/></a>
                  </li>
                  <li><a  class='cloud-zoom-gallery' rel="useZoom: 'zoom2', smallImage: '<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>' "><img src="<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>" alt = "Thumbnail 2"/></a>
                  </li>
                  <li><a  class='cloud-zoom-gallery' rel="useZoom: 'zoom3', smallImage: '<?php echo FILE_UPLOAD_PATH.$product->feature_image2; ?>' "><img src="<?php echo FILE_UPLOAD_PATH.$product->feature_image2; ?>" alt = "Thumbnail 2"/></a>
                  </li>
                  <li><a  class='cloud-zoom-gallery' rel="useZoom: 'zoom4', smallImage: '<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>' "><img src="<?php echo FILE_UPLOAD_PATH.$product->feature_image1; ?>" alt = "Thumbnail 2"/></a>
                  </li>
                  <li><a  class='cloud-zoom-gallery' rel="useZoom: 'zoom5', smallImage: '<?php echo FILE_UPLOAD_PATH.$product->feature_image2; ?>' "><img src="<?php echo FILE_UPLOAD_PATH.$product->feature_image2; ?>" alt = "Thumbnail 2"/></a>
                  </li>
                </ul>
              </div>

              <!-- end: more-images -->

            </div>
            <div class="col-xs-12 col-sm-7 col-lg-7 col-md-7 product-details-area">
              <div class="product-name">
                <h1>Lorem Ipsum is simply</h1>
              </div>
              <div class="price-box">
                <?php if($product->discount != 0){ ?>
                <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $<?php
                    if($product->discount_type == "%"){
                      $discounted_price_after_calculation = ($product->sale_price*$product->discount)/100;
                      echo ($product->sale_price - $discounted_price_after_calculation);
                    }else if($product->discount_type == "$"){
                       echo ($product->sale_price - $product->discount);
                    }
                 ?></span> </p>
                <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $<?php echo $product->sale_price; ?> </span> </p>
              <?php }else if ($product->discount == 0){ ?>
                <p class="special-price"> <span class="price-label">Regular Price:</span> <span class="price"> $<?php echo $product->sale_price; ?> </span> </p>
              <?php } ?>
              </div>
              <div class="ratings">
                <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                <p class="rating-links"> <a href="#">1 Review(s)</a> <span class="separator">|</span> <a href="#reviews" data-toggle="tab">Add Your Review</a> </p>
                <p class="availability in-stock pull-right">Availability: <span>In Stock</span></p>
              </div>
              <div class="short-description">
                <h2>Quick Overview</h2>
                <p><?php echo $product->description; ?></p>
              </div>
              <div class="product-color-size-area">
                <?php if(!empty($product->size)){ ?>
                <div class="color-area">
                  <h2 class="saider-bar-title">Color</h2>
                  <div class="color">
                    <ul>
                      <?php
                      $colors = explode(',', $product->color);
                       if(!empty($colors)){
                        foreach($colors as $color) {?>
                          <li>
                            <label for="<?php echo $color; ?>">
                            <input type="radio" name="color" id="<?php echo $color; ?>" value="<?php echo $color; ?>">
                            <span><?php echo $color; ?></span>
                          </label>

                          </li>
                      <?php } } ?>
                    </ul>
                  </div>
                </div>
                <?php } ?>
                <?php if(!empty($product->size)){ ?>
                <div class="size-area">
                  <h2 class="saider-bar-title">Size</h2>
                  <div class="size">
                    <ul>
                       <?php
                      $sizes = explode(',', $product->size);
                       if(!empty($sizes)){
                        foreach($sizes as $size) {?>
                      <li style="margin: 10px 5px;">
                        <label for="<?php echo $size; ?>">
                            <input type="radio" name="size" id="<?php echo $size; ?>" value="<?php echo $size; ?>">
                            <span><?php echo $size; ?></span>
                          </label>
                      </li>
                      <?php }} ?>
                    </ul>
                  </div>
                </div>
              <?php } ?>
              </div>
              <div class="product-variation">
                  <div class="cart-plus-minus">
                    <label for="qty">Quantity:</label>
                    <div class="numbers-row">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty ) &amp;&amp; qty &gt; 1 ) result.value--;return false;" class="dec qtybutton"><i class="fa fa-minus">&nbsp;</i></div>
                      <input type="text" class="qty" title="Qty" value="1" minlength="1" maxlength="10" id="qty" name="qty">
                      <div onClick="var result = document.getElementById('qty'); var qty = result.value; if( !isNaN( qty )) result.value++;return false;" class="inc qtybutton"><i class="fa fa-plus">&nbsp;</i></div>
                    </div>
                  </div>
                  <button id="cart_btn" onClick="add_to_cart_with_quantity(<?php echo $product->id; ?>)" class="button pro-add-to-cart" title="Add to Cart" type="button"><span><i class="fa fa-shopping-basket" ></i> Add to Cart</span></button>
              </div>
              <div class="product-cart-option">
                <ul>
                  <li><a onClick="add_to_wishlist(<?php echo $product->id; ?>)"><i class="fa fa-heart-o"></i><span>Add to Wishlist</span></a></li>
                  <li><a onClick="add_to_compare(<?php echo $product->id; ?>)"><i class="fa fa-link"></i><span>Add to Compare</span></a></li>
                  <!-- <li><a><i class="fa fa-envelope"></i><span>Email to a Friend</span></a></li> -->
                </ul>
              </div>
              <div class="pro-tags">
                <div class="pro-tags-title">Tags:</div>
                <?php
                    $tags = explode(',',$product->tags);
                    if(!empty($tags)){
                      foreach ($tags as $tag) {
                 ?>
                  <a class="badge badge-danger" style="color:white;background-color: green;" href="#"><?php echo $tag; ?></a>
                <?php } }?>
                 </div>
              <div class="share-box">
                <div class="title">Share in social media</div>
                <div class="socials-box"> <a href="#"><i class="fa fa-facebook"></i></a> <a href="#"><i class="fa fa-twitter"></i></a> <a href="#"><i class="fa fa-google-plus"></i></a> <a href="#"><i class="fa fa-youtube"></i></a> <a href="#"><i class="fa fa-linkedin"></i></a> <a href="#"><i class="fa fa-instagram"></i></a> </div>
              </div>
            </div>
          </div>
        </div>
        <div class="product-overview-tab">
          <div class="container">
            <div class="row">
              <div class="col-xs-12">
                <div class="product-tab-inner">
                  <ul id="product-detail-tab" class="nav nav-tabs product-tabs">
                    <li class="active"> <a href="#description" data-toggle="tab"> Description </a> </li>
                    <li> <a href="#reviews" data-toggle="tab">Reviews</a> </li>
                    <li><a href="#product_tags" data-toggle="tab">Tags</a></li>
                    <li> <a href="#custom_tabs" data-toggle="tab">Custom Tab</a> </li>
                  </ul>
                  <div id="productTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="description">
                      <div class="std">
                        <?php echo $product->description; ?>
                      </div>
                    </div>
                    <div id="reviews" class="tab-pane fade">
                      <div class="col-sm-5 col-lg-5 col-md-5">
                        <div class="reviews-content-left">
                          <h2>Customer Reviews</h2>
                          <div class="review-ratting">
                            <p><a href="#">Amazing</a> Review by Company</p>
                            <table>
                              <tbody>
                                <tr>
                                  <th>Price</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                                <tr>
                                  <th>Value</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                                <tr>
                                  <th>Quality</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                              </tbody>
                            </table>
                            <p class="author"> Angela Mack<small> (Posted on 16/12/2015)</small> </p>
                          </div>
                          <div class="review-ratting">
                            <p><a href="#">Good!!!!!</a> Review by Company</p>
                            <table>
                              <tbody>
                                <tr>
                                  <th>Price</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                                <tr>
                                  <th>Value</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                                <tr>
                                  <th>Quality</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                              </tbody>
                            </table>
                            <p class="author"> Lifestyle<small> (Posted on 20/12/2015)</small> </p>
                          </div>
                          <div class="review-ratting">
                            <p><a href="#">Excellent</a> Review by Company</p>
                            <table>
                              <tbody>
                                <tr>
                                  <th>Price</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                                <tr>
                                  <th>Value</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                                <tr>
                                  <th>Quality</th>
                                  <td><div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div></td>
                                </tr>
                              </tbody>
                            </table>
                            <p class="author"> Jone Deo<small> (Posted on 25/12/2015)</small> </p>
                          </div>
                        </div>
                      </div>
                      <div class="col-sm-7 col-lg-7 col-md-7">
                        <div class="reviews-content-right">
                          <h2>Write Your Own Review</h2>
                          <form>
                            <h3>You're reviewing: <span><?php echo $product->title; ?></span></h3>
                            <h4>How do you rate this product?<em>*</em></h4>
                            <div class="table-responsive reviews-table">
                              <table>
                                <tbody>
                                  <tr>
                                    <th></th>
                                    <th>1 star</th>
                                    <th>2 stars</th>
                                    <th>3 stars</th>
                                    <th>4 stars</th>
                                    <th>5 stars</th>
                                  </tr>
                                  <tr>
                                    <td>Quality</td>
                                    <td><input type="radio" name="quality" value="1"></td>
                                    <td><input type="radio" name="quality" value="2"></td>
                                    <td><input type="radio" name="quality" value="3"></td>
                                    <td><input type="radio" name="quality" value="4"></td>
                                    <td><input type="radio" name="quality" value="5"></td>
                                  </tr>
                                  <tr>
                                    <td>Price</td>
                                    <td><input type="radio" name="price" value="1"></td>
                                    <td><input type="radio" name="price" value="2"></td>
                                    <td><input type="radio" name="price" value="3"></td>
                                    <td><input type="radio" name="price" value="4"></td>
                                    <td><input type="radio" name="price" value="5"></td>
                                  </tr>
                                  <!-- <tr>
                                    <td>Value</td>
                                    <td><input type="radio" name="price" value="1"></td>
                                    <td><input type="radio" name="price" value="2"></td>
                                    <td><input type="radio" name="price" value="3"></td>
                                    <td><input type="radio" name="price" value="4"></td>
                                    <td><input type="radio" name="price" value="5"></td>
                                  </tr> -->
                                </tbody>
                              </table>
                            </div>
                            <div class="form-area">
                              <div class="form-element">
                                <label>Your Name <em>*</em></label>
                                <input type="text" name="customer_name" value="">
                              </div><!--
                              <div class="form-element">
                                <label>Summary of Your Review <em>*</em></label>
                                <input type="text">
                              </div> -->
                              <div class="form-element">
                                <label>Review <em>*</em></label>
                                <textarea name="review"></textarea>
                              </div>
                              <div class="buttons-set">
                                <button class="button submit" title="Submit Review" type="submit"><span><i class="fa fa-thumbs-up"></i> &nbsp;Review</span></button>
                              </div>
                            </div>
                          </form>
                        </div>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="product_tags">
                      <div class="box-collateral box-tags">
                        <div class="tags">
                          <form id="addTagForm" action="#" method="get">
                            <div class="form-add-tags">
                              <div class="input-box">
                                <label for="productTagName">Add Your Tags:</label>
                                <input class="input-text" name="productTagName" id="productTagName" type="text">
                                <button type="button" title="Add Tags" class="button add-tags"><i class="fa fa-plus"></i> &nbsp;<span>Add Tags</span> </button>
                              </div>
                              <!--input-box-->
                            </div>
                          </form>
                        </div>
                        <!--tags-->
                        <p class="note">Use spaces to separate tags. Use single quotes (') for phrases.</p>
                      </div>
                    </div>
                    <div class="tab-pane fade" id="custom_tabs">
                      <div class="product-tabs-content-inner clearfix">
                        <p><strong>Lorem Ipsum</strong><span>&nbsp;is
                          simply dummy text of the printing and typesetting industry. Lorem Ipsum
                          has been the industry's standard dummy text ever since the 1500s, when
                          an unknown printer took a galley of type and scrambled it to make a type
                          specimen book. It has survived not only five centuries, but also the
                          leap into electronic typesetting, remaining essentially unchanged. It
                          was popularised in the 1960s with the release of Letraset sheets
                          containing Lorem Ipsum passages, and more recently with desktop
                          publishing software like Aldus PageMaker including versions of Lorem
                          Ipsum.</span></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    <?php  ?>
      </div>
    </div>
  </div>

<br><br><br>
  <!-- new section -->
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="related-product-area">
          <div class="page-header">
            <h2>Related Products</h2>
          </div>
          <div class="related-products-pro">
            <div class="slider-items-products">
              <div id="related-product-slider" class="product-flexslider hidden-buttons">
                <div class="slider-items slider-width-col4 fadeInUp">
                  <?php
                      // print_r(get_related_product($product->category_id,$product->brand_id));exit();
                      foreach (get_related_product($product->id,$product->category_id,$product->brand_id) as $related_product) {?>
                        <div class="product-item">
                          <div class="item-inner">
                            <div class="product-thumbnail">
                              <div class="pr-img-area"> <a title="Product title here" href="single_product.html">
                                <figure> <img class="first-img" src="<?php echo FILE_UPLOAD_PATH.$related_product->feature_image1; ?>" alt="HTML template"> <img class="hover-img" src="<?php echo FILE_UPLOAD_PATH.$related_product->feature_image2; ?>" alt="HTML template"></figure>
                              </a> </div>
                              <div class="pr-info-area">
                                <div class="pr-button">
                                  <div class="mt-button add_to_wishlist"> <a href="<?php echo base_url('wishlist/add_to_wishlist/'.$related_product->id); ?>"> <i class="fa fa-heart-o"></i> </a> </div>
                                  <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                                  <div class="mt-button quick-view"> <a href="<?php echo base_url('products/details/'.$related_product->id); ?>"> <i class="fa fa-search"></i> </a> </div>
                                </div>
                              </div>
                            </div>
                            <div class="item-info">
                              <div class="info-inner">
                                <div class="item-title"> <a title="Product title here" href="<?php echo base_url('products/details/'.$related_product->id); ?>"><?php echo $related_product->title; ?></a> </div>
                                <div class="item-content">
                                  <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                                  <div class="price-box">
                                    <?php if($related_product->discount != 0){ ?>
                                      <p class="special-price"> <span class="price-label">Special Price</span> <span class="price"> $<?php
                                      if($related_product->discount_type == "%"){
                                        $discounted_price_after_calculation = ($related_product->sale_price*$related_product->discount)/100;
                                        echo ($related_product->sale_price - $discounted_price_after_calculation);
                                      }else if($related_product->discount_type == "$"){
                                        echo ($related_product->sale_price - $related_product->discount);
                                     }
                                     ?></span> </p>
                                     <p class="old-price"> <span class="price-label">Regular Price:</span> <span class="price"> $<?php echo $related_product->sale_price; ?> </span> </p>
                                   <?php }else if ($related_product->discount == 0){ ?>
                                    <p class="special-price"> <span class="price-label">Regular Price:</span> <span class="price"> $<?php echo $related_product->sale_price; ?> </span> </p>
                                  <?php } ?>
                                </div>
                                <div class="pro-action">
                                    <button type="button" onClick = "add_to_cart('<?php echo $related_product->id ?>')" class="add-to-cart"><span> Add to Cart</span> </button>
                                  </div>
                                </div>
                              </div>
                            </div>
                          </div>
                        </div>
                <?php }  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Related Product Slider End -->

  <!-- Upsell Product Slider -->
  <section class="upsell-product-area">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <div class="page-header">
            <h2>UpSell Products</h2>
          </div>
          <div class="slider-items-products">
            <div id="upsell-product-slider" class="product-flexslider hidden-buttons">
              <div class="slider-items slider-width-col4">
                <div class="product-item">
                  <div class="item-inner">
                    <div class="product-thumbnail">
                      <div class="icon-sale-label sale-left">Sale</div>
                      <div class="icon-new-label new-right">New</div>
                      <div class="pr-img-area"> <a title="Product title here" href="single_product.html">
                        <figure> <img class="first-img" src="<?php echo FILE_UPLOAD_PATH; ?>public/assets/images/product-3.jpg" alt="HTML template"> <img class="hover-img" src="<?php echo FILE_UPLOAD_PATH; ?>public/assets/images/product-4.jpg" alt="HTML template"></figure>
                        </a> </div>
                      <div class="pr-info-area">
                        <div class="pr-button">
                          <div class="mt-button add_to_wishlist"> <a href="wishlist.html"> <i class="fa fa-heart-o"></i> </a> </div>
                          <div class="mt-button add_to_compare"> <a href="compare.html"> <i class="fa fa-link"></i> </a> </div>
                          <div class="mt-button quick-view"> <a href="quick_view.html"> <i class="fa fa-search"></i> </a> </div>
                        </div>
                      </div>
                    </div>
                    <div class="item-info">
                      <div class="info-inner">
                        <div class="item-title"> <a title="Product title here" href="single_product.html">Product title here </a> </div>
                        <div class="item-content">
                          <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>
                          <div class="item-price">
                            <div class="price-box"> <span class="regular-price"> <span class="price">$125.00</span> </span> </div>
                          </div>
                          <div class="pro-action">
                            <button type="button" class="add-to-cart"><span> Add to Cart</span> </button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
