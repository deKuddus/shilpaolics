<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cart_model extends MY_Model {

    protected $_table_products = 'products';
    protected $_table_category = 'category';
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

    public function get_new() {

        $user_role = new stdClass();
        
        $user_role->role_name = '';

        return $user_role;
    }

    public function get_product_by_id($product_id){
        $this->db->select('*')->from('products')->where(['id'=>$product_id]);
        $query = $this->db->get();
        return $query->row();
    }

    public function discount_type($id)
    {
         $query = $this->db->where('id',$id)->get('types');
         return $query->row();
    }

    public function validate_coupon($code)
    {
        $query = $this->db->where(['code' => $code,'status' => 1])->get('cupon');
        if($query->row()){
            return $query->row();
        }else{
            return false;
        }
    }
}