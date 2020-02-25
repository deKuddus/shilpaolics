//cupon module js start

var cupon_list = $('#cuopn_list').DataTable({
  "processing" : true,
  "serverSide" : true,
  "ajax" : {
    url:base_url+"cupon/show",
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

function validate_cupon_add_form(form){

  $(form).validate({
    errorElement: "div",
    errorPlacement: function(error, element) {
      error.appendTo( element.next(".form-error").html(''));
      return false;
    },
    rules: {
      'title': {
        required:true
      },
      'code': {
        required:true
      },
      'discount_on': {
        required:true
      },
      'discount_type': {
        required:true
      },
      'discount_value': {
        required:true,
        minlength:1
      },
      'till': {
        required:true,
      },
      'valid_till_time':{
        required:true
      },
      'specification': {
        required:true,
      }
    },
    messages:{
      'title': {
        required:"enter cupon title"
      },
      'code': {
        required:"enter cuopn code"
      },
      'discount_on': {
        required:"select discount on",
      },
      'discount_type': {
        required:"select discount type",
      },
      'discount_value': {
        required:"enter discount value"
      },
      'till': {
        required:"validity date",
      },
      'valid_till_time':{
        required:"set time"
      },
      'specification': {
        required:"enter specification"
      }
    }
  });
}

var new_cuopn_add_form = $('#new_cuopn_add_form');
if(validate_cupon_add_form(new_cuopn_add_form) != false){
  new_cuopn_add_form.ajaxForm({
    url:base_url+'cupon/store',
    error:function(jqXHR,exception){
      error_check(jqXHR,exception);
    },
    success:function(data){
      if(data.status == 200){
        cupon_list.ajax.reload(null,false);
        // $('#add_new_cupon').modal('hide');
        // new_cuopn_add_form[0].reset();
        toastr.success(data.message);
      }else{
        toastr.error(data.message);
      }
    }
  });
}

function change_cupon_status(cupon_id,selector){
  var tr = selector.closest('tr');
  var status = $('.cupon_status',tr).val();
  if(!isNaN(cupon_id) && !isNaN(status)){
    $.ajax({
      url:base_url+'cupon/change_cupon_status',
      method:'post',
      data:{cupon_id:cupon_id,status:status},
      datatype:'json',
      success:function(data){
        if(data.status = 200){
          cupon_list.ajax.reload(null,false);
          toastr.success(data.message);
        }
      }
    });
  }
}

function delete_cupon(cupon_id){
  if(!isNaN(cupon_id)){
    $.ajax({
      url:base_url+'cupon/delete',
      method:'post',
      data:{cupon_id:cupon_id},
      datatype:'json',
      beforeSend:function(){
        return confirm('are you sure to delete cupon?');
      },
      success:function(data){
        if(data.status = 200){
          cupon_list.ajax.reload(null,false);
          toastr.success(data.message);
        }
      }
    });
  }
}

$(document).ready(function(){
  $('.cupon_check_all').on('change',function(e){
    if(this.checked){
      $('.cupon_checkbox').each(function(){
        this.checked = true;
      });
    }else{
     $('.cupon_checkbox').each(function(){
      this.checked = false;
    });
   }
 });

  $(document).on('click','.cupon_checkbox',function(){
    var single_select = $('.cupon_checkbox:checked').lengths;
    var multiple_select =$('.cupon_check_all').length;
    if(single_select == multiple_select){
     $('.cupon_check_all').prop('checked',true);
   }else{
    $('.cupon_check_all').prop('checked',false);
  }

});
});


function delete_multiple_cupon(selector) {
  if($('.cupon_checkbox:checked').length == 0){
    toastr.error('woops! no data selected');
  }else{
    var cupon_id = [];
    $('.cupon_checkbox').each(function(index){
      if(this.checked){
       var id = $(".cupon_checkbox")[index].value;
       cupon_id.push(id);
     }
   });
    $.ajax({
      url:base_url+'cupon/delete?multiple_delete='+1,
      data:{cupon_id:cupon_id},
      method:"post",
      beforeSend:function(){
        return confirm('are you sure to delete the selected item?');
      },
      error:function(jqXHR,exception) {
       error_check(jqXHR,exception);
     },
     success:function(data){
      if(data.status ==200){
        cupon_list.ajax.reload(null, false);
        toastr.success(data.message);
      }
    }
  });
  }
}


$('#cuopn_date .input-group.date').datepicker({
  startView: 1,
  todayBtn: "linked",
  keyboardNavigation: false,
  forceParse: false,
  autoclose: true,
  format: "yyyy/mm/dd"
});


function generate_cupon(form) {
  $code = Math.random().toString(36).slice(-10);
  if(form == 'add'){
    $('#new_cuopn_add_form').find($('#code').val($code));
  }else{
    $('#new_cuopn_edit_form').find($('#code_edit').val(''));
    $('#new_cuopn_edit_form').find($('#code_edit').val($code));
  }
}

function edit_cupon(cupon_id) {
 if(!isNaN(cupon_id)){
    $.ajax({
      url:base_url+'cupon/edit?cupon_id='+cupon_id,
      success:function(data){
        var data = JSON.parse(data);
        var till = data.till.split(' ');
        var res_date = replace_slashes(till[0]);
        $('#new_cuopn_edit_form').find($("#cupon_id_edit").val(data.id));
        $('#new_cuopn_edit_form').find($("#title_edit").val(data.title));
        $('#new_cuopn_edit_form').find($("#code_edit").val(data.code));
        discount_on(data.discount_on);
        discount_type(data.discount_type);
        $('#new_cuopn_edit_form').find($("#discount_value_edit").val(data.discount_value));
        $('#new_cuopn_edit_form').find($("#valid_till_edit").val(res_date));
        $('#new_cuopn_edit_form').find($("#valid_till_time_edit").val(till[1]));
        $('#new_cuopn_edit_form').find($("#specification_edit").val(data.specification));
      }
    });
  }
}

function replace_slashes(date){
  var mapObj = {'/':"-"};
 var re = new RegExp(Object.keys(mapObj).join("|"),"gi");
  return str = date.replace(re, function(matched){
    return mapObj[matched];
  });
}

function discount_on(discount_on){
  if(!isNaN(discount_on)){
    $.ajax({
      url:base_url+'cupon/discount_on',
      success:function(data){
        var html = '';
        $.each(JSON.parse(data),function(key,value){
          if(value.id == discount_on){
            html+='<option selected value="'+value.id+'">'+value.name+'</option>';
          }else{
            html+='<option value="'+value.id+'">'+value.name+'</option>';
          }
        });
         $('#new_cuopn_edit_form').find($("#discount_on_edit").html(html));
      }     
    });
  }
}

function discount_type(discount_type){
  if(!isNaN(discount_type)){
    $.ajax({
      url:base_url+'cupon/discount_type',
      success:function(data){
        var html = '';
        $.each(JSON.parse(data),function(key,value){
          if(value.id == discount_type){
            html+='<option selected value="'+value.id+'">'+value.symbol+'</option>';
          }else{
            html+='<option value="'+value.id+'">'+value.symbol+'</option>';
          }
        });
        $('#new_cuopn_edit_form').find($("#discount_type_edit").html(html));
      }     
    });
  }
}

var new_cuopn_edit_form = $('#new_cuopn_edit_form');
if(validate_cupon_add_form(new_cuopn_edit_form) != false){
  new_cuopn_edit_form.ajaxForm({
    url:base_url+'cupon/update',
    error:function(jqXHR,exception){
      error_check(jqXHR,exception);
    },
    success:function(data){
      if(data.status == 200){
        cupon_list.ajax.reload(null,false);
        $('#edit_cupon_modal').modal('hide');
        new_cuopn_edit_form[0].reset();
        toastr.success(data.message);
      }else{
        toastr.error(data.message);
      }
    }
  });
}