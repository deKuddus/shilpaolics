<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title><?php echo $meta_title; ?></title>

    <!-- Bootstrap -->
    
  </head>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <!-- Subview -->
        <?php
            //$this->load->view($subview); // Sub view is set in controller

            if (!isset($view_file)) {
                $view_file = '';
            }
            if (!isset($view_module)) {
                $view_module = $this->uri->segment(1);
            }

            if ( ($view_file != '') && ($view_module != '') ) {
                $path = $view_module.'/'.$view_file;
                $this->load->view($path);
            }
        ?>
        <!-- /Subview -->
      </div>
    </div>
  </body>
</html>