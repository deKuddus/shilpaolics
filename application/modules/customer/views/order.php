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
.buttons-html5,.buttons-print{
  border:1px solid #007bff;
}
</style>

<!-- Breadcumb Area -->
<div class="breadcumb_area">
  <div class="container h-100">
    <div class="row h-100 align-items-center">
      <div class="col-12">
        <h5>My Order</h5>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="<?php echo base_url('home'); ?>">Home</a></li>
          <li class="breadcrumb-item active">order</li>
        </ol>
      </div>
    </div>
  </div>
</div>
<!-- Breadcumb Area -->

<!-- Main Container -->

<!-- pending order -->
  <section class="main-container col2-right-layout" id="order">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Pending Orders List</h2>
              <hr>
            </div>
            <div class="orders-list table-responsive"> 
              <!--orders list table-->
              <table id="pending_orders" class="table table-striped table-bordered table-hover" >
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
  <hr>
<!-- on delivery order -->
  <section class="main-container col2-right-layout" id="order">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Ongoing Orders List</h2>
              <hr>
            </div>
            <div class="orders-list table-responsive"> 
              <!--orders list table-->
              <table id="ondelivery_orders" class="table table-striped table-bordered table-hover" >
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
  <hr>
  <!-- successfull orderlist -->
  <section class="main-container col2-right-layout" id="order">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Successfull Orders List</h2>
              <hr>
            </div>
            <div class="orders-list table-responsive"> 
              <table id="delivered_orders" class="table table-striped table-bordered table-hover" >
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


