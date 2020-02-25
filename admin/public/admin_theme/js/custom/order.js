
 //load order list start

var order_table =  $('#sales').DataTable({
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
        url:base_url+"order/show",
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

function view_full_invoice(code){
  if(code){
    $.ajax({
      url:base_url+'order/get_order_by_code',
      data:{code:code},
      method:'post',
      datatype:'json',
      // beforeSend:function(){
      //   return confirm('are you sure ?');
      // },
      success:function(data){
        var data = JSON.parse(data);
        var billing_info = JSON.parse(data.guest_details); 
        var shipping_info = JSON.parse(data.shipping_address); 
        $("#from_name").html(billing_info.name);
        $("#from_address").html(billing_info.address+'<br>'+billing_info.zip_code+','+billing_info.city+'<br>'+billing_info.state+','+billing_info.country);
        $("#from_phone").html(billing_info.contact);
        $("#invoice_no").html('#INV'+data.code);
        $("#to_name").html(shipping_info.name);
        $("#to_address").html(shipping_info.address+'<br>'+shipping_info.zip_code+','+shipping_info.city+'<br>'+shipping_info.state+','+shipping_info.country);
        $("#to_phone").html(shipping_info.contact);
        $("#sales_at").html(new Date(data.sales_at));
        var html = "";
        var tax = 0;
        var sub_total = 0;
        $.each(JSON.parse(data.product_details),function(key,value){
          $.each(JSON.parse(JSON.stringify(value)),function(key,value){
            html+= '<tr>';
            html+= '<td>'+value.name+'</td>';
            html+= '<td>'+value.qty+'</td>';
            html+= '<td>'+'$ '+value.price+'</td>';
            html+= '<td>'+'$ '+value.tax+'</td>';
            html+= '<td>'+'$ '+value.sub_total+'</td>';
            tax = tax+value.tax;
            sub_total = sub_total+value.sub_total;
          })
        })
        $("#sub_total").html('$'+sub_total);
        $("#total_tax").html('$'+tax);
        $("#total").html('$'+(tax+sub_total));
        $("#item_list").html(html);
      }
    });
  }
}
function change_delevery_status(code,selector){
  if(code){
    $("#sale_code").val(code);
    $.ajax({
      url:base_url+'order/change_delevery_status',
      data:{code:code,status:status},
      method:'post',
      datatype:'json',
      success:function(data){
        $("#status").html(data);
      }
    });
  }
}

$("#save_status").click(function(){
  var code = $("#sale_code").val();
  var status = $("#status").val();
  if(code && status){
    $.ajax({
      url:base_url+'order/submit_order_status',
      data:{code:code,status:status},
      method:'post',
      datatype:'json',
      beforeSend:function(){
        return confirm("are you sure to submit");
      },
      success:function(data){
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 2000
        };
        if(data.status == 200){
          $("#change_delevery_status").modal('hide');
          toastr.success(data.message);
          order_table.ajax.reload(null,false);
        }else{
          toastr.success('failed to update status');
        }
      }
    });
  }
});

function delete_invocie(code){
  if(code){
    swal({
      title: "Are you sure?",
      text: "Invoice Will be Deleted",
      icon: "warning",
      buttons: [
      'No, cancel it!',
      'Yes, I am sure!'
      ],
      dangerMode: true,
    }).then(function (e) {
      if (e) {
        $.ajax({
          url: base_url + '/order/delete_invoice',
          type: 'POST',
          data: {
            code: code
          },
          success: function (data) {
            if (data.status == 200) {
              swal({
                title: 'Deleted!',
                text: data.message,
                type: 'success',
                confirmButtonClass: "btn btn-success",
                buttonsStyling: false
              }).then(function () {
                location.reload();
              }).catch(swal.noop);
            }
          }
        });
      } else {
        swal("Cancelled", "Invoice keep in record :)", "error");
      }
    });
  }
}
 //load order list end}
