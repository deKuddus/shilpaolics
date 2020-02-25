<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Newarraival_model extends MY_Model {

public function get_latest_product(){
    $query = $this->db->where('is_active',1)->order_by('id','desc')->limit(20)->get('products');
    return $query->result();
}

}