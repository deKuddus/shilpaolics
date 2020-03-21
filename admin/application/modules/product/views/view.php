<div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-md-10">
        <h2>product detail</h2>
        <ol class="breadcrumb">
            <li class="breadcrumb-item">
                <a href="<?php echo base_url('admin/dashboard') ?>">Home</a>
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

table tr th{
    font-size: 18px;
    text-align: center;
}

table tr td{
    font-size: 18px;
    text-align: center;
}
</style>

<div class="wrapper wrapper-content animated fadeInRight">
   <div class="ibox product-detail">
    <div class="ibox-content">
        <div class="row justify-content-md-center">
            <div class="col-lg-10">
                <div class="ibox">
                    <h4 class="text-center m">
                        Product Images
                    </h4>
                    <div class="slick_demo_1">
                        <?php
                        $new_image_array = array();
                        foreach($optional_images as $image){
                            $new_image_array[] = $image->picture;
                        }
                        array_push($new_image_array, $product->feature_image1);
                        array_push($new_image_array, $product->feature_image2);
                        foreach ($new_image_array as $key => $value) {?>
                            <div>
                                <div class="ibox-content">
                                    <img src="<?php echo FILE_UPLOAD_PATH.$value; ?>" alt="product image" height="300px" width="100%">
                             </div>
                         </div>
                     <?php } ?>
                 </div>
             </div>
         </div>
     </div>
     <div class="row">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <th>ID</th>
                    <td><?php echo $product->id; ?></td>
                </tr>
                <tr>
                    <th>Product Name</th>
                    <td><?php echo $product->title; ?></td>
                </tr>
                <tr>
                    <th>Purchase Price</th>
                    <td><?php echo $product->purchase_price; ?></td>
                </tr>
                <tr>
                    <th>Sale Price</th>
                    <td><?php echo $product->sale_price; ?></td>
                </tr>
                <tr> 
                    <th>Category</th>
                    <td>
                        <?php
                        foreach ($category as $key => $value) {
                            if($value->id == $product->category_id){
                                echo $value->category_name;
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Brand</th>
                    <td>
                        <?php
                        foreach ($brands as $key => $brand) {
                            if($brand->id == $product->brand_id){
                                echo $brand->name;
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Sub Category</th>
                    <td>
                        <?php
                        foreach ($category as $key => $value) {
                            if($value->id == $product->sub_category_id){
                                echo $value->category_name;
                            }
                        }
                        ?>
                    </td>
                </tr>
                <tr>
                    <th>Discount</th>
                    <td>
                        <?php echo $product->discount; ?>&nbsp;
                        <?php foreach ($types as $key => $t_value) {
                            if($t_value->id == $product->discount_type){
                                echo $t_value->symbol;
                            }
                        } ?>

                    </td>
                </tr>
                <tr>
                    <th>Tax</th>
                    <td>
                        <?php echo $product->tax; ?>&nbsp;
                        <?php foreach ($types as $key => $t_value) {
                            if($t_value->id == $product->tax_type){
                                echo $t_value->symbol;
                            }
                        } ?>
                    </td>
                </tr>
                <?php if(!empty($product->color)){ ?>
                    <tr>
                        <th>Color</th>
                        <td>
                            <?php 
                            $color = json_decode($product->color); 
                            foreach ($color as $key => $value) {
                                foreach ($colors as $key => $color_value) {
                                   if($color_value->id == $value){
                                    echo "<span class='label label-info'>".$color_value->name."</span>&nbsp;";
                                } } }
                                ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if(!empty($product->size)){ ?>
                        <tr>
                            <th>Size</th>
                            <td>
                                <?php 
                                $size = json_decode($product->size); 

                                foreach ($size as $key => $value) {
                                    foreach ($sizes as $key => $sizes_value) {
                                     if($sizes_value->id == $value){
                                        echo "<span class='label label-info'>".$sizes_value->name."</span>&nbsp;";
                                    } } }
                                    ?>
                                </td>
                            </tr>
                        <?php } ?>
                        <tr>
                            <th>Description</th>
                            <td><?php echo $product->description; ?></td>
                        </tr>
                        <tr>
                            <th>Action</th>
                            <td><a href="<?php echo base_url('product/edit/'.$product->id); ?>">EDIT</a></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>