<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock_model extends MY_Model {

    protected $_table_name = 'stock';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function add_stock($stock_data)
    {
        if($this->db->insert($this->_table_name,$stock_data)){
            return true;
        }
    }

    public function show()
    {
        $column = array('id', 'type', 'product_id', 'category_id','quantity','rate','total','remarks');
        $query = "SELECT * FROM ".$this->_table_name;
        if(isset($_POST['search']['value']))
        {
           $query .= '
           WHERE type LIKE "%'.$_POST['search']['value'].'%" 
           OR product_id LIKE "%'.$_POST['search']['value'].'%" 
           OR category_id LIKE "%'.$_POST['search']['value'].'%" 
           OR quantity LIKE "%'.$_POST['search']['value'].'%" 
           OR rate LIKE "%'.$_POST['search']['value'].'%" 
           OR total LIKE "%'.$_POST['search']['value'].'%" 
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
           $query1 = ' LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
       }
       $result = $this->db->query($query.$query1);
       return $result->result();
    }

    public function get_stock_by_id($id)
    {
        $query = $this->db->where('id',$id)->get($this->_table_name);
        return $query->row();
    }


    public function update($stock_id,$stock_data)
    {
        if($this->db->where('id',$stock_id)->update($this->_table_name,$stock_data)){
            return true;
        }
    }
    public function count_stock()
    {
        $query = $this->db->get($this->_table_name);
        return $query->num_rows();
    }

    public function delete($stock_id)
    {
      if(is_array($stock_id)){
         $id = implode(',', $stock_id);
        $where = "id IN ($id)";
        if($this->db->where($where)->delete($this->_table_name)){
            return true;
        }
      }else{
        if($this->db->delete($this->_table_name,['id'=>$stock_id])){
            return true;
        }
      }
    }

    public function get_stock_type()
    {
        $query = $this->db->where('is_active',1)->get('stock_type');
        return $query->result();
    }
}