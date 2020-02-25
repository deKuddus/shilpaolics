
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>BRAND</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">brand</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add_brand_modal">ADD BRAND</button>
      </div>
    </div>
  </div>
  <style>
  .dt-buttons{
    float: right;
  }
  .containers label {
    position: absolute;
    top: 90%;
    left: 40%;
    transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    color: #000;
    font-size: 26px;
    padding: 12px 24px;
    border: none;
    cursor: pointer;
    border-radius: 5px;
    text-align: center;
  }
</style>
  <div class="clearfix"></div>

  <div class="ibox ">
    <div class="ibox-title">
      <h5>Brand List</h5>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-wrench"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="#" class="dropdown-item">Config option 1</a>
          </li>
          <li><a href="#" class="dropdown-item">Config option 2</a>
          </li>
        </ul>
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <div class="ibox-content">

      <div class="table-responsive">
        <table id="brand_list" class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th></th>
              <th>Brand ID</th>
              <th>Brand Name</th>
              <th>Picture</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
              <th><input type="checkbox" class="brand_select_all" value="1">&nbsp;&nbsp;<button class="btn btn-danger btn-circle " type="button" onclick="delete_multiple_brand(this)"><i class="fa fa-trash"></i></button></th>
              <th>Brand ID</th>
              <th>Brand Name</th>
              <th>Picture</th>
              <th>Action</th>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>


</div>
<div class="modal inmodal fade " id="add_brand_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated slideInDown">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">ADD BRAND</h4>
      </div>
      <div class="modal-body">
       <form action="" id="brand_create" method="post">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-content">
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Brand Name</label> 
                      <?php echo form_input(['name' =>'name','id' =>'name','class'=>'form-control', 'placeholder'=> 'Enter Brand Name' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
                      <div class="form-group">
                        <div class="containers">
                          <img class="brand_image" id="brand_image_view"  src="<?php echo base_url();?>/brand_picture/default.png" alt="default image" height="200px" width="250px">
                          <span>
                            <label for="brand_image"><i class="fa fa-camera"></i></label>
                          </span>
                          <input type="file" id="brand_image" name="brand_image" accept="image/gif,image/jpeg,image/jpg,image/png," style="opacity: 0">
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="submit" id="submit" class="btn btn-primary">Save</button>
        </div>
      </form> 
    </div>

  </div>
</div>
</div>


<div class="modal inmodal fade " id="brand_edit_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated slideInDown">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">EDIT BRAND</h4>
      </div>
      <div class="modal-body">
       <form action="" id="brand_edit" method="post">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-content">
                <div class="row">
                  <div class="col-md-3"></div>
                  <div class="col-md-6">
                    <input type="hidden" name="brand_id" id="brand_id">
                    <div class="form-group">
                      <label>Brand Name</label> 
                      <?php echo form_input(['name' =>'name','id' =>'edit_brand_name','class'=>'form-control', 'placeholder'=> 'Enter Brand Name' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
          
                      <div class="form-group">
                        <div class="containers">
                          <img class="brand_image" id="brand_image_view_edit"  src="<?php echo base_url();?>/brand_picture/default.png" alt="default image" height="200px" width="250px">
                          <span>
                            <label for="brand_image_edit"><i class="fa fa-camera"></i></label>
                          </span>
                          <input type="file" id="brand_image_edit" name="brand_image_edit" accept="image/gif,image/jpeg,image/jpg,image/png," style="opacity: 0">
                        </div>
                      </div>
                  </div>
                  <div class="col-md-3"></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="submit" id="submitEdit" class="btn btn-primary">Update</button>
        </div>
      </form> 
    </div>
  </div>
</div>
</div>