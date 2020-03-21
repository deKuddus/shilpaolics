<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product_model extends MY_Model {

    protected $_table_name = 'products';
    protected $_table_category = 'category';
    protected $_table_brand = 'brand';
    protected $_table_units = 'units';
    protected $_table_tags = 'tags';
    protected $_table_colors = 'colors';
    protected $_table_sizes = 'sizes';
    protected $_table_type = 'types';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function get_product($id = 0){
        if(!$id){
           $query = $this->db->get($this->_table_name);
           return $query->result();
        }else{
            $query = $this->db->where('id',$id)->get($this->_table_name);
           return $query->row();
        }
   }
    public function show() {
        $column = array('title', 'quantity', 'purchase_price', 'sale_price','is_active','feature_image1');
        $query = "SELECT * FROM ".$this->_table_name;
        if(isset($_POST['search']['value']))
        {
           $query .= '
           WHERE title LIKE "%'.$_POST['search']['value'].'%" 
           OR quantity LIKE "%'.$_POST['search']['value'].'%" 
           OR purchase_price LIKE "%'.$_POST['search']['value'].'%" 
           OR sale_price LIKE "%'.$_POST['search']['value'].'%" 
           OR is_active LIKE "%'.$_POST['search']['value'].'%" 
           OR feature_image1 LIKE "%'.$_POST['search']['value'].'%" 
           OR feature_image2 LIKE "%'.$_POST['search']['value'].'%" 
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
            return $this->db->insert_id();
        }
    }

    public function upload_optional_image($data){
        if($this->db->insert('product_optional_image', $data)){
            return true;
        }
    }

    public function get_image_optional_image($id){
        $image = $this->db->where('product_id',$id)->get('product_optional_image');
        return $image->result();
    }

    public function update($product_id,$data){

        if($this->db->where('id',$product_id)->update($this->_table_name, $data)){
            return 200;
        }
    }

    public function delete($product_id){
        if(is_array($product_id)){
            $id = implode(',', $product_id);
            $where = "id IN ($id)";
            if($this->db->where($where)->delete($this->_table_name)){
                return true;
            }
        }else{
            if($this->db->delete($this->_table_name, array('id' => $product_id))){
                return 200;
            }
        }
    }

    public function hash($string) {
        return hash('sha512', $string . config_item('encryption_key'));
    }

    public function unlink_product_image($id,$path = ''){
        if(!empty($path)){//code for single image remove
            // return $id;
            $feature_image = FILE_UPLOAD_PATH.$path;
             unlink($feature_image);
        }else{ // code for both image remove
            $query=$this->db->where('id',$id)->get('products');
            foreach ($query->result() as  $value) {
                $feature_image1 = FILE_UPLOAD_PATH.$value->feature_image1;
                $feature_image2 = FILE_UPLOAD_PATH.$value->feature_image2;
                unlink($feature_image1);
                unlink($feature_image2);
            }
        }
        return true;
    }

    public function get_all_category($condition = ''){
        $query = $this->db->where('is_active',1)->get($this->_table_category);
        if(!empty($condition)){
            $category = array();
            foreach ($query->result() as $key => $value) {
                $category[$value->id]= $value->category_name;
            }
            return $category;
        }else{
            return $query->result();
        }
    }

    public function get_all_brands($condition = ''){
        $query = $this->db->where('is_active',1)->get($this->_table_brand);
        if(!empty($condition)){
            $brands = array();
            foreach ($query->result() as $key => $value) {
                $brands[$value->id]= $value->name;
            }
            return $brands;
        }else{
            return $query->result();
        }
    }
    public function get_all_units($condition = ''){
        if(!$condition){
            $query = $this->db->where('is_active',1)->get($this->_table_units);
            return $query->result();
        }else{
            $query = $this->db->where('is_active',1)->get($this->_table_units);
            $units = array();
            foreach ($query->result() as $key => $value) {
                $units[$value->id]= $value->name;
            }
            return $units;
        }
    }
    public function get_all_tags($condition = ''){
        if(!$condition){
        $query = $this->db->where('is_active',1)->get($this->_table_tags);
        return $query->result();
        }else{
            $query = $this->db->where('is_active',1)->get($this->_table_tags);
            $tags = array();
            foreach ($query->result() as $key => $value) {
                $tags[$value->id]= $value->name;
            }
            return $tags;
        }
    }
    public function get_all_colors($condition = ''){
        if(!$condition){
        $query = $this->db->where('is_active',1)->get($this->_table_colors);
        return $query->result();
        }else{
            $query = $this->db->where('is_active',1)->get($this->_table_colors);
            $colors = array();
            foreach ($query->result() as $key => $value) {
                $colors[$value->id]= $value->name;
            }
            return $colors;
        }
    }
    public function get_all_sizes($condition = ''){
        if(!$condition){
        $query = $this->db->where('is_active',1)->get($this->_table_sizes);
        return $query->result();
        }else{
            $query = $this->db->where('is_active',1)->get($this->_table_sizes);
            $sizes = array();
            foreach ($query->result() as $key => $value) {
                $sizes[$value->id]= $value->name;
            }
            return $sizes;
        }
    }
    public function get_sub_category($category_id){
        $query = $this->db->where(['pid'=>$category_id,'is_active'=>1])->get($this->_table_category);
        return $query->result();
    }

    public function get_tax_discount_type($condition = ''){
        if(!$condition){
        $query = $this->db->get($this->_table_type);
        return $query->result();
        }else{
            $query = $this->db->get($this->_table_type);
            $types = array();
            foreach ($query->result() as $key => $value) {
                $types[$value->id]= $value->symbol;
            }
            return $types;
        }
    }

    public  function change_status($product_id,$status){
        if($this->db->where('id',$product_id)->update($this->_table_name,['is_active'=>$status])){
            return true;
        }else{
            return false;
        }

    }

    public function count_total_row_of_product(){
        $query = $this->db->get($this->_table_name);
        return $query->num_rows();
    }


    public function get_quantity_by_id($id){
        $query = $this->db->select('quantity')->where('id',$id)->get($this->_table_name);
        return $query->row();
    }

    public function update_product_quantity($id,$quantity){
        if($this->db->where('id',$id)->update($this->_table_name,['quantity'=>$quantity])){
            return true;
        }
    }

    public function get_product_discount_by_id($product_id)
    {
        $query = $this->db->select('discount,discount_type')->where('id',$product_id)->get($this->_table_name);
        return $query->row();
    }

    public function delete_single_image_optional($id)
    {
        $query = $this->db->where('id',$id)->get('product_optional_image');
        $image = $query->row();
        unlink('../uploads/'.$image->picture);
        if($this->db->where('id',$id)->delete('product_optional_image')){
            return true;
        }
    }
}