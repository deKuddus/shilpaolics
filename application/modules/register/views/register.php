<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>



    <!-- Breadcumb Area -->
    <div class="breadcumb_area">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <h5>Login &amp; Register</h5>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url('home') ?>">Home</a></li>
                        <li class="breadcrumb-item active">Login &amp; Register</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcumb Area -->

    <!-- Login Area -->
    <div class="bigshop_reg_log_area section_padding_100_50">
        <div class="container">
            <div class="row">
                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Already Registered?? Login please.</h5>

                         <form id="customer_login_form" method="post">
                            <div class="form-group">
                                <input type="text" class="form-control" name="login_id" id="login_id" placeholder="Email or Phone or Username">
                                <div class="form-error text-danger"></div>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" id="login_password" placeholder="Password" name="login_password">
                                <div class="form-error text-danger"></div>
                            </div>
                            <div class="form-check">
                                <div class="custom-control custom-checkbox mb-3 pl-1">
                                    <input type="checkbox" class="custom-control-input" id="customChe">
                                    <label class="custom-control-label" for="customChe">Remember me for this computer</label>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Login</button>
                        </form>
                        <!-- Forget Password -->
                        <div class="forget_pass mt-15">
                            <a href="#">Forget Password?</a>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-md-6">
                    <div class="login_form mb-50">
                        <h5 class="mb-3">Not Registerd ? Register yourself by using below form</h5>
                        <form id="customer_registration_form" method="post">
                                <div class="form-group">
                                    <label for="username">First Name</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="username" value="">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <label for="name">Full Name</label>
                                    <input type="text" class="form-control" name="name" id="name" placeholder="Full Name" value="">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <label for="email">Email Address</label>
                                    <input type="email" class="form-control" id="email" name="email" placeholder="Email Address" value="">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <label for="contact">Phone Number</label>
                                    <input type="number" name="contact" class="form-control" id="contact" min="11" value="">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <label for="city">City</label>
                                    <input type="text" name="city" class="form-control" id="city" placeholder="City" value="">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <label for="zip_code">Zip Code</label>
                                    <input type="number" name="zip_code" class="form-control" id="zip_code"  value="" placeholder="zip code">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="number" name="password" class="form-control" id="password"  value="" placeholder="password">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                    <label for="confirm_password">Confirm Password</label>
                                    <input type="number" name="confirm_password" class="form-control" id="confirm_password"  value="" placeholder="Repeat password">
                                    <div class="form-error text-danger"></div>
                                </div>
                                <div class="form-group">
                                  <label for="country_in_register_page">Country</label>
                                  <select class="custom-select d-block w-100 form-control" id="country_in_register_page" name="country"></select>
                                </div>
                                <div class="form-group">
                                  <label for="state_in_register_page">Country</label>
                                  <select class=" custom-select d-block w-100 form-control " id="state_in_register_page" name="state"  ></select>
                                </div>
                                <div class="form-group">
                                    <label for="address">Apartment/Suite/Unit</label>
                                    <input type="text" class="form-control" id="address" placeholder="address" name="address" value="">
                                    <div class="form-error text-danger"></div>
                                </div>
                            <button type="submit" class="btn btn-primary btn-sm">Register</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Login Area End -->

 <script type="text/javascript" src="<?php echo base_url() ?>public/assets/js/country.js"></script> 
 <script>
  populateCountries("country_in_register_page", "state_in_register_page");
</script>
