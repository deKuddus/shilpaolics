<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newarraival extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('newarraival_model');

    }

    public function index() {
    	$this->manage();
    }

    public function manage() {

        $this->data['products'] = $this->newarraival_model->get_latest_product();
        $this->data['view_module'] = 'newarraival';
        $this->data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->_shop_ui($this->data);
    }	
}
