<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_model extends MY_Model {

    protected $_table_products = 'products';
    protected $_table_category = 'category';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function get_latest_8_products()
    {
        $this->db->select('*')->from('products')->where(['is_active'=>1]);
        $this->db->order_by('id','desc');
        $this->db->limit(8);
        $query = $this->db->get();
        return $query->result();
    }
    
    public function get_all_products($rowno,$rowperpage) {
        $this->db->select('*')->from('products')->where(['is_active'=>1]);
       // $this->db->join('product_images','products.id = product_images.product_id','right' );
        $this->db->limit($rowperpage,$rowno);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_total_product_in_store() {
        $this->db->select('count(*) as allcount');
        $this->db->from('products');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }

    


    public function get_3_active_slider(){
        $this->db->select('*')->from('slider')->where('is_active',1)->limit(4);
        $query  = $this->db->get();
        return $query->result(); 
    }

    public function get_all_categories($pid){

        $this->db->select('count(pid) AS cat')->from('category')->where('pid',$pid)->limit(1);
        $query = $this->db->get();
        return $query->result();
      
    }

    public function category_list($pid = 0){
        $this->db->select('id,category_name,pid')->from('category')->where('pid',$pid);
        $query = $this->db->get();
        return $query->result();
    }

    public function get_all_categories_for_home(){
        $this->db->select('*')->from('category')->where('is_active',1);
        $query = $this->db->get();
        return $query->result();

    }




}