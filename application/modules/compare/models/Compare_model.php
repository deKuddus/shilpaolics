<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Compare_model extends MY_Model {



    function __construct()
    {
        parent::__construct();
    }


    public function get_all_brand()
    {
    	$query = $this->db->get('brand');
    	return $query->result();
    }

}