<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Wishlist</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
                        <li class="breadcrumb-item active">Wishlist</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Wishlist Table Area -->
    <div class="wishlist-table section_padding_100 clearfix">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cart-table wishlist-table">
                        <div class="table-responsive">
                            <table class="table table-bordered mb-30">
                                <thead>
                                    <tr>
                                        <th scope="col"><i onClick="remove_all_from_wihslist(1)" class="icofont-ui-delete"></i></th>
                                        <th scope="col">Image</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Unit Price</th>
                                        <th scope="col">Quantity</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  $id = array();
                                  foreach ($wishlists as $ids) {
                                      $id[] = $ids->product_id;
                                  }
                                  if(get_product_by_id($id) != NULL){
                                  foreach (get_product_by_id($id) as $wishlist) { ?>
                                    <tr>
                                        <th scope="row">
                                            <i class="icofont-close"></i>
                                        </th>
                                        <td>
                                            <img src="<?php echo FILE_UPLOAD_PATH.$wishlist->feature_image1; ?>" alt="Product Image">
                                        </td>
                                        <td>
                                            <a href="#"><?php echo $wishlist->title; ?></a>
                                        </td>
                                        <td>
                                          <?php
                                          if($wishlist->discount != 0){
                                            foreach ($discount_type as $key => $d_type) {
                                              if($wishlist->discount_type == $d_type->id){
                                                $discounted_price_after_calculation = ($wishlist->sale_price*$wishlist->discount)/100;
                                                echo "$".($wishlist->sale_price - $discounted_price_after_calculation);
                                              }else if($wishlist->discount_type == "$"){
                                                echo "$".($wishlist->sale_price - $wishlist->discount);
                                              }
                                            }
                                          }else if ($wishlist->discount == 0){
                                              echo $wishlist->sale_price;
                                            }
                                           ?>
                                        </td>
                                        <td>
                                            <div class="quantity">
                                                <input type="number" class="qty-text" id="qty2" step="1" min="1" max="99" name="quantity" value="1">
                                            </div>
                                        </td>
                                        <td><a href="#" onClick="add_to_cart_from_wishlist('<?php echo $wishlist->id;?>',this)" class="btn btn-primary btn-sm">Add to Cart</a></td>
                                    </tr>
                                  <?php } }else{ ?>
                                    <tr><td colspan="6">No Item In Your Wishlist <a href="<?php echo base_url('home') ?>">Add some Item</a></td></tr>
                                  <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <?php if($id): ?>
                      <div class="cart-footer text-right">
                        <div class="back-to-shop">
                          <a href="#" class="btn btn-primary">Add All Item</a>
                        </div>
                      </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
    <!-- Wishlist Table Area -->
