
//stock js start

  var stock_table = $('#stock').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
    url:base_url+"stock/show",
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

function delete_stock(stock_id) {
  if(!isNaN(stock_id)){
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 2000
    };
    $.ajax({
      url:base_url+'stock/delete',
      data:{stock_id:stock_id},
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
          stock_table.ajax.reload(null, false);
          toastr.success(data.message);
        }else{
          toastr.error(data.message)
        }
      }
    });
  }
}


var new_stock_add_form = $("#new_stock_add_form");
if(validate_stock_add_form(new_stock_add_form) != false){
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 2000
    };
  new_stock_add_form.ajaxForm({
    url:base_url+'stock/add',
    beforeSend:function(){
      var product_id = new_stock_add_form.find('#product_id').val();
      if(!product_id){
        toastr.error('product not selected');
        return false;
      }
    },
    error:function(jqXHR,exception){
      error_check(jqXHR,exception);
    },
    success:function(data){
      if(data.status == 200){
        $("#add_new_stock").modal('hide');
          stock_table.ajax.reload(null, false);
          toastr.success(data.message);
      }else{
        toastr.error(data.message);
      }
    }
  });
}

function validate_stock_add_form(form){

  $(form).validate({
    errorElement: "div",
    errorPlacement: function(error, element) {
      error.appendTo( element.next(".form-error").html(''));
      return false;
    },
    rules: {
      'product_id': {
        required:true
      },
      'operation': {
        required:true
      },
      'quantity': {
        required:true,
        minlength:1
      },
      'rate': {
        required:true,
        minlength:1
      },
      'remarks': {
        required:true,
      }
    },
    messages:{
      'product_id': {
        required:"select product first"
      },
      'operation': {
        required:"select stock operation"
      },
      'quantity': {
        required:"enter stock quantity",
        minlength:"enter minimum 1 quantity"
      },
      'rate': {
        required:"enter stock rate",
        minlength:"enter minimum rate 1"
      },
      'remarks': {
        required:"enter stock remarks"
      }
    }
  });
}

$(document).ready(function(){
    $('.check_all').on('change',function(e){
        if(this.checked){
            $('.stock_id').each(function(){
                this.checked = true;
            });
        }else{
             $('.stock_id').each(function(){
                this.checked = false;
            });
        }
    });
    
    $('.stock_id').on('change',function(){
        if($('.stock_id:checked').length == $('.check_all').length){
            $('.check_all').prop('checked',true);
        }else{
            $('.check_all').prop('checked',false);
        }
    });
});

function delete_multiple_stock(selector) {
  if($('.stock_id:checked').length == 0){
    toastr.error('woops! no data selected');
  }else{
    var stock_id = [];
    $('.stock_id').each(function(index){
      if(this.checked){
       var id = $(".stock_id")[index].value;
        stock_id.push(id);
      }
    });
    $.ajax({
      url:base_url+'stock/delete',
      data:{stock_id:stock_id},
      method:"post",
      beforeSend:function(){
        return confirm('are you sure to delete the selected item?');
      },
      error:function(jqXHR,exception) {
       error_check(jqXHR,exception);
      },
      success:function(data){
        if(data.status ==200){
          stock_table.ajax.reload(null, false);
          toastr.success(data.message);
        }
      }
    });
  }
}

function edit_stock(stock_id) {
  if(!isNaN(stock_id)){
    $("#stock_id_edit").val(stock_id);
    $.ajax({
      url:base_url+'stock/edit',
      data:{stock_id:stock_id},
      method:'post',
      datatype:'json',
      success:function(data){
        var data = JSON.parse(data);
        type_dropdown(data.type);
        $('#quantity_edit').val(data.quantity);
        $('#rate_edit').val(data.rate);
        $('#remarks_edit').val(data.remarks);
      },
      error:function(jqXHR,exception){
        error_check(jqXHR,exception);
      }
    });
  }
}

function type_dropdown(type) {
  if(!isNaN(type)){
    $.ajax({
      url:base_url+'stock/get_stock_type',
      data:{type:type},
      method:'post',
      success:function(data) {
        var html = '';
        $.each(JSON.parse(data),function(key,value){
          if(value.id == type){
            html+='<option selected value="'+value.id+'">'+value.name+'</option>';
          }else{
            html+='<option value="'+value.id+'">'+value.name+'</option>';
          }
        })
        $('#type_edit').html(html);
      }
    });
  }
}

var stock_edit_form = $('#stock_edit_form');
if(validate_stock_add_form(stock_edit_form) != false){
  stock_edit_form.ajaxForm({
    url:base_url+'stock/update',
    beforeSend:function(){
      if($('#operation_edit').val() == "+"){
        return confirm('did you check everything perfectly? quantity will be PLUS');
      }else if($('#operation_edit').val() == "-"){
        return confirm('did you check everything perfectly? quantity will be MINUS');
      }
    },
    error:function(jqXHR,exception) {
      error_check(jqXHR,exception);
    },
    success:function(data) {
      if(data.status == 200){
        stock_edit_form[0].reset();
        $("#edit_new_stock").modal('hide');
        stock_table.ajax.reload(null, false);
        toastr.success(data.message);
      }else{
        toastr.error(data.message);
      }
    }
  });
}
//stock js end