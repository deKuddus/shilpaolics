<style>
.dt-buttons{
  float: right;
}
</style>
<div class="wrapper wrapper-content animated fadeInRight">
  <div class="row wrapper border-bottom white-bg page-heading">
    <div class="col-sm-4">
      <h2>Orders</h2>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.html">order</a>
        </li>
        <li class="breadcrumb-item active">
          <strong>manage</strong>
        </li>
      </ol>
    </div>
    <div class="col-sm-8">
      <div class="title-action">
        <!-- <a href="<?php echo base_url(); ?>users/create" class="btn btn-primary">Add Users</a> -->
      </div>
    </div>
  </div>

  <div class="clearfix"></div>

  <div class="ibox ">
    <div class="ibox-title">
      <h5>Sales List</h5>
      <div class="ibox-tools">
        <a class="collapse-link">
          <i class="fa fa-chevron-up"></i>
        </a>
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">
          <i class="fa fa-wrench"></i>
        </a>
        <ul class="dropdown-menu dropdown-user">
          <li><a href="#" class="dropdown-item">Config option 1</a>
          </li>
          <li><a href="#" class="dropdown-item">Config option 2</a>
          </li>
        </ul>
        <a class="close-link">
          <i class="fa fa-times"></i>
        </a>
      </div>
    </div>
    <div class="ibox-content">

      <div class="table-responsive">
        <table id="sales" class="table table-striped table-bordered table-hover" >
          <thead>
            <tr>
              <th>ID</th>
              <th>Sale Code</th>
              <th>Customer</th>
              <th>Date</th>
              <th>Total</th>
              <th>Delivery Status</th>
              <th>Payment Status</th>
              <th>Options</th>
            </tr>
          </thead>
          <tbody >

          </tbody>
          <tfoot>
            <tr>
              <th>ID</th>
              <th>Sale Code</th>
              <th>Customer</th>
              <th>Date</th>
              <th>Total</th>
              <th>Delivery Status</th>
              <th>Payment Status</th>
              <th>Options</th>
            </tr>
          </tfoot>
        </table>
      </div>

    </div>
  </div>


</div>
<div class="modal inmodal fade" id="full_invoice" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content " style="width: 1228px;left: -26%;">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <div class="row wrapper border-bottom white-bg page-heading">
          <div class="col-lg-8">
            <h2 class="text-left" >Invoice</h2>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="<?php echo base_url('/dashboard') ?>">Home</a>
              </li>
              <li class="breadcrumb-item active">
                <strong>Invoice</strong>
              </li>
            </ol>
          </div>
          <div class="col-lg-4">
            <div class="title-action">
              <a href="#" class="btn btn-white"><i class="fa fa-pencil"></i> Edit </a>
              <a href="" target="_blank" class="btn btn-primary"><i class="fa fa-print"></i> Print Invoice </a>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-lg-12">
            <div class="wrapper wrapper-content animated fadeInRight">
              <div class="ibox-content p-xl">
                <div class="row">
                  <div class="col-sm-4">
                    <h5>From:</h5>
                    <address>
                      <strong id="from_name"></strong><br>
                      <span id="from_address"></span><br>
                      <abbr title="Phone">P:</abbr> <span id="from_phone"></span>
                    </address>
                  </div>
                  <div class="col-sm-4 text-center">
                    <h4>Invoice No.</h4>
                    <h4 class="text-navy" id="invoice_no"></h4>
                    <p>
                      <span ><strong>Invoice Date:</strong> <p id="sales_at"></p></span><br/>
                    </p>
                  </div>
                  <div class="col-sm-4 text-right">
                    <span>To:</span>
                    <address>
                      <strong id="to_name"></strong><br>
                      <span id="to_address"></span><br>
                      <abbr title="Phone">P:</abbr> <span id="to_phone"></span>
                    </address>
                    
                  </div>
                </div>

                <div class="table-responsive m-t">
                  <table class="table invoice-table">
                    <thead>
                      <tr>
                        <th>Item List</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Tax</th>
                        <th>Total Price</th>
                      </tr>
                    </thead>
                    <tbody id="item_list">
                    </tbody>
                  </table>
                </div>

                <table class="table invoice-total">
                  <tbody>
                    <tr>
                      <td><strong>Sub Total :</strong></td>
                      <td id="sub_total"></td>
                    </tr>
                    <tr>
                      <td><strong>TAX :</strong></td>
                      <td id="total_tax"></td>
                    </tr>
                    <tr>
                      <td><strong>TOTAL :</strong></td>
                      <td id="total"></td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
<div class="modal inmodal fade" id="change_delevery_status" tabindex="-1" role="dialog"  aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content animated flipInY">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        <h4 class="modal-title">Change Delivery Status</h4>
      </div>
        <div class="modal-body">
          <div class="form-group">
            <input type="hidden" id="sale_code" name="sale_code" value="">
            <label for="status"></label>
            <select id="status" name="status" class="form-control"></select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
          <button type="button" id="save_status" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
</div>