<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Demo extends Admin_Controller {

	function __construct()
    {
        parent::__construct();

        // Load Stuff
		// $this->load->model('branch_model');
		// $this->load->module('shop');
    }

    public function index() {
		$this->manage();

	}

	public function manage() {

		// Fetch all User Role
		// $data = $this->data['branch'] = $this->branch_model->get();

		// dump($data);
		// Load view
		$this->data['demo_page'] = TRUE;

		$this->data['table_page'] = TRUE;
        $this->data['view_module'] = 'demo';
        $this->data['view_file'] = 'manage';

		$this->load->module('template');
        $this->template->_shop_admin($this->data);
	}

	public function create($id = NULL) {

        

        $this->data['demo_page'] = TRUE;

        $this->data['form_page'] = TRUE;
        $this->data['view_module'] = 'demo';
        $this->data['view_file'] = 'create';

        $this->load->module('template');
        $this->template->_shop_admin($this->data);
    }

	
	//Integrate From Sonjoy Code


	
}
