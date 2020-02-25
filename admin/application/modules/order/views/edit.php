
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
                <div class="col-md-3"></div>

                <div class="col-md-6">
                  <div class="form-group">
                    <label>Parent Category</label> 
                    <select id="" name="pid" class="chosen-select" data-placeholder="No Parent">
                      <option value="0">No Parent</option>
                      <?php foreach ($categories as $key => $value) { ?>
                        <option value="<?php echo $value->id ?>"
                          <?php if($category->pid == $value->id) echo "selected"; ?>
                          ><?php echo $value->category_name; ?></option>
                      <?php } ?>
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
                    <select id="brand" name="brand[]" class="chosen-select" multiple data-placeholder="Select Brands">
                      <?php foreach ($brand as $key => $b_value) {?>
                        <option value="<?php echo $b_value->name ?>"
                          <?php 
                          $_brand = explode(',', json_decode($value->brand));
                          foreach ($_brand as $key => $b) {
                            if($b == $b_value->name){
                              echo "selected";
                            }
                          }
                           ?>
                          ><?php echo $b_value->name; ?></option>
                      <?php } ?>

                    </select>
                    <div class="form-error text-danger"></div>
                  </div>
                  <div class="form-group">
                    <label>Description</label> 
                    <textarea name="description" id="description" class="form-control"><?php echo $value->description; ?></textarea>
                    <div class="form-error text-danger"></div>
                  </div>
                  <div class="form-group">
                    <label>Select Category Banner</label> 
                    <div class="fallback">
                      <input name="picture" type="file" id="edit_picture" />
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


