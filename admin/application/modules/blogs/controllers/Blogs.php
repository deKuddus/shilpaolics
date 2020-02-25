<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class Blogs extends Admin_Controller {

	function __construct()
	{
		parent::__construct();
		$this->load->model('blogs_model');
		$this->load->module('template');

	}

	public function index() {
		$this->manage();
	}

	public function manage() {
		$this->data['view_module'] = 'blogs';
		$this->data['view_file'] = 'manage';
		$this->data['page_title'] = "SHILPAOLIC Admin | Blogs";
		$this->template->_shop_admin($this->data);
	}
	/**
	*
	*@create() method used to create/insert
	*	blogs information
	*
	*/
	public function create()
	{
		$this->data['category'] = $this->blogs_model->get_all_category('dropdown');
		$this->data['tags'] = $this->blogs_model->get_all_tags('dropdown');
		$this->data['view_module'] = 'blogs';
		$this->data['view_file'] = 'create';
		$this->template->_shop_admin($this->data);
	}
	/*
	*
	* @show() method used to show blogs list
	*	list loaded by Datatable ajax
	*
	*/
	public function show()
	{
		global $category,$sub_category;
		$data = array();
		$category_array = $this->blogs_model->get_all_category();
		$tags_array = $this->blogs_model->get_all_tags();
		foreach ($this->blogs_model->show() as $b_key => $blogs) {
			$sub_array = array();
			foreach ($category_array as $key => $cat) {
				if($blogs->category == $cat->id){
					$category = $cat->name;
				}
			}
			foreach ($category_array as $key => $sub_cat) {
				if($blogs->sub_category == $sub_cat->id){
					$sub_category = $sub_cat->name;
				}
			}
			$_tag = '';
			foreach (json_decode($blogs->tags) as $key => $tag_value) {
				foreach ($tags_array as $key => $tag) {
					if($tag_value == $tag->id){
						$_tag.= "<span class='label label-success'>".$tag->name."</span>&nbsp;";
					}
				}
			}
			if($blogs->is_active == 1){
				$status = '<div class="switch">
				<div class="onoffswitch">
				<input type="checkbox" onchange="change_status('.$blogs->id.',this)" checked="checked" class="onoffswitch-checkbox status" id="example'.$b_key.'" value="0">
				<label class="onoffswitch-label" for="example'.$b_key.'">
				<span class="onoffswitch-inner"></span>
				<span class="onoffswitch-switch"></span>
				</label>
				</div>
				</div>';
			}else if($blogs->is_active == 0){
				$status = '<div class="switch">
				<div class="onoffswitch">
				<input type="checkbox" onchange="change_status('.$blogs->id.',this)" class="onoffswitch-checkbox status" id="example'.$b_key.'" value="1">
				<label class="onoffswitch-label" for="example'.$b_key.'">
				<span class="onoffswitch-inner"></span>
				<span class="onoffswitch-switch"></span>
				</label>
				</div>
				</div>';
			}
			$sub_array[] ='<input type="checkbox" name="blogs_id[]" class="blogs_checkbox" value="'.$blogs->id.'"/>';
			$sub_array[] = $blogs->title;
			$sub_array[] = $blogs->slug;
			$sub_array[] = $blogs->author;
			$sub_array[] = $category;
			$sub_array[] = $sub_category;
			$sub_array[] = $_tag;
			$sub_array[] = textShort($blogs->content,50);
			$sub_array[] = $status;
			$sub_array[] = '<img src="'.FILE_UPLOAD_PATH.$blogs->images.'" alt="blogs image" height="100px" width="100px;">';
			$sub_array[] ='<div class="btn-group">
			<button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
			<ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
			<li><a class="dropdown-item" data-toggle="modal" data-target="#full_blog" onclick="view_blog('.$blogs->id.')" >View</a></li>
			<li><a class="dropdown-item" href="'.base_url('blogs/edit/'.$blogs->id).'">Edit</a></li>
			<li><a class="dropdown-item" onclick="delete_blogs('.$blogs->id.')">Delete</a></li>
			</ul>
			</div>';
			$data[] = $sub_array;
		}
		$output = array(
			'draw'    => intval($_POST['draw']),
			'recordsTotal'  => $this->blogs_model->count_total_row_of_blog(),
			'recordsFiltered'  => $this->blogs_model->count_total_row_of_blog(),
			'data'    => $data
		);
		echo json_encode($output);
	}

	/*
	*
	* @store() function used to
	*	store blogs information
	*
	*/
	public function store()
	{
		if(empty($this->blogs_model->check_blog_slug_duplicate($_POST['slug']))){

			if(!empty($_FILES)){
				$config = image_config('blog_image');
				$this->load->library('upload', $config);
				if($this->upload->do_upload('blog_images') == true){
					$data = $this->upload->data();
					$image = 'blog_image/'.$data['file_name'];
				}else{
					$image_err = $this->upload->display_errors();
					response($image_err);
				}

			}else{
				$image = "blog_picture/default.png";
			}
			$blog_data = [
				'title'=>$this->input->post('title'),
				'slug'=>preg_replace('/\s+/', '', $this->input->post('slug')),
				'category'=>$this->input->post('category'),
				'sub_category'=>$this->input->post('sub_category'),
				'author'=>$this->input->post('author'),
				'tags'=>json_encode($this->input->post('tags')),
				'content'=>$this->input->post('content'),
				'images'=>$image
			];

			$success = $this->blogs_model->store($blog_data);
			if($success == 200){
				response('blog added',200);
			}
		}else{
			response('slug already exist, it should be unique',700);
		}
	}
	/*
	*
	*@edit() method used to edit a blogs
	*	by blogs id
	*
	*/
	public function edit($blogs_id)
	{
		$this->data['blog']=$this->blogs_model->get_blog($blogs_id);
		$this->data['category'] = $this->blogs_model->get_all_category('dropdown');
		$this->data['sub_category'] = $this->blogs_model->get_all_sub_category('dropdown');
		$this->data['tags'] = $this->blogs_model->get_all_tags('dropdown');
		$this->data['users_page'] = TRUE;
		$this->data['form_page'] = TRUE;
		$this->data['view_module'] = 'blogs';
		$this->data['view_file'] = 'edit';

		$this->template->_shop_admin($this->data);
	}

	/*
	*
	*@update() method used to update
	*	blogs information after edit
	*
	*/
	public function update()
	{
		if(empty($this->blogs_model->check_blog_slug_duplicate($_POST['slug'],$_POST['blog_id']))){
			$blog_data = array();
			if(!empty($_FILES)){
				$config = image_config('blog_image');
				$this->load->library('upload', $config);
				if($this->upload->do_upload('blog_images') == true){
					$data = $this->upload->data();
					$image = 'blog_image/'.$data['file_name'];
				}else{
					$image_err = $this->upload->display_errors();
					response($image_err);
				}
				$file = $this->blogs_model->get_by_id($_POST['blog_id'])->images;
				if(unlink_file($file) == true){
					$blog_data['images'] = $image;
				}
			}

			$blog_data['title'] = $this->input->post('title');
			$blog_data['slug'] = preg_replace('/\s+/', '', $this->input->post('slug'));
			$blog_data['category'] = $this->input->post('category');
			$blog_data['sub_category'] = $this->input->post('sub_category');
			$blog_data['author'] = $this->input->post('author');
			$blog_data['tags'] = json_encode($this->input->post('tags'));
			$blog_data['content'] = $this->input->post('content');



			$success = $this->blogs_model->update($_POST['blog_id'],$blog_data);
			if($success == 200){
				response('blog updated',200);
			}
		}else{
			response('slug already exist,it should be unique',700);
		}
	}



	/*
	* @delete() method has two type
	*	if multiple_delete parameter found the mulitiple data willbe
	*	deleted.
	*	else single data will be delted
	*/
	public function delete()
	{

		$blogs_id = $this->input->post('blogs_id');
		if(!is_array($blogs_id)){
			if($this->blogs_model->delete_blog_comments($blogs_id) == true){
				$file = $this->blogs_model->get_by_id($blogs_id)->images;
				if(unlink_file($file) == true){
					$delete_blogs = $this->blogs_model->delete($blogs_id);
					if($delete_blogs == 200){
						response('blog deleted',200);
					}else{
						response('failed to delete blogs',200);
					}
				}
			}
		}else{

			foreach ($blogs_id as $key => $b_id) {
				if($this->blogs_model->delete_blog_comments($b_id) == true){
					$file = $this->blogs_model->get_by_id($b_id)->images;
					$unlink_image = unlink_file($file);
				}
			}
			if($unlink_image == true){
				$delete_blogs = $this->blogs_model->delete($blogs_id);
				if($delete_blogs == 200){
					response('blogs deleted',200);
				}else{
					response('failed to delete blogs',200);
				}
			}
		}
	}


	/*
	*
	* @get_sub_category() method to fetch subcategory for dropdown
	*	by category id
	*
	*/
	public function get_sub_category()
	{
		$category_id = $this->input->post('category_id');
		$sub_category = $this->blogs_model->get_sub_category($category_id);
		if(!empty($sub_category)){
			echo json_encode($sub_category);
		}else{
			echo json_encode($sub_category);
		}
	}

	/*
	*
	*@change_status() used to the blogs is active
	*	or not.(publish or not publish)
	*
	*/
	public function change_status()
	{
		$blogs_id = $this->input->post('blogs_id');
		$status = $this->input->post('status');
		$updated_status = $this->blogs_model->change_status($blogs_id,$status);
		if($updated_status == true){
			response('status changed',200);
		}else{
			response('status not changed',200);
		}
	}

	/**
	* @update_quantity_in_blogs_table() method is used to update quantity in blogs tabel
	* and insert new stock in stock table
	*
	*/
	public function update_quantity_in_blogs_table()
	{
		$blogs_id = $this->input->post('blogs_id_to_stock');
		$quantity = $this->input->post('quantity');
		$type = $this->input->post('type');
		$blogs = $this->blogs_model->get_blogs($blogs_id);
		$previous_quantity = $this->blogs_model->get_quantity_by_id($blogs_id);
		global $new_quantity;
		if(isset($blogs_id) && isset($quantity) && isset($type)){
			if($type == 1){
				$new_quantity = ($quantity+$previous_quantity->quantity);
			}else if($type == 2 OR $type == 3){
				$new_quantity = ($previous_quantity->quantity-$quantity);
				if($new_quantity < 0){
					response('woops! quantity will be negative',300);
				}
			}
			$stock_data = [
				'type'=>$this->input->post('type'),
				'category_id'=>$blogs->category_id,
				'blogs_id'=>$blogs_id,
				'quantity'=>$this->input->post('quantity'),
				'rate'=>$this->input->post('rate'),
				'total'=>($this->input->post('rate') * $this->input->post('quantity')),
				'remarks'=>$this->input->post('remarks'),
				'created_by'=>$this->session->userdata('role_id')
			];

			if($this->stock_model->add_stock($stock_data) == true){

				if($this->blogs_model->update_blogs_quantity($blogs_id,$new_quantity) ==  true){
					response('quantity upadated',200);
				}
			}
		}
	}

	/*
	*
	*@view() method used to see
	*	details of a blogs
	*
	*/
	public function view()
	{
		$id = $this->input->get('id');
		$this->data['category'] = $this->blogs_model->get_all_category();
		$this->data['types'] = $this->blogs_model->get_tax_discount_type();
		$this->data['brands'] = $this->blogs_model->get_all_brands();
		$this->data['units'] = $this->blogs_model->get_all_units();
		$this->data['tags'] = $this->blogs_model->get_all_tags();
		$this->data['colors'] = $this->blogs_model->get_all_colors();
		$this->data['sizes'] = $this->blogs_model->get_all_sizes();
		$this->data['blogs'] = $this->blogs_model->get_blogs($id);
		$this->data['view_module'] = 'blogs';
		$this->data['view_file'] = 'view';
		$this->template->_shop_admin($this->data);

	}

	/*
	*
	*@get_blogs_discount_by_id() used to edit/add
	*	blogs discount
	*
	*/
	public function get_blogs_discount_by_id()
	{
		$blogs_id = $this->input->post('blogs_id');
		$discount = $this->blogs_model->get_blogs_discount_by_id($blogs_id);
		if(isset($discount)){
			echo json_encode($discount);
		}
	}

	/*
	*
	*@get_selected_discount_type() method used to
	*	get selected discount type for edit/add discount
	*	in blogs
	*/
	public function get_selected_discount_type()
	{
		$discount_type = $this->blogs_model->get_tax_discount_type();
		if(isset($discount_type)){
			echo json_encode($discount_type);
		}
	}
}
