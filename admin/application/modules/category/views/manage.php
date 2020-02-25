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

<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>CATEGORY</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">category</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#category_add_modal">ADD CATEGORY</button>
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="ibox ">
    <div class="ibox-title">
      <h5>Category List</h5>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-wrench"></i>
        </a>
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <div class="ibox-content">

      <div class="table-responsive">
        <table id="category_list" class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th></th>
              <th>Category ID</th>
              <th>Category Name</th>
              <th>Parent Category</th>
              <th>Brand</th>
              <th>Show Home</th>
              <th>Picture</th>
              <th>Action</th>
            </tr>
          </thead>
          <tbody>

          </tbody>
          <tfoot>
            <tr>
               <th><input type="checkbox" class="category_select_all" value="1">&nbsp;&nbsp;<button class="btn btn-danger btn-circle " type="button" onclick="delete_multiple_category(this)"><i class="fa fa-trash"></i></button></th>
             <th>Category ID</th>
             <th>Category Name</th>
             <th>Parent Category</th>
             <th>Brand</th>
             <th>Show Home</th>
             <th>Picture</th>
             <th>Action</th>
           </tr>
         </tfoot>
       </table>
     </div>

   </div>
 </div>
</div>
<div class="modal inmodal fade " id="category_add_modal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated slideInDown">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">ADD CATEGORY</h4>
      </div>

      <div class="modal-body">
       <form action="" id="caregory_create" method="post">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-content">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label>Parent Category</label> 
                      <?php 
                        $selected = array();
                        echo form_dropdown(['name'=>'pid'],$category,$selected,['class'=>'form-control chosen-select']); 
                      ?>
                      <div class="form-error text-danger"></div>
                    </div>
                    <!-- Name -->
                    <div class="form-group">
                      <label>Category Name</label> 
                      <?php echo form_input(['name' =>'name','id' =>'name','class'=>'form-control', 'placeholder'=> 'Enter Category Name' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
                    <div class="form-group">
                      <label>Brand</label> 
                       <?php 
                       $selected = array();
                       echo form_dropdown(['name'=>'brand[]','id'=>'brand'],$brand,$selected,['class'=>'form-control chosen-select','multiple'=>'multiple']); 
                       ?>
                      <div class="form-error text-danger"></div>
                    </div>
                    </div>
                    <div class="col-md-6">
                    <div class="form-group">
                      <label>Description</label> 
                      <textarea name="description" id="description" class="form-control"></textarea>
                      <div class="form-error text-danger"></div>
                    </div>
                    <div class="form-group">
                        <div class="containers">
                          <img class="brand_image" id="category_image_view"  src="<?php echo base_url();?>/category_picture/default.png" alt="default image" height="200px" width="250px">
                          <span>
                            <label for="category_image"><i class="fa fa-camera"></i></label>
                          </span>
                          <input type="file" id="category_image" name="category_image" accept="image/gif,image/jpeg,image/jpg,image/png," style="opacity: 0">
                        </div>
                      </div>
                  </div>
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

