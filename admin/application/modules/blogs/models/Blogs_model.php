<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blogs_model extends MY_Model {

    protected $_table_name = 'blogs';
    protected $_table_blog_category = 'blog_category';
    protected $_table_blog_tags = 'blog_tags';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function get_blog($id = 0){
        if(!$id){
           $query = $this->db->get($this->_table_name);
           return $query->result();
        }else{
            $query = $this->db->where('id',$id)->get($this->_table_name);
           return $query->row();
        }
   }
    public function show() {
        $column = array('title', 'slug', 'author', 'category','sub_category','content');
        $query = "SELECT * FROM ".$this->_table_name;
        if(isset($_POST['search']['value']))
        {
           $query .= '
           WHERE title LIKE "%'.$_POST['search']['value'].'%"
           OR slug LIKE "%'.$_POST['search']['value'].'%"
           OR author LIKE "%'.$_POST['search']['value'].'%"
           OR category LIKE "%'.$_POST['search']['value'].'%"
           OR sub_category LIKE "%'.$_POST['search']['value'].'%"
           OR content LIKE "%'.$_POST['search']['value'].'%"
           ';
        }

       if(isset($_POST['order']))
       {
           $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
       }else{
           $query .= 'ORDER BY id DESC ';
       }
       $query1 = '';
       if($_POST['length'] != -1){
           $query1 = ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
       }
       $result = $this->db->query($query.$query1);
       return $result->result();
    }

    public function store($data){

        if($this->db->insert($this->_table_name, $data)){
            return 200;
        }
    }

    public function update($blog_id,$data){

        if($this->db->where('id',$blog_id)->update($this->_table_name, $data)){
            return 200;
        }
    }

    public function delete($blog_id){
        if(is_array($blog_id)){
            $id = implode(',', $blog_id);
            $where = "id IN ($id)";
            if($this->db->where($where)->delete($this->_table_name)){
                return true;
            }
        }else{
            if($this->db->delete($this->_table_name, array('id' => $blog_id))){
                return 200;
            }
        }
    }

    public function hash($string) {
        return hash('sha512', $string . config_item('encryption_key'));
    }


    public function get_all_category($condition = ''){
        $query = $this->db->where('is_active',1)->get($this->_table_blog_category);
        if(!empty($condition)){
            $category = array();
            foreach ($query->result() as $key => $value) {
                $category[$value->id]= $value->name;
            }
            return $category;
        }else{
            return $query->result();
        }
    }
    public function get_all_sub_category($condition = ''){
        $query = $this->db->where(['is_active'=>1,'pid !='=>0])->get($this->_table_blog_category);
        if(!empty($condition)){
            $category = array();
            foreach ($query->result() as $key => $value) {
                $category[$value->id]= $value->name;
            }
            return $category;
        }else{
            return $query->result();
        }
    }


    public function get_all_tags($condition = ''){
        if(!$condition){
        $query = $this->db->where('is_active',1)->get($this->_table_blog_tags);
        return $query->result();
        }else{
            $query = $this->db->where('is_active',1)->get($this->_table_blog_tags);
            $tags = array();
            foreach ($query->result() as $key => $value) {
                $tags[$value->id]= $value->name;
            }
            return $tags;
        }
    }

    public function get_sub_category($category_id){
        $query = $this->db->where(['pid'=>$category_id,'is_active'=>1])->get($this->_table_blog_category);
        return $query->result();
    }



    public  function change_status($blog_id,$status){
        if($this->db->where('id',$blog_id)->update($this->_table_name,['is_active'=>$status])){
            return true;
        }else{
            return false;
        }

    }

    public function count_total_row_of_blog(){
        $query = $this->db->get($this->_table_name);
        return $query->num_rows();
    }

    public function delete_blog_comments($id){
        if($this->db->where('post_id',$id)->delete('blog_comments')){
            return true;
        }
    }


    public function check_blog_slug_duplicate($slug,$id = '')
    {
        $slug = preg_replace('/\s+/', '', $slug);
        if(empty($id)){
            $query = $this->db->where('slug',$slug)->get($this->_table_name);
            return $query->row();
        }else{
            $query = $this->db->where(['id'=>$id,'slug !='=>$slug])->get($this->_table_name);
            return $query->row();
        }
    }


    public function get_by_id($id)
    {
        $query = $this->db->where('id',$id)->get($this->_table_name);
        return $query->row();
    }
}
