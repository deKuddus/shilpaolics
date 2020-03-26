<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Terms extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

        $this->load->module('template');
		$this->load->model('termsConditions_model');

	}

	public function index() {
		$this->manage();
	}

	public function manage() {

		$this->data['view_module'] = 'terms';
		$this->data['view_file'] = 'manage';
		$this->data['terms'] = $this->termsConditions_model->get_terms();
		$this->template->_shop_admin($this->data);
	}

	public function create() {

		$this->data['view_module'] = 'terms';
		$this->data['view_file'] = 'create';
		$this->template->_shop_admin($this->data);
	}

	public function view_terms()
	{	
		$id = $this->input->post('id');
		if(isset($id)){
			$terms = $this->termsConditions_model->get_terms($id);
			echo htmlspecialchars_decode($terms->terms);
		}
	}
	public function store()
	{
		if(isset($_POST)){
			$terms = $this->input->post('terms');
			if($this->termsConditions_model->store(['terms' => htmlspecialchars($terms)]) == true){
				redirect('terms');
			}
		}
	}

	public function edit($id)
	{
		$this->data['id'] = $id;
		$this->data['view_module'] = 'terms';
		$this->data['view_file'] = 'edit';
		$this->data['term'] = $this->termsConditions_model->get_terms($id);
		$this->template->_shop_admin($this->data);
	}

	public function update()
	{
		if(isset($_POST)){
			$terms = $this->input->post('terms');
			$terms_id = $this->input->post('terms_id');
			if($this->termsConditions_model->store(['terms' => htmlspecialchars($terms)],$terms_id) == true){
				redirect('terms');
			}
		}
	}

	public function delete($id)
	{
		if($this->termsConditions_model->delete($id)){
			redirect('terms');
		}
	}

	public function change_terms_status()
	{
		$id = $this->input->post('id');

		if(isset($id)){
			$status = $this->termsConditions_model->get_terms($id)->status;
			if($status == 1){
				$change = 0;
			}else if($status == 0){
				$change = 1;
			}
			if($this->termsConditions_model->store(['status' => $change],$id) == true){
				echo true;
			}
		}
	}

}
