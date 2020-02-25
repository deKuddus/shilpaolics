var brand_list = $('#brand_list').DataTable({
    "processing" : false,
    "serverSide" : true,
    "ajax" : {
      url:base_url+"brand/show",
      type:"POST"
    },
    dom: 'lBfrtip',
    buttons: [
    {extend: 'copy'},
    {extend: 'csv', title: 'brandlist'},
    {extend: 'excel', title: 'brandlist'},
    {extend: 'pdf', title: 'brandlist'},

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

  brand_form = $("#brand_create");
  if(Valid(brand_form)!=false){
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 4000
    };
    brand_form.ajaxForm({
      url: base_url+'brand/store',
      success: function(data) {
        if(data.status == 200){
          brand_form[0].reset();
          brand_list.ajax.reload(null,false);
          $("#add_brand_modal").modal('hide');
          toastr.success('Success');
        }else if(data.status == 301){
          toastr.error(data.message);
        }
      }
    });
  }


  function edit_brand(id){
   $.ajax({
    url:base_url+'brand/edit_brand',
    method:"post",
    data:{id:id},
    error:function(jqXHR,exception){
      error_check(jqXHR,exception);
    },
    success:function(data){
      if(data){
        var value = JSON.parse(data);
         $("#edit_brand_name").val(value.name);
         $("#brand_id").val(value.id);
         $("#brand_image_view_edit").attr('src', base_url+value.picture);
      }
    }    
  });
 }



 edit_form = $("#brand_edit");
 if(Valid(edit_form)!=false){
  toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 4000
  };
  edit_form.ajaxForm({
    url: base_url+'/brand/update',
    success: function(data) {
      if(data.status == 200){       
        edit_form[0].reset();
        brand_list.ajax.reload(null,false);
        $("#brand_edit_modal").modal('hide');
        toastr.success(data.message);
      }else if(data.status == 301){
        toastr.error(data.message);
      }else{
        toastr.error(data);
      }
    }
  });
}


function delete_brand(brand_id){
  $.ajax({
    url:base_url+'brand/delete',
    method:"post",
    data:{brand_id:brand_id},
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
        brand_list.ajax.reload(null,false);
        toastr.success(data.message);
      }
    }
  });
}


$(document).on('change', '#brand_image', function () {
  var append_id = $('#brand_image_view');
  var imgpreview = DisplayImagePreview(this,append_id);
});

$(document).on('change', '#brand_image_edit', function () {
  var append_id = $('#brand_image_view_edit');
  var imgpreview = DisplayImagePreview(this,append_id);
});



$(document).ready(function(){
  $('.brand_select_all').on('change',function(e){
    if(this.checked){
      $('.brand_checkbox').each(function(){
        this.checked = true;
      });
    }else{
     $('.brand_checkbox').each(function(){
      this.checked = false;
    });
   }
 });

  $(document).on('click','.brand_checkbox',function(){
    var single_select = $('.brand_checkbox:checked').lengths;
    var multiple_select =$('.brand_select_all').length;
    if(single_select == multiple_select){
      $('.brand_select_all').prop('checked',true);
    }else{
      $('.brand_select_all').prop('checked',false);
    }
  });
});

function delete_multiple_brand(selector) {
  if($('.brand_checkbox:checked').length == 0){
    toastr.error('woops! no data selected');
  }else{
    var brand_id = [];
    $('.brand_checkbox').each(function(index){
      if(this.checked){
       var id = $(".brand_checkbox")[index].value;
       brand_id.push(id);
     }
   });
    $.ajax({
      url:base_url+'brand/delete',
      data:{brand_id:brand_id},
      method:"post",
      beforeSend:function(){
        return confirm('are you sure to delete the selected item?');
      },
      error:function(jqXHR,exception) {
       error_check(jqXHR,exception);
     },
     success:function(data){
      if(data.status ==200){
        brand_list.ajax.reload(null, false);
        toastr.success(data.message);
      }
    }
  });
  }
}