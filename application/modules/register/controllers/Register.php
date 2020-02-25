<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('register_model');
        $this->load->module('template');
    }

    public function index() {
    	$this->manage();
    }

    public function manage() {


        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'register';
        $this->data['view_file'] = 'register';
        $this->data['page_title'] = 'Register Account | shilpaolic.com ';
        $this->template->_shop_ui($this->data);
    }

    public  function customer_registration(){
        $data = $this->register_model->array_from_post(array('username','name','email','contact','city','zip_code','country','state','password','address'));

        $username = $this->input->post('username');
        $email = $this->input->post('email');
        if($this->register_model->check_username($username)== true){
           $status = array('status'=>202,'message'=>'username not available');
           header("Content-type: application/json");
           echo json_encode($status);
           exit();
        }
        elseif($this->register_model->check_email($email) == true){
           $status = array('status'=>203,'message'=>'email not available');
           header("Content-type: application/json");
           echo json_encode($status);
           exit();
        }else{
            $register = $this->register_model->save($data);
            if(!empty($register)){
                $status = array('status'=>200,'message'=>'Registration Success');
                header("Content-type: application/json");
                echo json_encode($status);
                exit();
            }
        }

    }




    public function check_username(){
        $username = $this->input->post('username');
        $check = $this->register_model->check_username($username);
        if($check == true){
            $status = array('status'=>202,'message'=>'username not available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else{
            $status = array('status'=>200,'message'=>'username  available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }
    public function check_email(){
        $email = $this->input->post('email');
        $check = $this->register_model->check_email($email);
        if($check == true){
            $status = array('status'=>202,'message'=>'email not available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else{
            $status = array('status'=>200,'message'=>'email  available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }

    public function customer_login()
    {
        
    }
}
