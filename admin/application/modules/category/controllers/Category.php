<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

        // Load Stuff
		$this->load->model('category_model');
		$this->load->module('brand');

	}

	public function index() {
		$this->manage();
	}

	public function manage() {

		$this->data['category_page'] = TRUE;
		$this->data['brand'] =$this->get_brand();
		$this->data['category'] =$this->category_model->get_category('dropdown');
		$this->data['table_page'] = TRUE;
		$this->data['view_module'] = 'category';
		$this->data['view_file'] = 'manage';

		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}

	public function show(){
		$data = array();
		foreach ($this->category_model->show() as $c_key => $category) {
			$sub_array = array();
			if($category->show_home == 1){
				$show_home = '<div class="switch">
				<div class="onoffswitch">
				<input type="checkbox" onchange="change_category_showhome_status('.$category->id.',this)" checked="checked" class="onoffswitch-checkbox category_status" id="example'.$c_key.'" value="0">
				<label class="onoffswitch-label" for="example'.$c_key.'">
				<span class="onoffswitch-inner"></span>
				<span class="onoffswitch-switch"></span>
				</label>
				</div>
				</div>';
			}else if($category->show_home == 0){
				$show_home = '<div class="switch">
				<div class="onoffswitch">
				<input type="checkbox" onchange="change_category_showhome_status('.$category->id.',this)" class="onoffswitch-checkbox category_status" id="example'.$c_key.'" value="1">
				<label class="onoffswitch-label" for="example'.$c_key.'">
				<span class="onoffswitch-inner"></span>
				<span class="onoffswitch-switch"></span>
				</label>
				</div>
				</div>';
			}

			$sub_array[] = "<input type='checkbox' class='category_checkbox' name='category_id' value='".$category->id."'>";
			$sub_array[] = $category->id;
			$sub_array[] = $category->category_name;
			$sub_array[] = $this->category_model->get_parent_category($category->id);
			$sub_array[] = ($category->brand != '')?explode(',', json_decode($category->brand)):'no brand';
			$sub_array[] = $show_home;
			$sub_array[] = "<a target='_blank' href='".FILE_UPLOAD_PATH.$category->picture."'><img src='".base_url().$category->picture."' alt='category logo' height='100px' width='100px'></a>";
			$sub_array[] ='<div class="btn-group">
			<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
			<ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
			<li><a class="dropdown-item" data-toggle="modal" data-target="#category_edit_modal" onclick="edit_category('.$category->id.')">Edit</a></li>
			<li><a class="dropdown-item" onclick="delete_category('.$category->id.')">Delete</a></li>
			</ul>
			</div>';
			$data[] = $sub_array;
		}
		$output = array(
			'draw'    => intval($_POST['draw']),
			'recordsTotal'  => $this->category_model->count_total_row_of_category(),
			'recordsFiltered'  => $this->category_model->count_total_row_of_category(),
			'data'    => $data
		);
		echo json_encode($output);
	}

	public function store(){
		$config = array(
			'upload_path' => "./category_picture/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => false,
			'max_size' => "2048000",
			'encrypt_name'=>true
		);
		if(empty($_FILES['category_image']['tmp_name'])){
			$image_name = 'category_picture/'.rand(0,time()).'.png';
			copy("category_picture/default.png",$image_name);
			$success = $this->category_model->store($image_name);
		}
		else{

			$this->load->library('upload', $config);
			if($this->upload->do_upload('category_image') == true){
				$data = $this->upload->data();
				$image_name = 'category_picture/'.$data['file_name'];
			}else{
				$image_err = $this->upload->display_errors();
				header("Content-type: application/json");
				echo json_encode($image_err);
				exit();
			}
			$success = $this->category_model->store($image_name);
		}
		if($success==200){
			$data = array('status'=>200,'message'=>"category added");
			header("Content-type: application/json");
			echo json_encode($data);
			exit();
		}
		elseif($success == 301){
			$data = array('status'=>301,'message'=>'category name exist');
			header("Content-type: application/json");
			echo json_encode($data);
			exit();
		}
	}

	public function edit(){
		$id = $this->input->get('id');
		$this->data['category_page'] = TRUE;
		$this->data['brand'] =$this->get_brand();
		$this->data['category'] = $this->category_model->get_category_by_id($id);
		$this->data['categories'] =  $this->category_model->get_category('dropdown');
		$this->data['table_page'] = TRUE;
		$this->data['view_module'] = 'category';
		$this->data['view_file'] = 'edit';
		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}


	public function update(){
		$config = array(
			'upload_path' => "./category_picture/",
			'allowed_types' => "gif|jpg|png|jpeg",
			'overwrite' => false,
			'max_size' => "2048000",
			'height' => 128,
			'width' => 128,
			'encrypt_name'=>true
		);

		if(empty($_FILES['category_image_edit']['tmp_name'])){
			$success = $this->category_model->update();
			if($success == true){
				$data = array('status'=>200);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
		}
		else{
			$this->load->library('upload', $config);

			if($this->upload->do_upload('category_image_edit') == true){
				$data = $this->upload->data();
				$image_name = 'category_picture/'.$data['file_name'];
			}else{
				$image_err = $this->upload->display_errors();
				header("Content-type: application/json");
				echo json_encode($image_err);
				exit();
			}

			$success = $this->category_model->update($image_name);
			if($success == true){
				$data = array('status'=>200);
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
		}


	}


	public function delete(){
		$category_id = $this->input->post('category_id');
		if($this->category_model->unlink_category_image($category_id) == true){
			$delete_category = $this->category_model->delete($category_id);
			if($delete_category == true){
				$data = array('status'=>200,'message'=>'category deleted');
				header("Content-type: application/json");
				echo json_encode($data);
				exit();
			}
		}
	}

	public function get_brand(){
		$brands = $this->brand_model->get();
		$data = array();
		foreach ($brands as $key => $value) {
			$data[$value->name] = $value->name;
		}
		return $data;
	}

	public function change_category_showhome_status()
	{
		$category_id = $this->input->post('category_id');
		$show_home = $this->input->post('show_home');
		$update_status = $this->category_model->change_category_showhome_status($category_id,$show_home);
		if($update_status == true){
			$status = array('status'=>200,'message'=>'status changed');
			header("Content-type: application/json");
			echo json_encode($status);
			exit();
		}
	}

}
