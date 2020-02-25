<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('login_model');
    }

    public function index() {
    	
    }

    public  function customer_login(){
        
        $login_id = $this->input->post('login_id');
        $login_password = $this->input->post('login_password');
        $login_data = $this->login_model->customer_login($login_id,$login_password);
        if($login_data != false){
            foreach ($login_data as $user) {
                $user_data = array(
                    'user_id'=>$user->id,
                    'username'  => $user->username,
                    'email'     => $user->email,
                    'logged_in' => TRUE,
                    'image' => ($user->images)?$user->images:'customer_images/default.jpg'
                );

                $this->session->set_userdata($user_data);
            }
            if($this->session->has_userdata('logged_in')){
                $status = array(
                    'status'=>200,
                    'url'=>base_url('home'),
                    'message'=>'login success'
                );
                header("Content-type: application/json");
                echo json_encode($status);
                exit();
            }
        }else{
            $status = array('status'=>404,'message'=>'incorrect username or password');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }

    }

    public function logout()
    {
        $array_items = array('user_id','username', 'email','logged_in');
        $this->session->unset_userdata($array_items);
        redirect(base_url('/home'));
    }

   
}
