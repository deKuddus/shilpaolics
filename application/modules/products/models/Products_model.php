<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products_model extends MY_Model {

    protected $_table_products = 'products';
    protected $_table_category = 'category';
    protected $_table_wishlist = 'wishlist';

    
    public function get_product_by_filter($query,$rowperpage,$rowno) {
          $result = $this->db->query($query);
        $this->db->limit($rowperpage,$rowno);
        return $result->result();
        
    }

    public function get_total_product_in_store() {
        $this->db->select('count(*) as allcount');
        $this->db->from('products');
        $query = $this->db->get();
        $result = $query->result_array();
        return $result[0]['allcount'];
    }

    public function get_product_by_id($product_id){
        $this->db->select('*')->from('products')->where(['id'=>$product_id,'is_active'=>1]);
        $query =  $this->db->get();
        return $query->row();
    }

    public function get_all_categories(){
        $query = $this->db->get($this->_table_category);
        return $query->result();

    }
    public function get_all_brand()
    {
        $query = $this->db->where('is_active',1)->get('brand');
        return $query->result();
    }
    public function new_arraival()
    {
        $query = $this->db->where('is_active',1)->order_by('id','desc')->limit(10)->get($this->_table_products);
        return $query->result();
    }

    public function filter_products($filter_array)
    {
       $where = "is_active = 1  ";
       if(isset($filter_array['category']) OR isset($filter_array['brand']) OR (isset($filter_array['max_price']) && isset($filter_array['min_price']) )){
        $where .= " AND ";
       }
       $this->db->select("*");
       $this->db->from($this->_table_products);

       if(isset($filter_array['category_id']) && !empty($filter_array['category_id'])){
        $category = implode(',',$filter_array['category_id']);
        $where.= "   category_id IN ('".$category."') AND ";
       }


       if(isset($filter_array['brand_id']) && !empty($filter_array['brand_id'])){
        $brand = implode(',',$filter_array['brand_id']);
        $where.= "  brand_id IN ('".$brand."') AND ";
       }

       if(isset($filter_array['max_price']) && isset($filter_array['min_price'])){
        $min_price = $filter_array['min_price'];
        $max_price = $filter_array['max_price'];
        $where .= " sale_price BETWEEN "."$min_price AND $max_price ";
       }

       /*$query = "select * from products where ". $where;
       var_dump($query);exit();*/

       $this->db->where($where);
       $this->db->order_by("id", "DESC");
       $this->db->limit($filter_array['limit'], $filter_array['start']);
       $query = $this->db->get();
       return $query->result();
        
    }


    public function product_by_category($category_id)
    {
      $query = $this->db->where('category_id',$category_id)->get($this->_table_products);
      return $query->result(); 
    }
}