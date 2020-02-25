
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
      <h2>PRODUCTS</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">products</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="<?php echo base_url(); ?>product/create" class="btn btn-primary">Add Product</a>

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
        <table id="product_list" class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th></th>
              <th>Name</th>
              <th>Qty</th>
              <th>Stock</th>
              <th>PPrice</th>
              <th>SPrice</th>
              <th>Discount</th>
              <th>Category</th>
              <th>SCategory</th>
              <th>Brand</th>
              <th>Publish</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th><input type="checkbox" class="product_select_all" value="1">&nbsp;&nbsp;<button class="btn btn-danger btn-circle " type="button" onclick="delete_multiple_product(this)"><i class="fa fa-trash"></i></button></th>
              <th>Name</th>
              <th>Qty</th>
              <th>Stock</th>
              <th>PPrice</th>
              <th>SPrice</th>
              <th>Discount</th>
              <th>Category</th>
              <th>SCategory</th>
              <th>Brand</th>
              <th>Publish</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>


<div class="modal inmodal fade" id="add_product_tostock" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">stock update</h4>
      </div>
      <form id="quantity_add_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="product_id_to_stock">Product ID</label>
                <input type="number" class="form-control" readonly="readonly" id="product_id_to_stock" name="product_id_to_stock" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="product_category_id_to_stock">Category ID</label>
                <input type="number" class="form-control" readonly="readonly" id="product_category_id_to_stock" name="product_category_id_to_stock" value="">
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
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="quantity">Quantity</label>
                <input type="number" min="1" name="quantity" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="rate">Rate</label>
                <input type="number" min="1" name="rate" class="form-control">
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="remarks">Remarks</label>
                <textarea  rows="3" name="remarks" class="form-control"></textarea>
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

<div class="modal inmodal fade" id="add_discount" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Discount</h4>
      </div>
      <form id="discount_add_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="product_id_to_discount">Product ID</label>
                <input type="number" class="form-control" readonly="readonly" id="product_id_to_discount" name="product_id_to_discount" value="">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_rate">Rate</label>
                <input type="number" min="1" name="discount_rate" id="discount_rate" class="form-control">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_type_to_product">Rate</label>
                <select name="discount_type_to_product" id="discount_type_to_product" class="form-control"></select>
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
