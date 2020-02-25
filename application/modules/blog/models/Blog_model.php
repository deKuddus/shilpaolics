<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog_model extends MY_Model {
    protected $_blog = 'blogs';
    protected $_blog_comments = 'blog_comments';
    protected $_table_customer = 'customer';
    protected $_table_blog_tags = 'blog_tags';
    protected $_table_blog_category = 'blog_category';


    public function get_all_blog(){
        $query = $this->db->where('is_active',1)->order_by('id','desc')->get($this->_blog);
        return $query->result();
    }



    public function get_blog_by_slug($slug){
        if($this->count_blog_view($slug) == true){
            $query = $this->db->where(['is_active'=>1,'slug'=>$slug])->get($this->_blog);
            return $query->row();
        }
    }

    public function get_blog_by_limit(){
        $query = $this->db->where(['is_active'=>1])->limit(20)->get($this->_blog);
        return $query->result();
    }

    public function count_blog_view($slug){
        $query = $this->db->where(['is_active'=>1,'slug'=>$slug])->get($this->_blog);
        $data =  $query->row();
        if($data){
            $count = $data->counter + 1;
            $this->db->where(['slug'=>$slug])->update($this->_blog,['counter'=>$count]);
            return true;
        }else{
            return false;
        }
    }
    public function popular_posts_by_limit(){
        $query = $this->db->where(['is_active'=>1])->order_by('counter','desc')->limit(1)->get($this->_blog);
        return $query->result();
    }

    public  function save_comment($comment_data){
        $id = $this->db->insert($this->_blog_comments,$comment_data);
        if($id){
            return true;
        }
    }

    public function get_blog_comment_by_slug($slug){
        $post_id = $this->get_post_id_by_slug($slug);
        if($post_id != false){
            $query = $this->db->where(['is_active'=>1,'post_id'=>$post_id])->get($this->_blog_comments);
            return $query->result();
        }else{
            return false;
        }
    }

    public function get_post_id_by_slug($slug){
        $query = $this->db->where(['is_active'=>1,'slug'=>$slug])->get($this->_blog);
        $data =  $query->row();
        if($data){
            return $data->id;
        }else{
            return false;
        }
    }

    public function get_customer_data(){
        $username = $this->session->userdata('username');
        $query = $this->db->where(['username'=> $username])->get($this->_table_customer);
        return $query->row();
    }
    public function get_tags(){
        $this->db->where('is_active', 1);
        $this->db->order_by('id', 'RANDOM');
        $this->db->limit(9);
        $query = $this->db->get($this->_table_blog_tags);
        return $query->result();
    }

    public function get_blog_category(){
        $query = $this->db->where('is_active',1)->get($this->_table_blog_category);
        return $query->result();
    }

    public function bolg_by_category($category_id){
        $query = $this->db->where(['is_active'=>1,'category'=>$category_id])->get($this->_blog);
        return $query->result();
    }
}