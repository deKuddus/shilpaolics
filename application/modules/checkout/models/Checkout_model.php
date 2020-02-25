<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout_model extends MY_Model {

    protected $_table_sales = 'sales';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function proceed_to_checkout($data){
    	if($this->db->insert($this->_table_sales,$data)){
            $this->cart->destroy();
    		return true;
    	}
    }


}