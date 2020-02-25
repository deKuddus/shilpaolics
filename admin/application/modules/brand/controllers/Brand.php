<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand extends Admin_Controller {

	function __construct()
	{
		parent::__construct();

        // Load Stuff
		$this->load->model('brand_model');

	}

	public function index() {
		$this->manage();
	}

	public function manage() {

		$this->data['brand_page'] = TRUE;
		$this->data['table_page'] = TRUE;
		$this->data['view_module'] = 'brand';
		$this->data['view_file'] = 'manage';
		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}

	public function show()
	{
		$data = array();
		foreach ($this->brand_model->show() as $key => $brand) {
			$sub_array = array();
			$sub_array[] = "<input type='checkbox' class='brand_checkbox' name='brand_id' value='".$brand->id."'>";
			$sub_array[] = $brand->id;
			$sub_array[] = $brand->name;
			$sub_array[] = "<img src='".FILE_UPLOAD_PATH.$brand->picture."' alt='brand logo' height='100px' width='100px'>";
			$sub_array[] ='<div class="btn-group">
			<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
			<ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
			<li><a class="dropdown-item" data-toggle="modal" data-target="#brand_edit_modal" onclick="edit_brand('.$brand->id.')">Edit</a></li>
			<li><a class="dropdown-item" onclick="delete_brand('.$brand->id.')">Delete</a></li>
			</ul>
			</div>';
			$data[] = $sub_array;
		}
		$output = array(
			'draw'    => intval($_POST['draw']),
			'recordsTotal'  => $this->brand_model->count_total_row_of_brand(),
			'recordsFiltered'  => $this->brand_model->count_total_row_of_brand(),
			'data'    => $data
		);
		echo json_encode($output);
	}
	public function store()
	{
		$config = image_config('brand_picture');
		if(empty($_FILES['brand_image']['tmp_name'])){
			$image_name = "brand_picture/default.png";
			$data = array(
				'name' => ucfirst($this->input->post('name')),
				'picture'=>$image_name,
			);
			$success = $this->brand_model->store($data);
			if($success==200){
				response('brand added',200);
			}
			elseif($success == 301){
				response('brand name exist',301);
			}
		}
		else{

			$this->load->library('upload', $config);
			if($this->upload->do_upload('brand_image') == true){
				$data = $this->upload->data();
				$image_name = 'brand_picture/'.$data['file_name'];
			}else{
				$image_err = $this->upload->display_errors();
				response($image_err);
			}
			$data = array(
				'name' => ucfirst($this->input->post('name')),
				'picture'=>$image_name,
			);
			$success = $this->brand_model->store($data);
			if($success == 200){
				response('brand added',200);
			}
			elseif($success == 301){
				response('brand name exist',301);
			}
		}
	}

	public function edit_brand()
	{
		$id = $this->input->post('id');
		$brand = $this->brand_model->get($id);
		if(isset($brand)){
			echo json_encode($brand);
		}
	}

	/*
	*
	*@update() method used to update brand information
	*	into database
	*
	*/
	public function update()
	{
		$config = image_config('brand_picture');
		$id = $this->input->post('brand_id');

		if(empty($_FILES['brand_image_edit']['tmp_name'])){
			$data = ['name' => $this->input->post('name')];
			$success = $this->brand_model->update($data,$id);
		}else{
			$this->load->library('upload', $config);
			if($this->upload->do_upload('brand_image_edit') == true){
				$data = $this->upload->data();
				$image_name = 'brand_picture/'.$data['file_name'];
			}else{
				$image_err = $this->upload->display_errors();
				response($image_err);
			}
			$data = ['name' => $this->input->post('name'),'picture' =>$image_name];
			$success = $this->brand_model->update($data,$id);
		}
		if($success == true){
			response('brand updated',200);
		}
	}

	/*
	*
	*@delete() method for delete brand information
	*
	*
	*/
	public function delete()
	{
		$brand_id = $this->input->post('brand_id');
		if(!is_array($brand_id)){
			$file = $this->brand_model->get_by_id($brand_id)->picture;
			if(unlink_file($file) == true){
				$delete_brand = $this->brand_model->delete($brand_id);
				if($delete_brand == 200){
					response('brand deleted',200);
				}else{
					response('failed to delete brand',200);
				}
			}
		}else{
			foreach ($brand_id as $key => $b_id) {
				$file = $this->brand_model->get_by_id($b_id)->picture;
				$unlink_image = unlink_file($file);
			}
			if($unlink_image == true){
				$delete_brand = $this->brand_model->delete($brand_id);
				if($delete_brand == 200){
					response('brand deleted',200);
				}else{
					response('failed to delete brand',200);
				}
			}
		}
	}

}
