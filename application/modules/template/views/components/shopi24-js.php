
<script>
  function add_to_cart(product_id){
    if(product_id){
      $.ajax({
        url:'<?php echo base_url('cart/add_to_cart_with_default_quantity_1'); ?>',
        method:'post',
        data:{product_id:product_id},
        success:function(data){
          count_cart();
          if(data.status == 201){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.success(data.message);
          }else{
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.error(data.message);
            count_cart();
          }
        }
      });
    }
  }

  count_cart();
  function count_cart(){
    var cart = '<?php echo sizeof($this->cart->contents()); ?>';
    $('.cart-total').html(cart);
  }

  function add_to_cart_with_quantity(product_id){
    var quantity = $("#qty").val();
    if(!isNaN(quantity) && !isNaN(product_id)){
      $.ajax({
        url:'<?php echo base_url('products/add_to_cart_with_user_quantity'); ?>',
        method:'post',
        data:{product_id:product_id,quantity:quantity},
        beforeSend:function(){
          $("#cart_btn").css({"opacity":" 0.1"}); 
          $("#cart_btn").prop('disabled', true);
        },
        success:function(data){
          if(data.status == 201){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.success(data.message);
            setTimeout(function(){ 
             $("#cart_btn").css({"opacity":"1"}); 
             $("#cart_btn").prop('disabled', false); 
           }, 4000);
            count_cart();
          }
        }
      });
    }else{

    }
  }
  show_cart();
  function show_cart() {
    var cart = '';
    var total = 0;
    cart+= '<thead>';
    cart+= ' <tr>';
    cart+= ' <th class="cart_product">Product</th>';
    cart+= '<th>Description</th>';
    cart+= '<th>Avail.</th>';
    cart+= '<th>Unit price</th>';
    cart+= ' <th>Qty</th>';
    cart+= ' <th>Total</th>';
    cart+= ' <th  class="action" id="remove"><i class="fa fa-trash-o"></i></th>';
    cart+= '</tr>';
    cart+= '</thead>';
    $.each(JSON.parse(JSON.stringify(<?php echo json_encode($this->cart->contents());  ?>)),function(key,value){
      cart+= '<tbody>';
      cart+= '<tr>';
     //$.each(JSON.parse(JSON.stringify(value.options),function(key,value){
      cart+= '<td class="cart_product"><a href="#"><img src="<?php echo base_url() ?>'+value.options.image+'" alt="Product"></a></td>';
      cart+= '<td class="cart_description"><p class="product-name"><a href="#">'+value.name;
      cart+= '</td>';
      cart+= '<td class="availability in-stock"><span class="label">In stock</span></td>';
      cart+= '<td class="price"><span>$'+value.price+'</span></td>';
      cart+= '<td class="qty"><input class="form-control input-sm qty_update" type="number"  min="1" value="'+value.qty+'"><input class="row_id" type="hidden" value="'+value.rowid+'"></td>';
      cart+= '<td class="price"><span>$ '+(value.qty*value.price)+'</span></td>';
      cart+= '<td class="action"> <a href="<?php echo base_url('cart/remove/') ?>'+value.rowid+'"><i class="icon-close"></i></a></td>';
      total = total+ (value.qty*value.price);

    });
    cart+= '</tbody>';
    cart+= '<tfoot>';
    cart+= '<tr>';
    cart+= '<td colspan="2" rowspan="2"></td>';
    cart+= '<td colspan="3">Total products (tax incl.)</td>';
    cart+= '<td colspan="2">$'+total+'</td>';
    cart+='</tr>';
    cart+='<tr>';
    cart+='<td colspan="3"><strong>Total</strong></td>';
    cart+='<td colspan="2"><strong>$'+total+'</strong></td>';
    cart+='</tr>';
    cart+='</tfoot>';
    $("#carts").html(cart);

  }

  $(document).on('change','.qty_update',function(){
    let tr = $(this).closest('tr');
    let qty_update = $(this,tr);
    let row_id = $('.row_id',tr);
    qty = parseInt(qty_update.val());
    row_id = row_id.val();
    if(qty && row_id){
     $.ajax({
      url:'<?php echo base_url('cart/update_cart'); ?>',
      method:'post',
      data:{qty:qty,row_id:row_id},
      success:function(data){
        if(data.status == 201){
          // toastr.options = {
          //   closeButton: true,
          //   progressBar: true,
          //   showMethod: 'slideDown',
          //   timeOut: 4000
          // };
          // toastr.success(data.message);
          location.reload();
        }else if(data.status == 202){
          show_cart();
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.error(data.message);
        }
      }
    });
   }
 });
$(document).on('click', '#remove', function (e) {
        e.preventDefault();

  swal({
    title: "Are you sure?",
    text: "All Product Will be removed From Your Cart",
    icon: "warning",
    buttons: [
    'No, cancel it!',
    'Yes, I am sure!'
    ],
    dangerMode: true,
        }).then(function (e) {
          if(e){
            $.ajax({
                url: '<?php echo base_url('cart/remove_all_from_cart') ?>',
                // type: 'POST',
                // data: {
                //     "id": id,
                //     "_token": token,
                //     '_method': 'DELETE',
                // },
                success: function (data) {
                    console.log(data);
                    if (data.status == 200){
                        swal({
                            title: 'Deleted!',
                            text: data.message,
                            type: 'success',
                            confirmButtonClass: "btn btn-success",
                            buttonsStyling: false
                        }).then(function () {
                            location.reload()
                        }).catch(swal.noop);
                    }
                    }
                });
          }else{
            swal("Cancelled", "Your is keeped in your cart :)", "error");
          }

        }).catch(swal.noop);
    });

  // function remove_all_from_cart(){
  //     $.ajax({
  //       url:'<?php echo base_url('cart/remove_all_from_cart'); ?>',
  //       beforeSend:function(){
  //         return confirm('are you sure to Remove All Product From Wihslist?');
  //       },
  //       success:function(data){
  //         if(data.status == 200){
  //           toastr.options = {
  //             closeButton: true,
  //             progressBar: true,
  //             showMethod: 'slideDown',
  //             timeOut: 4000
  //           };
  //           toastr.success(data.message);
  //           setTimeout(function(){
  //             window.location ='<?php echo base_url('wishlist'); ?>';
  //           },500);
  //         }else if(data.status == 404){
  //           toastr.options = {
  //             closeButton: true,
  //             progressBar: true,
  //             showMethod: 'slideDown',
  //             timeOut: 4000
  //           };
  //           toastr.error(data.message);
  //         }
  //       }
  //     });
  // }
  function createProductList(result){

    if(result){
      var html = '';
      $.each(JSON.parse(JSON.stringify(result)),function(key,value){
        html +=' <li class="menu-item depth-1 product menucol-1-3 withimage"> <div class="product-item">  <div class="item-inner">      <div class="product-thumbnail">      <div class="icon-sale-label sale-left">Sale</div>       <div class="pr-img-area"> <a title="Product title here" href="<?php echo base_url('products/details/') ?>'+value.id+'">    <figure> <img class="first-img"  height="250px" width="300px" src="<?php echo base_url(); ?>'+value.feature_image1+'" alt="html theme"> <img class="hover-img" src="<?php echo base_url(); ?>'+value.feature_image2+'""  height="250px" width="300px" alt="html Template"></figure>        </a> </div>         <div class="pr-info-area">   <div class="pr-button">     <div class="mt-button add_to_wishlist"> <a onClick="add_to_wishlist('+value.id+')" > <i class="fa fa-heart"></i> </a> </div>      <div class="mt-button add_to_compare"> <a href="<?php echo base_url('compare'); ?>"> <i class="fa fa-signal"></i> </a> </div>     <div class="mt-button quick-view"> <a  href="<?php echo base_url('products/details/'); ?>'+value.id+'"> <i class="fa fa-search"></i> </a> </div>   </div>          </div>        </div>     <div class="item-info"><div class="info-inner">   <div class="item-title"> <a title="Product title here" href="<?php echo base_url('products/details/'); ?>'+value.id+'">'+value.title+' </a> </div>  <div class="item-content">  <div class="rating"> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> <i class="fa fa-star-o"></i> </div>  <div class="item-price">    <div class="price-box"> <span class="regular-price"> <span class="price">$'+value.sale_price+'</span> </span> </div>   </div>         <div class="pro-action">   <button type="button" class="add-to-cart" onClick = "add_to_cart('+value.id+')" ><span> Add to Cart</span> </button>      </div>         </div>            </div>    </div>            </div>     </div>  </li>';
      });

      $(".products-grid").html(html);
    }
  }


  function add_to_wishlist(product_id){
    if(!isNaN(product_id)){
      $.ajax({
        url:'<?php echo base_url('products/add_to_wishlist'); ?>',
        method:'post',
        data:{product_id:product_id},
        success:function(data){
          if(data.status == 201){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.success(data.message);
          }else if(data.status == 202){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.error(data.message);
          }
        }
      });
    }

  }

  function  remove_from_wihslist_by_id(product_id) {
    if(product_id){
      $.ajax({
        url:'<?php echo base_url('wishlist/remove_from_wihslist_by_id'); ?>',
        method:'post',
        data:{product_id:product_id},
        beforeSend:function(){
          return confirm('are you sure to delete?');
        },
        success:function(data){
          if(data.status == 200){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.success(data.message);
            setTimeout(function(){
              window.location ='<?php echo base_url('wishlist'); ?>';
            },200);
          }else if(data.status == 404){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.error(data.message);
          }
        }
      });
    }
  }


  function remove_all_from_wihslist(param){
    if(param){
      $.ajax({
        url:'<?php echo base_url('wishlist/remove_all_from_wihslist'); ?>',
        beforeSend:function(){
          return confirm('are you sure to delete?');
        },
        success:function(data){
          if(data.status == 200){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.success(data.message);
            setTimeout(function(){
              window.location ='<?php echo base_url('wishlist'); ?>';
            },500);
          }else if(data.status == 404){
            toastr.options = {
              closeButton: true,
              progressBar: true,
              showMethod: 'slideDown',
              timeOut: 4000
            };
            toastr.error(data.message);
          }
        }
      });
    }
  }

  $('.pagination-area').on('click','a',function(e){
   e.preventDefault(); 
   var pageno = $(this).attr('data-ci-pagination-page');
   loadPagination(pageno);
 });

  loadPagination(0);

     // Load pagination
     function loadPagination(pagno){
       $.ajax({
         url: '<?php echo base_url()?>home/get_all_products/'+pagno,
         type: 'get',
         dataType: 'json',
         success: function(response){
          $('.pagination-area').html(response.pagination);
          createProductList(response.result);
        }
      });
     }


     filter_product(0);

     function filter_product(pagno){
      $('.loader').html('<div id="loading" style="" ></div>');
      var action = 'fetch_data';
      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var category = get_filter('category');
      $.ajax({
        url: '<?php echo base_url('products/filter_product/')?>',
        type: 'post',
        data:{pagno:pagno,action:action,minimum_price:minimum_price,maximum_price:maximum_price,category:category},
        dataType: 'json',
        beforeSend:function(){

        },
        success:function(response){
          if(response){
            $('.loader').hide();
            $('.filter').html(response.pagination);
            createProductList(response.result);
          }
        }
      });
    }


    function get_filter(class_name)
    {
      var filter = [];
      $('.'+class_name+':checked').each(function(){
        filter.push($(this).val());
      });
      return filter;
    }

    $(document).on('change','.common_selector',function(){
      filter_product(0);
    });

    $(".slider-range-price").slider({
      range: true,
      min: 0,
      max: 5000,
      values: [0, 5000],
      stop: function (event, ui) {
        $(".amount-range-price").html("Range: $" + ui.values[0] + " - $" + ui.values[1]);
        $('#hidden_minimum_price').val(ui.values[0]);
        $('#hidden_maximum_price').val(ui.values[1]);
        filter_product(0);
      }
    });

    // });

    $(document).ready(function(){
     // Detect pagination click
     $('.filter').on('click','a',function(e){
       e.preventDefault(); 
       var pageno = $(this).attr('data-ci-pagination-page');
       filter_product(pageno);
     });
   });


  $(document).ready(function(){
       $("#chekout_method_parent").click(function(){
         $("#chekout_method_child").toggle("slow");
       });
      $("#continue1").click(function(){

        $("#chekout_method_child").hide("slow");
        $("#billing_child").show( "slow" );
        $("#shipping_child").hide( "slow" );
        $("#shipping_method_child").hide( "slow" );
        $("#payment_child").hide( "slow" );
        $("#order_review_child").hide( "slow" );

      });

      $("#continue2").click(function(){
        var shiping_to_me = ("#ship_to_me");
        var ship_to_another = ("#ship_to_another");
        if($(shiping_to_me).prop("checked")){

          $("#chekout_method_child").hide("slow");
          $("#billing_child").hide( "slow" );
          $("#shipping_method_child").show( "slow" );
          $("#payment_child").hide( "slow" );
          $("#order_review_child").hide( "slow" );
        }else if($(ship_to_another).prop("checked")){

          $("#chekout_method_child").hide("slow");
          $("#billing_child").hide( "slow" );
          $("#shipping_child").show( "slow" );
          $("#shipping_method_child").hide( "slow" );
          $("#payment_child").hide( "slow" );
          $("#order_review_child").hide( "slow" );
        }
      });   

      $("#continue3").click(function(){

        $("#chekout_method_child").hide("slow");
        $("#billing_child").hide( "slow" );
        $("#shipping_child").hide( "slow" );
        $("#shipping_method_child").show( "slow" );
        $("#payment_child").hide( "slow" );
        $("#order_review_child").hide( "slow" );
      }); 


      $("#continue4").click(function(){

        $("#chekout_method_child").hide("slow");
        $("#billing_child").hide( "slow" );
        $("#shipping_child").hide( "slow" );
        $("#shipping_method_child").hide( "slow" );
        $("#payment_child").show( "slow" );
        $("#order_review_child").hide( "slow" );
      }); 

      $("#continue5").click(function(){

        $("#chekout_method_child").hide("slow");
        $("#billing_child").hide( "slow" );
        $("#shipping_child").hide( "slow" );
        $("#shipping_method_child").hide( "slow" );
        $("#payment_child").hide( "slow" );
        $("#order_review_child").show( "slow" );
      }); 


    });

    $(document).ready(function(){
      var ship_to_me = $("#ship_to_me").val();
      var ship_to_another = $("#ship_to_another").val();
      if(ship_to_me){
       $("#shipping_parent").hide();
     }

     $("#ship_to_another").click(function(){
       var ship_to_another = $(this).val();
       if(ship_to_another){
         $("#shipping_parent").show();
       }
     });

     $("#ship_to_me").click(function(){
       var ship_to_another = $(this).val();
       if(ship_to_another){
         $("#shipping_parent").hide();
       }
     });
   });


//customer registration /login
registration_form = $("#customer_registration_form");

if(validateForm(registration_form) != false){
registration_form.ajaxForm({
  url:'<?php echo base_url('register/customer_registration'); ?>',
  success:function(){

  }
});
}
function validateForm(from){

  $(from).validate({
    errorElement: "div",
      errorPlacement: function(error, element) {
        error.appendTo( element.next(".form-error").html(''));
      return false;
    },
    rules: {

      username: {
        required:true,
        minlength:5,
        checkUsername:true
      },
      name: {
        required:true,
        checkFullName:true,
      },
      contact: {
        required:true,
        minlength:11,
        number: true
      },
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6,
        checkPassword:true,
      },
      confirm_password:{
        equalTo:"#password"
      },
      country:{
        required:true
      },
      state:{
        required:true
      },
      zip_code:{
        required:true
      },
      city:{
        required:true
      },
      address:{
        required:true
      }
    },
    messages: {
      username: {
        required:"please enter your username",
        minlength:"username must be greater than or equalto 5 character"
      },
      name: {
        required:"please Enter Your Full Name",
      },
      password: {
        required: "please provide a password",
        minlength: "your password must be at least 5 characters long"
      },
      email: {
        required:"please enter your email",
        email:"provide a valid email"
      },
      contact:{
        required:"please enter your mobile number",
        minlength:"mobile number can not be less than 11 character"
      },
      password:{
        required:"please enter your password",
        minlength:"password must be greater than or equalto 6 characters"
      },
      confirm_password:{
        equalTo:"password does not match"
      },
      country:{
       required:"please select your country",
      },
      state:{
       required:"please select your state",
      },
      zip_code:{
       required:"please enter your Postal Code",
      },
      city:{
       required:"please enter your city",
      },
      address:{
       required:"please enter your address",
      }
    }
  });
}


jQuery.validator.addMethod("checkUsername", function(value, element) {
  return  /^[A-Za-z0-9\d]*$/.test(value) || /\d/.test(value) 
}, "username must contain only letters & number");

jQuery.validator.addMethod("checkFullName", function(value, element) {
  return  /^[A-Za-z]*$/.test(value) 
}, "full name must be only characters");
jQuery.validator.addMethod("checkPassword", function(value, element) {
  return   /^[A-Za-z0-9\d]*$/.test(value) && /\d/.test(value) },"Password should combine number and characters "); // has a digit
 </script>


  