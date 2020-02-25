<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Wishlist_model extends MY_Model {

    protected $_table_products = 'products';
    protected $_table_category = 'category';
    protected $_table_wishlist = 'wishlist';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

    public $rules = array(
        'role_name' => array(
            'field' => 'role_name',
            'label' => 'User Role',
            'rules' => 'trim|required|xss_clean'
        )
    );

    function __construct()
    {
        parent::__construct();
    }


    public function get_user_all_wishlist_product($user_id){
        $query = $this->db->where(['user_id'=>$user_id,'is_active'=>1])->get($this->_table_wishlist);
        return $query->result();
    }

    public function remove_all_from_wihslist($user_id){
        if($this->db->delete($this->_table_wishlist, array('user_id' => $user_id))){
            return true;
        }
    }

    public function remove_from_wihslist_by_id($product_id,$user_id){
        if($this->db->delete($this->_table_wishlist, array('user_id' => $user_id,'product_id'=>$product_id))){
            return true;
        }
    }


    public function add_to_wishlist($data){
        if($query = $this->db->insert($this->_table_wishlist,$data)){
            return true;
        }
    }
    public function check_product_is_exist_in_wishlist($product_id){
        $query = $this->db->where('product_id',$product_id)->get($this->_table_wishlist);
        $data = $query->result();
        if($data){
            return false;
        }else{
            return true;
        }
    }

    public function discount_type()
    {
        $query = $this->db->get('types');
        return $query->result();
    }
}