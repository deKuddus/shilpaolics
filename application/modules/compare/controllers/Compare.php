<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare extends Frontend_Controller {

	function __construct()
  {
    parent::__construct();

    $this->load->model('compare_model');
    $this->load->module('products');
    $this->load->module('template');
  }

  public function index() {
   $this->manage();
 }

 public function manage() {

        $this->data['view_module'] = 'compare';
        $this->data['view_file'] = 'manage';
        $this->data['page_title'] = 'My Compare | shilpaolic.com';
        $this->data['brands'] = $this->compare_model->get_all_brand();
        $this->template->_shop_ui($this->data);
      }

    public function add_to_compare(){
        $product_id = $this->input->post('product_id');
        if($this->product_in_compare_or_not($product_id) != false){
         $size =  sizeof($this->session->userdata('compare_product'));
         if($size == 4){
          $status = array('status'=>202,'message'=>'you can add 4 products to compare at a time');
          header("Content-type: application/json");
          echo json_encode($status);
          exit();
        }else{
          $product = $this->products_model->get_product_by_id($product_id);
          $main_array = array();
          if($_SESSION['compare_product'][] = $product){
            $status = array('status'=>200,'message'=>'product added to compare');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
          }
        }
      }else{
        $status = array('status'=>203,'message'=>'product already added to compare');
        header("Content-type: application/json");
        echo json_encode($status);
        exit();
      }
    }

public function remove_from_compare(){
  $index = $this->input->post('index');
   unset($_SESSION['compare_product'][$index]);
   $status = array('status'=>200,'message'=>'product removed from compare');
   header("Content-type: application/json");
   echo json_encode($status);
   exit();


}


  public function product_in_compare_or_not($id){
    $product_id = array();
    if(!empty($this->session->userdata('compare_product'))){
      foreach ($this->session->userdata('compare_product') as $key => $value) {
        $product_id[] = $value->id;
      }
      if(in_array($id, $product_id)){
        return false;
      }else{
        return true;
      }
    }else{
      return true;
    }
  }



  }
