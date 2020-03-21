
var table = $('#product_list').DataTable({
  "processing" : false,
  "serverSide" : true,
  "ajax" : {
    url:base_url+"product/show",
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

$(document).ready(function(){
  $('.product_select_all').on('change',function(e){
    if(this.checked){
      $('.product_checkbox').each(function(){
        this.checked = true;
      });
    }else{
     $('.product_checkbox').each(function(){
      this.checked = false;
    });
   }
 });

  $(document).on('click','.product_checkbox',function(){
    var single_select = $('.product_checkbox:checked').lengths;
    var multiple_select =$('.product_select_all').length;
    if(single_select == multiple_select){
      $('.product_select_all').prop('checked',true);
    }else{
      $('.product_select_all').prop('checked',false);
    }
  });
});

function delete_multiple_product(selector) {
  if($('.product_checkbox:checked').length == 0){
    toastr.error('woops! no data selected');
  }else{
    var product_id = [];
    $('.product_checkbox').each(function(index){
      if(this.checked){
       var id = $(".product_checkbox")[index].value;
       product_id.push(id);
     }
   });
    $.ajax({
      url:base_url+'product/delete?multiple_delete='+1,
      data:{product_id:product_id},
      method:"post",
      beforeSend:function(){
        return confirm('are you sure to delete the selected item?');
      },
      error:function(jqXHR,exception) {
       error_check(jqXHR,exception);
     },
     success:function(data){
      if(data.status ==200){
        table.ajax.reload(null, false);
        toastr.success(data.message);
      }
    }
  });
  }
}
function delete_product(product_id){
  $.ajax({
    url:base_url+'/product/delete',
    method:"post",
    data:{product_id:product_id},
    beforeSend:function(){
      return confirm('are you sure?');
    },
    error:function(jqXHR,exception){
      error_check(jqXHR,exception);
    },
    success:function(data){
      toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 2000
      };
      if(data.status == 200){
        table.ajax.reload(null, false);
        toastr.success(data.message);
      }else{
        toastr.error(data.message);
      }
    }
  });
}

$(document).ready(function(){
  product_form = $("#add_product");
  $(document).on("click","#submit",function(){
    if(validate_product(product_form)!=false){
      product_form.ajaxForm({
        url: base_url+'/product/store',
        success: function(data) {
          if(data.status == 200){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 2000
            };
            toastr.success('Success');
            setTimeout(function(){
              location.reload();
            },2000)
            // loadProducts();
          }else{
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 3000
            };
            toastr.error(data);
          } 
        }
      });
    }
  });
});

$(document).ready(function(){
  product_form_edit = $("#edit_product");
  $(document).on("click","#submit",function(){
    if(validate_product(product_form_edit)!=false){
      product_form_edit.ajaxForm({
        url: base_url+'/product/update',
        success: function(data) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 3000
          };
          if(data.status == 200){
            toastr.success(data.message);
            setTimeout(function(){
              location.reload();                
            },3000)
          }else{
            toastr.error('woops! something went wrong');
          }
        }
      });
    }
  });
});

function validate_product(form){

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
      'category_id': {
        required:true
      },
      'sub_category_id': {
        required:true
      },
      'brand_id': {
        required:true,
      },
      'tag': {
        required:true
      },
      'unit': {
        required:true
      },
      'purchase_price': {
        required:true
      },
      'sale_price': {
        required:true
      },
      'shipping_cost': {
        required:true
      },
      'tax': {
        required:true
      },
      'tax_type': {
        required:true
      }
    },
    messages:{
      'title': {
        required:"enter product title"
      },
      'category_id': {
        required:"select product category"
      },
      'sub_category_id': {
        required:"select product sub category"
      },
      'brand_id': {
        required:"select product brand",
      },
      'tag': {
        required:"select product tag"
      },
      'unit': {
        required:"select product unit"
      },
      'purchase_price': {
        required:"enter product purchase price"
      },
      'sale_price': {
        required:"enter product sale price"
      },
      'shipping_cost': {
        required:"enter product shipping cost"
      },
      'tax': {
        required:"enter product tax rate"
      },
      'tax_type': {
        required:"enter product tax type"
      }
    }
  });
}


$(document).on('change', '#feature_image1', function () {
  var append_id = $('#product_image1');
  var imgpreview = DisplayImagePreview(this,append_id);
});

$(document).on('change', '#feature_image2', function () {
  var append_id = $('#product_image2');
  var imgpreview = DisplayImagePreview(this,append_id);
});



$(document).on('change','#category_id',function(){
  var category_id = $(this).val();
  if(category_id){
    $.ajax({
      url:base_url+'product/get_sub_category',
      data:{category_id:category_id},
      method:"post",
      datatype:"json",
      success:function(data){
        var html = '';
        if(data){
          $.each(JSON.parse(data),function(key,value){
            html+='<option value="'+value.id+'">'+value.category_name+'</option>';
          }) 
          $("#sub_category_id").html(html);
        }
      }
    });
  }
})

$(document).ready(function(){
  var category_id = $('#category_id').val();
  if(category_id){
    $.ajax({
      url:base_url+'product/get_sub_category',
      data:{category_id:category_id},
      method:"post",
      datatype:"json",
      success:function(data){
        var html = '';
        if(data){
          $.each(JSON.parse(data),function(key,value){
            html+='<option value="'+value.id+'">'+value.category_name+'</option>';
          }) 
          $("#sub_category_id").html(html);
        }
      }
    });
  }
});

function change_product_status(product_id,selector){
  var tr = $(selector).closest('tr');
  var status = $(".status",tr).val();
  if(!isNaN(product_id) && !isNaN(status)){
    $.ajax({
      url:base_url+'product/change_status',
      method:"post",
      data:{product_id:product_id,status:status},
      datatype:'json',
      success:function(data){
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        if(data.status == 200){
          toastr.success(data.message);
        }else{
          toastr.error(data.message);
        }
      }
    });
  }
}

///product stock 
function add_product_tostock(product_id,category_id){
  if(!isNaN(product_id)){
    $("#product_id_to_stock").val(product_id);
    $("#product_category_id_to_stock").val(category_id);
  }
}

var quantity_add_form = $("#quantity_add_form");
quantity_add_form.ajaxForm({
  url:base_url+'product/update_quantity_in_product_table',
  beforeSend:function(){
    return confirm('are you sure to add this new quantity');
  },
  success:function(data){
   toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 2000
  };
  if(data.status == 200){
    $("#add_product_tostock").modal('hide');
    $(quantity_add_form).trigger("reset");
    table.ajax.reload(null, false);
    toastr.success(data.message);
  }else if(data.status == 300){
    toastr.error(data.message);
  }else{
    toastr.error('failed to update');
  }
}
});


function add_discount(product_id){
  $("#product_id_to_discount").val(product_id);
  if(!isNaN(product_id)){
    $.ajax({
      url:base_url+'product/get_product_discount_by_id',
      data:{product_id:product_id},
      method:"post",
      datatype:"json",
      error:function(jqXHR,exception){
        error_check(jqXHR,exception);
      },
      success:function(data){
        if(data){
          var data = JSON.parse(data);
          discount_type(data.discount_type);
          $("#discount_rate").val(data.discount);
        }
      }
    });
  }
}
function discount_type(discount_type){
  if(!isNaN(discount_type)){
    $.ajax({
      url:base_url+'product/get_selected_discount_type',
      error:function(jqXHR,exception){
        error_check(jqXHR,exception);
      },
      success:function(data){
        if(data){
          var html = '';
          $.each(JSON.parse(data),function(key,value){
            if(value.id == discount_type){
              html+='<option selected value="'+value.id+'">'+value.symbol+'</option>';
            }else{
              html+='<option value="'+value.id+'">'+value.symbol+'</option>';
            }
          })

          $("#discount_type_to_product").html(html);
        }
      }
    });
  }
}
$('.input-images').imageUploader({

});

$(document).ready(function(){


  $('.product-images').slick({
    dots: true
  });

});


//get product optional image

get_image_optional_image();
function get_image_optional_image(){
  if(product_id_form_edit){
    $.ajax({
      url:base_url+'product/get_image_optional_image',
      method:'post',
      data:{product_id:product_id_form_edit},
      success:function(data){
        if(data){
          $('#optional_image').html(data);
        }
      }
    });
  }
}


function delete_single_image_optional(id) {
  if(!isNaN(id)){
    if(confirm('are you sure to remove this image ?')){
      $.ajax({
        url:base_url+'product/delete_single_image_optional',
        method:'post',
        data:{id:id},
        success:function(data){
          if(data['status'] == 200){
            get_image_optional_image();
          }
        }
      });
    }
  }
}

$(".kuddus").slick({
  dots:true
});

$('.slick_demo_1').slick({
                dots: true
            });