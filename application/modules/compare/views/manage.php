<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Compare</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Compare</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Compare Area  -->
    <div class="compare_area section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="compare-list">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-0">
                              <?php
                              // global $compared_product;
                              $compared_product = $this->session->userdata('compare_product');
                              if(!empty($compared_product)){  ?>
                                <tbody>
                                    <tr>
                                        <td class="com-title">Product Image</td>
                                        <?php foreach ($compared_product as $key => $compare) {?>
                                          <td class="com-pro-img">
                                              <a href="#"><img src="<?php echo FILE_UPLOAD_PATH.$compare->feature_image1; ?>" alt="product image"></a>
                                          </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Product Name</td>
                                        <?php foreach ($compared_product as $key => $compare) {?>
                                          <td><a href="#"><?php echo $compare->title; ?></a></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Rating</td>
                                        <td>
                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i></div>
                                        </td>
                                        <td>
                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half"></i> <i class="fa fa-star-o"></i></div>
                                        </td>
                                        <td>
                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-half"></i></div>
                                        </td>
                                        <td>
                                            <div class="rating"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Price</td>
                                        <?php foreach ($compared_product as $key => $compare) {?>
                                          <td>
                                            <span>$<?php
                                            if($compare->discount != 0){
                                              if($compare->discount_type == "%"){
                                                $discounted_price_after_calculation = ($compare->sale_price*$compare->discount)/100;
                                                echo "<span>".($compare->sale_price - $discounted_price_after_calculation)."</span>";
                                                echo "<del style='margin-left:12px;color:red;' class='old-price'>".$compare->sale_price."</del>";
                                              }else if($compare->discount_type == "taka"){
                                               echo "<span>".($compare->sale_price - $compare->discount)."</span>";
                                               echo "<del style='margin-left:12px;color:red;' class='old-price'>".$compare->sale_price."</del>";

                                             }
                                           }else if ($compare->discount == 0){
                                            echo $compare->sale_price;
                                          }  ?></span>
                                          <span></span>
                                          </td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Description</td>
                                        <?php
                                        foreach ($compared_product as $key => $compare) {?>
                                          <td><?php echo $compare->description; ?></td>
                                        <?php } ?>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Manufacturer</td>
                                        <?php
                                          foreach ($compared_product as $key => $compare) {
                                                foreach ($brands as $b_key => $brand) {
                                                  if($brand->id == $compare->brand_id){
                                                    echo "<td>".$brand->name."</td>";
                                                  }
                                                }
                                          }
                                        ?>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Availability</td>
                                        <td class="instock">Instock</td>
                                        <td class="outofstock">Instock</td>
                                        <td class="instock">Instock</td>
                                        <td class="instock">Instock</td>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Size</td>
                                        <td>S</td>
                                        <td>XL</td>
                                        <td>M</td>
                                        <td>M</td>
                                    </tr>
                                    <tr>
                                        <td class="com-title">Color</td>
                                        <?php foreach ($compared_product as  $compare) {
                                          $color = explode(',', $compare->color);?>
                                          <td>
                                            <?php foreach ($color as  $value) {?>
                                              <span style="background-color: <?php echo $value; ?>;padding: 8px;width: 50px;border-radius: 8px;margin:8px;"></span>&nbsp;&nbsp;&nbsp;
                                            <?php } ?>
                                          </td>
                                        <?php   } ?>
                                    </tr>
                                    <tr>
                                        <td class="com-title"></td>
                                        <?php foreach ($compared_product as $key => $compare) { ?>
                                        <td class="action">
                                            <a href="#" class="mb-1 compare_addTocart" onClick="add_to_cart('<?php echo $compare->id ?>')"><i class="icofont-shopping-cart"></i></a>
                                            <a href="#"  class="mb-1 compare_addWishlist" onClick="add_to_wishlist('<?php echo $compare->id ?>')"><i class="icofont-heart"></i></a>
                                            <a href="#" class="mb-1 remove_from_compare" onClick="remove_from_compare('<?php echo $key; ?>')"><i class="icofont-close"></i></a>
                                        </td>
                                        <?php   } ?>
                                    </tr>
                                </tbody>
                              <?php }else{ ?>
                                <tbody>
                                  <tr>
                                    <td colspan="5">NO Item in your compare. <a href="<?php echo base_url('home') ?>">ADD</a> some item first</td>
                                  </tr>
                                </tbody>
                              <?php } ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Cart Area End -->
