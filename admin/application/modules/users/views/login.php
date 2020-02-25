<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="<?php echo base_url(); ?>public/admin_theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/admin_theme/font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url(); ?>public/admin_theme/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/admin_theme/css/plugins/toastr/toastr.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/admin_theme/css/plugins/jQueryUI/jquery-ui-1.10.4.custom.min.css" rel="stylesheet">
    <link href="<?php echo base_url(); ?>public/admin_theme/css/style.css" rel="stylesheet">
    

</head>

<body class="gray-bg">

    <h2 class="text-center">Welcome to Shopi24 Admin Panel Login</h2>
    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <!-- <h1 class="logo-name">IN+</h1> -->

            </div>
            <!-- <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
            </p> -->
            <!-- <p>Login in. To see it in action.</p> -->
            <?php //echo validation_errors(); ?>
            <?php if($this->session->flashdata('error')){?>
                <div class="alert alert-danger alert-dismissable">
                    <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
                    <?php echo $this->session->flashdata('msg')?> 
                </div>
            <?php } ?>
            <form id="login" method="post">
                <div class="form-group">
                    <?php echo form_input('email','' ,'class="form-control" placeholder="email" required="1" id="email"'); ?>
                    <div class="form-error text-danger"></div>
                </div>
                <div class="form-group">
                    <?php echo form_password('password','', 'class="form-control" placeholder="Password" required="1" id="password"'); ?>
                    <div class="form-error text-danger"></div>

                </div>
                <?php //echo form_submit('submit', 'Log In', 'class="btn btn-primary block full-width m-b" style="float: right;"'); ?>
                <button type="submit" id="submit" style="float: right;" class="btn btn-primary block full-width m-b">Log In</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="#">Create an account</a>
            </form>
            <!-- <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p> -->
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?php echo base_url(); ?>public/admin_theme/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin_theme/js/ajax-form.js"></script>
    <script src="<?php echo base_url(); ?>public/admin_theme/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>public/admin_theme/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>public/admin_theme/js/plugins/chosen/chosen.jquery.js"></script>
    <script src="<?php echo base_url(); ?>public/admin_theme/js/plugins/toastr/toastr.min.js"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jquery.validate/1.13.1/jquery.validate.min.js"></script>
    <script src="<?php echo base_url() ?>public/admin_theme/js/custom/helper.js"></script>
    <script>
      $(document).ready(function(){
        user_form = $("#login");
        $(document).on("click","#submit",function(){

            if(Valid(user_form)!=false){
      // alert("yes");
      // alert(1);
      user_form.ajaxForm({
          url: '<?php echo base_url('users/login_user'); ?>',
          success: function(data) {
           if(data.status == 400){
             toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
          };
          toastr.error('Username/Password did no match!');
      }
      else if(data.status == 200){
        toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1000
        };
        toastr.success('Logged in');
        // window.location="<?php echo base_url('users/manage'); ?>";
        setTimeout("location.href = '<?php echo base_url('users/manage'); ?>';",1000);
    }
    

}
});
  }
});
        
    });
</script>

</body>

</html>
