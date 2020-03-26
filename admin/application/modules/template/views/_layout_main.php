<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<?php $this->load->view('components/page_head');  ?>
<div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">
                <li class="nav-header">
                    <div class="dropdown profile-element">
                        <img alt="image" class="rounded-circle" src="<?php echo base_url(); ?>public/admin_theme/img/profile_small.jpg"/>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="block m-t-xs font-bold">Users Name</span>
                            <span class="text-muted text-xs block">User Role <b class="caret"></b></span>
                        </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a class="dropdown-item" href="#">Profile</a></li>
                            <li><a class="dropdown-item" href="#">Contacts</a></li>
                            <li><a class="dropdown-item" href="#">Mailbox</a></li>
                            <li class="dropdown-divider"></li>
                            <li><a class="dropdown-item" href="<?php echo base_url(); ?>logout">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        IN+
                    </div>
                </li>
                <li>
                    <a href="<?php echo base_url(); ?>dashboard"><i class="fa fa-th-large"></i> <span class="nav-label">Dashboard</span> </a>

                </li>
                <li>
                    <a href="#"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Demo</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url(); ?>demo">Manage</a></li>
                        <li><a href="<?php echo base_url(); ?>demo/create">Create</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Administration</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('users'); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">User</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Product Options</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('product'); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Product</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('brand'); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Brand</span></a>
                        </li>
                        <li>
                            <a href="<?php echo base_url('category'); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Category</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Order </span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('order'); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">Manage</span></a>
                        </li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Stock Options</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="<?php echo base_url('stock'); ?>"><i class="fa fa-bar-chart-o"></i> <span class="nav-label">stock</span></a>
                        </li>
                    </ul>
                </li>
                 <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Customer</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('users/customer'); ?>">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Cupon</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('cupon/manage'); ?>">Manage</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Settings</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('setting/slider'); ?>">Slider</a></li>
                        <li><a href="<?php echo base_url('setting/logo'); ?>">Logo</a></li>
                        <li><a href="<?php echo base_url('terms'); ?>">Terms & Conditions</a></li>
                        <li><a href="<?php echo base_url('privacy'); ?>">Privay & Policy</a></li>
                    </ul>
                </li>
                <li>
                    <a href="#"><i class="fa fa-sitemap"></i> <span class="nav-label">Blog</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li><a href="<?php echo base_url('blogs/manage'); ?>">blog</a></li>
                        <li><a href="<?php echo base_url('blogs/category'); ?>">blog category</a></li>
                    </ul>
                </li>
            </ul>

        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
                <div class="navbar-header">
                    <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                    <form role="search" class="navbar-form-custom" action="search_results.html">
                        <div class="form-group">
                            <input type="text" placeholder="Search for something..." class="form-control" name="top-search" id="top-search">
                        </div>
                    </form>
                </div>
                <ul class="nav navbar-top-links navbar-right">
                    <li>
                        <span class="m-r-sm text-muted welcome-message">Welcome to Shopi24 Admin Panel.</span>
                    <li>
                        <a href="<?php echo base_url(); ?>logout">
                            <i class="fa fa-sign-out"></i> Log out
                        </a>
                    </li>
                </ul>

            </nav>
        </div>


        <!-- page content -->

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

        <!-- /page content -->

        <!-- footer content -->
        <div class="footer">
          <div class="float-right">
            <?php echo config_item('site_footer_content'); ?>
        </div>
        <div>
          <strong>Copyright</strong> Example Company &copy; 2014-2018
      </div>
  </div>
  <!-- /footer content -->
</div>
</div>
<?php $this->load->view('components/page_footer');  ?>
