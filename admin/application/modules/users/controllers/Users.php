<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

        // Load Stuff
		$this->load->model('users_model');

	}

	public function index() {
		$this->manage();
	}

	public function manage() {

		$this->data['users_page'] = TRUE;
		$this->data['table_page'] = TRUE;
		$this->data['view_module'] = 'users';
		$this->data['view_file'] = 'manage';
		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}
	public function show()
	{	
		$loader = $this->input->post('loader');
		if(isset($loader)){
			$users = $this->users_model->get();
			echo json_encode($users);
		}
	}
	public function store()
	{
		$config = array(
			'upload_path' => "./user_picture/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => false,
			'max_size' => "2048000",
			'height' => 128,
			'width' => 128,
			'encrypt_name'=>true
		);
		if(empty($_FILES['picture']['tmp_name'])){
			$image_name = 'user_picture/default.png';
			$success = $this->users_model->store($image_name);
			if($success==200){
				$data = array('status'=>200);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
			elseif($success == 400){
				$data = array('status'=>400);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
		}
		else{

			$this->load->library('upload', $config);
			if($this->upload->do_upload('picture') == true){
				$data = $this->upload->data();
				$image_name = 'user_picture/'.$data['file_name'];
			}else{
				$image_err = $this->upload->display_errors();
				header("Content-type: application/json");
				echo json_encode($image_err);
				exit();
			}

			$success = $this->users_model->store($image_name);
			// dump($success,true);
			if($success==200){
				$data = array('status'=>200);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
			elseif($success == 400){
				$data = array('status'=>400);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
		}

		
	}

	public function edit($id)
	{
		$this->data['id']=$id;
		$this->data['users_page'] = TRUE;
		$this->data['form_page'] = TRUE;
		$this->data['view_module'] = 'users';
		$this->data['view_file'] = 'edit';
		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}

	public function edit_user()
	{
		$id=$this->input->post('id');
		$user = $this->users_model->manage_user($id);

		echo json_encode($user);

	}


	public function update()
	{
		$config = array(
			'upload_path' => "./user_picture/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => false,
			'max_size' => "2048000",
			'height' => 128,
			'width' => 128,
			'encrypt_name'=>true
		);

		if(empty($_FILES['picture']['tmp_name'])){
			$success = $this->users_model->update();
			if($success==200){
				$data = array('status'=>200);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
		}
		else{
			$this->load->library('upload', $config);

			if($this->upload->do_upload('picture') == true){
				$data = $this->upload->data();
				$image_name = 'user_picture/'.$data['file_name'];
			}else{
				$image_err = $this->upload->display_errors();
				header("Content-type: application/json");
				echo json_encode($image_err);
				exit();
			}

			$success = $this->users_model->update($image_name);
			if($success==200){
				$data = array('status'=>200);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
		}

		
	}

	public function create($id = NULL) {

		$this->data['users_page'] = TRUE;

		$this->data['form_page'] = TRUE;
		$this->data['view_module'] = 'users';
		$this->data['view_file'] = 'create';

		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}

	public function delete()
	{
		$id = $this->input->post('id');
		$delete_user = $this->users_model->delete($id);
		if($delete_user == 200){
			$data = array('status'=>200);
			header("Content-type: application/json");
			echo json_encode($data);
			exit();
		}
	}

	public function login() {
		$this->data['login_page'] = TRUE;

		$this->data['form_page'] = TRUE;
		$this->data['view_module'] = 'users';
		$this->data['view_file'] = 'login';

		$this->load->module('template');
		$this->template->_shop_login($this->data);
	}
	
	public function login_user(){
		$success=$this->users_model->login();
		if($this->users_model->login() == TRUE && $success == 200){
			$data = array('status'=>200);
			header("Content-type: application/json");
			echo json_encode($data);
			exit();
		}
		elseif($success == 400){
			$data = array('status'=>400);
			header("Content-type: application/json");
			echo json_encode($data);
			exit();
		}
	}

	// public function logout() {
	// 	$this->users_model->logout();
	// 	redirect('users/login');
	// }
	

	/*
	*
	* get customer list using admin/user module
	* for admin
	*/

	public function customer()
	{
		$this->data['table_page'] = TRUE;
		$this->data['view_module'] = 'users';
		$this->data['view_file'] = 'customer';

		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}
	public function get_customer_list()
	{	$data = array();
		$customers = $this->users_model->get_customer_list();
		foreach ($customers as $p_key => $customer) {
			$sub_array = array();
			$sub_array[] = $customer->name;
			$sub_array[] = $customer->username;
			$sub_array[] = $customer->email;
			$sub_array[] = $customer->contact;
			$sub_array[] = $customer->address;
			$sub_array[] = $customer->city;
			$sub_array[] = $customer->zip_code;
			$sub_array[] = $customer->state;
			$sub_array[] = $customer->country;
			$sub_array[] ='<div class="btn-group">
                  <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
                  <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
                    <li><a class="dropdown-item" target="_blank">View</a></li>
                  </ul>
                </div>';
			$data[] = $sub_array;
		}
		$output = array(
			'draw'    => intval($_POST['draw']),
			'recordsTotal'  => $this->users_model->count_cusotmer(),
			'recordsFiltered'  => $this->users_model->count_cusotmer(),
			'data'    => $data
		);
		echo json_encode($output);
	}
}
