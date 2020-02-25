<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Error extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
		$this->load->model('error_model');
    }

    public function index() {
    	// $this->show_404();
    }

    public function show_404() {
        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'error';
        $this->data['view_file'] = '_404';
        $this->load->module('template');
        $this->template->_shop_ui($this->data);
    }
}
