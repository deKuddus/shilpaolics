<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting_model extends MY_Model {

    protected $_table_slider = 'slider';
    protected $_table_logo = 'logo';
    protected $_table_config = 'config';
    protected $_table_discount_on = 'discount_on';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

    function __construct()
    {
        parent::__construct();
    }

    public function slider_show()
    {
          $column = array('id', 'title', 'description', 'url');
            $query = "SELECT * FROM ".$this->_table_slider;
            if(isset($_POST['search']['value']))
            {
               $query .= '
               WHERE id LIKE "%'.$_POST['search']['value'].'%" 
               OR title LIKE "%'.$_POST['search']['value'].'%" 
               OR description LIKE "%'.$_POST['search']['value'].'%" 
               OR url LIKE "%'.$_POST['search']['value'].'%" 
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
    }
    public function count_total_row_of_slider(){
      $query = $this->db->get($this->_table_slider);
      return $query->num_rows();
    }


    public function slider_add($slider_data)
    {
      if($this->db->insert($this->_table_slider,$slider_data)){
        return true;
      }
    }

    public function slider_update($slider_data,$slider_id)
    {
      if($this->db->where('id',$slider_id)->update($this->_table_slider,$slider_data)){
        return true;
      }
    }

    public function get_slider($slider_id = '')
    {
      if($slider_id){
        $query = $this->db->where('id',$slider_id)->get($this->_table_slider);
        return $query->row();
      }else{
        $query = $this->db->get($this->_table_slider);
        return $query->result();
      }
    }

    public function unlink_slider_image($slider_id)
    {
      if(!is_array($slider_id)){
        $slider = $this->get_slider($slider_id);
        $path = '/opt/lampp/htdocs/shopi24/'.$slider->image;
        if(unlink($path)){
          return true;
        }
      }else{
        $slider_id = implode(',', $slider_id);
        $where = "id IN ($slider_id)";
        $query = $this->db->where($where)->get($this->_table_slider);
        foreach ($query->result() as $key => $value) {
          $path = '/opt/lampp/htdocs/shopi24/'.$value->image;
          unlink($path);
        }
        return true;
      }
    }

    public function slider_delete($slider_id)
    {
      if(!is_array($slider_id)){
        if($this->db->delete($this->_table_slider,['id'=>$slider_id])){
          return true;
        }
      }else{
        $slider_id = implode(',', $slider_id);
        $where = "id IN ($slider_id)";
       if($this->db->where($where)->delete($this->_table_slider)){
        return true;
       }
      }
    }



    public function logo_add($logo_data)
    {
      if($this->db->insert($this->_table_config,$logo_data)){
        return true;
      }
    }

    public function logo_show()
    {
          $column = array('id', 'title', 'value');
            $query = "SELECT * FROM ".$this->_table_config." WHERE config_key = 'site_logo'";
            if(isset($_POST['search']['value']))
            {
               $query .= '
               AND ( id LIKE "%'.$_POST['search']['value'].'%" 
               OR title LIKE "%'.$_POST['search']['value'].'%" 
               OR value LIKE "%'.$_POST['search']['value'].'%" 
               )';
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
    }

    public function count_total_row_of_logo(){
      $query = $this->db->where(['config_key'=>'site_logo'])->get($this->_table_config);
      return $query->num_rows();
    }

    public function unlink_logo_image($logo_id)
    {
      if(!is_array($logo_id)){
        $query = $this->db->where(['config_key'=>'site_logo','id'=>$logo_id])->get($this->_table_config);
        $logo = $query->row();
        $path = '/opt/lampp/htdocs/shopi24/'.$logo->value;
        if(unlink($path)){
          return true;
        }
      }else{
        $logo_id = implode(',', $logo_id);
        $where = "config_key = 'site_logo' AND id IN ($logo_id)";
        $query = $this->db->where($where)->get($this->_table_config);
        foreach ($query->result() as $key => $logo) {
          $path = '/opt/lampp/htdocs/shopi24/'.$logo->value;
          unlink($path);
        }
        return true;
      }
    }

    public function logo_delete($logo_id)
    {
      if(!is_array($logo_id)){
        if($this->db->delete($this->_table_config,['config_key'=>'site_logo','id'=>$logo_id])){
          return true;
        }
      }else{
        $logo_id = implode(',', $logo_id);
        $where = "config_key = 'site_logo' AND id IN ($logo_id)";
        if($this->db->where($where)->delete($this->_table_config)){
          return true;
        }
      }
    }

    public function change_logo_status($logo_id,$status)
    {
      if($this->db->where(['id'=>$logo_id,'config_key'=>'site_logo'])->update($this->_table_config,['status'=>$status])){
        return true;
      }
    }
    //=================================
    public function discount_on_add($name)
    {
      if($this->db->insert($this->_table_discount_on,['name'=>$name])){
        return true;
      }
    }


    public function discount_on_show()
    {
      $column = array('id', 'name');
      $query = "SELECT * FROM ".$this->_table_discount_on;
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
       $query1 = 'LIMIT ' . $_POST['start'] . ', ' . $_POST['length'];
     }
     $result = $this->db->query($query.$query1);
     return $result->result();
    }

    public function count_total_row_of_discount_on(){
      $query = $this->db->get($this->_table_discount_on);
      return $query->num_rows();
    }
}