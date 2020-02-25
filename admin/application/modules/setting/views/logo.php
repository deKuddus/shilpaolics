
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
      <h2>Logo</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">logo</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <button data-toggle="modal" data-target="#add_new_logo" class="btn btn-primary">Add Logo</button>

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
        <table id="logo_list"  class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th></th>
              <th>ID</th>
              <th>Title</th>
              <th>Status</th>
              <th>Logo</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>
          </tbody>
          <tfoot>
            <tr>
              <th><input type="checkbox" class="check_all_logo" value="1">&nbsp;&nbsp;<button class="btn btn-danger btn-circle " type="button" onclick="delete_multiple_logo(this)"><i class="fa fa-trash"></i></button></th>
              <th>ID</th>
              <th>Title</th>
              <th>Status</th>
              <th>Logo</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>
    </div>
  </div>
</div>

<div class="modal inmodal fade" id="add_new_logo" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">new logo</h4>
      </div>
      <form id="new_logo_add_form" method="post">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="title">Slider Title</label>
                <input type="text" class="form-control" name="title" id="title" placeholder="logo title">
                <div class="form-error text-danger"></div>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="">Slider Image</label>
              <div class="containers">
                <img  id="logo_image_preview"  src="<?php echo base_url();?>/brand_picture/default.png" alt="default image" height="200px" width="300px">
                <span>
                  <label for="logo_image"><i class="fa fa-camera"></i></label>
                </span>
                <input type="file" id="logo_image" name="logo_image" accept="image/gif,image/jpeg,image/jpg,image/png," style="opacity: 0">
                <div class="form-error text-danger"></div>
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


<div class="modal inmodal fade" id="edit_new_logo" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">edit logo</h4>
      </div>
      <form id="logo_edit_form" method="post">
        <div class="modal-body">
          <div class="row">

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
