<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!-- page content -->

<script src="<?php echo base_url(); ?>public/admin_theme/js/ajax-form.js"></script>
<script src="<?php echo base_url() ?>public/admin_theme/js/plugins/toastr/toastr.min.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">

  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>USERS</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">users</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>create</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <!-- <a href="<?php echo base_url(); ?>category" class="btn btn-primary">Manage Category</a> -->
      </div>
    </div>
  </div>

  <div class="clearfix"></div>
  <div class="ibox ">
    <div class="ibox-title">
      <i class="fa fa-user"></i> <?php echo empty($users->id) ? 'Add a New User' : 'Edit User ' . $users->username; ?>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-wrench"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="#" class="dropdown-item">Config option 1</a>
          </li>
          <li><a href="#" class="dropdown-item">Config option 2</a>
          </li>
        </ul>
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <div class="ibox-content">
      <div class="row">
        <div class="col-md-3"><a href="<?php echo base_url(); ?>users" class="btn btn-primary">Manage Users</a></div>
        <div class="col-md-6">
          <?php if(validation_errors()){?>
            <div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?php echo validation_errors(); ?> 
            </div>
          <?php } ?>
          <?php if($this->session->flashdata('msg')){?>
            <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?php echo $this->session->flashdata('msg')?> 
            </div>
          <?php } ?>
        </div>
        <div class="col-md-3"></div>
      </div>
      <div class="row">
        <div class="col-md-3"></div>
        <div class="col-md-6">

          <form id="user_create" method="post" class="form-horizontal form-label-left">
            <div class="form-group">
              <label class="control-label" for="users_role">User Role <span class="required">*</span>
              </label>
              <div >
                <select class="form-control" id="role_id" name="role_id">
                  <option value="1">ADMIN</option>
                  <option value="2">MANAGER</option>
                  <option value="3">SALES</option>
                </select>

              </div>
            </div>
            <!-- Name -->
            <div class="form-group">
              <label>Full Name</label> 
              <span style="display: none;color: red;" id="sms">sdsdsd</span>
              <?php echo form_input(['name' =>'name','id' =>'name','class'=>'form-control', 'placeholder'=> 'Enter Full Name' ,'type'=>'text','value'=>'']); ?>
              <div class="form-error text-danger"></div>
            </div>
            <!-- Contact No -->
            <div class="form-group">
              <label>Phone</label>
              <?php echo form_input(['name' =>'phone','id' =>'phone','class'=>'form-control', 'placeholder'=> 'Enter phone' ,'type'=>'text','value'=>'']); ?>
              <div class="form-error text-danger"></div>
            </div>
            <!-- Address -->
            <div class="form-group">
              <label>Address</label>
              <?php echo form_input(['name' =>'address','id' =>'address','class'=>'form-control', 'placeholder'=> 'Enter address' ,'type'=>'text','value'=>'']); ?>
              <div class="form-error text-danger"></div>
            </div>


            <!-- Email -->
            <div class="form-group">
              <label>Email</label>
              <?php echo form_input(['name' =>'email','type'=>'email','id' =>'email','class'=>'form-control', 'placeholder'=> 'Enter email' ,'type'=>'text','value'=>'']); ?>
              <div class="form-error text-danger"></div>
            </div>

            <!-- Password -->
            <div class="form-group">
              <label>Password</label>
              <?php echo form_input(['name' =>'password','type'=>'password','id' =>'password','class'=>'form-control', 'placeholder'=> 'Enter password' ,'type'=>'text','value'=>'']); ?>
              <div class="form-error text-danger"></div>
            </div>

            <div class="form-group">
              <label>Confirm Password</label>
              <?php echo form_input(['name' =>'confirm-password','type'=>'password','id' =>'confirm-password','class'=>'form-control', 'placeholder'=> 'Enter password' ,'type'=>'text','value'=>'']); ?>
              <div class="form-error text-danger"></div>
            </div>
            <!-- Picture -->
            <div class="form-group">
              <label>Select User File</label> 
              <div class="fallback">
                <input name="picture" type="file" id="picture" multiple />
              </div>
            </div>


            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <a href="<?php echo site_url('users/manage'); ?>">
                  <button class="btn btn-primary" type="button" ><i class="fa fa-minus-square"></i>&nbsp; Cancel </button>
                </a>
                <button type="submit"  class="btn btn-primary" class="btn btn-success" id="submit">Save</button>
                <?php //echo form_submit('submit', 'Save', 'class="btn btn-success"'); ?>
              </div>
            </div>

          </form>
          <br><br>
        </div>
        <div class="col-md-3"></div>
      </div>




    </div>
  </div>
</div>
<script src="<?php echo base_url() ?>public/admin_theme/js/user_validate.js"></script>
<script>
  $(document).ready(function(){


    user_form = $("#user_create");
    $(document).on("click","#submit",function(){

      if(Valid(user_form)!=false){
      // alert("yes");
      user_form.ajaxForm({
        url: '<?php echo base_url('users/store'); ?>',
        success: function(data) {
          if(data.status == 200){
            user_form.animate({
              scrollTop : 0                       
            }, 500);
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.success('Success');
            user_form[0].reset();
            loadUserData();
          }else if(data.status == 300){
           toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.error('username exist');
        }else if(data.status == 400){
         toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.error('email exist');
      }else if(data.status == 600){
       toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 4000
      };
      toastr.error('Problem in uploading image');
    } 
  }
});
    }
  });

  });
</script>

<!-- /page content -->