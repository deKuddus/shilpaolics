<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bestseller extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('bestseller_model');
        $this->load->module('template');

    }

    public function index() {
    	$this->manage();
    }

    public function manage() {

        $this->data['products'] = $this->bestseller_model->get_all_best_selling();
        $this->data['view_module'] = 'bestseller';
        $this->data['view_file'] = 'manage';
        $this->template->_shop_ui($this->data);
    }
}
