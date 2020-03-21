<?php
    defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title  -->
    <title><?php echo $page_title; ?></title>

    <!-- Favicon  -->
    <link rel="icon" href="<?php echo base_url() ?>public/assets/img/core-img/favicon.ico">

    <!-- Style CSS -->
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/style.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/toastr/toastr.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/sweet-alert.min.css">
    <link rel="stylesheet" href="<?php echo base_url() ?>public/assets/css/dataTables/datatables.min.css">
    <script>
        var base_url = '<?php echo base_url(); ?>';
        var shiping_charge = '<?php echo config('shipping_charge'); ?>';
        var is_loggedin = '<?php echo $this->session->userdata('logged_in'); ?>';
        var cart = '<?php echo sizeof($this->cart->contents()); ?>';
        var image_url = '<?php echo FILE_UPLOAD_PATH; ?>';
    </script>
</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="spinner-grow" role="status">
            <span class="sr-only">Loading...</span>
        </div>
    </div>

    <!-- Header Area -->
    <header class="header_area">
        <!-- Top Header Area -->
        <div class="top-header-area">
            <div class="container h-100">
                <div class="row h-100 align-items-center">
                    <div class="col-6">
                        <div class="welcome-note">
                            <span class="popover--text" data-toggle="popover" data-content="Welcome to Bigshop ecommerce template."><i class="icofont-info-square"></i></span>
                            <span class="text">Welcome to Bigshop ecommerce template.</span>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="language-currency-dropdown d-flex align-items-center justify-content-end">
                            <!-- Language Dropdown -->
                            <div class="language-dropdown">
                                <div class="dropdown">
                                    <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu1" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        English
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu1">
                                        <a class="dropdown-item" href="#">Bangla</a>
                                        <a class="dropdown-item" href="#">Arabic</a>
                                    </div>
                                </div>
                            </div>
                            <?php if($this->session->userdata('logged_in') != TRUE){ ?>
                                <!-- Currency Dropdown -->
                                <div class="currency-dropdown">
                                    <div class="dropdown">
                                        <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            Register
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <a class="dropdown-item" href="<?php echo base_url('register'); ?>">Register</a>
                                            <a class="dropdown-item" href="<?php echo base_url('register'); ?>">Login</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                            <?php if($this->session->userdata('logged_in') == TRUE ){ ?>
                                <div class="currency-dropdown">
                                    <div class="dropdown">
                                        <a class="btn btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenu2" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            User
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenu2">
                                            <a class="dropdown-item" href="<?php echo base_url('customer'); ?>">My Profile</a>
                                            <a class="dropdown-item" href="<?php echo base_url('wishlist'); ?>">My wishlist</a>
                                            <a class="dropdown-item" href="<?php echo base_url('compare'); ?>">My compare</a>
                                            <a class="dropdown-item" href="<?php echo base_url('customer/order'); ?>">My Order</a>
                                            <a class="dropdown-item" href="<?php echo base_url('login/logout'); ?>">Logout</a>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Menu -->
        <div class="bigshop-main-menu" id="sticker">
            <div class="container">
                <div class="classy-nav-container breakpoint-off">
                    <nav class="classy-navbar" id="bigshopNav">

                        <!-- Nav Brand -->
                        <a href="<?php echo base_url('home') ?>" class="nav-brand"><img src="<?php echo base_url() ?>public/assets/img/core-img/logo.png" alt="logo"></a>

                        <!-- Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Close -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>

                            <!-- Nav -->
                            <div class="classynav">
                                <ul>
                                    <li><a href="<?php echo base_url('home'); ?>">Home</a></li>
                                    <li><a href="#">Category</a>
                                        <ul class="dropdown">
                                            <li><a href="#">Shop Grid</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop-grid-left-sidebar.html">Shop Grid Left Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Shop List</a>
                                                <ul class="dropdown">
                                                    <li><a href="shop-list-left-sidebar.html">Shop List Left Sidebar</a></li>
                                                    <li><a href="shop-list-right-sidebar.html">Shop List Right Sidebar</a></li>
                                                    <li><a href="shop-list-top-sidebar.html">Shop List Top Sidebar</a></li>
                                                    <li><a href="shop-list-no-sidebar.html">Shop List No Sidebar</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="product-details.html">Single Product</a></li>
                                            <li><a href="<?php echo base_url('cart.html'); ?>">Cart</a></li>
                                            <li><a href="#">Checkout</a>
                                                <ul class="dropdown">
                                                    <li><a href="checkout-1.html">Login</a></li>
                                                    <li><a href="checkout-2.html">Billing</a></li>
                                                    <li><a href="checkout-3.html">Shipping Method</a></li>
                                                    <li><a href="checkout-4.html">Payment Method</a></li>
                                                    <li><a href="checkout-5.html">Review</a></li>
                                                    <li><a href="checkout-complate.html">Complate</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="#">Account Page</a>
                                                <ul class="dropdown">
                                                    <li><a href="my-account.html">- Dashboard</a></li>
                                                    <li><a href="order-list.html">- Orders</a></li>
                                                    <li><a href="downloads.html">- Downloads</a></li>
                                                    <li><a href="addresses.html">- Addresses</a></li>
                                                    <li><a href="account-details.html">- Account Details</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="wishlist.html">Wishlist</a></li>
                                            <li><a href="compare.html">Compare</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="<?php echo base_url('products/newarraival'); ?>">New Arraivals</a></li>
                                    <li><a href="#">Pages</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="about-us.html">- About Us</a></li>
                                                <li><a href="faq.html">- FAQ</a></li>
                                                <li><a href="contact.html">- Contact</a></li>
                                                <li><a href="login.html">- Login &amp; Register</a></li>
                                                <li><a href="404.html">- 404</a></li>
                                                <li><a href="500.html">- 500</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="my-account.html">- Dashboard</a></li>
                                                <li><a href="order-list.html">- Orders</a></li>
                                                <li><a href="downloads.html">- Downloads</a></li>
                                                <li><a href="addresses.html">- Addresses</a></li>
                                                <li><a href="account-details.html">- Account Details</a></li>
                                                <li><a href="coming-soon.html">- Coming Soon</a></li>
                                            </ul>
                                            <div class="single-mega cn-col-2">
                                                <div class="megamenu-slides owl-carousel">
                                                    <a href="shop-grid-left-sidebar.html">
                                                        <img src="<?php echo base_url() ?>public/assets/img/bg-img/mega-slide-2.jpg" alt="">
                                                    </a>
                                                    <a href="shop-list-left-sidebar.html">
                                                        <img src="<?php echo base_url() ?>public/assets/img/bg-img/mega-slide-1.jpg" alt="">
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="<?php echo base_url('blog'); ?>">Blog</a>
                                    <li><a href="<?php echo base_url('products'); ?>">product</a>
                                    </li>
                                    <li><a href="#">Elements</a>
                                        <div class="megamenu">
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="accordian.html">- Accordions</a></li>
                                                <li><a href="alerts.html">- Alerts</a></li>
                                                <li><a href="badges.html">- Badges</a></li>
                                                <li><a href="blockquotes.html">- Blockquotes</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="breadcrumb.html">- Breadcrumbs</a></li>
                                                <li><a href="buttons.html">- Buttons</a></li>
                                                <li><a href="forms.html">- Forms</a></li>
                                                <li><a href="gallery.html">- Gallery</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="heading.html">- Headings</a></li>
                                                <li><a href="icon-fontawesome.html">- Icon FontAwesome</a></li>
                                                <li><a href="icon-icofont.html">- Icon Ico Font</a></li>
                                                <li><a href="labels.html">- Labels</a></li>
                                            </ul>
                                            <ul class="single-mega cn-col-4">
                                                <li><a href="modals.html">- Modals</a></li>
                                                <li><a href="pagination.html">- Pagination</a></li>
                                                <li><a href="progress-bars.html">- Progress Bars</a></li>
                                                <li><a href="tables.html">- Tables</a></li>
                                            </ul>
                                        </div>
                                    </li>
                                    <li><a href="<?php echo base_url('cart.html'); ?>">Cart</a></li>
                                    <li><a href="<?php echo base_url('checkout.html'); ?>">Checkout</a></li>
                                    <li><a href="contact.html">Contact</a></li>
                                </ul>
                            </div>
                        </div>

                        <!-- Hero Meta -->
                        <div class="hero_meta_area ml-auto d-flex align-items-center justify-content-end">
                            <!-- Search -->
                            <div class="search-area">
                                <div class="search-btn"><i class="icofont-search"></i></div>
                                <!-- Form -->
                                <div class="search-form">
                                    <input type="search" class="form-control" placeholder="Search">
                                    <input type="submit" class="d-none" value="Send">
                                </div>
                            </div>
                            <?php if($this->session->userdata('username') != NULL){ ?>
                                <!-- Wishlist -->
                                <div class="wishlist-area">
                                    <a href="<?php echo base_url('wishlist'); ?>" class="wishlist-btn"><i class="icofont-heart"></i></a>
                                </div>
                            <?php } ?>
                            <!-- Cart -->
                            <div class="cart-area">
                                <div class="cart--btn">
                                    <a href="<?php echo base_url('cart'); ?>">
                                        <i class="icofont-cart"></i> <span class="cart_quantity"></span>
                                    </a>
                                </div>

                                <!-- Cart Dropdown Content -->
                                <div class="cart-dropdown-content">

                                </div>
                            </div>
                            <?php if($this->session->userdata('username') != NULL){ ?>
                                <!-- Account -->
                                <div class="account-area">
                                    <div class="user-thumbnail">
                                        <img src="<?php echo base_url().$this->session->userdata('image'); ?>" alt="">
                                    </div>
                                    <ul class="user-meta-dropdown">
                                        <li class="user-title"><span>Hello,</span> <?php echo $this->session->userdata('username') ?></li>
                                        <li><a href="<?php echo base_url('customer'); ?>">My Account</a></li>
                                        <li><a href="<?php echo base_url('customer/order'); ?>">My Orders</a></li>
                                        <li><a href="<?php echo base_url('wishlist'); ?>">My wishlist</a></li>
                                        <li><a href="<?php echo base_url('compare'); ?>">My compare</a></li>
                                        <li><a href="<?php echo base_url('login/logout') ?>"><i class="icofont-logout"></i> Logout</a></li>
                                    </ul>
                                </div>
                            <?php } ?>
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->
