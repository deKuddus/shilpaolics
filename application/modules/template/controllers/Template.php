<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends Admin_Controller {

	function __construct()
    {
        parent::__construct();
    }

    public function _shop_ui($data = NULL) {

    	$this->data = $data;

		$this->load->view('layout_main', $this->data);
	}

	public function _shop_mbl_ui($data = NULL) {

		$this->data = $data;

		$this->load->view('shop_mbl_ui', $this->data);
	}

	public function _shop_login($data = NULL) {

		$this->data = $data;

		$this->load->view('admin/_layout_login', $this->data);
	}

	public function _shop_report($data) {

		$this->data = $data;

		return $this->load->view('admin/_layout_report', $this->data, true);
	}

}
