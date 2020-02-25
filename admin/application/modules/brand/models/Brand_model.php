<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Brand_model extends MY_Model {

    protected $_table_name = 'brand';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function store($data = array())
    {

        if(!empty($this->check_name($data['name']))){
            return 301;
        }
        elseif($this->db->insert($this->_table_name, $data)){
            return 200;
        }
    }
    public function show() {
        $column = array('id', 'name');
        $query = "SELECT * FROM ".$this->_table_name;
        if(isset($_POST['search']['value']))
        {
         $query .= '
         WHERE id LIKE "%'.$_POST['search']['value'].'%"
         OR name LIKE "%'.$_POST['search']['value'].'%"
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


    /*
    *
    *
    *@update() method used to update
    *   brand information
    */
    public function update($data,$id)
    {
        if($this->db->where('id',$id)->update($this->_table_name, $data)){
            return true;
        }
    }


public function delete($brand_id){
    if(!is_array($brand_id)){
        if($this->db->delete($this->_table_name, array('id' => $brand_id))){
            return 200;
        }
    }else{
        $brand_id = implode(',', $brand_id);
        $where = "id IN ($brand_id)";
        if($this->db->where($where)->delete($this->_table_name)){
            return 200;
        }
    }
}



public function check_name($name,$id=0){
    if($id != 0){
        $query = $this->db->where(['name'=>$name,'id !='=>$id])->get($this->_table_name);
        return $query->result();
    }else{
        $query = $this->db->where('name',$name)->get($this->_table_name);
        return $query->result();
    }
}

    public function count_total_row_of_brand(){
        $query = $this->db->get($this->_table_name);
        return $query->num_rows();
    }

    public function get_by_id($id)
    {
        $query = $this->db->where('id',$id)->get($this->_table_name);
        return $query->row();
    }

}
