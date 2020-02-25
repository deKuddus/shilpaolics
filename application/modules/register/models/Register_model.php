<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends MY_Model {

    protected $_table_name = 'customer';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';



    function __construct()
    {
        parent::__construct();
    }

    public function check_username($username)
    {
    	$query = $this->db->where(['username'=>$username])->get($this->_table_name);
    	if(!empty($query->result())){
    		return true;
    	}else{
    		return false;
    	}
    }

    public function check_email($email)
    {
    	$query = $this->db->where(['email'=>$email])->get($this->_table_name);
    	if(!empty($query->result())){
    		return true;
    	}else{
    		return false;
    	}
    }
}