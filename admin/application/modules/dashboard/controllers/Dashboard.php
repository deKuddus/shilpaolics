<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

    function __construct()
    {
        parent::__construct();
    }

    public function index() {
    	$this->dashboard();
    }

    public function dashboard() {
    	
    	// Load view
		$this->data['dashboard_page'] = TRUE;
        $this->data['view_module'] = 'dashboard';
        $this->data['view_file'] = 'dashboard';

		$this->load->module('template');
        $this->template->_shop_admin($this->data);
    }

    
}
