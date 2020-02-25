
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
      <h2>Slider</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">slider</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <button data-toggle="modal" data-target="#add_slider_modal" class="btn btn-primary">Add Slider</button>
      </div>
    </div>
  </div>
  <div class="clearfix"></div>
  <div class="form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12">
      &nbsp;
    </label>
  </div>
  <div class="ibox ">
    <div class="ibox-content">
      <div class="table-responsive">
        <table id="slider_list" style="width: 990px !important;" class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Ttitle</th>
              <th>Descrition</th>
              <th>Url</th>
              <th>Status</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th><input type="checkbox" class="check_all_slider" value="1">&nbsp;&nbsp;<button class="btn btn-danger btn-circle " type="button" onclick="delete_multiple_slider(this)"><i class="fa fa-trash"></i></button></th>
              <th>ID</th>
              <th>Ttitle</th>
              <th>Descrition</th>
              <th>Url</th>
              <th>Status</th>
              <th>Image</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal fade" id="add_slider_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">new slider</h4>
      </div>
      <form id="new_slider_add_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Slider Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="slider title">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="url">Product Url on Slider</label>
                <input type="text" class="form-control" name="url" id="url" placeholder="advertise url on slider">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="description">Description</label>
                <textarea class="form-control" name="description" id="description"></textarea>
                 <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Slider Image</label>
                <div class="containers">
                  <img  id="slider_image_preview"  src="<?php echo base_url();?>/brand_picture/default.png" alt="default image" height="200px" width="100%">
                  <span>
                    <label for="slider_image"><i class="fa fa-camera"></i></label>
                  </span>
                  <input type="file" id="slider_image" name="slider_image" accept="image/gif,image/jpeg,image/jpg,image/png," style="opacity: 0">
                   <div class="form-error text-danger"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9"></div>
            <div class="modal-footer col-md-3">
              <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>


<div class="modal inmodal fade" id="edit_slider_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">edit slider</h4>
      </div>
      <form id="slider_edit_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="slider_title_edit">Slider Title</label>
                <input type="hidden" name="slider_id" id="slider_id">
                <input type="text" class="form-control" name="title" id="slider_title_edit" placeholder="slider title">
                <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="slider_url_edit">Product Url on Slider</label>
                <input type="text" class="form-control" name="url" id="slider_url_edit" placeholder="advertise url on slider">
                 <div class="form-error text-danger"></div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="slider_description_edit">Description</label>
                <textarea class="form-control" name="description" id="slider_description_edit"></textarea>
                 <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-12">
              <div class="form-group">
                  <label for="">Slider Image</label>
                <div class="containers">
                  <img  id="slider_image_preview_edit"  src="" alt="default image" height="200px" width="100%">
                  <span>
                    <label for="slider_image_edit"><i class="fa fa-camera"></i></label>
                  </span>
                  <input type="file" id="slider_image_edit" name="slider_image" accept="image/gif,image/jpeg,image/jpg,image/png," style="opacity: 0">
                   <div class="form-error text-danger"></div>
                </div>
              </div>
            </div>
          </div>
          <div class="row">
            <div class="col-md-9"></div>
            <div class="modal-footer col-md-3">
              <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
              <button type="submit"  class="btn btn-primary">Save</button>
            </div>
          </div>
        </div>
      </form>
      </div>
    </div>
  </div>