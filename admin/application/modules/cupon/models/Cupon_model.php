<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Cupon_model extends MY_Model {

    protected $_table_name = 'cupon';
    protected $_table_discount_on = 'discount_on';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

    function __construct()
    {
        parent::__construct();
    }
    public function show() {
        $column = array('id','title', 'code', 'discount_on', 'discount_type','discount_value','till','added_by');
        $query = "SELECT * FROM ".$this->_table_name;
        if(isset($_POST['search']['value']))
        {
           $query .= '
           WHERE id LIKE "%'.$_POST['search']['value'].'%" 
           OR title LIKE "%'.$_POST['search']['value'].'%" 
           OR code LIKE "%'.$_POST['search']['value'].'%" 
           OR discount_on LIKE "%'.$_POST['search']['value'].'%" 
           OR discount_type LIKE "%'.$_POST['search']['value'].'%" 
           OR discount_value LIKE "%'.$_POST['search']['value'].'%" 
           OR till LIKE "%'.$_POST['search']['value'].'%" 
           OR added_by LIKE "%'.$_POST['search']['value'].'%" 
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
    *@store() method save data into database
    *
    *
    */
    public function store($cupon_data)
    {
      if($this->db->insert($this->_table_name,$cupon_data)){
        return true;
      }
    }

    /*
    *
    *@edit() method used to fetch cuopn 
    * details using id
    *
    */
    public function edit($cupon_id)
    {
      $query = $this->db->where('id',$cupon_id)->get($this->_table_name);
      return $query->row(); 
    }

    /*
    *
    *@update() method used to update
    * cupon information
    *
    */
    public function update($cupon_data,$id)
    {
      if($this->db->where('id',$id)->update($this->_table_name,$cupon_data)){
        return 200;
      }
    }

    /*
    *
    *@get_discount_on() method used to 
    * fetch discoutn_on properties
    * eg. all_product, product,category
    */
    public function get_discount_on($condition = '')
    {
      $query = $this->db->where('is_active',1)->get($this->_table_discount_on);
      if(!$condition){
        return $query->result();
      }else{
        $data = array();
        foreach ($query->result() as $key => $value) {
          $data[$value->id] = $value->name;
        }
        return $data;
      }
    }

    /*
    *
    *@count_total_cupon() method return total row of 
    * cupon
    *
    */
    public function count_total_cupon(){
      $query = $this->db->get($this->_table_name);
      return $query->num_rows();
    }
   
    /*
    *
    *@delete() used to delete cuopn from database
    *
    *
    */
    public function delete($cupon_id)
    {
      if(is_array($cupon_id)){
        $cupon_id = implode(',',$cupon_id);
        $where = "id IN ($cupon_id)";
        if($this->db->where($where)->delete($this->_table_name)){
          return true;
        }
      }else{
        if($this->db->delete($this->_table_name,['id'=>$cupon_id])){
          return true;
        }
      }
    }

   /*
   *
   *@change_cupon_status() method used to 
   *  change cupon status
   *
   */
   public function change_cupon_status($cupon_id,$status)
   {
     if($this->db->where('id',$cupon_id)->update($this->_table_name,['status'=>$status])){
      return true;
     }
   }

   /*
   *
   *@check_ducplicate_cupon() method used to check 
   *  cupon is already available or not
   *
   */

   public function check_ducplicate_cupon($cupon_code,$id = '')
   {
    if(!$id){
      $query = $this->db->where('code',$cupon_code)->get($this->_table_name);
      $code = $query->row();
      if($code){
        return true;
      }
    }else{
      $query = $this->db->where(['id'=>$id,'code'=>$cupon_code])->get($this->_table_name);
      $code = $query->row();
      if($code){
        return true;
      }
    }
   }
}