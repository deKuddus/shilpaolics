//count cart start
count_cart();

function count_cart() {
  $.ajax({
    url: base_url + 'cart/count_cart',
    success: function (cart) {
      $('.cart_quantity').html(cart);
    }
  });
}
//count cart end


//load full cart start
show_cart();

function show_cart() {
  $.ajax({
    url: base_url + 'cart/contents',
    success: function (cartData) {
      miniCart(cartData.cart);
      if(cartData.cart != 'null'){
        var cart = '';
        var cart_total = '';
        var total = 0;
        var vat = 0;
        var in_total = 0;
        cart += '<thead>';
        cart += ' <tr>';
        cart += '<th scope="col"><i id="remove" class="icofont-ui-delete"></i></th>';
        cart += ' <th scope="col">Image</th>';
        cart += ' <th scope="col">Product</th>';
        cart += ' <th scope="col">Unit Price</th>';
        cart += '<th scope="col">Quantity</th>';
        cart += ' <th scope="col">Total</th>';
        cart += '</tr>';
        cart += ' </thead>';
        cart += '<tbody>';
        $.each(JSON.parse(JSON.stringify(cartData.cart)), function (key, value) {

          if (!value.title) {

            total = total + (value.qty * value.price);
            vat = (!isNaN(value.vat)?(parseFloat(vat)+parseFloat(value.vat)):0);
            in_total = (total+vat+parseFloat(shiping_charge));
            if(in_total > free_shiping){
              shiping_charge = 0;
            }
            cart += '<tr>';
            cart += '<th scope="row" class = "single_remove" style="cursor:pointer;">';
            cart += '<i class="icofont-close"></i>';
            cart += '</th>';
            cart += '<td>';
            cart += '<img src="' + image_url + '/' + value.image + '" alt="Product Image">';
            cart += '</td>';
            cart += '<td>';
            cart += '<a href="#">'+ value.name +'</a>';
            cart += '</td>';
            cart += '<td>$' + value.price + '</td>';
            cart += '<td>';
            cart += '<div class="quantity">';
            cart += '<input type="number" class="qty-text qty_update" id="qty2" step="1" min="1" max="99" value="'+value.qty+'">';
            cart += ' <input class="row_id" type="hidden" value="' + value.rowid + '">';
            cart += ' </div>';
            cart += ' </td>';
            cart += ' <td>$' + (value.qty * value.price) + '</td>';
            cart += '  </tr>';

          }else{
             cart += '<tr><td colspan="6">No Product Available into Cart</td></tr>';
          }
        });
        cart += '</tbody>';
        cart_total += '<tbody>';
        cart_total += ' <tr>';
        cart_total += '<td>Sub Total</td>';
        cart_total += '<td>$'+total+'</td>';
        cart_total += ' </tr>';
        cart_total += ' <tr>';
        cart_total += ' <td>Shipping</td>';
        cart_total += ' <td>$'+shiping_charge+'</td>';
        cart_total += ' </tr>';
        cart_total += ' <tr>';
        cart_total += '<td>VAT</td>';
        cart_total += ' <td>$'+vat+'</td>';
        cart_total += ' </tr>';
        cart_total += ' <tr>';
        if(cartData.coupon){
          cart_total += ' <tr>';
          cart_total += '<td>Applied Coupon</td>';
          cart_total += ' <td>'+cartData.coupon.code+'</td>';
          cart_total += ' </tr>';
          cart_total += ' <tr>';
          cart_total += '<td>Coupon Amount</td>';
          cart_total += ' <td>'+cartData.coupon.amount+'</td>';
          cart_total += ' </tr>';
          cart_total += ' <tr>';
          cart_total += '<td>Total</td>';
          cart_total += ' <td>$'+(in_total- cartData.coupon.amount)+'</td>';
          cart_total += '</tr>';
        }else{
          cart_total += ' <tr>';
        cart_total += '<td>Total</td>';
        cart_total += ' <td>$'+in_total+'</td>';
        cart_total += '</tr>';
        }
        cart_total += '</tbody>';
        $('#cart_total').html(cart_total);
        $("#carts").html(cart);
      }else{
        cart += '<thead>';
        cart += ' <tr>';
        cart += '<th scope="col"><i id="remove" class="icofont-ui-delete"></i></th>';
        cart += ' <th scope="col">Image</th>';
        cart += ' <th scope="col">Product</th>';
        cart += ' <th scope="col">Unit Price</th>';
        cart += '<th scope="col">Quantity</th>';
        cart += ' <th scope="col">Total</th>';
        cart += '</tr>';
        cart += ' </thead>';
        cart += '<tbody>';
        cart += '<tr>';
        cart += '<td colspan="6">No Product Available Into cart. <a href="'+base_url+'home">Shop some Item </a></td>';
        cart += '</tr>';
        cart += '</tbody>';
        cart_total += '<tbody>';
        cart_total += ' <tr>';
        cart_total += '<td>Sub Total</td>';
        cart_total += '<td>$'+0+'</td>';
        cart_total += ' </tr>';
        cart_total += ' <tr>';
        cart_total += ' <td>Shipping</td>';
        cart_total += ' <td>$'+shiping_charge+'</td>';
        cart_total += ' </tr>';
        cart_total += ' <tr>';
        cart_total += '<td>VAT</td>';
        cart_total += ' <td>$'+0+'</td>';
        cart_total += ' </tr>';
        cart_total += ' <tr>';
        cart_total += '<td>Total</td>';
        cart_total += ' <td>$'+0+'</td>';
        cart_total += '</tr>';
        cart_total += '</tbody>';
        $('#cart_total').html(cart_total);
        $("#carts").html(cart);
      }
    }
  });
}
//load full cart end

//cart update start
$(document).on('change', '.qty_update', function () {
  let tr = $(this).closest('tr');
  let qty_update = $(this, tr);
  let row_id = $('.row_id', tr);
  qty = parseInt(qty_update.val());
  row_id = row_id.val();
  if (qty && row_id) {
    $.ajax({
      url: base_url + '/cart/update_cart',
      method: 'post',
      data: {
        qty: qty,
        row_id: row_id
      },
      success: function (data) {
        if (data.status == 201) {
          show_cart();
          count_cart();
        } else if (data.status == 202) {
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
//cart update end


//product add , remove in cart start


function add_to_cart(product_id) {
  if (product_id) {
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 2000
    };
    $.ajax({
      url: base_url + 'cart/add_to_cart',
      method: 'post',
      data: {
        product_id: product_id,
      },
      success: function (data) {
        count_cart();
        show_cart();
        if (data.status == 201) {
          toastr.success(data.message);
        } else {
          toastr.error(data.message);
          count_cart();
        }
      }
    });
  }
}

function add_to_cart_with_quantity(product_id) {
  var quantity = $("#qty").val();
  var size = $('input[name=size]:checked').val();
  var color = $('input[name=color]:checked').val();

  if (!isNaN(quantity) && !isNaN(product_id)) {
    $.ajax({
      url: base_url + '/cart/add_to_cart',
      method: 'post',
      data: {
        product_id: product_id,
        quantity: quantity,
        size:size,
        color:color
      },
      beforeSend: function () {
        $("#cart_btn").css({
          "opacity": " 0.1"
        });
        $("#cart_btn").prop('disabled', true);
      },
      success: function (data) {
        show_cart();
        if (data.status == 201) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          count_cart();
          toastr.success(data.message);
          setTimeout(function () {
            $("#cart_btn").css({
              "opacity": "1"
            });
            $("#cart_btn").prop('disabled', false);
          }, 4000);
          count_cart();
        }
      }
    });
  }
}

$(document).on('click', '.single_remove', function (e) {
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
    if (e) {
      let tr = $('.single_remove').closest('tr');
      let row_id = $('.row_id', tr);
      row_id = row_id.val();
      $.ajax({
        url: base_url + '/cart/remove_from_cart_by_row_id',
        type: 'POST',
        data: {
          row_id: row_id
        },
        success: function (data) {
          console.log(data);
          if (data.status == 200) {
            swal({
              title: 'Deleted!',
              text: data.message,
              type: 'success',
              confirmButtonClass: "btn btn-success",
              buttonsStyling: false
            }).then(function () {
              show_cart();
              count_cart();
            }).catch(swal.noop);
          }
        }
      });
    } else {
      swal("Cancelled", "Product is keeped in your cart :)", "error");
    }
  });
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
    if (e) {
      $.ajax({
        url: base_url + '/cart/remove_all_from_cart',
        success: function (data) {
          console.log(data);
          if (data.status == 200) {
            swal({
              title: 'Deleted!',
              text: data.message,
              type: 'success',
              confirmButtonClass: "btn btn-success",
              buttonsStyling: false
            }).then(function () {
              show_cart();
              count_cart();
            }).catch(swal.noop);
          }
        }
      });
    } else {
      swal("Cancelled", "Product is keeped in your cart :)", "error");
    }
  });
});
//product add , remove in cart end


//load header mini cart start


function miniCart(cartData) {

      var html = '';
      var total  = 0;
      if (cartData != 'null') {
        html+='<ul class="cart-list">';
        $.each(JSON.parse(JSON.stringify(cartData)), function (key, value) {

            html += '<li>';
            html += '<div class="cart-item-desc">';
            html += ' <a href="#" class="image">';
            html += '  <img src="' + image_url + '/' + value.image + '" class="cart-thumb" alt="">';
            html += ' </a>';
            html += ' <div>';
            html += '   <a href="' + image_url + '"product/details/"' + value.id + '">'+ value.name + '</a>';
            html += ' <p>'+ value.qty +' x - <span class="price">$'+value.price+'</span></p>';
            html += '</div>';
            html += '</div>';
            html += '<span class="dropdown-product-remove"><i class="icofont-bin"></i></span>';
            html += '</li>';
            total = total+value.price;
        });

        html += '</ul>';
        html += '<div class="cart-pricing my-4">';
        html += ' <ul>';
        html += '<li>';
        html += ' <span>Total:</span>';
        html += '<span>$'+total+'</span>';
        html += '</li>';
        html += '</ul>';
        html += ' </div>';
        html += '<div class="cart-box">';
        html += '<a href="'+base_url+'checkout'+'" class="btn btn-primary d-block">Checkout</a>';
        html += '</div>';

        $(".cart-dropdown-content").html(html);
      }else{
        html+='<ul class="cart-list">';
        html+='<li>';
        html+='<p class="text-center">No Item In Your Cart (-_-) </p>';
        html+='</li>';
        html += '</ul>';
         $(".cart-dropdown-content").html(html);
      }
}
//load header mini cart end

//product list rendering dynamically start
function createProductList(result) {
  if(result){
    var html = '';
    $.each(JSON.parse(result),function(key,product){
      html+='<div class="col-9 col-sm-12 col-md-6 col-lg-4">';
      html+='<div class="single-product-area mb-30">';
      html+='<div class="product_image">';
      html+='<img class="normal_img" src="'+image_url+'/'+product.feature_image1+'" alt="product image ">';
      html+='<img class="hover_img" src="'+image_url+'/'+product.feature_image2+'" alt="product image">';
      html+='<div class="product_badge">';
      html+='<span>'+(product.is_active == 1)?+'new':+'old'+'</span>';
      html+='</div>';
      html+='<div class="product_wishlist">';
      html+='<a href="#" onclick="add_to_wishlist('+product.id+')"><i class="icofont-heart"></i></a>';
      html+='</div>';
      html+='<div class="product_compare">';
      html+='<a href="#" onclick="add_to_compare('+product.id+')"><i class="icofont-exchange"></i></a>';
      html+='</div>';
      html+='</div>';
      html+='<div class="product_description">';
      html+='<div class="product_add_to_cart">';
      html+='<a href="#" onclick="add_to_cart('+product.id+')"><i class="icofont-shopping-cart"></i> Add to Cart</a>';
      html+='</div>';
      html+='<div class="product_quick_view">';
      html+='<a href="#" onclick="product_quick_view('+product.id+')" data-toggle="modal" data-target="#quickview"><i class="icofont-eye-alt"></i> Quick View</a>';
      html+='</div>';
      html+='<a href="#">'+product.title+'</a>';
      html+='<h6 class="product-price">';
      html+='<span>$'+price+'</span>';
      html+='</h6>';
      html+='</div>';
      html+='</div>';
      html+='</div>';
    });
    $('.product_area').html(html);
  }

}
//product list rendering dynamically end


// compare start

function add_to_compare(product_id) {
  if (!isNaN(product_id)) {
    $.ajax({
      url: base_url + 'compare/add_to_compare',
      method: 'post',
      data: {
        product_id: product_id
      },
      success: function (data) {
        if (data.status == 200) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1000
          };
          toastr.success(data.message);
        } else if (data.status == 202) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1000
          };
          toastr.error(data.message);
        } else if (data.status == 203) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 1000
          };
          toastr.error(data.message);
        }
      }
    });
  }
}

function remove_from_compare(index) {

  if (!isNaN(index)) {
    $.ajax({
      url: base_url + '/compare/remove_from_compare',
      method: 'post',
      data: {
        index: index
      },
      beforeSend: function () {
        return confirm('sure?');
      },
      success: function (data) {
        if (data.status == 200) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.success(data.message);
          location.reload();
        }
      }
    });
  }
}

//compare end


//wish list product add, remove start
function add_to_wishlist(product_id) {
  if (!isNaN(product_id)) {
    $.ajax({
      url: base_url + '/wishlist/add_to_wishlist',
      method: 'post',
      data: {
        product_id: product_id
      },
      success: function (data) {
        if (data.status == 201) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.success(data.message);
        } else if (data.status == 202) {
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

function remove_from_wihslist_by_id(product_id) {
  if (product_id) {
    $.ajax({
      url: base_url + '/wishlist/remove_from_wihslist_by_id',
      method: 'post',
      data: {
        product_id: product_id
      },
      beforeSend: function () {
        return confirm('are you sure to delete?');
      },
      success: function (data) {
        if (data.status == 200) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.success(data.message);
          setTimeout(function () {
            window.location = base_url + '/wishlist';
          }, 200);
        } else if (data.status == 404) {
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

function remove_all_from_wihslist(param) {
  if (param) {
    $.ajax({
      url: base_url + '/wishlist/remove_all_from_wihslist',
      beforeSend: function () {
        return confirm('are you sure to delete?');
      },
      success: function (data) {
        if (data.status == 200) {
          toastr.options = {
            closeButton: true,
            progressBar: true,
            showMethod: 'slideDown',
            timeOut: 4000
          };
          toastr.success(data.message);
          setTimeout(function () {
            window.location = base_url + '/wishlist';
          }, 500);
        } else if (data.status == 404) {
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
//wish list product add, remove end


//pagination start
// $('.pagination-areas').on('click', 'a', function (e) {
//   e.preventDefault();
//   var pageno = $(this).attr('data-ci-pagination-page');
//   loadPagination(pageno);
// });

// loadPagination(0);

// function loadPagination(pagno) {
//   $.ajax({
//     url: base_url + '/home/get_all_products/' + pagno,
//     type: 'get',
//     dataType: 'json',
//     success: function (response) {
//       $('.pagination-areas').html(response.pagination);
//       createProductList(response.result);
//     }
//   });
// }
//pagination end


//filter product start
//filter_product(0);



$(document).ready(function () {
  // Detect pagination click
  $('.pagination-areas').on('click', 'a', function (e) {
    e.preventDefault();
    var pageno = $(this).attr('data-ci-pagination-page');
    filter_product(pageno);
  });
});
//filter product end

//checkout area start

$("#chekout_method_parent").click(function () {
  $("#chekout_method_child").toggle("slow");
});
$("#continue1").click(function (e) {
  e.preventDefault();

  var guest = $("#guest");
  var register = $("#register");
  if ((guest.is(':checked') || register.is(':checked') || is_loggedin) && cart != 0) {
    $('#chekout_method_parent').removeClass( "active" ).addClass('complated');
    $('#billing_parent').addClass('active');
    $("#chekout_method_child,#shipping_child,#shipping_method_child,#payment_child,#order_review_child").hide();
    $("#billing_child").show("slow");
  } else {
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 3000
    };
    toastr.warning("Woops! maybe you did not select checkout method  Or your cart is empty");
  }
});

$(document).on('change','#ship_to',function(e){
  if($(this).is(":checked") && $(this).val() == 1){
    $('#shipping_child').show('slow');
  }else{
    $('#shipping_child').hide('slow');
  }
});


$(document).on('click', '#continue2', function (e) {
  e.preventDefault();
  if(check_billing_empty_or_not() != false){
    if($("#ship_to").is(":checked") && $("#ship_to").val() == 1){
      if(check_shipping_address_empty_or_not() != false){
        $('#chekout_method_parent').removeClass( "active" ).addClass('complated');
        $('#billing_parent').removeClass( "active" ).addClass('complated');
        $('#shipping_method_parrent').addClass('active');
        $("#billing_child,#chekout_method_child,#shipping_child,#payment_child,#order_review_child").hide();
        $("#shipping_method_child").show("slow");
      }
    }else{
      $('#chekout_method_parent').removeClass( "active" ).addClass('complated');
      $('#billing_parent').removeClass( "active" ).addClass('complated');
      $('#shipping_method_parrent').addClass('active');
      $("#billing_child,#chekout_method_child,#shipping_child,#payment_child,#order_review_child").hide();
      $("#shipping_method_child").show("slow");
    }
  }
});

$("#continue3").click(function (e) {
  e.preventDefault();
  var flat_shipping = $("#flat_shipping").val();
  if (flat_shipping) {
    $('#chekout_method_parent').removeClass( "active" ).addClass('complated');
    $('#billing_parent').removeClass( "active" ).addClass('complated');
    $('#shipping_method_parrent').removeClass('active').addClass('complated');
    $('#payment_parent').addClass('active');
    $("#billing_child,#chekout_method_child,#shipping_child,#shipping_method_child,#order_review_child").hide();
    $("#payment_child").show("slow");
  }else{
    return false;
  }
});


$("#continue4").click(function (e) {
  e.preventDefault();
    $("#billing_child,#chekout_method_child,#payment_child,#shipping_child,#shipping_method_child,#payment_child").hide();
    $('#chekout_method_parent,#billing_parent,#shipping_method_parrent,#payment_parent').removeClass( "active" ).addClass('complated');
    $('#order_review_parent').addClass('active');
    $("#order_review_child").show("slow");
});


$("#back_to1").click(function (e) {
 e.preventDefault();
 $('#billing_parent,#shipping_method_parrent,#payment_parent,#order_review_parent').removeClass( "active" ).removeClass('complated');
 $('#chekout_method_parent').removeClass( "complated" ).addClass('active');
 $("#billing_child,#order_review_child,#shipping_child,#shipping_method_child,#payment_child").hide();
 $('#chekout_method_child').show('slow');
});

$("#back_to2").click(function (e) {
 e.preventDefault();
  if($('#ship_to').is(":checked") && $('#ship_to').val() == 1){
     $('#shipping_method_parrent,#payment_parent,#order_review_parent').removeClass( "active" ).removeClass('complated');
     $('#billing_parent').removeClass( "complated" ).addClass('active');
     $("#chekout_method_child,#order_review_child,#shipping_child,#shipping_method_child,#payment_child").hide();
     $('#billing_child').show('slow');
     $('#shipping_child').show('slow');
  }else{
    $('#shipping_method_parrent,#payment_parent,#order_review_parent').removeClass( "active" ).removeClass('complated');
    $('#billing_parent').removeClass( "complated" ).addClass('active');
    $("#chekout_method_child,#order_review_child,#shipping_child,#shipping_method_child,#payment_child").hide();
    $('#billing_child').show('slow');
  }
});

$("#back_to3").click(function (e) {
   e.preventDefault();
 $('#payment_parent,#order_review_parent').removeClass( "active" ).removeClass('complated');
   $('#shipping_method_parrent').removeClass( "complated" ).addClass('active');
  $("#chekout_method_child,#order_review_child,#payment_child,#shipping_method_child,#billing_child").hide();
  $('#shipping_method_child').show('slow');
});

$("#back_to4").click(function (e) {
   e.preventDefault();
 $('#order_review_parent').removeClass( "active" ).removeClass('complated');
   $('#payment_parent').removeClass( "complated" ).addClass('active');
  $("#chekout_method_child,#order_review_child,#shipping_child,#shipping_method_child,#billing_child").hide();
  $('#payment_child').show('slow');
});


// $(document).on('change', '#customer_state', function () {
//   $("#continue2").prop('disabled', false);
// });

var checkout_form = $("#checkout");

checkout_form.ajaxForm({
  url: base_url + 'checkout/proceed_to_checkout',
  beforeSend: function () {
    if (cart == 0) {
      toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
      };
      toastr.error("your cart is empty, add product to your cart first");
      return false;
    } else {
      if (validate_form() != false) {
        return true;
      }
    }
  },
  success: function (data) {
      toastr.options = {
        closeButton: true,
        progressBar: true,
        showMethod: 'slideDown',
        timeOut: 3000
      };
    if (data.status == 600) {
      checkout_form[0].reset();
      toastr.success(data.message);
      setTimeout(function () {
        window.location = base_url + 'home';
      }, 3000);
    } else {
      toastr.error(data.message);
    }
  }
});

function check_billing_empty_or_not()
{

  var error = [];
  if($("#guest").is(":checked")){
    if($('#ship_to').is(":checked") && $('#ship_to').val() == 1){
      $(".billing").each(function(index){
             var value = $('.billing')[index].value;
      if(index == 6 || index == 7 || index == 8 ){

      }else{
        if(!value){
          alert(index);
          nFilter = $('.billing')[index];
          setStyle(nFilter, 'border:1px solid red');
          error.push('error');
        }
      }
      });
    }else{
     $(".billing").each(function(index){
      var value = $('.billing')[index].value;
      if(index == 6 || index == 7 || index == 8 ){

      }else{
        if(!value){
          alert(index);
          nFilter = $('.billing')[index];
          setStyle(nFilter, 'border:1px solid red');
          error.push('error');
        }
      }
    });
   }
}else if($("#register").is(":checked")){
      if($('#ship_to').is(":checked") && $('#ship_to').val() == 1){
      $(".billing").each(function(index){
        var value = $('.billing')[index].value;
        if(!value){
          nFilter = $('.billing')[index];
          setStyle(nFilter, 'border:1px solid red');
          error.push('error');
        }
      });
    }else{
     $(".billing").each(function(index){
      var value = $('.billing')[index].value;
      if(!value){
        nFilter = $('.billing')[index];
        setStyle(nFilter, 'border:1px solid red');
        error.push('error');
      }
    });
   }
}

  if(error.length != 0){
    toastr.options = {
      closeButton:true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 2000

    };
    console.log(error);
    toastr.error('please fill up billing information');
    return false;
  }
}

function check_shipping_address_empty_or_not()
{
  var error = [];
  $(".shipping").each(function(index){
    if($('.shipping')[index].value == ""){
      nFilter = $('.shipping')[index];
      setStyle(nFilter, 'border:1px solid red');
      error.push('error');
    }
  });
  if(error.length != 0){
    toastr.options = {
      closeButton:true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 2000

    };
    toastr.error('please fill up Shipping information');
    return false;
  }
}

function setStyle(el, css){
  el.setAttribute('style', el.getAttribute('style') + ';' + css);
}




function destory_from_cart() {
  $.ajax({
    url: base_url + '/cart/remove_all_from_cart',
    success: function () {
      return true;
    }
  });
}



function validate_form() {
  toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 4000
  };
  var customer_name = $("#customer_name").val();
  var customer_email = $("#customer_email").val();
  var customer_contact = $("#customer_contact").val();
  var customer_city = $("#customer_city").val();
  var customer_address = $("#customer_address").val();
  var customer_zip_code = $("#customer_zip_code").val();
  var customer_country = $("#customer_name").val();
  var customer_state = $("#customer_state").val();
  var customer_password = $("#customer_password").val();
  var customer_confirm_password = $("#customer_confirm_password").val();
  var payment_method = $("#payment_method").val();
  var checkout_type = $("#checkout_type").val();
  var ship_to = $("#ship_to").val();
  if (!customer_name) {
    toastr.error('enter your name');
    return false;
  }
  if (!customer_email) {
    toastr.error('enter your email');
    return false;
  }
  if (!customer_contact) {
    toastr.error('enter your mobile number');
    return false;
  }
  if (!customer_city) {
    toastr.error('enter your city');
    return false;
  }
  if (!customer_address) {
    toastr.error('enter your address');
    return false;
  }
  if (!customer_zip_code) {
    toastr.error('enter your zip code');
    return false;
  }
  if (!customer_country) {
    toastr.error('select your country');
    return false;
  }
  if (!customer_state) {
    toastr.error('select your state');
    return false;
  }
  if (checkout_type && checkout_type == "register") {
    if (!customer_password) {
      toastr.error('enter your password');
      return false;
    }
    if (customer_password != customer_confirm_password) {
      toastr.error('password did not match');
      return false;
    }
  }

}
//validate customer form if he/ she is  guest or inpput is empty , end
//checkout area end

//where to ship toggle start
$(document).ready(function () {
  var ship_to_me = $("#ship_to_me").val();
  var ship_to_another = $("#ship_to_another").val();
  if (ship_to_me) {
    $("#shipping_parent").hide();
  }

  $("#ship_to_another").click(function () {
    var ship_to_another = $(this).val();
    if (ship_to_another) {
      $("#shipping_parent").show();
    }
  });

  $("#ship_to_me").click(function () {
    var ship_to_another = $(this).val();
    if (ship_to_another) {
      $("#shipping_parent").hide();
    }
  });
});
//where to ship toggle end

//customer registration /login
registration_form = $("#customer_registration_form");

if (validateRegistrationForm(registration_form) != false) {
  registration_form.ajaxForm({
    url: base_url + 'register/customer_registration',
    success: function (data) {
      if (data.status == 200) {
        $("#username_availability").hide();
        $("#email_availability").hide();
        registration_form[0].reset();
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.success(data.message);
        //swal('Success','Registration Success :) Please Login Now','success');
      } else if (data.status == 202) {
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.error(data.message);
      } else if (data.status == 203) {
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

function validateRegistrationForm(form) {

  $(form).validate({
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.appendTo(element.next(".form-error").html(''));
      return false;
    },
    rules: {

      username: {
        required: true,
        minlength: 5,
        checkUsername: true
      },
      name: {
        required: true,
      },
      contact: {
        required: true,
        minlength: 11,
        number: true
      },
      email: {
        required: true,
        email: true
      },
      password: {
        required: true,
        minlength: 6,
        checkPassword: true,
      },
      confirm_password: {
        equalTo: "#password"
      },
      country: {
        required: true
      },
      state: {
        required: true
      },
      zip_code: {
        required: true
      },
      city: {
        required: true
      },
      address: {
        required: true
      }
    },
    messages: {
      username: {
        required: "please enter your username",
        minlength: "username must be greater than or equal to 5 character"
      },
      name: {
        required: "please enter your full name",
      },
      password: {
        required: "please provide a password",
        minlength: "your password must be at least 5 characters long"
      },
      email: {
        required: "please enter your email",
        email: "provide a valid email"
      },
      contact: {
        required: "please enter your mobile number",
        minlength: "mobile number can not be less than 11 character"
      },
      password: {
        required: "please enter your password",
        minlength: "password must be greater than or equal to 6 characters"
      },
      confirm_password: {
        equalTo: "password does not match"
      },
      country: {
        required: "please select your country",
      },
      state: {
        required: "please select your state",
      },
      zip_code: {
        required: "please enter your Postal Code",
      },
      city: {
        required: "please enter your city",
      },
      address: {
        required: "please enter your address",
      }
    }
  });
}


customer_login_form = $("#customer_login_form");
customer_login_form2 = $("#customer_login_form2");

if (validateLoginForm(customer_login_form) != false) {
  customer_login_form.ajaxForm({
    url: base_url + 'login/customer_login',
    beforeSend: function () {
      customer_login_form.find("button").prop('disabled', true);
    },
    success: function (data) {

      if (data.status == 200) {
        customer_login_form[0].reset();
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 2000
        };
        toastr.success(data.message);
        setTimeout(function () {
          customer_login_form.find("button").prop('disabled', false);
          location = data.url;
        }, 2000)
      } else if (data.status == 404) {
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 2000
        };
        toastr.error(data.message);
        setTimeout(function () {
          customer_login_form.find("button").prop('disabled', false);
        }, 2000)
      }
    }
  });
}

function validateLoginForm(form) {

  $(form).validate({
    errorElement: "div",
    errorPlacement: function (error, element) {
      error.appendTo(element.next(".form-error").html(''));
      return false;
    },
    rules: {

      login_id: {
        required: true
      },
      login_password: {
        required: true
      }
    },
    messages: {
      login_id: {
        required: "this field is required",
      },
      login_password: {
        required: "please enter your password"
      }
    }
  });
}

jQuery.validator.addMethod("checkUsername", function (value, element) {
  return /^[A-Za-z0-9\d]*$/.test(value) || /\d/.test(value)
}, "username must contain only letters & number");

jQuery.validator.addMethod("checkFullName", function (value, element) {
  return /^[A-Za-z]*$/.test(value)
}, "full name must be only characters");
jQuery.validator.addMethod("checkPassword", function (value, element) {
  return /^[A-Za-z0-9\d]*$/.test(value) && /\d/.test(value)
}, "Password should combine number and characters ");

$("#username").keyup(function () {
  let username = $(this).val();
  $.ajax({
    url: base_url + '/register/check_username',
    data: {
      username: username
    },
    method: "post",
    dataType: "json",
    success: function (data) {
      if (data.status == 202) {
        $("#username_availability").html('<span class="text-danger">' + data.message + '<span>');
      } else {
        $("#username_availability").html('<span class="text-success">' + data.message + '<span>');
      }
    }
  });
});

$("#email").keyup(function () {
  let email = $(this).val();
  $.ajax({
    url: base_url + '/register/check_email',
    data: {
      email: email
    },
    method: "post",
    dataType: "json",
    success: function (data) {
      if (data.status == 202) {
        $("#email_availability").html('<span class="text-danger">' + data.message + '<span>');
      } else {
        $("#email_availability").html('<span class="text-success">' + data.message + '<span>');
      }
    }
  });
});
//registration login end

//customer image upload and prview start
$(document).on('change', '#file', function () {
  var imgpreview = DisplayImagePreview(this);
  var url = base_url + 'customer/file_upload';
  ajaxFormSubmit(url, '#user_file', function (data) {
    var data = JSON.parse(data);
    if (data.status == 'success') {

    } else {

    }
  })
});

function DisplayImagePreview(input) {
  console.log(input.files);
  if (input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      $('#profile_image').attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}

function ajaxFormSubmit(url, form, callback) {
  var formData = new FormData($(form)[0]);
  $.ajax({
    url: url,
    type: 'POST',
    data: formData,
    datatype: 'json',
    beforeSend: function () {
      //return confirm('are you sure?');
    },
    success: function (data) {
      if (data.status == 200) {
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 4000
        };
        toastr.success(data.message);
      } else {
        toastr.options = {
          closeButton: true,
          progressBar: true,
          showMethod: 'slideDown',
          timeOut: 5000
        };
        toastr.error(data.message);
      }
    },
    cache: false,
    contentType: false,
    processData: false
  });
}
//customer image upload and prview end

//guest customer register using given form , password section toggle start
$("#register").click(function () {
  $("#password_section_for_registration").show();
});
$("#guest").click(function () {
  $("#password_section_for_registration").hide();
});
//guest customer register using given form , password section toggle end

//payment method toggling start
$("#cod").change(function () {
  $("#cod_info").toggle('slow');
  $("#bkash_info").hide('slow');
  $("#rocket_info").hide('slow');
});
$("#bkash").change(function () {
  $("#cod_info").hide('slow');
  $("#rocket_info").hide('slow');
  $("#bkash_info").toggle('slow');
});
$("#rocket").change(function () {
  $("#cod_info").hide('slow');
  $("#bkash_info").hide('slow');
  $("#rocket_info").toggle('slow');
});
//payment method toggling end



//comment submitting form start
var comment_form = $("#comment_form");
comment_form.ajaxForm({
  url: base_url + 'blog/save_comment',
  beforeSend: function () {
    toastr.options = {
      closeButton: true,
      progressBar: true,
      showMethod: 'slideDown',
      timeOut: 5000
    };
    var name = $("#name").val();
    var email = $("#email").val();
    var message = $("#message").val();
    if (!name) {
      toastr.error('please enter your name');
      return false;
    }
    if (!email) {
      toastr.error('please enter your email');
      return false;
    }
    if (!message) {
      toastr.error('please enter your message');
      return false;
    }
  },
  success: function (data) {
    if (data.status == 200) {
      location.reload();
    }
  }
});


//comment submitting form end

//get blog tas
get_blog_tag();
function get_blog_tag() {
  $.ajax({
    url: base_url + 'blog/get_blog_tags',
    success: function (data) {
      var html = '';
      $.each(JSON.parse(data), function (key, value) {
        html += '<li><a href="">'+value.name+'</a></li>';
      })
      $('#tag').html(html);
    }
  });
}
//get blog tas

//get popular post
popular_post();
function popular_post() {
  $.ajax({
    url: base_url + 'blog/get_popular_post',
    success: function (data) {
      var html = '';
      $.each(JSON.parse(data), function (key, value) {

        html += ' <div class="post-thumbnail">';
        html += ' <img src="' + image_url + value.images +'" alt="">';
        html += ' </div>';
        html += ' <div class="post-content">';
        html += '<a href="'+ base_url + 'blog/view/' + value.slug +'">' +value.title+'</a>';
        html += ' </div>';
      })
      $('#popular_post').html(html);
    }
  });
}
//get popular post

//get blog category start
get_blog_category();
function get_blog_category() {
  $.ajax({
    url: base_url + 'blog/get_blog_category',
    success: function (data) {
      var html = '';
      $.each(JSON.parse(data), function (key, value) {
        html += '<li><a href="'+base_url+'blog/blog_in_cat/'+value.id+'"><span class="text-muted">(21)</span>&nbsp; '+value.name+'</a></li>';
      })
      $('#category').html(html);
    }
  });
}
//get blog category end


//order load by datatable
$(document).ready(function(){
  $('#all_orders').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
      url:base_url+"customer/orders?status=all",
      type:"POST"
    },
    dom: 'lBfrtip',
    buttons: [
    'excel', 'csv', 'pdf', 'copy','print'
    ],
    "lengthMenu": [ [10, 25, 50,100, -1], [10, 25, 50,100, "All"] ]
  });
})

$(document).ready(function(){
  $('#pending_orders').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
      url:base_url+"customer/orders?status=pending",
      type:"POST"
    },
    dom: 'lBfrtip',
    buttons: [
    'excel', 'csv', 'pdf', 'copy','print'
    ],
    "lengthMenu": [ [10, 25, 50,100, -1], [10, 25, 50,100, "All"] ]
  });
})
$(document).ready(function(){
  $('#ondelivery_orders').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
      url:base_url+"customer/orders?status=on_delivery",
      type:"POST"
    },
    dom: 'lBfrtip',
    buttons: [
    'excel', 'csv', 'pdf', 'copy','print'
    ],
    "lengthMenu": [ [10, 25, 50,100, -1], [10, 25, 50,100, "All"] ]
  });
})
$(document).ready(function(){
  $('#delivered_orders').DataTable({
   "processing" : true,
   "serverSide" : true,
   "ajax" : {
      url:base_url+"customer/orders?status=delivered",
      type:"POST"
    },
    dom: 'lBfrtip',
    buttons: [
    'excel', 'csv', 'pdf', 'copy','print'
    ],
    "lengthMenu": [ [10, 25, 50,100, -1], [10, 25, 50,100, "All"] ]
  });
})



  $(document).ready(function(){

    var limit = 12;
    var start = 0;
    var action = 'inactive';

    function lazzy_loader(limit)
    {
      var output = '';
      for(var count=0; count<limit; count++)
      {
        output += '<div class="post_data">';
        output += '<p><span class="content-placeholder" style="width:100%;">&nbsp;</span></p>';
        output += '<p><span class="content-placeholder" style="width:100%;">&nbsp;</span></p>';
        output += '</div>';
      }
      $('.product_area').html(output);
    }

    lazzy_loader(limit);

    function load_data(limit, start)
    {

      var minimum_price = $('#hidden_minimum_price').val();
      var maximum_price = $('#hidden_maximum_price').val();
      var category = get_filter('category');
      var brand = get_filter('brand');

      $.ajax({
        url:base_url+'products/filter_products',
        method:"POST",
        data:{
          limit:limit,
          start:start,
          minimum_price:minimum_price,
          maximum_price:maximum_price,
          category:category,
          brand:brand
        },
        cache: false,
        success:function(data)
        {
          if(data)
          {
            $('#load_data').html(data);
            $('.product_area').html("");
            action = 'inactive';
          }
        }
      })
    }

    if(action == 'inactive')
    {
      action = 'active';
      load_data(limit, start);
    }

    $(window).scroll(function(){
      if($(window).scrollTop() + $(window).height() > $("#load_data").height()+1000 && action == 'inactive')
      {
        lazzy_loader(limit);
        action = 'active';
        start = start + limit;
        setTimeout(function(){
          load_data(limit, start);
        }, 1000);
      }
    });

    // function filter_product() {
    //   $('#load_data').html(" ");
    //   var action = 'fetch_data';
    //   var minimum_price = $('#hidden_minimum_price').val();
    //   var maximum_price = $('#hidden_maximum_price').val();
    //   var category = get_filter('category');
    //   var brand = get_filter('brand');
    //   $.ajax({
    //     url: base_url + 'products/filter_products',
    //     type: 'post',
    //     data: {
    //       minimum_price: minimum_price,
    //       maximum_price: maximum_price,
    //       category: category,
    //       brand:brand,
    //       limit:limit,
    //       start:start
    //     },
    //     dataType: 'json',
    //     beforeSend: function (){
    //     },
    //     success: function (data){
    //       console.log(data);
    //       if(data){
    //         $('#load_data').html(data);
    //       }
    //     }
    //   });
    // }

    function get_filter(class_name) {
      var filter = [];
      $('.' + class_name + ':checked').each(function () {
        filter.push($(this).val());
      });
      return filter;
    }

    $(document).on('change', '.common_selector', function () {
      load_data(limit, start);
    });




    // $(".slider-range-price").slider({
    //   range: true,
    //   min: 0,
    //   max: 5000,
    //   values: [0, 5000],
    //   stop: function (event, ui) {
    //     $(".amount-range-price").html("Range: $" + ui.values[0] + " - $" + ui.values[1]);
    //     $('#hidden_minimum_price').val(ui.values[0]);
    //     $('#hidden_maximum_price').val(ui.values[1]);
    //     filter_product();
    //   }
    // });
});



function product_quick_view(product_id) {
  if(!isNaN(product_id)){
    $.ajax({
      url:base_url+'products/quick_view',
      method:"post",
      data:{product_id:product_id},
      datatype:'json',
      success:function(data) {
        if(data){
          $('#added').html(data);
        }
      }
    });
  }
}

// function close_modal() {
//   $('#quickview').modal('hide');
// }



//coupon apply functionality

function apply_coupon() {
  var coupon = $("#coupon_code").val();
  toastr.options = {
    closeButton: true,
    progressBar: true,
    showMethod: 'slideDown',
    timeOut: 2000
  };
  if(coupon){
    $.ajax({
      url:base_url+'cart/apply_coupon',
      method:"post",
      data:{coupon:coupon},
      beforeSend:function(){
        if(!coupon){
          toastr.warning('enter a valid coupon code');
        }
      },
      success:function(response) {
        if(response.status == 200){
          toastr.success(response.message);
          setTimeout(function(){
            window.location.reload();
          },2000);
        }else{
          toastr.warning(response.message);
        }
      }
    });
  }
}