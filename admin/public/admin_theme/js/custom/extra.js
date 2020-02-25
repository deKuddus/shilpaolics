
//discount_on js start

  var discount_on_table = $('#discount_on_list').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:base_url+"setting/discount_on_show",
    type:"POST"
  },
  dom: 'lBfrtip',
  buttons: [
    {extend: 'copy'},
    {extend: 'csv'},
    {extend: 'excel', title: 'ExampleFile'},
    {extend: 'pdf', title: 'ExampleFile'},

    {extend: 'print',
    customize: function (win){
      $(win.document.body).addClass('white-bg');
      $(win.document.body).css('font-size', '10px');

      $(win.document.body).find('table')
      .addClass('compact')
      .css('font-size', 'inherit');
    }
  }
  ],
  "lengthMenu": [ [10, 25, 50,100, -1], [10, 25, 50,100, "All"] ]
});

function delete_discount_on(discount_on_id) {
  if(!isNaN(discount_on_id)){
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 2000
    };
    $.ajax({
      url:base_url+'setting/discount_on_delete',
      data:{discount_on_id:discount_on_id},
      method:'post',
      datatype:'json',
      beforeSend:function(){
        return confirm('are you sure to delete?');
      },
      error:function (jqXHR, exception) {
        error_check(jqXHR,exception);
      },
      success:function (data) {
        if(data.status == 200){
          discount_on_table.ajax.reload(null, false);
          toastr.success(data.message);
        }else{
          toastr.error(data.message)
        }
      }
    });
  }
}


var new_discount_on_add_form = $("#new_discount_on_add_form");
if(validate_discount_on_add_form(new_discount_on_add_form) != false){
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 2000
    };
  new_discount_on_add_form.ajaxForm({
    url:base_url+'setting/discount_on_add',
    error:function(jqXHR,exception){
      error_check(jqXHR,exception);
    },
    success:function(data){
      if(data.status == 200){
        new_discount_on_add_form[0].reset();
        $("#add_new_discount_on").modal('hide');
          discount_on_table.ajax.reload(null, false);
          toastr.success(data.message);
      }else{
        toastr.error(data.message);
      }
    }
  });
}

function validate_discount_on_add_form(form){

  $(form).validate({
    errorElement: "div",
    errorPlacement: function(error, element) {
      error.appendTo( element.next(".form-error").html(''));
      return false;
    },
    rules: {
      'name': {
        required:true
      }
    },
    messages:{
      'name': {
        required:"enter discount on name"
      }
    }
  });
}

$(document).ready(function(){
    $(document).on('change','.check_all_discount_on',function(e){
        if(this.checked){
            $('.discount_on_checkbox').each(function(){
                this.checked = true;
            });
        }else{
             $('.discount_on_checkbox').each(function(){
                this.checked = false;
            });
        }
    });
    
    $(document).on('change','.discount_on_checkbox',function(){
        if($('.discount_on_checkbox:checked').length == $('.check_all_discount_on').length){
            $('.check_all_discount_on').prop('checked',true);
        }else{
            $('.check_all_discount_on').prop('checked',false);
        }
    });
});


function delete_multiple_discount_on(selector) {
  if($('.discount_on_checkbox:checked').length == 0){
    toastr.error('woops! no data selected');
  }else{
    var discount_on_id = [];
    $('.discount_on_checkbox').each(function(index){
      if(this.checked){
       var id = $(".discount_on_checkbox")[index].value;
        discount_on_id.push(id);
      }
    });
    $.ajax({
      url:base_url+'setting/discount_on_delete',
      data:{discount_on_id:discount_on_id},
      method:"post",
      beforeSend:function(){
        return confirm('are you sure to delete the selected item?');
      },
      error:function(jqXHR,exception) {
       error_check(jqXHR,exception);
      },
      success:function(data){
        if(data.status ==200){
          discount_on_table.ajax.reload(null, false);
          toastr.success(data.message);
        }
      }
    });
  }
}

function edit_discount_on(discount_on_id) {
  if(!isNaN(discount_on_id)){
    $.ajax({
      url:base_url+'setting/discount_on_edit',
      data:{discount_on_id:discount_on_id},
      method:'post',
      datatype:'json',
      success:function(data){
        var data = JSON.parse(data);
        type_dropdown(data.type);
        $("#discount_on_id").val(data.id);
        $('#discount_on_title_edit').val(data.title);
        $('#discount_on_url_edit').val(data.url);
        $('#discount_on_description_edit').val(data.description);
        $("#discount_on_image_preview_edit").attr('src', base_url+data.image);
      },
      error:function(jqXHR,exception){
        error_check(jqXHR,exception);
      }
    });
  }
}



var discount_on_edit_form = $('#discount_on_edit_form');
if(validate_discount_on_add_form(discount_on_edit_form) != false){
  discount_on_edit_form.ajaxForm({
    url:base_url+'setting/discount_on_update',
    error:function(jqXHR,exception) {
      error_check(jqXHR,exception);
    },
    success:function(data) {
      if(data.status == 200){
        discount_on_edit_form[0].reset();
        $("#edit_discount_on_modal").modal('hide');
        discount_on_table.ajax.reload(null, false);
        toastr.success(data.message);
      }else{
        toastr.error(data.message);
      }
    }
  });
}

