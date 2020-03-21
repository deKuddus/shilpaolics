<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['/'] = 'Home/index';
$route['default_controller'] = 'Home';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['users/edit:id'] = 'users/edit';
$route['product/edit:id'] = 'product/edit';
$route['login'] = 'users/login';
$route['logout'] = 'users/logout';

//product custom route for front end
$route['products/details/:id'] ='product/details';
$route['product/edit/:id'] ='product/edit';
//cart custom routes
$route['cart/remove/:id'] ='cart/remove';
//wishlist cutom routes
$route['wishlist/remove/:id'] ='wishlist/remove';
//customer order custom route
$route['customer/order_details/:id'] ='customer/order_details';

//blog custom routes
$route['blog/view/:id'] ='blog/view';
$route['blog/blog_in_cat/:id'] ='blog/blog_in_cat';

//category custom routes
$route['category/edit/:id'] ='category/edit';


//order print
$route['order/mak/:id'] ='admin/order/print_order';
