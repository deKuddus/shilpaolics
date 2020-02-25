<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('blog_model');
        $this->load->module('template');

    }

    public function index() {
    	$this->manage();
    }

    public function manage() {
        $this->data['blogs'] = $this->blog_model->get_all_blog();
        $this->data['view_module'] = 'blog';
        $this->data['page_title'] = 'Blogs | shilpaolic.com';
        $this->data['view_file'] = 'manage';
        $this->template->_shop_ui($this->data);
    }
    public function view($slug){
        $this->data['blog'] = $this->blog_model->get_blog_by_slug($slug);
        $this->data['related_blog'] = $this->blog_model->get_blog_by_limit();
        $this->data['comments'] = $this->blog_model->get_blog_comment_by_slug($slug);
        $this->data['customer_data']= $this->blog_model->get_customer_data();
        $this->data['page_title'] =  $this->data['blog']->slug;
        $this->data['view_module'] = 'blog';
        $this->data['view_file'] = 'view';
        $this->template->_shop_ui($this->data);
    }	

    public  function save_comment(){
       $comment_data = [
           'post_id' => $this->input->post('post_id'),
           'name' => $this->input->post('name'),
           'email' => $this->input->post('email'),
           'website' => $this->input->post('website'),
           'message' => $this->input->post('message')
       ];
       if($this->blog_model->save_comment($comment_data) == true){
            $response = array('status'=>200,'message'=>'comment submitted');
            header("Content-type: application/json");
            echo json_encode($response);
            exit();
       }

    }

    public function get_blog_tags(){
        $tags = $this->blog_model->get_tags();
        if(isset($tags)){
            echo json_encode($tags);
        }
    }

    public function get_popular_post(){
        $posts = $this->blog_model->popular_posts_by_limit();
        if(isset($posts)){
            echo json_encode($posts);
        }
    }

    public function get_blog_category(){
        $posts = $this->blog_model->get_blog_category();
        if(isset($posts)){
            echo json_encode($posts);
        }
    }

    public function blog_in_cat($category_id){
        $this->data['blogs'] = $this->blog_model->bolg_by_category($category_id);
        $this->data['view_module'] = 'blog';
        $this->data['view_file'] = 'blog_in_category';
        $this->data['page_title'] = 'Blog in category | shilpaolic.com';
        $this->template->_shop_ui($this->data);
    }
}
