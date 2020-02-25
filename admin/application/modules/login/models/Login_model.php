<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends MY_Model {

    protected $_table_name = 'customer';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';



    function __construct()
    {
        parent::__construct();
    }

    public function customer_login($login_id,$login_password)
    {
        $where = "(username = '{$login_id}' OR email = '{$login_id}' OR contact = '{$login_id}') AND password = '{$login_password}'";
        $this->db->where($where);
        $query = $this->db->get($this->_table_name);
    	if(!empty($query->result())){
    		return $query->result();
    	}else{
    		return false;
    	}
    }
}