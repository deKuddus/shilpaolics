<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cupon extends Frontend_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->model('cupon_model');
    $this->load->module('product');
  }

  public function index() {
    $this->manage();
  }

   public function manage() {
    
    $this->data['home_page'] = TRUE;
    $this->data['discount_on'] = $this->cupon_model->get_discount_on('dropdown');
    $this->data['discount_type'] = $this->product_model->get_tax_discount_type('dropdown');
    $this->data['view_module'] = 'cupon';
    $this->data['view_file'] = 'manage';
    $this->load->module('template');
    $this->template->_shop_admin($this->data);
  }

  public function show()
  { 
    global $d_type,$_discount_on;
    $data = array();
    $discount_type = $this->product_model->get_tax_discount_type();
    $discount_on = $this->cupon_model->get_discount_on();
    foreach ($this->cupon_model->show() as $c_key => $cupon) {
      $sub_array = array();
      foreach ($discount_type as $key => $type) {
        if($cupon->discount_type == $type->id){
          $d_type = $type->symbol;
        }
      }
      foreach ($discount_on as $key => $dis_on) {
        if($cupon->discount_on == $dis_on->id){
          $_discount_on = $dis_on->name;
        }
      }
      if($cupon->status == 1){
        $is_active = '<div class="switch">
                    <div class="onoffswitch">
                      <input type="checkbox" onchange="change_cupon_status('.$cupon->id.',this)" checked="checked" class="onoffswitch-checkbox cupon_status" id="example'.$c_key.'" value="0">
                      <label class="onoffswitch-label" for="example'.$c_key.'">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                      </label>
                    </div>
                  </div>';
      }else if($cupon->status == 0){
        $is_active = '<div class="switch">
                    <div class="onoffswitch">
                      <input type="checkbox" onchange="change_cupon_status('.$cupon->id.',this)" class="onoffswitch-checkbox cupon_status" id="example'.$c_key.'" value="1">
                      <label class="onoffswitch-label" for="example'.$c_key.'">
                        <span class="onoffswitch-inner"></span>
                        <span class="onoffswitch-switch"></span>
                      </label>
                    </div>
                  </div>';
      }
      
      $sub_array[] = $cupon->id."<br><br><input type='checkbox' class='cupon_checkbox' value='".$cupon->id."' />";
      $sub_array[] = $cupon->title;
      $sub_array[] = $cupon->code;
      $sub_array[] = $cupon->added_by;
      $sub_array[] = dateFormater($cupon->till);
      $sub_array[] = $_discount_on;
      $sub_array[] = $d_type;
      $sub_array[] = $cupon->discount_value;
      $sub_array[] = $cupon->specification;
      $sub_array[] = $is_active;
     
      $sub_array[] ='<div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
                  <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
                    <li><a class="dropdown-item" data-toggle="modal" data-target="#edit_cupon_modal" onclick="edit_cupon('.$cupon->id.')">Edit</a></li>
                    <li><a class="dropdown-item" onclick="delete_cupon('.$cupon->id.')">Delete</a></li>
                  </ul>
                </div>';
      $data[] = $sub_array;
    }
    $output = array(
      'draw'    => intval($_POST['draw']),
      'recordsTotal'  => $this->cupon_model->count_total_cupon(),
      'recordsFiltered'  => $this->cupon_model->count_total_cupon(),
      'data'    => $data
    );
    echo json_encode($output);
  }

   /*
   *
   *@store() method used to save cuopn information
   *
   *
   */
   public function store()
   {
     if(isset($_POST)){
      $cupon_data = array();
      foreach ($_POST as $key => $value) {
        if($key == 'till' OR $key == 'valid_till_time'){
          continue;
        }else{
          $cupon_data[$key] = $value;
        }
      }
      $till_date = str_replace('/', '-', $_POST['till']);
      $till = $till_date.' '.$_POST['valid_till_time'];

      $cupon_data['till'] = $till;
      $cupon_data['added_by'] = $this->session->userdata('username');
      if($this->cupon_model->check_ducplicate_cupon($cupon_data['code']) == true){
        $data = array('status'=>300,'message'=>'cupon already added');
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
      }
      $store = $this->cupon_model->store($cupon_data);
      if($store == 200){
        $data = array('status'=>200,'message'=>'cupon added');
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
      }
     }
   }

   /*
   *
   *@edit() method used to get 
   *  single cupon details to edit
   *
   */
   public function edit()
   {
     if(isset($_GET['cupon_id'])){
      $cupon_id = $this->input->get('cupon_id');
      $cupon = $this->cupon_model->edit($cupon_id);
      if(isset($cupon)){
        echo json_encode($cupon);
      }
     }
   }

   /*
   *
   *@update() method used to 
   *  update cupon information
   *
   */

    public function update()
    {
     if(isset($_POST)){
      $cupon_data = array();
      foreach ($_POST as $key => $value) {
        if($key == 'till' OR $key == 'valid_till_time' OR $key == 'cupon_id_edit'){
          continue;
        }else{
          $cupon_data[$key] = $value;
        }
      }
      $till_date = str_replace('/', '-', $_POST['till']);
      $till = $till_date.' '.$_POST['valid_till_time'];

      $cupon_data['till'] = $till;
      $cupon_data['added_by'] = $this->session->userdata('username');
      if($this->cupon_model->check_ducplicate_cupon($cupon_data['code'],$_POST['cupon_id_edit']) == true){
        $data = array('status'=>300,'message'=>'cupon already added');
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
      }
      $store = $this->cupon_model->update($cupon_data,$_POST['cupon_id_edit']);
      if($store == 200){
        $data = array('status'=>200,'message'=>'cupon updated');
        header("Content-type: application/json");
        echo json_encode($data);
        exit();
      }
    }
  }

   /*
   *
   *@delete() methos used to delete singl cuopn 
   *
   *
   */
   public function delete()
   {
      $cupon_id = $this->input->post('cupon_id');
      $success = $this->cupon_model->delete($cupon_id);
      if($success == true){
      $data = array('status'=>200,'message'=>'cuopn deleted');
      header("Content-type: application/json");
      echo json_encode($data);
      exit();
     }
   }
   /*
   *
   *@change_cupon_status() method used to change cupon status 
   *
   *
   */
   public function change_cupon_status()
   {
     $cupon_id = $this->input->post('cupon_id');
     $status = $this->input->post('status');
     $success = $this->cupon_model->change_cupon_status($cupon_id,$status);
     if($success == true){
      $data = array('status'=>200,'message'=>'status change');
      header("Content-type: application/json");
      echo json_encode($data);
      exit();
     }
   }


   /*
   *
   *$discount_type() method used to 
   *  get slected discount_type value
   *  to edit cupon
   */

   public function discount_type()
   {
     $discount_type = $this->product_model->get_tax_discount_type();
     if(isset($discount_type)){
      echo json_encode($discount_type);
     }
   }

      /*
   *
   *$discount_on() method used to 
   *  get slected discount_on value
   *  to edit cupon
   */

   public function discount_on()
   {
     $discount_on = $this->cupon_model->get_discount_on();
     if(isset($discount_on)){
      echo json_encode($discount_on);
     }
   }

}
