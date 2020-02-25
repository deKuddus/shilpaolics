<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends MY_Model {

    protected $_table_name = 'category';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function store($image_name){

        $data = array(
            'category_name' => ucfirst($this->input->post('name')),
            'pid' => $this->input->post('pid'),
            'brand' => json_encode(implode(',', $this->input->post('brand'))),
            'picture'=>$image_name,
            'description'=>$this->input->post('description')
        );

        if(!empty($this->check_name($data['category_name']))){
            return 301;
        }
        elseif($this->db->insert($this->_table_name, $data)){
            return 200;
        }
    }
   public function show() {
        $column = array('id', 'category_name');
        $query = "SELECT * FROM ".$this->_table_name;
        if(isset($_POST['search']['value']))
        {
         $query .= '
         WHERE id LIKE "%'.$_POST['search']['value'].'%" 
         OR category_name LIKE "%'.$_POST['search']['value'].'%" 
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


    public function get_brand_id()
    {
        $query = $this->db->select('id')->from('brand')->get();
        return $query->result();
    }


    public function get_brand(){
        $query = $this->db->get('brand');
        return $query->result();
    }


    public function brand_name($query){
        $query=$this->db->query($query);
        return $query->result();
    }



    public function manage_category($id = 0){
        if($id != 0){
            $query = $this->db->where('id',$id);
            $query = $this->db->get($this->_table_name);
            return $query->result();
        }else{
            $query = $this->db->get($this->_table_name);
            return $query->result();
        }
    }


    public function update($image_name=NULL)
    {
        $id = $this->input->post('category_id');
        if($image_name==NULL){

            $data = array(
                'category_name' => $this->input->post('name'),
                'pid' => $this->input->post('pid'),
                'description' => $this->input->post('description'),
                'brand' => json_encode(implode(',', $this->input->post('brand'))),
            );
        }else{
           $data = array(
           'category_name' => $this->input->post('name'),
           'pid' => $this->input->post('pid'),
           'description' => $this->input->post('description'),
           'brand' => json_encode(implode(',', $this->input->post('brand'))),
           'picture'=>$image_name,
        );   
       }
        if($this->db->where('id',$id)->update($this->_table_name, $data)){
            return true;
        }
    }


    public function delete($category_id){
        if(!is_array($category_id)){
            if($this->db->delete($this->_table_name, array('id' => $category_id))){
                return true;
            }
        }else{
            $category_id = implode(',',$category_id);
            $where = "id IN ($category_id)";
            if($this->db->where($where)->delete($this->_table_name)){
                return true;
            }
        }
    }

    public function unlink_category_image($category_id){
        if(!is_array($category_id)){
            $query = $this->db->where('id',$category_id)->get($this->_table_name);
            $value = $query->row(); 
            // $path ="C:/xampp/htdocs/shopi24/".$value->picture;
            if($value->picture != 0 OR !empty($value->picture)){
                $path = "/opt/lampp/htdocs/shopi24/".$value->picture;
                unlink($path);
            }
            
        }else{
            foreach ($category_id as $key => $c_id) {
                $query = $this->db->where('id',$c_id)->get($this->_table_name);
                foreach ($query->result() as  $value) {
                    if($value->picture != 0 OR !empty($value->picture)){
                        $path = "/opt/lampp/htdocs/shopi24/".$value->picture;
                        unlink($path);
                    }
                }
            }
        }
        return true;
    }



    public function check_name($name,$id=0){
        if($id != 0){
            $query = $this->db->where(['category_name'=>$name,'id !='=>$id])->get($this->_table_name);
            return $query->result();
        }else{
            $query = $this->db->where('category_name',$name)->get($this->_table_name);
            return $query->result();
        }
    }

    public function get_category_by_id($id){
        $query = $this->db->where('id',$id)->get('category');
        return $query->row();
    }

    public function get_parent_category($id){
        $query = $this->db->select('pid')->where('id',$id)->get('category');
        $data = $query->row();
        return $data->pid;
    }

    public function count_total_row_of_category(){
        $query = $this->db->get($this->_table_name);
        return $query->num_rows();
    }

    public function get_category($condition = '')
    {
        if($condition){
            $query = $this->db->get($this->_table_name);
            $data = array('0'=>'No parent');
            foreach($query->result() as $value){
                $data[$value->id]= $value->category_name;
            }
            return $data;

        }else{

        }
        $query = $this->db->get($this->_table_name);
        return $query->row();
    }

    public function change_category_showhome_status($category_id,$show_home)
    {
        if($this->db->where('id',$category_id)->update($this->_table_name,['show_home'=>$show_home])){
            return true;
        }
    }

}