$('.chosen-select').chosen({width: "100%"});

function Valid(form){

  $(form).validate({
    errorElement: "div",
    errorPlacement: function(error, element) {

      error.appendTo( element.next(".form-error").html(''));
      return false;
    },
    rules: {
      'name': {
        required:true

      },
      'password': {
        required:true,
        minlength: 8

      },
      'confirm-password': {
        equalTo : "#password"

      },
      'email': {
        required:true,
        email: true
      },
      'phone': {
        required:true,
        minlength: 11

      },
      'address': {
        required:true

      }
    },
    messages:{
      'name': {
        required:"Name is Required!"
      },
      'password': {
        required:"Password Required!"
      },
      'confirm-password': {
        required:"Please type your password again!",
        equalTo:"password did not match!"
      },
      'email': {
        required:"Email is Required!",
        email:"Please enter a valid email"

      },
      'phone': {
        required:"Phone number is Required!",
        minlength: "Phone number length must be of minimum 11 characters!"

      },
      'address': {
        required:"Address is Required!"

      }
    }
  });
}

function error_check(jqXHR,exception){
  if (jqXHR.status === 0) {
    toastr.error('Not connect.\n Verify Network.');
  } else if (jqXHR.status == 404) {
    toastr.error('Requested page not found. [404]');
  } else if (jqXHR.status == 500) {
    toastr.error('Internal Server Error [500].');
  } else if (exception === 'parsererror') {
    toastr.error('Requested JSON parse failed.');
  } else if (exception === 'timeout') {
    toastr.error('Time out error.');
  } else if (exception === 'abort') {
    toastr.error('Ajax request aborted.');
  } else {
    toastr.error('Uncaught Error.\n' + jqXHR.responseText);
  }
}

function DisplayImagePreview(input,append_id) {
  if (input.files[0]) {
    var reader = new FileReader();
    reader.onload = function (e) {
      append_id.attr('src', e.target.result);
    }
    reader.readAsDataURL(input.files[0]);
  }
}




