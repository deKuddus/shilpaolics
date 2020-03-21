<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="wrapper wrapper-content animated fadeInRight">

  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>PRODUCTS</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">products</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>create</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="<?php echo base_url(); ?>product" class="btn btn-primary">Manage Product</a>
      </div>
    </div>
  </div>
  <div class="ibox ">
    <div class="ibox-content">
      <div class="row">
        <div class="col-md-6">
          <?php if(validation_errors()){?>
            <div class="alert alert-danger alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?php echo validation_errors(); ?> 
            </div>
          <?php } ?>
          <?php if($this->session->flashdata('msg')){?>
            <div class="alert alert-success alert-dismissable">
              <button aria-hidden="true" data-dismiss="alert" class="close" type="button">×</button>
              <?php echo $this->session->flashdata('msg')?> 
            </div>
          <?php } ?>
        </div>
        <div class="col-md-3"></div>
      </div>
      <form id="add_product" method="post" class="form-horizontal form-label-left">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Name</label> 
              <?php echo form_input(['name' =>'title','id' =>'title','class'=>'form-control ', 'placeholder'=> 'Enter Product Name' ,'type'=>'text','value'=>'']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Category</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'category_id'],[$categories],[$selected],['id' =>'category_id','class'=>'form-control chosen-select']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Sub Category</label> 
              <select name="sub_category_id" id="sub_category_id" class="form-control " data-placeholder="select sub category" style="display: inline !important; "></select>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Brand</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'brand_id'],[$brands],[$selected],['id' =>'brand_id','class'=>'form-control']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Unit</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'unit'],[$units],[$selected],['id' =>'unit','class'=>'form-control']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Tags</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'tags[]'],[$tags],[$selected],['id' =>'tags','class'=>'form-control chosen-select','multiple'=>'multiple','style'=>'width:350px' ,'tabindex'=>'4']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Purchase Price</label> 
              <?php echo form_input(['name' =>'purchase_price','id' =>'purchase_price','class'=>'form-control', 'placeholder'=> 'Enter Purchase price' ,'type'=>'number','value'=>'','min'=>1]); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Sale Price</label> 
              <?php echo form_input(['name' =>'sale_price','id' =>'sale_price','class'=>'form-control', 'placeholder'=> 'Enter Sale  price' ,'type'=>'number','value'=>'','min'=>1]); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Shiping Cost</label> 
              <?php echo form_input(['name' =>'shipping_cost','id' =>'shipping_cost','class'=>'form-control', 'placeholder'=> 'Enter Shiping cost' ,'type'=>'number','value'=>'','min'=>1]); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Discount</label> 
              <?php echo form_input(['name' =>'discount','id' =>'discount','class'=>'form-control', 'placeholder'=> 'Enter Discount' ,'type'=>'number','value'=>'','min'=>1]); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Discount Type</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'discount_type'],[$types],[$selected],['id' =>'discount_type','class'=>'form-control chosen-select','style'=>'width:350px' ,'tabindex'=>'4']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Tax</label> 
              <?php echo form_input(['name' =>'tax','id' =>'tax','class'=>'form-control', 'placeholder'=> 'Enter tax rate' ,'type'=>'number','value'=>'','min'=>1]); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Tax Type</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'tax_type'],[$types],[$selected],['id' =>'tax_type','class'=>'form-control chosen-select','style'=>'width:350px' ,'tabindex'=>'4']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Color</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'color[]'],[$colors],[$selected],['id' =>'color','class'=>'form-control chosen-select','multiple'=>'multiple','style'=>'width:350px' ,'tabindex'=>'4','data-placeholder'=>'Choose color']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label>Product Size</label> 
              <?php
              $selected=array();
              echo form_dropdown(['name'=>'size[]'],[$sizes],[$selected],['id' =>'size','class'=>'form-control chosen-select','multiple'=>'multiple','style'=>'width:350px' ,'tabindex'=>'4','data-placeholder'=>'Choose size']); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
        </div>
        <div class="row">      
          <div class="col-md-12">
            <div class="form-group">
              <label>Product Description</label> 
              <?php echo form_textarea(['name' =>'description','id' =>'description','class'=>'form-control', 'placeholder'=> 'Enter Product Description','value'=>'','rows'=>5]); ?>
              <div class="form-error text-danger"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 text-center">
            <div class="form-group">
              <label>Product Featured First Image</label>
              <div class="containers">
                  <label for="feature_image1"><img class="product_image" id="product_image1"  src="<?php echo FILE_UPLOAD_PATH;?>/product_picture/default.png" alt="default image" height="200px" width="250px"></label>
                <input type="file" id="feature_image1" name="feature_image1" accept="image/gif,image/jpeg,image/jpg,image/png,">
              </div>
            </div>
          </div>
          <div class="col-md-6 text-center">
            <div class="form-group">
              <label>Product Featured Second Image</label>
              <div class="containers">
                  <label for="feature_image2"><img class="product_image" id="product_image2"  src="<?php echo FILE_UPLOAD_PATH;?>/product_picture/default.png" alt="default image" height="200px" width="250px"></i></label>
                <input type="file" id="feature_image2" name="feature_image2" accept="image/gif,image/jpeg,image/jpg,image/png,">
              </div>
            </div>
          </div>
        </div><br>
        <div class="row">
          <div class="col-md-12">
              <div class="input-images"></div>
            </div>
        </div>
        <br>
        <div class="row">
          <div class="col-md-8"></div>
          <div class="col-md-4">
            <div class="form-group">
                <a href="<?php echo site_url('product/manage'); ?>">
                  <button class="btn btn-primary" type="button" ><i class="fa fa-minus-square"></i>&nbsp; Cancel </button>
                </a>
                <button type="submit"  class="btn btn-primary" class="btn btn-success" id="submit">Save</button>
            </div>
          </div>

        </div>
      </form>
    </div>
  </div>
</div>



<!-- /page content -->