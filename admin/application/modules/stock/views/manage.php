
<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<style>
.dt-buttons{
  float: right;
}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>Stocks</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">stock</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <button data-toggle="modal" data-target="#add_new_stock" class="btn btn-primary">Add Stock</button>
        
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">
      &nbsp;
    </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
      <?php if($this->session->flashdata('msg_del')){?>
        <div class="alert alert-danger alert-dismissible fade in" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
          </button>
          <?php echo $this->session->flashdata('msg_del')?>
        </div>
      <?php } ?>
    </div>
  </div>
  <div class="ibox ">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="stock" style="width: 990px !important;" class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Type</th>
              <th>Product ID</th>
              <th>Category</th>
              <th>Quantity</th>
              <th>Rate</th>
              <th>Total</th>
              <th>Entry</th>
              <th>Remarks</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th><input type="checkbox" class="check_all" value="1">&nbsp;&nbsp;<button class="btn btn-danger btn-circle " type="button" onclick="delete_multiple_stock(this)"><i class="fa fa-trash"></i></button></th>
              <th>ID</th>
              <th>Type</th>
              <th>Product ID</th>
              <th>Category</th>
              <th>Quantity</th>
              <th>Rate</th>
              <th>Total</th>
              <th>Entry</th>
              <th>Remarks</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal fade" id="add_new_stock" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">new stock</h4>
      </div>
      <form id="new_stock_add_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="product_id">Product ID</label>
                 <?php
                   $selected=array();
                   echo form_dropdown(['name'=>'product_id'],[$products],[$selected],['id' =>'product_id','class'=>'form-control chosen-select']); 
                 ?>
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="type">Stock Type</label>
                <select name="type" id="type" class="form-control">
                  <option value="1">Stock In</option>
                  <option value="2">Stock Out</option>
                  <option value="3">Damaged</option>
                </select>
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" min="1" name="quantity" class="form-control">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="rate">Rate</label>
                <input type="number" min="1" name="rate" class="form-control">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea  rows="3" name="remarks" class="form-control"></textarea>
                <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9"></div>
            <div class="modal-footer col-md-3">
              <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
              <button type="submit" id="save_status" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
</div>


<div class="modal inmodal fade" id="edit_new_stock" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
  <div class="modal-content animated flipInY">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
      <h4 class="modal-title">edit stock</h4>
    </div>
    <form id="stock_edit_form" method="post">
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="stock_id_edit">Stock ID</label>
               <input type="text" readonly="readonly" name="stock_id" id="stock_id_edit" class="form-control" value="">
               <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="type_edit">Stock Type</label>
              <select name="type" id="type_edit" class="form-control">
              </select>
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="quantity_edit">Quantity</label>
              <input type="number" min="1" name="quantity" id="quantity_edit" value="" class="form-control">
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="rate_edit">Rate</label>
              <input type="number" min="1" name="rate" id="rate_edit" value="" class="form-control">
              <div class="form-error text-danger"></div>
            </div>
          </div>
          <div class="col-md-12">
            <div class="form-group">
              <label for="remarks">Remarks</label>
              <textarea  rows="3" name="remarks" id="remarks_edit" class="form-control"></textarea>
              <div class="form-error text-danger"></div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-9"></div>
          <div class="modal-footer col-md-3">
            <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
            <button type="submit" id="save_status" class="btn btn-primary">Save changes</button>
          </div>
        </div>
        </div>
      </form>
    </div>
  </div>
</div>