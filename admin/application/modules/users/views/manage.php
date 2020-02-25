
<script src="<?php echo base_url(); ?>public/admin_theme/js/ajax-form.js"></script>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>USERS</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">users</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <!-- <a href="<?php echo base_url(); ?>users/create" class="btn btn-primary">Add Users</a> -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addModal">ADD USER</button>
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
    <div class="ibox-title">
      <h5>Users List</h5>
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
        <table class="table table-striped table-bordered table-hover dataTables-example" >
          <thead>
            <tr>
              <th>Full Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Email</th>
              <th>Password</th>
              <th>Picture</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </thead>
          <tbody id="append_data">

          </tbody>
          <tfoot>
            <tr>
              <th>Full Name</th>
              <th>Phone</th>
              <th>Address</th>
              <th>Email</th>
              <th>Password</th>
              <th>Picture</th>
              <th>Edit</th>
              <th>Delete</th>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>


</div>
<div class="modal inmodal fade " id="addModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated slideInDown">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">ADD USER</h4>
      </div>

      <div class="modal-body">
       <form action="" id="user_create" method="post">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-title">
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
                <div class="row">
                  <div class="col-md-6">
                    <!-- <p>Sign in today for more expirience.</p> -->
                    <div class="form-group">
                      <label class="control-label" for="users_role">User Role <span class="required">*</span>
                      </label>
                      <div >
                        <select class="form-control" id="role_id" name="role_id">
                          <option value="1">ADMIN</option>
                          <option value="2">MANAGER</option>
                          <option value="3">SALES</option>
                        </select>

                      </div>
                    </div>
                    <!-- Name -->
                    <div class="form-group">
                      <label>Full Name</label> 
                      <span style="display: none;color: red;" id="sms">sdsdsd</span>
                      <?php echo form_input(['name' =>'name','id' =>'name','class'=>'form-control', 'placeholder'=> 'Enter Full Name' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
                    <!-- Contact No -->
                    <div class="form-group">
                      <label>Phone</label>
                      <?php echo form_input(['name' =>'phone','id' =>'phone','class'=>'form-control', 'placeholder'=> 'Enter phone' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
                    <!-- Address -->
                    <div class="form-group">
                      <label>Address</label>
                      <?php echo form_input(['name' =>'address','id' =>'address','class'=>'form-control', 'placeholder'=> 'Enter address' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
                  </div>
                  <div class="col-md-6">

                    <!-- Email -->
                    <div class="form-group">
                      <label>Email</label>
                      <?php echo form_input(['name' =>'email','type'=>'email','id' =>'email','class'=>'form-control', 'placeholder'=> 'Enter email' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                      <label>Password</label>
                      <?php echo form_input(['name' =>'password','type'=>'password','id' =>'password','class'=>'form-control', 'placeholder'=> 'Enter password' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>

                    <div class="form-group">
                      <label>Confirm Password</label>
                      <?php echo form_input(['name' =>'confirm-password','type'=>'password','id' =>'confirm-password','class'=>'form-control', 'placeholder'=> 'Enter password' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
                    <!-- Picture -->
                    <div class="form-group">
                      <label>Select User File</label> 
                      <div class="fallback">
                        <input name="picture" type="file" id="picture" />
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
<div class="modal inmodal fade " id="editModal" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content animated slideInDown">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">EDIT USER</h4>
      </div>
      <div class="modal-body">
       <form action="" id="user_edit" method="post">
        <div class="row">
          <div class="col-lg-12">
            <div class="ibox ">
              <div class="ibox-title">
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
                <div class="row">
                  <div class="col-md-6">
                    <!-- <p>Sign in today for more expirience.</p> -->
                    <input type="hidden" name="user_id" id="user_id">
                    <div class="form-group">
                      <label class="control-label" for="users_role">User Role <span class="required">*</span>
                      </label>
                      <div >
                        <select class="form-control" id="edit_role_id" name="role_id">
                          <option value="1">ADMIN</option>
                          <option value="2">MANAGER</option>
                          <option value="3">SALES</option>
                        </select>

                      </div>
                    </div>
                    <!-- Name -->
                    <div class="form-group">
                      <label>Full Name</label> 
                      <?php echo form_input(['name' =>'name','id' =>'edit_name','class'=>'form-control', 'placeholder'=> 'Enter Full Name' ,'type'=>'text','value'=>'']); ?>
                    </div>
                    <!-- Contact No -->
                    <div class="form-group">
                      <label>Phone</label>
                      <?php echo form_input(['name' =>'phone','id' =>'edit_phone','class'=>'form-control', 'placeholder'=> 'Enter phone' ,'type'=>'text','value'=>'']); ?>
                    </div>
                    <!-- Address -->
                    <div class="form-group">
                      <label>Address</label>
                      <?php echo form_input(['name' =>'address','id' =>'edit_address','class'=>'form-control', 'placeholder'=> 'Enter address' ,'type'=>'text','value'=>'']); ?>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <!-- Email -->
                    <div class="form-group">
                      <label>Email</label>
                      <?php echo form_input(['name' =>'email','type'=>'email','id' =>'edit_email','class'=>'form-control', 'placeholder'=> 'Enter email' ,'type'=>'text','value'=>'']); ?>
                    </div>

                    <!-- Password -->
                    <div class="form-group">
                      <label>Password</label>
                      <?php echo form_input(['name' =>'password','type'=>'password','id' =>'edit_password','class'=>'form-control', 'placeholder'=> 'Enter password' ,'type'=>'text','value'=>'']); ?>
                    </div>
                    <div class="form-group">
                      <label>Confirm Password</label>
                      <?php echo form_input(['name' =>'confirm-password','type'=>'password','id' =>'confirm-password','class'=>'form-control', 'placeholder'=> 'Enter password' ,'type'=>'text','value'=>'']); ?>
                      <div class="form-error text-danger"></div>
                    </div>
                    <!-- Picture -->
                    <div class="form-group">
                      <label>Select User File</label> 
                      <div class="fallback">
                        <input name="picture" type="file" id="picture" multiple />
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
          <button type="submit" id="submitEdit" class="btn btn-primary">Update</button>
        </div>
      </form> 
    </div>
  </div>
</div>
</div>

<script src="<?php echo base_url(); ?>public/admin_theme/js/plugins/toastr/toastr.min.js"></script>
<script src="<?php echo base_url() ?>public/admin_theme/js/user_validate.js"></script>
<script type="text/javascript">


  function loadUserData(){
    var loader = "loader";
    if(loader){
      $.ajax({
        url:'<?php echo base_url('users/show'); ?>',
        method:"post",
        data:{loader:loader},
        success:function(data){
          var html = "";
          $.each(JSON.parse(data), function (key, value) {
            html += '<tr class="gradeX"><td>'+value.name+'</td><td>'+value.phone+'</td><td>'+value.address+'</td><td>'+value.email+'</td><td>'+value.password+'</td><td><img height="100px" width="100px" src="<?php echo base_url()?>'+value.picture+'"></td><td><button data-toggle="modal" data-target="#editModal" onclick="edit_user('+value.id+')" class=" btn-outline btn-info  dim "><i class="fa fa-edit"></i></button></td><td><button onclick="delete_user('+value.id+')" class=" btn-outline btn-danger  dim "><i class="fa fa-trash"></i></button></td></tr>';
          });
          $("#append_data").html(html);
        }
      });
    }
  }
  loadUserData();
  //single image preview
$("#picture").change(function () {
    filePreview(this);
});
function filePreview(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();
        reader.onload = function (e) {
            $('#image').remove();
            $('#picture').after('<img id="image" src="'+e.target.result+'" width="100" height="100"/>');
        }
        reader.readAsDataURL(input.files[0]);
    }
}
  //single image preview

  function delete_user(id){
    $.ajax({
      url:'<?php echo base_url('users/delete'); ?>',
      method:"post",
      data:{id:id},
      beforeSend:function(){
        return confirm('are you sure?');
      },
      success:function(data){
        if(data.status == 200){
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.success('user data delete');
          loadUserData();
        }
      }
    });
  }

  function edit_user(id){
   $.ajax({
    url:'<?php echo base_url('users/edit_user'); ?>',
    method:"post",
    data:{id:id},
    success:function(data){
      if(data){
        $.each(JSON.parse(data), function (key, value) {
          console.log(data);
         $("#edit_name").val(value.name);
         $("#edit_phone").val(value.phone);
         $("#edit_address").val(value.address);
         $("#edit_email").val(value.email);
         $("#edit_password").val(value.password);
         $("#user_id").val(value.id);
         get_role_id(value.role_id);

       });
      }else{
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.error('id not found');
      }
    }    
  });
 }
</script>

<script>
 $(document).ready(function(){
  user_form = $("#user_create");
  $(document).on("click","#submit",function(){
    if(Valid(user_form)!=false){
      user_form.ajaxForm({
        url: '<?php echo base_url('users/store'); ?>',
        success: function(data) {
          loadUserData();
          if(data.status == 200){
            user_form.animate({
              scrollTop : 0                       
            }, 500);
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.success('Success');
            $("#addModal").modal('hide');
            user_form[0].reset();
            loadUserData();
          }else if(data.status == 400){
           toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.error('email exist');
        }else if(data.status == 600){
         toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.error('Problem in uploading image');
      } 
    }
  });
    }
  });
});
</script>
<script >
 $(document).ready(function(){
  edit_form = $("#user_edit");
  edit_form.ajaxForm({
    url: '<?php echo base_url('users/update'); ?>',
    success: function(data) {
      if(data.status == 200){
        edit_form.animate({
          scrollTop : 0                       
        }, 500);
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.success('Success');
        loadUserData();
      }else if(data.status == 400){
       toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 4000
      };
      toastr.error('email exist');
    }else if(data.status == 600){
     toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 4000
    };
    toastr.error('Problem in uploading image');
  } 
}
});
});

 function get_role_id(role_id){
  if(role_id){
   var data=[{"id":"1","name":"ADMIN"},{"id":"2","name":"MANAGER"},{"id":"3","name":"SALES"}];

   if(data){
    var html = '';
    $.each(JSON.parse(JSON.stringify(data)), function (key, value) {
      var myVariable = (value.id==role_id) ? "selected" : "";
      html+= '<option value= "'+value.id+'"'+myVariable+'>'+value.name+'</option>';
    });
    $('#edit_role_id').html(html);
  }
}
}
</script>

<!-- /page content