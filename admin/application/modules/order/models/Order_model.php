<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order_model extends MY_Model {

    protected $_table_name = 'sales';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function show($code = '') {
        if(empty($code)){
            $column = array('id', 'code', 'sales_at', 'payment_status', 'delivery_status', 'grand_total');
            $query = "SELECT * FROM ".$this->_table_name;
            if(isset($_POST['search']['value']))
            {
               $query .= '
               WHERE id LIKE "%'.$_POST['search']['value'].'%" 
               OR code LIKE "%'.$_POST['search']['value'].'%" 
               OR sales_at LIKE "%'.$_POST['search']['value'].'%" 
               OR payment_status LIKE "%'.$_POST['search']['value'].'%" 
               OR grand_total LIKE "%'.$_POST['search']['value'].'%" 
               OR delivery_status LIKE "%'.$_POST['search']['value'].'%" 
               ';
           }

           if(isset($_POST['order']))
           {
               $query .= 'ORDER BY '.$column[$_POST['order']['0']['column']].' '.$_POST['order']['0']['dir'].' ';
           }else{
               $query .= 'ORDER BY id DESC ';
           }
           $query1 = '';
           if($_POST['length'] != -1){
               $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
           }
           $result = $this->db->query($query.$query1);
           return $result->result();
        }else{
            $query = $this->db->where('code',$code)->get($this->_table_name);
            return $query->row();
        }
    }

    public function count_total_row_of_order(){
        $query = $this->db->get($this->_table_name);
        return $query->num_rows();
    }

    public function delete_invoice($code){
       if( $this->db->delete($this->_table_name, array('code' => $code))){
        return true;
       }
    }

    public function get_delivery_status()
    {
        $query = $this->db->get('delivery_status');
        return $query->result();
    }

    public function get_invoice_delivery_status($code)
    {
        $query = $this->db->select('delivery_status')->where('code',$code)->get($this->_table_name);
        return $query->row();
    }

    public function submit_order_status($code,$status)
    {
        if($this->db->where('code',$code)->update($this->_table_name,$status)){
            return true;
        }
    }


    public function get_order_by_code($code)
    {
        $query = $this->db->where('code',$code)->get($this->_table_name);
        return $query->row();
    }


}