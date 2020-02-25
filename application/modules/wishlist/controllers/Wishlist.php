<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist extends Frontend_Controller {

	function __construct()
  {
    parent::__construct();

    $this->load->model('wishlist_model');
    $this->load->module('products');
    $this->load->module('template');
  }

  public function index() {
   $this->manage();
 }

 public function manage() {

        $user_id = $this->session->userdata('user_id');//set user id
        $this->data['view_module'] = 'wishlist';
        $this->data['view_file'] = 'manage';
        $this->data['page_title'] = 'My Wishlist | shilpaolic.com';
        $this->data['discount_type'] = $this->wishlist_model->discount_type();
        $this->data['wishlists'] = $this->wishlist_model->get_user_all_wishlist_product($user_id);
        $this->template->_shop_ui($this->data);
      }

      public function remove_all_from_wihslist(){
        $user_id = $this->session->userdata('user_id');//set user id
        if($this->wishlist_model->remove_all_from_wihslist($user_id) == true){
         $status = array('status'=>200,'message'=>'wishlist cleared');
         header("Content-type: application/json");
         echo json_encode($status);
         exit();
       }
     }

     public function remove_from_wihslist_by_id(){
      $product_id = $this->input->post('product_id');
        $user_id = $this->session->userdata('user_id');//set user id
        if($this->wishlist_model->remove_from_wihslist_by_id($product_id,$user_id)){
         $status = array('status'=>200,'message'=>'product succefully to remove from wishlist');
         header("Content-type: application/json");
         echo json_encode($status);
         exit();
       }else{
        $status = array('status'=>404,'message'=>'product failed to remove from wishlist');
        header("Content-type: application/json");
        echo json_encode($status);
        exit();
      }
      redirect('wishlist');
    }

    public function add_to_wishlist(){
      $data = [
        'user_id'=>$this->session->userdata('user_id'),
        'product_id'=>$this->input->post('product_id')
      ];

    if($this->wishlist_model->check_product_is_exist_in_wishlist($this->input->post('product_id'))== true){
      if($wishlist = $this->wishlist_model->add_to_wishlist($data)){
        $status = array('status'=>201,'message'=>'product added to your wishlist');
        header("Content-type: application/json");
        echo json_encode($status);
        exit();
      } 
    }else{
      $status = array('status'=>202,'message'=>'product already added to your wishlist');
      header("Content-type: application/json");
      echo json_encode($status);
      exit();
    }
  }
    
  }
