<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bestseller_model extends MY_Model {

// public function get_best_selling_for_header_limit3(){
//     $query = $this->db->where('is_active',1)->order_by('best_selling','desc')->limit(3)->get('products');
//     return $query->result();
// }

public function get_all_best_selling(){
    $query = $this->db->where('is_active',1)->order_by('best_selling','desc')->get('products');
    return $query->result();
}

}