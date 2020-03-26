<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Privacy extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

        $this->load->module('template');
		$this->load->model('privacy_model');

	}

	public function index() {
		$this->manage();
	}

	public function manage() {

		$this->data['view_module'] = 'privacy';
		$this->data['view_file'] = 'manage';
		$this->data['privacy'] = $this->privacy_model->get_privacy();
		$this->template->_shop_admin($this->data);
	}

	public function create() {

		$this->data['view_module'] = 'privacy';
		$this->data['view_file'] = 'create';
		$this->template->_shop_admin($this->data);
	}

	public function view_privacy()
	{	
		$id = $this->input->post('id');
		if(isset($id)){
			$privacy = $this->privacy_model->get_privacy($id);
			echo htmlspecialchars_decode($privacy->privacy);
		}
	}
	public function store()
	{
		if(isset($_POST)){
			$privacy = $this->input->post('privacy');
			if($this->privacy_model->store(['privacy' => htmlspecialchars($privacy)]) == true){
				redirect('privacy');
			}
		}
	}

	public function edit($id)
	{
		$this->data['id'] = $id;
		$this->data['view_module'] = 'privacy';
		$this->data['view_file'] = 'edit';
		$this->data['term'] = $this->privacy_model->get_privacy($id);
		$this->template->_shop_admin($this->data);
	}

	public function update()
	{
		if(isset($_POST)){
			$privacy = $this->input->post('privacy');
			$privacy_id = $this->input->post('privacy_id');
			if($this->privacy_model->store(['privacy' => htmlspecialchars($privacy)],$privacy_id) == true){
				redirect('privacy');
			}
		}
	}

	public function delete($id)
	{
		if($this->privacy_model->delete($id)){
			redirect('privacy');
		}
	}

	public function change_privacy_status()
	{
		$id = $this->input->post('id');

		if(isset($id)){
			$status = $this->privacyConditions_model->get_privacy($id)->status;
			if($status == 1){
				$change = 0;
			}else if($status == 0){
				$change = 1;
			}
			if($this->privacy_model->store(['status' => $change],$id) == true){
				echo true;
			}
		}
	}

}
