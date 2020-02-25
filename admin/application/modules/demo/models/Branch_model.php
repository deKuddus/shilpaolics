<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Branch_model extends MY_Model {

    protected $_table_name = 'branch';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';
    
    // public $rules = array();
    // protected $_timestamps = FALSE;

    function __construct()
    {
        parent::__construct();
    }


    public $rules = array(
        'branch' => array(
            'field' => 'branch_name',
            'label' => 'Branch Name',
            'rules' => 'trim|required|xss_clean'
        ),
        
        'branch_manager' => array(
            'field' => 'branch_manager',
            'label' => 'branch Manager',
            'rules' => 'trim|required|xss_clean'
        ),
        'branch_manager_contact' => array(
            'field' => 'branch_manager_contact',
            'label' => 'branch Manager Number',
            'rules' => 'trim|required|xss_clean'
        ),
        'open_date' => array(
            'field' => 'open_date',
            'label' => 'starting Date',
            'rules' => 'trim|required|xss_clean'
        )
        );

    public function get_new() {

        $branch = new stdClass();
        
        $branch->branch_name = '';
        $branch->open_date = '';
        $branch->address = '';
        $branch->branch_manager = '';
        $branch->branch_manager_contact = '';
        $branch->contact = '';
        $branch->control_shop = '';
        $branch->area_id = '';

        return $branch;
    }


    public function get_country(){
        
        $this->db->select('id, country_name');  
        $this->db->from('country');  
        $query = $this->db->get();  
        return $query->result_array();  
    }

    public function get_division($country){

        $this->db->select('id, division_name');  
        $this->db->from('division');  
        $this->db->where('country_id',$country);  
        $query = $this->db->get();  
        $data =  $query->result_array(); 
        return $data;
    } 

    public function get_district($divisionID){ 
     
        $this->db->select('id, district_name');  
        $this->db->from('district');  
        $this->db->where('division_id',$divisionID);  
        $query = $this->db->get();  
        return $query->result_array();  
    }

    public function get_area($districtID){
      
        $this->db->select('id, area_name');  
        $this->db->from(' area');  
        $this->db->where('district_id',$districtID);  
        $query = $this->db->get();  
        return $query->result_array();  
    } 


}