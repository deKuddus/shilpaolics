
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>CATEGORY</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">category</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>edit</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <a href="<?php echo base_url(); ?>category/manage" class="btn btn-primary">
          <button type="button" class="btn btn-primary">MANAGE CATEGORY</button></a>
        </div>
      </div>
    </div>

    <div class="clearfix"></div>

    <div class="ibox ">
     <form action="" id="caregory_edit" method="post">
      <div class="row">
        <div class="col-lg-12">
          <div class="ibox ">

            <div class="ibox-content">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label>Parent Category</label>
                    <?php
                    $selected = array($category->id);
                    echo form_dropdown(['name'=>'pid'],$categories,$selected,['class'=>'form-control chosen-select']);
                    ?>
                  </select>
                  <div class="form-error text-danger"></div>
                </div>
                <div class="form-group">
                  <label>Category Name</label>
                  <?php echo form_input(['name' =>'name','id' =>'name','class'=>'form-control' ,'type'=>'text','value'=>$category->category_name]); ?>
                  <div class="form-error text-danger"></div>
                  <input type="hidden" name="category_id" value="<?php echo $category->id; ?>">
                </div>
                <div class="form-group">
                  <label>Brand</label>
                  <?php
                  $selected = array(json_decode($category->brand));
                  echo form_dropdown(['name'=>'brand[]','id'=>'brand'],$brand,$selected,['class'=>'form-control chosen-select','multiple'=>'multiple']);
                  ?>
                  <div class="form-error text-danger"></div>
                </div>
              </div>
              <div class="col-md-6">
                <div class="form-group">
                  <label>Description</label>
                  <textarea name="description" id="description" class="form-control"><?php echo $category->description; ?></textarea>
                  <div class="form-error text-danger"></div>
                </div>
                <div class="form-group">
                  <div class="containers">
                    <img class="brand_image" id="category_image_view_edit"  src="<?php echo FILE_UPLOAD_PATH;?>/category_picture/default.png" alt="default image" height="200px" width="250px">
                    <span>
                      <label for="category_image_edit"><i class="fa fa-camera"></i></label>
                    </span>
                    <input type="file" id="category_image_edit" name="category_image_edit" accept="image/gif,image/jpeg,image/jpg,image/png," style="opacity: 0">
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


