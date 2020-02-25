<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
   <!-- Breadcrumbs -->

  <div class="breadcrumbs">
    <div class="container">
      <div class="row">
        <div class="col-xs-12">
          <ul>
            <li class="home"> <a title="Go to Home Page" href="<?php echo base_url('/home'); ?>">Home</a><span>&raquo;</span></li>
            <li><strong>Order Information</strong></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- Breadcrumbs End --> 
  <!-- Main Container -->
  <section class="main-container col2-right-layout">
    <div class="main container">
      <div class="row">
        <div class="col-main col-sm-12 col-xs-12">
          <div class="my-account">
            <div class="page-title">
              <h2>Order Information</h2>
            </div>
            <div class="orders-list table-responsive"> 
              <!--order info tables-->
              <table class="table table-bordered cart_summary table-striped">
                <tr>
                  <td class="order-number">Order Number</td>
                  <td data-title="Order Number">#<?php echo $order->code ?></td>
                </tr>
                <tr>
                  <td class="order-number">Order Date</td>
                  <td data-title="Order Date"><?php echo date('F j, Y ,g:i a', strtotime($order->sales_at)); ?></td>
                </tr>
                <tr>
                  <td class="order-number">Order Status</td>
                  <td data-title="Order Status">
                    <?php 
                    if($order->delivery_status == 1){
                      echo "pending";
                    }else if($order->delivery_status == 2){
                      echo "on delivery";
                    }else if($order->delivery_status == 3){
                      echo "delivired";
                    } 
                    ?>

                  </td>
                </tr>
                <tr>
                  <td class="order-number">Last Updated</td>
                  <td data-title="Last Update">
                    <?php if(isset($order->delivery_a)){
                      echo date('F j, Y ,g:i a', strtotime($order->delivery_at));
                    }else{ echo "checking";} ?>
                      </td>
                </tr>
                <tr>
                  <td class="order-number">Shipment</td>
                  <td data-title="Shipment">
                    <?php 
                    if($order->delivery_status == 1){
                      echo "pending";
                    }else if($order->delivery_status == 2){
                      echo "on delivery";
                    }else if($order->delivery_status == 3){
                      echo "delivired";
                    } 
                    ?>
                  </td>
                </tr>
                <tr>
                  <td class="order-number">Payment</td>
                  <td data-title="Payment">
                    <?php 
                    if($order->payment_status == 1){
                      echo "pending";
                    }else if($order->payment_status == 2){
                      echo "Paid";
                    } 
                    ?>
                  </td>
                </tr>
                <tr>
                  <td class="order-number">Total</td>
                  <td data-title="Total"><p>$<?php echo $order->grand_total; ?></p></td>
                </tr>
              </table>
            </div>
            <div class="row">
              <div class="col-xs-12 col-md-6 col-sm-6">
              <div class="page-title">
              <h2>Bill To</h2>
            </div>
          
                <table class="table table-bordered cart_summary">
                    <?php $billing_data = json_decode($order->guest_details); ?>
                  <tr>
                    <td>E-Mail</td>
                    <td data-title="E-Mail" ><a href="mailto:#" class="color_dark"><?php echo $billing_data->email; ?></a></td>
                  </tr>
                  <tr>
                    <td>Full Name</td>
                    <td data-title="First Name" ><?php echo $billing_data->name; ?></td>
                  </tr>
                  <tr>
                    <td>Address 1</td>
                    <td data-title="Address 1" ><?php echo $billing_data->address; ?></td>
                  </tr>
                  <tr>
                    <td>Zip / Postal Code</td>
                    <td data-title="Zip / Postal Code" ><?php echo $billing_data->zip_code; ?></td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td data-title="City" ><?php echo $billing_data->city; ?></td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td data-title="Country" ><?php echo $billing_data->country; ?></td>
                  </tr>
                  <tr>
                    <td>State/Province/Region</td>
                    <td data-title="State/Region" ><?php echo $billing_data->state; ?></td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td data-title="Phone" ><?php echo $billing_data->contact; ?></td>
                  </tr>
                </table>
              </div>
              <div class="col-xs-12 col-md-6 col-sm-6">
               <div class="page-title">
              <h2>Ship To</h2>
            </div>
         
                <table class="table table-bordered cart_summary">
                <?php $shipping_address = json_decode($order->shipping_address); ?>
                  <tr>
                    <td>Email</td>
                    <td data-title="Email" ><?php echo $shipping_address->email; ?></td>
                  </tr>
                  <tr>
                    <td>Full Name</td>
                    <td data-title="First Name" ><?php echo $shipping_address->name; ?></td>
                  </tr>
                  <tr>
                    <td>Address</td>
                    <td data-title="Address 1" ><?php echo $shipping_address->address; ?></td>
                  </tr>
                  <tr>
                    <td>Zip / Postal Code</td>
                    <td data-title="Code" ><?php echo $shipping_address->zip_code; ?></td>
                  </tr>
                  <tr>
                    <td>City</td>
                    <td data-title="City" ><?php echo $shipping_address->city; ?></td>
                  </tr>
                  <tr>
                    <td>Country</td>
                    <td data-title="Country" ><?php echo $shipping_address->country; ?></td>
                  </tr>
                  <tr>
                    <td>State/Province/Region</td>
                    <td data-title="State/Region" ><?php echo $shipping_address->state; ?></td>
                  </tr>
                  <tr>
                    <td>Phone</td>
                    <td data-title="Phone" ><?php echo $shipping_address->contact; ?></td>
                  </tr>
                </table>
              </div>
            </div>
            
          </div>
        </div>
      </div>
    </div>
  </section>


