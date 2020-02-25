<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Invoice Print</title>

    <link href="<?php echo base_url()?>public/admin_theme/css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="<?php echo base_url()?>public/admin_theme/css/animate.css" rel="stylesheet">
    <link href="<?php echo base_url()?>public/admin_theme/css/style.css" rel="stylesheet">

</head>

<body class="white-bg">
    <div class="wrapper wrapper-content p-xl">
        <div class="ibox-content p-xl">
            <div class="row">
                <div class="col-sm-4">
                    <h5>From:</h5>
                    <?php $billing_info = json_decode($order->guest_details); ?>
                    <address>
                        <strong><?php echo $billing_info->name; ?></strong><br>
                        <?php echo $billing_info->address; ?><br>
                        <?php echo $billing_info->zip_code; ?>,<?php echo $billing_info->city; ?><br>
                        <?php echo $billing_info->state; ?>, <?php echo $billing_info->country; ?></br>
                        <abbr title="Phone">P:</abbr> <?php echo $billing_info->contact; ?>
                    </address>
                </div>
                <div class="col-sm-4 text-center"> 
                <img src="<?php echo base_url() ?>/public/admin_theme/img/logo.png" alt="logo" height="80px" width="80px;">                              
                    <h4>Invoice No.</h4>
                    <h4 class="text-navy">INV-<?php echo $order->code; ?></h4>
                    <p>
                        <span><strong>Order Date:</strong> <?php echo dateFormater($order->sales_at); ?></span><br/>
                        <!-- <span><strong>Due Date:</strong> March 24, 2014</span> -->
                    </p>
                </div>
                <div class="col-sm-4 text-right">
                    <span>To:</span>
                    <?php $shipping_info = json_decode($order->shipping_address); ?>
                    <address>
                        <strong><?php echo $shipping_info->name; ?></strong><br>
                        <?php echo $shipping_info->address; ?><br>
                        <?php echo $shipping_info->zip_code; ?>,<?php echo $shipping_info->city; ?><br>
                        <?php echo $shipping_info->state; ?>, <?php echo $shipping_info->country; ?></br>
                        <abbr title="Phone">P:</abbr> <?php echo $shipping_info->contact; ?>
                    </address>
                </div>
            </div>

            <div class="table-responsive m-t">
                <table class="table invoice-table">
                    <thead>
                        <tr>
                            <th>Item List</th>
                            <th>Quantity</th>
                            <th>Unit Price</th>
                            <th>Tax</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        $total_tax = 0;
                        $sub_total = 0;
                        $items = json_decode($order->product_details);
                        foreach ($items as $key => $itemlist) { 
                            foreach ($itemlist as $key => $product) {
                               ?>
                               <tr>
                                <td><div><strong><?php echo $product->name; ?></strong></div></td>
                                <td><?php echo $product->qty; ?></td>
                                <td>$ <?php echo $product->price; ?></td>
                                <td>$ <?php echo $product->tax; ?></td>
                                <td>$ <?php echo $product->sub_total; ?></td>
                            </tr>
                            <?php 
                            $total_tax = $total_tax+$product->tax;
                            $sub_total = $sub_total+$product->sub_total;
                        }} ?>

                    </tbody>
                </table>
            </div><!-- /table-responsive -->

            <table class="table invoice-total">
                <tbody>
                    <tr>
                        <td><strong>Sub Total :</strong></td>
                        <td>$ <?php echo $sub_total; ?></td>
                    </tr>
                    <tr>
                        <td><strong>TAX :</strong></td>
                        <td>$ <?php echo $total_tax; ?></td>
                    </tr>
                    <tr>
                        <td><strong>TOTAL :</strong></td>
                        <td>$ <?php echo ($total_tax+$sub_total); ?></td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <table class="table invoice-total">
                <tbody>

                    <tr>
                       <td><strong>Sign :</strong></td>
                       <td>_____________________</td>
                   </tr>
               </tbody>
           </table>
       </div>

   </div>

   <!-- Mainly scripts -->
   <script src="<?php echo base_url()?>public/admin_theme/js/jquery-3.1.1.min.js"></script>
   <script src="<?php echo base_url()?>public/admin_theme/js/popper.min.js"></script>
   <script src="<?php echo base_url()?>public/admin_theme/js/bootstrap.js"></script>
   <script src="<?php echo base_url()?>public/admin_theme/js/plugins/metisMenu/jquery.metisMenu.js"></script>

   <!-- Custom and plugin javascript -->
   <script src="<?php echo base_url()?>public/admin_theme/js/inspinia.js"></script>

   <script type="text/javascript">
    window.print();
</script>

</body>

</html>
