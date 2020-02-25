<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>


<!-- Main Container -->
<section class="main-container col1-layout">
  <div class="main container">
    <div class="col-main">
     <div class="box-border">
      <div class="row">
        <div class="col-md-7 form-style">
          <form id="customer_registration_form" method="post">
          <h4 class="form-title">Not Registerd ? Register yourself by using below form</h4>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="username" class="required">User Name</label>
                <input type="text" class="input form-control"  name="username" id="username" value="">

              <div class="form-error text-danger"></div>
               <p id="username_availability"></p>
              </div>
            </div>

            <div class="col-sm-6">
              <div class="form-group">
                <label for="name" class="required">Full Name</label>
                <input type="text" class="input form-control" name="name" id="name" value="">
                 <div class="form-error text-danger"></div>
              </div>
            </div>

          </div>
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="email" class="required">Email Address</label>
                <input type="text" class="input form-control" name="email" id="email" value="">
                 <div class="form-error text-danger"></div>
                  <p id="email_availability"></p>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="contact" class="required">Mobile</label>
                <input class="input form-control" type="text" name="contact" id="contact" value="">
               <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for="city" class="required">City</label>
                <input class="input form-control" type="text" name="city" id="city">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group">
                <label for="zip_code" class="required">Zip/Postal Code</label>
                <input class="input form-control" type="text" name="zip_code" id="zip_code">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
               <label class="required">Country</label>
               <select class="input form-control" name="country" id="country_in_register_page"></select>
             </div>
           </div>
           <div  class="col-sm-6">
            <div class="form-group">
              <label class="required">State/Province</label>
              <select class="input form-control" name="state" id="state_in_register_page"></select>
               <div class="form-error text-danger"></div>
            </div>
          </div>
        </div> 
        <div class="row">
          <div class="col-sm-6">
            <div class="form-group">
              <label for="postal_code" class="required">Password</label>
                <input class="input form-control" type="password" name="password" id="password">
                 <div class="form-error text-danger"></div>
           </div>
         </div>
         <div  class="col-sm-6">
          <div class="form-group">
            <label for="postal_code" class="required">Confirm Password</label>
                <input class="input form-control" type="password" name="confirm_password" id="confirm_password">
                 <div class="form-error text-danger"></div>
          </div>
        </div>
      </div> 
        <div class="row">
          <div class="col-sm-12">
            <div class="form-group">
              <label for="address" class="required">Address</label>
              <input type="text" class="input form-control" name="address" id="address">
               <div class="form-error text-danger"></div>
            </div>
          </div>
        </div>
        <button class="button pull-right" type="submit"  style="margin: 5px;">
          <i class="icon-login"></i>&nbsp; <span>Register</span>
        </button>
      </form>
      </div>
        <div class="col-md-4 form-style">
          <form id="customer_login_form" method="post">
            <h4 class="form-title">Already Registered?? Login please.</h4><br>
            <div class="form-group">
              <label for="user_name" class="required">User Name/Mobile/Email</label>
              <input type="text" class="input form-control" name="login_id" id="login_id">
              <div class="form-error text-danger"></div>
            </div>

            <div class="form-group">
              <label for="user_name" class="required">Password</label>
              <input type="password" class="input form-control" name="login_password" id="login_password">
              <div class="form-error text-danger"></div>
            </div>
            <button class="button pull-right" type="submit"  style="margin: 5px;">
              <i class="icon-login"></i>&nbsp; <span>Login</span>
            </button>
          </form>
        </div>
        
    </div>
  </div>
</div>
</div>
</section>
<!-- Main Container End --> 



 <script type="text/javascript" src="<?php echo base_url() ?>public/assets/js/country.js"></script> 
 <script>
  populateCountries("country_in_register_page", "state_in_register_page");
</script>