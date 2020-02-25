<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Users_model extends MY_Model {

    protected $_table_name = 'users';
    protected $_primary_key = 'id';
    protected $_primary_filter = 'intval';
    protected $_order_by = 'id';

    public $rules_login = array(
        'username' => array(
            'field' => 'username',
            'label' => 'User Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|xss_clean'
        )
    );

    public $rules = array(
        'user_role_id' => array(
            'field' => 'user_role_id',
            'label' => 'User Role',
            'rules' => 'trim|intval|required'
        ),
        'name' => array(
            'field' => 'name',
            'label' => 'Name',
            'rules' => 'trim|required|xss_clean'
        ),
        'username' => array(
            'field' => 'username',
            'label' => 'Username',
            'rules' => 'trim|required|xss_clean'
        ),
        'email' => array(
            'field' => 'email',
            'label' => 'Email',
            'rules' => 'trim|required|valid_email|xss_clean'
        ),
        'contact' => array(
            'field' => 'contact',
            'label' => 'Contact',
            'rules' => 'trim|required|xss_clean'
        ),
        'password' => array(
            'field' => 'password',
            'label' => 'Password',
            'rules' => 'trim|required|xss_clean'
        )
    );


    function __construct()
    {
        parent::__construct();
    }

    public function get_new() {

        $users = new stdClass();

        $users->name = '';
        $users->username = '';
        $users->email = '';
        $users->contact = '';
        $users->password = '';
        $users->user_role_id = 0;

        return $users;
    }
    public function store($image_name)
    {

        $data = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id'),
            'picture'=>$image_name,
        );
        // if(!empty($this->check_email($data['email']))){
        //     return 400;
        // }else
        if(!empty($this->check_email($data['email']))){
            return 400;
        }
        elseif($this->db->insert($this->_table_name, $data)){
            return 200;
        }
    }
    public function manage_user($id = 0){
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
        $id = $this->input->post('user_id');
        if($image_name==NULL){

            $data = array(
                'name' => $this->input->post('name'),
                'phone' => $this->input->post('phone'),
                'address' => $this->input->post('address'),
                'email' => $this->input->post('email'),
                'password' => $this->input->post('password'),
                'role_id' => $this->input->post('role_id')
            );
        }
        else{
         $data = array(
            'name' => $this->input->post('name'),
            'phone' => $this->input->post('phone'),
            'address' => $this->input->post('address'),
            'email' => $this->input->post('email'),
            'password' => $this->input->post('password'),
            'role_id' => $this->input->post('role_id'),
            'picture'=>$image_name,
        );   
     }
     if($this->db->where('id',$id)->update($this->_table_name, $data)){
        return 200;
    }
}


public function delete($id){
    if($this->db->delete($this->_table_name, array('id' => $id))){
        return 200;
    }
}

public function login() {
    $user = $this->get_by(array(
        'email' => $this->input->post('email'),
        'password'  => $this->input->post('password'),
        'is_active' => 1
    ), TRUE
);
    // dump($user,true);

    if($user) {
            // Log in user
        $data = array(
            'username' => $user->username,
            'role_id' => $user->role_id,
            'email' => $user->email,
            'id' => $user->id,
            'loggedin' => TRUE,
        );

        $this->session->set_userdata($data);
        return 200;
    }
    else{
        return 400;
    }
}

public function logout() {
    $this->session->sess_destroy();
}

public function loggedin() {
    return (bool) $this->session->userdata('loggedin');
}


public function hash($string) {
    return hash('sha512', $string . config_item('encryption_key'));
}
public function check_email($email,$id=0){
        if($id != 0){
            $query = $this->db->where(['email'=>$email,'id !='=>$id])->get($this->_table_name);
            return $query->result();
        }else{
            $query = $this->db->where('email',$email)->get($this->_table_name);
            return $query->result();
        }
    }

/*
*
* get_customer_list method used to fetch 
* all customer for admin panel
*
*/
public function get_customer_list()
{
    $column = array('name', 'username', 'email', 'contact','address','city','zip_code','state','country');
     $query = "SELECT * FROM customer";
     if(isset($_POST['search']['value']))
        {
           $query .= '
           WHERE name LIKE "%'.$_POST['search']['value'].'%" 
           OR username LIKE "%'.$_POST['search']['value'].'%" 
           OR email LIKE "%'.$_POST['search']['value'].'%" 
           OR contact LIKE "%'.$_POST['search']['value'].'%" 
           OR address LIKE "%'.$_POST['search']['value'].'%" 
           OR city LIKE "%'.$_POST['search']['value'].'%" 
           OR zip_code LIKE "%'.$_POST['search']['value'].'%" 
           OR state LIKE "%'.$_POST['search']['value'].'%" 
           OR country LIKE "%'.$_POST['search']['value'].'%" 
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
public function count_cusotmer()
{
    $query = $this->db->get('customer');
   return $query->num_rows();
}

}