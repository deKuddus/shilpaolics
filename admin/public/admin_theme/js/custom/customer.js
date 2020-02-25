
//customer list
var customer_list = $('#customer_list').DataTable({
    "processing" : true,
    "serverSide" : true,
    "ajax" : {
      url:base_url+"users/get_customer_list",
      type:"POST"
    },
    dom: 'lBfrtip',
    buttons: [
    'excel', 'csv', 'pdf', 'copy','print'
    ],
   "lengthMenu": [ [10, 25, 50,100, -1], [10, 25, 50,100, "All"] ]
});
