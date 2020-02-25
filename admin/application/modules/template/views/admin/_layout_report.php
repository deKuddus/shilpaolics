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

		<title><?php echo $meta_title; ?> | Report</title>

		<style type="text/css">
			.header_placeholder { margin: 0 auto; width: 100%; }
			.header { margin: 0 auto; width: 100%; }

			.logo_section { width: 20%; float: left; }
			.title_section { width: 60%; float: left; text-align: center; }

			.header h3 { font-family: time-new-romans; }
			.header p { font-family: sans-serif; font-size: 10px;}

			.content_placeholder { margin: 0 auto; width: 100%; }
			.main_content { margin: 0 auto; width: 100%; }
			.main_content h5 { font-family: time-new-romans; text-align: center; }

			.main_content table { border-collapse: collapse; width: 100%;}
			.main_content table tr:nth-child(even) { background-color: #f2f2f2 }
			.main_content table, th, td { border: 1px solid #ccc; }
			.main_content th, td { font-family: time-new-romans; font-size: 10px; padding: 6px; text-align: left;}
			
			.footer_placholder { margin: 0 auto; width: 100%;  }
			.footer { margin: 0 auto; width: 100%; text-align: center; }
			.footer p { font-family: sans-serif; font-size: 10px;}
		</style>
	</head>

	<body>
		<div class="page_wraper">
			<header class="header_placeholder">
				<div class="header">
					<div class="logo_section">
						<img src="<?php echo base_url(); ?>public/admin_theme/img/compamy_logo2.png" width="120" height="90" alt="..." >
					</div>
					<div class="title_section">
						<h3><?php echo config_item('site_name'); ?></h3>
						<p><?php echo config_item('site_address'); ?></p>
					</div>
				</div>
			</header>

			<section class="content_placeholder">
				<div class="main_content">
					<?php
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
				</div>
			</section>

			<footer class="footer_placholder">
				<div class="footer">
					<p><?php echo config_item('site_footer_content'); ?></p>
				</div>
			</footer>
		</div>
  	</body>
</html>