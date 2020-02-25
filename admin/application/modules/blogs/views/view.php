        <div class="row wrapper border-bottom white-bg page-heading">
            <div class="col-md-10">
                <h2>product detail</h2>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="index.html">Home</a>
                    </li>
                    <li class="breadcrumb-item">
                        <a>product</a>
                    </li>
                    <li class="breadcrumb-item active">
                        <strong>detail</strong>
                    </li>
                </ol>
            </div>
            <div class="col-md-2"><br>
                <div class="btn-group">
                    <a href="<?php echo base_url('product/edit/'.$product->id); ?>"><button class="btn btn-info"><i class="fa fa-edit"></i>Edit</button></a>
                </div>
            </div>
        </div>

        <style>
        dt{
            font-size: 18px;
        }
        dd{font-size: 16px}
    </style>

<div class="wrapper wrapper-content animated fadeInRight">
     <div class="ibox product-detail">
        <div class="ibox-content">
            <div class="row">
                <div class="col-md-4">
                    <div class="product-images">
                        <div>
                            <div class="image-imitation">
                             <img src="<?php echo base_url().$product->feature_image1 ?>" alt="product image" height="300px" width="300px">
                            </div>
                        </div>
                        <div>
                            <div class="image-imitation">
                                <img src="<?php echo base_url().$product->feature_image2 ?>" alt="product image" height="300px" width="400px">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <h2 class="font-bold m-b-xs">
                        <?php echo $product->title; ?>
                    </h2>
                    <div class="m-t-md">
                        <h2 class="product-main-price">Slae Price : $<?php echo $product->sale_price; ?></h2>
                        <h2 class="product-main-price">Purchase Price : $<?php echo $product->purchase_price; ?></h2>
                    </div>
                    <hr>

                    <dl class="small m-t-md">
                        <dt>Product Quantity : </dt>
                        <dd>
                           <?php echo $product->quantity; ?>
                        </dd>
                        <dt>Product Category : </dt>
                        <dd>
                         <?php foreach ($category as $key => $value) {
                           if($product->category_id == $value->id){
                            echo $value->category_name;
                                }   
                            }?>
                        </dd>
                        <dt>Product Sub Category : </dt>
                        <dd>
                            <?php foreach ($category as $key => $value) {
                               if($product->category_id == $value->id){
                                echo $value->category_name;
                            }}?>
                        </dd>
                        <dt>Product Brand : </dt>
                        <dd>
                            <?php foreach ($brands as $key => $value) {
                               if($product->brand_id == $value->id){
                                echo $value->name;
                            } }?>
                        </dd>
                        <dt>Product Unit : </dt>
                        <dd>
                            <?php 
                            foreach ($units as $key => $unit_value) {
                             if($unit_value->id == $product->unit){
                                echo $unit_value->name;
                            } }?>
                         </dd>
                        <dt>Product Unit : </dt>
                        <dd>
                            <?php 
                            $tag = json_decode($product->tags); 
                            foreach ($tag as $key => $tag_id) {
                                foreach ($tags as $key => $tag_value) {
                                   if($tag_id == $tag_value->id){
                                    echo "<span class='label label-info'>".$tag_value->name."</span>&nbsp;";
                                } }  }?>
                        </dd>
                    </dl>
                </div>
                <div class="col-md-4">
                 <dl class="small m-t-md">
                    <dt>Shiping Cost : </dt>
                    <dd>
                        <?php echo $product->shipping_cost; ?>
                    </dd>
                    <dt>Discount : </dt>
                    <dd>
                       <?php echo $product->discount; ?>
                    </dd>
                    <dt>Discount Types : </dt>
                    <dd>
                       <?php 
                       foreach ($types as $key => $type_value) {
                        if($product->discount_type == $type_value->id){
                            echo $type_value->symbol;
                        } } ?>
                    </dd>
                    <dt>Tax  : </dt>
                    <dd>
                     <?php echo $product->tax; ?>
                    </dd>
                    <dt>Tax Types : </dt>
                    <dd>
                        <?php 
                        foreach ($types as $key => $type_value) {
                            if($product->tax_type == $type_value){
                                echo $type_value->symbol;
                            }
                        }
                        ?>
                    </dd>
                    <?php if(!empty($product->color)){ ?>
                       <dt>Color : </dt>
                       <dd>
                        <?php $color = json_decode($product->color); 
                        foreach ($color as $key => $value) {
                            foreach ($colors as $key => $color_value) {
                             if($color_value->id == $value){
                                echo "<span class='label label-info'>".$color_value->name."</span>&nbsp;";
                            } } }?>
                    </dd>
                    <?php } ?>
                    <?php if(!empty($product->size)){ ?>
                       <dt>Size : </dt>
                       <dd>
                        <?php $size = json_decode($product->size); 

                        foreach ($size as $key => $value) {
                            foreach ($sizes as $key => $sizes_value) {
                             if($sizes_value->id == $value){
                                echo "<span class='label label-info'>".$sizes_value->name."</span>&nbsp;";
                            } } }?>
                        </dd>
                    <?php } ?>
                    <dt>Selling Times : </dt>
                    <dd>
                        <?php echo $product->best_selling; ?>
                    </dd>
                    </dl>
                    <hr>
                    <h4>Product description</h4>
                    <div class="small text-muted">
                     <?php echo $product->description; ?>
                    </div>
                     <hr>
                     <div>
                        <div class="btn-group">
                            <a href="<?php echo base_url('product/edit/'.$product->id); ?>"><button class="btn btn-primary btn-sm"><i class="fa fa-cart-plus"></i> Edit </button></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>