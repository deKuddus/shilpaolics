
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
      <h2>Cupon</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">cuopn</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <button data-toggle="modal" data-target="#add_new_cupon"  class="btn btn-primary">Add Cuopon</button>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="ibox ">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="cuopn_list" class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th>ID</th>
              <th>Title</th>
              <th>Code</th>
              <th>Created By</th>
              <th>Valid Till</th>
              <th>On</th>
              <th>Type</th>
              <th>Value</th>
              <th>Specification</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th><input type="checkbox" class="cupon_check_all" value="1">&nbsp;&nbsp;<button class="btn btn-danger btn-circle " type="button" onclick="delete_multiple_cupon(this)"><i class="fa fa-trash"></i></button></th>
              <th>Title</th>
              <th>Code</th>
              <th>Created By</th>
              <th>Valid Till</th>
              <th>On</th>
              <th>Type</th>
              <th>Value</th>
              <th>Specification</th>
              <th>Status</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal fade" id="add_new_cupon" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">new cupon</h4>
      </div>
      <form id="new_cuopn_add_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Cupon Title</label>
                 <input type="text" name="title" id="title" class="form-control">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="code">Cupon Code</label>
                 <input type="text" name="code" id="code" class="form-control">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_on">Discount On</label>
                <?php
                   $selected=array();
                   echo form_dropdown(['name'=>'discount_on'],[$discount_on],[$selected],['id' =>'discount_on','class'=>'form-control chosen-select']);

                 ?>
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_type">Discount Type</label>
                <?php
                   $selected=array();
                   echo form_dropdown(['name'=>'discount_type'],[$discount_type],[$selected],['id' =>'discount_type','class'=>'form-control chosen-select']);
                 ?>
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_value">Discount Value</label>
                <input type="number" min="1" name="discount_value" id="discount_value" class="form-control">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group" id="cuopn_date">
              <label class="font-normal" for="valid_till" >Valid Till Date</label>
              <div class="input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="till" id="valid_till">
              </div>
              <div class="form-error text-danger"></div>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="valid_till_time">Valid Till Time</label>
                <input type="time"  name="valid_till_time" id="valid_till_time" class="form-control">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="specification">Specificaton</label>
                <textarea  rows="3" name="specification" id="specification" class="form-control"></textarea>
                <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9"></div>
            <div class="modal-footer col-md-3">
              <button type="button" class="btn btn-red" onclick="generate_cupon('add')">Genrate Cupon</button>
              <button type="button" class="btn btn-white"  data-dismiss="modal">Close</button>
              <button type="submit" id="save_status" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
</div>


<div class="modal inmodal fade" id="edit_cupon_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">new cupon</h4>
      </div>
      <form id="new_cuopn_edit_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title_edit">Cupon Title</label>
                <input type="hidden" name="cupon_id_edit" id="cupon_id_edit">
                 <input type="text" name="title" id="title_edit" class="form-control">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="code_edit">Cupon Code</label>
                 <input type="text" name="code" id="code_edit" class="form-control">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_on_edit">Discount On</label>
                <select name="discount_on" id="discount_on_edit" class="form-control"></select>
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_type_edit">Discount Type</label>
                <select name="discount_type" id="discount_type_edit" class="form-control"></select>
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="discount_value_edit">Discount Value</label>
                <input type="number" min="1" name="discount_value" id="discount_value_edit" class="form-control">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
             <div class="form-group" id="cuopn_date">
              <label class="font-normal" for="valid_till_edit" >Valid Till Date</label>
              <div class="input-group date">
                <span class="input-group-addon"><i class="fa fa-calendar"></i></span><input type="text" class="form-control" name="till" id="valid_till_edit">
              </div>
              <div class="form-error text-danger"></div>
            </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="valid_till_time_edit">Valid Till Time</label>
                <input type="time"  name="valid_till_time" id="valid_till_time_edit" class="form-control">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <label for="specification_edit">Specificaton</label>
                <textarea  rows="3" name="specification" id="specification_edit" class="form-control"></textarea>
                <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9"></div>
            <div class="modal-footer col-md-3">
              <button type="button" class="btn btn-red" onclick="generate_cupon('edit')">Genrate Cupon</button>
              <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
              <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          </div>
          </div>
        </form>
      </div>
    </div>
</div>

