<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Logout extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('logout_model');
    }

    public function logout()
    {
     $array_items = array('username', 'email','logged_in');
     $this->session->unset_userdata($array_items);
     redirect(base_url('/home'));
    }


   
}
