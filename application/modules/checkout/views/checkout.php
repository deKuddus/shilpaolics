<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Checkout</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index-2.html">Home</a></li>
                        <li class="breadcrumb-item active">Checkout</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Checkout Steps Area -->
    <div class="checkout_steps_area">
        <a class="active" href="#" id="chekout_method_parent"><i class="icofont-check-circled"></i>Start</a>
        <a href="#" id="billing_parent"><i class="icofont-check-circled"></i> Billing</a>
        <a href="#" id="shipping_method_parrent"><i class="icofont-check-circled"></i> Shipping</a>
        <a href="#" id="payment_parent"><i class="icofont-check-circled"></i> Payment</a>
        <a href="#" id="order_review_parent"><i class="icofont-check-circled"></i> Review</a>
    </div>

    <!-- Checkout Area -->
    <div class="checkout_area section_padding_100_50">
      <form  id="checkout" action="<?php echo base_url('checkout/form_data') ?>" method="post">
      <div class="container">
          <div class="row" id="chekout_method_child">
             <?php if($this->session->userdata('logged_in') != 1){ ?>
              <div class="col-12 col-md-12">
                  <div class="checkout_details_area mb-50">
                      <h5>Checkout as a Guest or Register</h5>
                      <p>Register with us for future convenience:</p>

                      <div class="custom-control mb-2 custom-radio">
                          <input type="radio" name="checkout_type" id="guest" value="1" class="custom-control-input">
                          <label class="custom-control-label" for="guest">Checkout as Guest</label>
                      </div>
                      <div class="custom-control mb-2 custom-radio">
                          <input type="radio" name="checkout_type" id="register" value="2" class="custom-control-input">
                          <label class="custom-control-label" for="register">Register</label>
                      </div>

                      <h5 class="mt-4">Register and save time!</h5>
                      <p>Register with us for future convenience:</p>

                      <p class="mb-1"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Fast and easy check out </p>
                      <p class="mb-1"><i class="fa fa-dot-circle-o" aria-hidden="true"></i> Easy access to your order billing and status</p>
                  
                      <div class="checkout_pagination d-flex mt-4 justify-content-end">
                          <a href="<?php echo base_url('cart'); ?>" class="btn btn-primary mt-2 ml-2">Go to Cart</a>
                          <a href="#" id="continue1" class="btn btn-primary mt-2 ml-2">Continue</a>
                      </div>
                  </div>
              </div>
              <?php }else{ ?>
              <div class="col-12 col-md-6">
                <div class="checkout_details_area mb-50">
                 <h5>You are registered user. Please click on continue;</h5>

                    <div class="checkout_pagination d-flex mt-4 justify-content-end">
                          <a href="<?php echo base_url('cart'); ?>" class="btn btn-primary mt-2 ml-2">Go to Cart</a>
                          <a href="#" id="continue1" class="btn btn-primary mt-2 ml-2">Continue</a>
                      </div>
                  </div>
              </div>
            <?php } ?>
          </div>
          <div class="row"  style="display: none;" id="billing_child">
              <div class="col-12">
                <div class="checkout_details_area clearfix">
                  <h5 class="mb-4">Billing Details</h5>
                    <div class="row">
                      <div class="col-md-6 mb-3">
                        <label for="customer_name">Full Name</label>
                        <input type="text" class="input form-control billing" name="customer_name" id="customer_name" value="<?php echo isset($customer_data->name)?$customer_data->name:""; ?>" placeholder="your full name" />
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="customer_email">Email Address</label>
                        <input type="text" class="input form-control billing" name="customer_email" id="customer_email" value="<?php echo isset($customer_data->email)?$customer_data->email:""; ?>" placeholder="your email" />
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="customer_contact">Phone Number</label>
                        <input class="input form-control billing" type="text" name="customer_contact" id="customer_contact" value="<?php echo isset($customer_data->contact)?$customer_data->contact:""; ?>" placeholder="your phone number" >
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="customer_city">City</label>
                        <input class="input form-control billing" type="text" name="customer_city" id="customer_city" value="<?php echo isset($customer_data->city)?$customer_data->city:""; ?>" placeholder="your city" >
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="customer_address">Address</label>
                        <input type="text" class="input form-control billing" name="customer_address" id="customer_address" value="<?php echo isset($customer_data->address)?$customer_data->address:""; ?>" placeholder="your address" />
                      </div>
                      <div class="col-md-6">
                        <label for="postcode">Postcode/Zip</label>
                        <input class="input form-control billing" type="text" name="customer_zip_code" id="customer_zip_code" value="<?php echo isset($customer_data->zip_code)?$customer_data->zip_code:""; ?>" placeholder="postal code" />
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="customer_country">Country</label>
                        <select  class="w-100 d-block form-control" id="customer_country" name="customer_country"  data-placeholder = "select your country" ></select>
                      </div>
                      <div class="col-md-6 mb-3">
                        <label for="customer_state">State</label>
                        <select class="custom-select d-block w-100 form-control" id="customer_state" name="customer_state"></select>
                      </div>
                    </div>
                    <div class="row" style="display: none" id="password_section_for_registration">
                      <div class="col-md-6 mb-3">
                          <label for="customer_user_name">Username</label>
                          <input type="text" class="form-control billing" name="customer_user_name" id="customer_user_name" placeholder="username" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="customer_password">Password</label>
                          <input type="password" class="form-control billing" name="customer_password" id="customer_password" placeholder="password" value="">
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="customer_confirm_password">Confirm Password</label>
                          <input type="password" class="form-control billing" name="customer_confirm_password" id="customer_confirm_password" placeholder="Repeat password" value="">
                        </div>
                    </div>
                </div>
                <!-- Different Shipping Address -->
                <div class="different-address mt-50">
                    <div class="ship-different-title mb-3">
                         <div class="custom-control custom-checkbox">
                            <input type="checkbox" class="custom-control-input" name="ship_to" id="ship_to" value="1">
                            <label class="custom-control-label" for="ship_to">Ship to a different address?</label>
                        </div>
                    </div>
                    <div class="row shipping_input_field" id="shipping_child" style="display: none;">
                        <div class="col-md-6 mb-3">
                            <label for="ship_another_first_name">First Name</label>
                            <input type="text" class="input form-control shipping" name="ship_another_first_name" id="ship_another_first_name">
                            <div class="form-error text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ship_another_last_name">Last Name</label>
                            <input type="text" class="input form-control shipping" name="ship_another_last_name" id="ship_another_last_name">
                            <div class="form-error text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ship_another_email_address">Email Address</label>
                            <input type="text" class="input form-control shipping" name="ship_another_email_address" id="ship_another_email_address">
                            <div class="form-error text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="ship_another_mobile">Phone Number</label>
                            <input class="input form-control shipping" type="text" name="ship_another_mobile" id="ship_another_mobile" >
                            <div class="form-error text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="ship_another_city">City</label>
                          <input class="input form-control shipping" type="text" name="ship_another_city" id="ship_another_city" >
                          <div class="form-error text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                          <label for="ship_another_postal_code">Postcode/Zip</label>
                          <input type="text" class="input form-control shipping" name="ship_another_postal_code" id="ship_another_postal_code">
                          <div class="form-error text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="customer_country">Country</label>
                            <select class="custom-select d-block w-100 form-control" name="ship_another_country" id="country"></select>
                            <div class="form-error text-danger"></div>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="customer_state">State</label>
                             <select class="custom-select d-block w-100 form-control" name="ship_another_state" id="state"></select>
                             <div class="form-error text-danger"></div>
                        </div>
                    </div>
                </div>
              </div>

              <div class="col-12">
                  <div class="checkout_pagination d-flex justify-content-end mt-50">
                      <a href="#" id="back_to1" class="btn btn-primary mt-2 ml-2">Go Back</a>
                      <a href="#" id="continue2" class="btn btn-primary mt-2 ml-2">Continue</a>
                  </div>
              </div>
          </div>
          <div class="row" style="display: none;" id="shipping_method_child">
            <div class="col-12">
              <div class="checkout_details_area clearfix">
                <h5 class="mb-4">Shipping Method</h5>

                <div class="shipping_method">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Method</th>
                          <th scope="col">Delivery Time</th>
                          <th scope="col">Price</th>
                          <th scope="col">Choose</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">Courier</th>
                          <td>1-2 Business Day</td>
                          <td>$9.99</td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input type="radio" id="currier" name="shipping" class="custom-control-input" value="currier">
                              <label class="custom-control-label" for="currier"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Flat Rate</th>
                          <td>3-4 Day</td>
                          <td>$3.00</td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input type="radio" id="flat_shipping" name="shipping" value="flat_shipping" class="custom-control-input" checked="checked">
                              <label class="custom-control-label" for="flat_shipping"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">Free Shipping</th>
                          <td>1 Week</td>
                          <td>Free</td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input type="radio" id="free_shipping" name="shipping" class="custom-control-input" value="free_shipping">
                              <label class="custom-control-label" for="free_shipping"></label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
              </div>

              <div class="col-12">
                  <div class="checkout_pagination mt-3 d-flex justify-content-end clearfix">
                      <a href="#" id="back_to2" class="btn btn-primary mt-2 ml-2">Go Back</a>
                      <a href="#" id="continue3" class="btn btn-primary mt-2 ml-2">Continue</a>
                  </div>
              </div>
          </div>
          <div class="row" style="display: none;" id="payment_child">
            <div class="col-12">
              <div class="checkout_details_area clearfix">
                <h5 class="mb-4">Shipping Method</h5>

                <div class="shipping_method">
                  <div class="table-responsive">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th scope="col">Payment Method</th>
                          <th scope="col">Rules</th>
                          <th scope="col">Choose</th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <th scope="row">
                           <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_two" aria-expanded="false" aria-controls="collapse_two">
                            <span>bKash Payment</span>
                            <img src="<?php echo base_url() ?>/public/assets/img/payment-method/bkash.png" alt="bkash payment" height="50px" >
                          </a>
                          </th>
                            <td>
                              <h2 style="font-size: 22px">Your payable Amount: <strong>500tk</strong></h2>
                              <div aria-expanded="false" id="collapse_two" class="panel-collapse collapse" role="tabpanel" aria-labelledby="two">
                                      <div class="panel-body">
                                            <h3 style="font-size: 22px">How to pay:</h3>
                                            <ul class="pay_rules">
                                              <li><span style="color:green">*</span>&nbsp; "Confirm Order" এ ক্লিক করুন।</li>

                                              <li> <span style="color:green">*</span>&nbsp; আপনি ৩-৫ কার্যদিবসের মধ্যে (ঢাকা এরিয়াতে) পার্সেল পাবেন।</li>


                                              <li> <span style="color:green">*</span>&nbsp; পার্সেল পাওয়ার পর, ডেলিভারি ম্যানকে আপনার পার্সেল এর মূল্য প্রদান করুন।</li>
                                            </ul>
                                      </div>
                                  </div>
                            </td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="rocket" name="payment_method" id="bkash">
                              <label class="custom-control-label" for="bkash"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_three" aria-expanded="false" aria-controls="collapse_three">
                             <span>Rocket Payment</span><img src="<?php echo base_url() ?>/public/assets/img/payment-method/rocket.png" alt="bkash payment" height="50px" >
                           </a>
                          </th>
                          <td>
                           <h2 style="font-size: 22px">Your payable Amount: <strong>500tk</strong></h2>
                           <div aria-expanded="false" id="collapse_three" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="three">
                            <div class="panel-body">
                             <h3 style="font-size: 22px">How to pay:</h3>
                             <ul class="pay_rules">
                              <li><span style="color:green">*</span>&nbsp; "Confirm Order" এ ক্লিক করুন।</li>

                              <li> <span style="color:green">*</span>&nbsp; আপনি ৩-৫ কার্যদিবসের মধ্যে (ঢাকা এরিয়াতে) পার্সেল পাবেন।</li>


                              <li> <span style="color:green">*</span>&nbsp; পার্সেল পাওয়ার পর, ডেলিভারি ম্যানকে আপনার পার্সেল এর মূল্য প্রদান করুন।</li>
                            </ul>
                          </div>
                        </div>
                      </td>
                          <td>
                            <div class="custom-control custom-radio">
                              <input type="radio" class="custom-control-input" value="rocket" name="payment_method" id="rocket">
                              <label class="custom-control-label" for="rocket"></label>
                            </div>
                          </td>
                        </tr>
                        <tr>
                          <th scope="row">
                            <a class="collapsed" role="button" data-toggle="collapse" data-parent="#accordion" href="#collapse_four" aria-expanded="false" aria-controls="collapse_four">
                              <span>Cash On Delivery</span>
                              <img src="<?php echo base_url() ?>/public/assets/img/payment-method/cod.png" alt="cash on delivery" height="50px" >
                            </a>
                          </th>
                          <td>
                           <h2 style="font-size: 22px">Your payable Amount: <strong>500tk</strong></h2>
                           <div aria-expanded="false" id="collapse_four" class="panel-collapse collapse in" role="tabpanel" aria-labelledby="three">
                            <div class="panel-body">
                             <h3 style="font-size: 22px">How to pay:</h3>
                             <ul class="pay_rules">
                              <li><span style="color:green">*</span>&nbsp; "Confirm Order" এ ক্লিক করুন।</li>
                              <li> <span style="color:green">*</span>&nbsp; আপনি ৩-৫ কার্যদিবসের মধ্যে (ঢাকা এরিয়াতে) পার্সেল পাবেন।</li>
                              <li> <span style="color:green">*</span>&nbsp; পার্সেল পাওয়ার পর, ডেলিভারি ম্যানকে আপনার পার্সেল এর মূল্য প্রদান করুন।</li>
                            </ul>
                          </div>
                        </div>
                          </td>
                          <td>
                            <div class="custom-control custom-radio">
                               <input type="radio" class="custom-control-input" value="cod" name="payment_method" id="cod">
                              <label class="custom-control-label" for="cod"></label>
                            </div>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
                </div>
                </div>
              </div>

              <div class="col-12">
                <div class="checkout_pagination d-flex justify-content-end mt-30">
                  <a href="#" id="back_to3" class="btn btn-primary mt-2 ml-2">Go Back</a>
                  <a href="#" id="continue4" class="btn btn-primary mt-2 ml-2">Final Step</a>
                </div>
              </div>

          </div>
           <div class="row" style="display: none;" id="order_review_child">
              <div class="col-12">
                  <div class="checkout_details_area clearfix">
                      <h5 class="mb-30">Review Your Order</h5>

                      <div class="cart-table">
                          <div class="table-responsive">
                              <table class="table table-bordered mb-30">
                                  <thead>
                                      <tr>
                                          <th scope="col">Image</th>
                                          <th scope="col">Product</th>
                                          <th scope="col">Unit Price</th>
                                          <th scope="col">Quantity</th>
                                          <th scope="col">Total</th>
                                      </tr>
                                  </thead>
                                  <tbody>
                                    <?php 
                                      $sub_total = 0;
                                    foreach ($this->cart->contents() as $key => $items) { ?>
                                      <tr>
                                        <td>
                                          <img src="<?php echo base_url().$items['image']; ?>" alt="Product">
                                        </td>
                                        <td>
                                          <a href="#"><?php echo $items['name']; ?></a>
                                        </td>
                                        <td>$<?php echo $items['price']; ?></td>
                                        <td>
                                          <div class="quantity">
                                            <input type="number" class="qty-text" id="qty<?php echo $key; ?>" step="1" min="1" max="99" name="quantity" value="1">
                                          </div>
                                        </td>
                                        <td>$<?php echo ($items['price']*$items['qty']); ?></td>
                                      </tr>
                                      
                                    <?php  $sub_total = $sub_total+$items['price']; } ?>
                                  </tbody>
                              </table>
                          </div>
                      </div>
                  </div>
              </div>

              <div class="col-12 col-lg-7 ml-auto">
                  <div class="cart-total-area">
                      <h5 class="mb-3">Cart Totals</h5>
                      <div class="table-responsive">
                          <table class="table mb-0">
                              <tbody>
                                 
                                  <tr>
                                      <td>Sub Total</td>
                                      <td>$<?php echo $sub_total; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Shipping</td>
                                      <td>$<?php echo $ship = 10; ?></td>
                                  </tr>
                                  <tr>
                                      <td>VAT (10%)</td>
                                      <td>$<?php echo $vat = 10; ?></td>
                                  </tr>
                                  <tr>
                                      <td>Total</td>
                                      <td>$<?php echo ($sub_total+$ship+$vat); ?></td>
                                  </tr>
                              </tbody>
                          </table>
                      </div>
                      <div class="checkout_pagination d-flex justify-content-end mt-3">
                          <a href="#" id="back_to4" class="btn btn-primary mt-2 ml-2 d-none d-sm-inline-block">Go Back</a>
                          <button type="submit" class="btn btn-primary mt-2 ml-2">Confirm</button>
                      </div>
                  </div>
              </div>
          </div>
      </div>
    </form>
    </div>

    <script type="text/javascript" src="<?php echo base_url() ?>public/assets/js/country.js"></script> 
    <script>
      populateCountries("country", "state");
      populateCountries("customer_country", "customer_state");
    </script>