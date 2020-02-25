<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<style>
.dataTables_filter {
    text-align: right;
    float: right;
    margin-right: 7px;
}
.dt-buttons {
    float: right;
}
.pagination li.disabled > a, .pagination li.disabled > span {
    color: #000;
}
</style>
   <!-- Breadcrumbs -->
  
  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="<?php echo base_url('/home'); ?>">Home</a><span>&raquo;</span></li>
            <li><strong>my account</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
<!-- Main Container -->
<section class="main-container col1-layout">
    <div class="main container">
      <div class="col-main">
       <div class="row">
       	<div class="col-md-3">
       		<form id="user_file">
       		<div class="containers">
       		<img class="profile_image" id="profile_image"  src="<?php echo base_url().$customer_data->images ?>" alt="">
       		
       		<span>
       			<label for="file"><i class="fa fa-camera"></i></label>
       		</span>
       		  <input type="file" id="file" name="user_image" accept="image/*">
       		</div>
       	</from>
       	</div>
       	<div class="col-md-6">
       		<div class="table-responsive">
       			<table class="table table-bordered cart_summary">
       				<tr>
       					<td>Username</td>
       					<td>:</td>
       					<td><?php echo $customer_data->username; ?></td>
       					<td><button class="btn-success">edit</button></td>
       				</tr>
       				<tr>
       					<td>Full Name</td>
       					<td>:</td>
       					<td><?php echo $customer_data->name; ?></td>
       				</tr>
       				<tr>
       					<td>Email</td>
       					<td>:</td>
       					<td><?php echo $customer_data->email; ?></td>
       				</tr>
       				<tr>
       					<td>Phone</td>
       					<td>:</td>
       					<td><?php echo $customer_data->contact; ?></td>
       				</tr>
       				<tr>
       					<td>city</td>
       					<td>:</td>
       					<td><?php echo $customer_data->city; ?></td>
       				</tr>
       				<tr>
       					<td>Zip</td>
       					<td>:</td>
       					<td><?php echo $customer_data->zip_code; ?></td>
       				</tr>
       				<tr>
       					<td>State</td>
       					<td>:</td>
       					<td><?php echo $customer_data->state; ?></td>
       				</tr>
       				<tr>
       					<td>Country</td>
       					<td>:</td>
       					<td><?php echo $customer_data->country; ?></td>
       				</tr>
       				<tr>
       					<td>Address</td>
       					<td>:</td>
       					<td><?php echo $customer_data->address; ?></td>
       				</tr>

       			</table>
       		</div>
       	</div>
       	<div class="col-md-3">
                      <aside class="right sidebar">
          <div class="sidebar-account block">
            <div class="sidebar-bar-title">
              <h3>My Account</h3>
            </div>
            <div class="block-content">
              <ul>
                <li><a>Account Dashboard</a></li>
                <li><a href="#">Account Information</a></li>
                <li><a href="#order">My Orders</a></li>
                <li><a href="#">My Product Reviews</a></li>
                <li class="current"><a href="#">My Wishlist</a></li>
                <!-- <li><a href="#">Billing Agreements</a></li>
                <li><a href="#">Address Book</a></li>
                <li><a href="#">Recurring Profiles</a></li>
                <li><a href="#">My Tags</a></li>
                <li><a href="#">My Downloadable</a></li>
               <li class="last"><a href="#">Newsletter Subscriptions</a></li> -->
              </ul>
            </div>
          </div>
        </aside>    
            </div>
       </div>
      </div>
    </div>
  </section>
    <section class="main-container col2-right-layout" id="order">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Orders List</h2>
            </div>
            <div class="orders-list table-responsive"> 
              <!--orders list table-->
              <table id="all_orders" class="table table-striped table-bordered table-hover" >
                <thead>
                  <tr> 
                    <th>Order Number</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Status</th>
                    <th>Total</th>
                  </tr>
                </thead>
                <tbody>

                </tbody>
                <tfoot>
                  <tr> 
                    <th>Order Number</th>
                    <th>Order Date</th>
                    <th>Order Status</th>
                    <th>Payment Status</th>
                    <th>Total</th>
                  </tr>
                </tfoot>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>
  </section>
<!-- Main Container End --> 


