
var category_list = $('#category_list').DataTable({
  "processing" : false,
  "serverSide" : true,
  "ajax" : {
    url:base_url+"category/show",
    type:"POST"
  },
  dom: 'lBfrtip',
  buttons: [
  {extend: 'copy'},
  {extend: 'csv', title: 'categorylist'},
  {extend: 'excel', title: 'categorylist'},
  {extend: 'pdf', title: 'categorylist'},

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




category_form = $("#caregory_create");
$(document).on("click","#submit",function(){
  if(Valid(category_form)!=false){
    category_form.ajaxForm({
      url: base_url+'/category/store',
      error:function(jqXHR,exception){
        error_check(jqXHR,exception);
      },
      success: function(data) {
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        if(data.status == 200){
          category_form[0].reset();
          category_list.ajax.reload(null,false);
          $("#category_add_modal").modal('hide');
          toastr.success(data.message);
        }else if(data.status == 301){
          toastr.error(data.message);
        }else{
          toastr.error(data);
        } 
      } 
    });
  }
});



function edit_category(category_id){
  window.location = base_url+'category/edit?id='+category_id;
}



edit_category_form = $("#caregory_edit");
$(document).on("click","#submit",function(){
  if(Valid(edit_category_form)!=false){
    edit_category_form.ajaxForm({
      url: base_url+'/category/update',
      error:function(jqXHR,exception){
        error_check(jqXHR,exception);
      },
      success: function(data) {
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        if(data.status == 200){
          toastr.success('Success');
          edit_category_form[0].reset();

        }else if(data.status == 301){
          toastr.error('name exist');
        }else if(data.status == 600){

          toastr.error('Problem in uploading image');
        } 
      }
    });
  }
});


function delete_category(category_id){
  $.ajax({
    url:base_url+'/category/delete',
    method:"post",
    data:{category_id:category_id},
    error:function(jqXHR,exception){
      error_check(jqXHR,exception);
    },
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
        category_list.ajax.reload(null, false);
        toastr.success(data.message);
      }
    }
  });
}



$(document).ready(function(){
  $('.category_select_all').on('change',function(e){
    if(this.checked){
      $('.category_checkbox').each(function(){
        this.checked = true;
      });
    }else{
     $('.category_checkbox').each(function(){
      this.checked = false;
    });
   }
 });

  $(document).on('click','.category_checkbox',function(){
    var single_select = $('.category_checkbox:checked').lengths;
    var multiple_select =$('.category_select_all').length;
    if(single_select == multiple_select){
      $('.category_select_all').prop('checked',true);
    }else{
      $('.category_select_all').prop('checked',false);
    }
  });
});

function delete_multiple_category(selector) {
  if($('.category_checkbox:checked').length == 0){
    toastr.error('woops! no data selected');
  }else{
    var category_id = [];
    $('.category_checkbox').each(function(index){
      if(this.checked){
       var id = $(".category_checkbox")[index].value;
       category_id.push(id);
     }
   });
    $.ajax({
      url:base_url+'category/delete',
      data:{category_id:category_id},
      method:"post",
      beforeSend:function(){
        return confirm('are you sure to delete the selected item?');
      },
      error:function(jqXHR,exception) {
       error_check(jqXHR,exception);
     },
     success:function(data){
      if(data.status == 200){
        category_list.ajax.reload(null, false);
        toastr.success(data.message);
      }
    }
  });
  }
}

function change_category_showhome_status(category_id,selector) {
  var tr = $(selector).closest('tr');
  var show_home = $('.category_status',tr).val();
  if(!isNaN(category_id) && !isNaN(show_home)){
    $.ajax({
      url:base_url+'category/change_category_showhome_status',
      method:"post",
      data:{category_id:category_id,show_home:show_home},
      datatype:'json',
      success:function(data){
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        if(data.status == 200){
          category_list.ajax.reload(null, false);
          toastr.success(data.message);
        }else{
          toastr.error(data.message);
        }
      }
    });
  }
}

$(document).on('change', '#category_image', function () {
  var append_id = $('#category_image_view');
  var imgpreview = DisplayImagePreview(this,append_id);
});

$(document).on('change', '#category_image_edit', function () {
  var append_id = $('#category_image_view_edit');
  var imgpreview = DisplayImagePreview(this,append_id);
});


