<?php
    defined('BASEPATH') OR exit('No direct script access allowed');

    class Customer_model extends MY_Model {

    protected $_table_customer = 'customer';
    protected $_table_sales = 'sales';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';


    function __construct()
    {
        parent::__construct();
    }

    public function get_customer_data(){
        $username = $this->session->userdata('username');
        $query = $this->db->where(['username'=> $username])->get($this->_table_customer);
        return $query->row();
    }

    public function store($image_name){

        $username = $this->session->userdata('username');
        $image = ['images'=>$image_name];
        $query = $this->db->where(['username'=>$username])->update($this->_table_customer,$image);
        if($query){
            return true;
        }   

    }

    public function register_customer($register_data){
        if($this->db->insert($this->_table_customer,$register_data)){
                return $id = $this->db->insert_id();
            }
    }

    public function check_username($username){
        $query = $this->db->where(['username'=>$username])->get($this->_table_customer);
        if(!empty($query->result())){
            return true;
        }else{
            return false;
        }
    }

    public function check_email($email)
    {
        $query = $this->db->where(['email'=>$email])->get($this->_table_customer);
        if(!empty($query->result())){
            return true;
        }else{
            return false;
        }
    }

    public function get_customer_orders($delivery_status = ''){
        if(empty($delivery_status)){
        $customer_id = $this->session->userdata('user_id');
            $column = array('code', 'sales_at', 'payment_status', 'delivery_status', 'grand_total');
            $query = "SELECT * FROM ".$this->_table_sales . " WHERE customer_id = $customer_id";
            if(isset($_POST['search']['value']))
            {
                $query.=' AND (';
               $query .= '
               code LIKE "%'.$_POST['search']['value'].'%" 
               OR sales_at LIKE "%'.$_POST['search']['value'].'%" 
               OR payment_status LIKE "%'.$_POST['search']['value'].'%" 
               OR grand_total LIKE "%'.$_POST['search']['value'].'%" 
               OR delivery_status LIKE "%'.$_POST['search']['value'].'%" 
               ';
               $query.=' ) ';
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
        }else if(!empty($delivery_status)){
                    $customer_id = $this->session->userdata('user_id');
            $column = array('code', 'sales_at', 'payment_status', 'delivery_status', 'grand_total');
            $query = "SELECT * FROM ".$this->_table_sales . " WHERE customer_id = $customer_id AND delivery_status = $delivery_status ";
            if(isset($_POST['search']['value']))
            {
                $query.=' AND (';
               $query .= '
               code LIKE "%'.$_POST['search']['value'].'%" 
               OR sales_at LIKE "%'.$_POST['search']['value'].'%" 
               OR payment_status LIKE "%'.$_POST['search']['value'].'%" 
               OR grand_total LIKE "%'.$_POST['search']['value'].'%" 
               OR delivery_status LIKE "%'.$_POST['search']['value'].'%" 
               ';
               $query.=' ) ';
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
    }
    public function order_details($code){
        $customer_id = $this->session->userdata('user_id');
        $query = $this->db->where(['customer_id'=>$customer_id,'code'=>$code])->get('sales');
        return $query->row();
    }
    
    public function get_customer_pending_orders(){
        $customer_id = $this->session->userdata('user_id');
        $query = $this->db->where(['customer_id'=>$customer_id,'delivery_status'=>1])->order_by('id','desc')->get('sales');
        return $query->result();
    }
    public function get_customer_ongoing_orders(){
        $customer_id = $this->session->userdata('user_id');
        $query = $this->db->where(['customer_id'=>$customer_id,'delivery_status'=>2])->order_by('id','desc')->get('sales');
        return $query->result();
    }
    public function get_customer_success_orders(){
        $customer_id = $this->session->userdata('user_id');
        $query = $this->db->where(['customer_id'=>$customer_id,'delivery_status'=>3])->order_by('id','desc')->get('sales');
        return $query->result();
    }

    public function count_total_row_of_order(){
        $query = $this->db->get($this->_table_sales);
        return $query->num_rows();
    }
}