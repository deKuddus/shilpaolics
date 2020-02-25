<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Customer extends Frontend_Controller {

    function __construct()
    {
        parent::__construct();
        $this->load->model('customer_model');
        $this->load->module('template');
    }

    public function index() {
        $this->manage();
    }

    public function manage() {
        $this->data['customer_data'] = $this->customer_model->get_customer_data();
        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'customer';
        $this->data['view_file'] = 'manage';
        $this->data['page_title'] = 'My Account | shilpaolic.com';
        $this->template->_shop_ui($this->data);
    }

    public function file_upload(){

        $config = array(
            'upload_path' => "./uploads/customer_images/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => false,
            'encrypt_name'=>true,
            'max_size' => "2048000"/*, // Can be set to particular file size , here it is 2 MB(2048 Kb)
            'max_height' => "768",
            'max_width' => "1024"*/
        );
        $this->load->library('upload', $config);
        if($this->upload->do_upload('user_image')){
            $data = $this->upload->data();
            $image_name = $config['upload_path'].$data['file_name'];
            if($this->customer_model->store($image_name) == true){
                $response = array('status'=>200,'message'=>'Photo updated');
                header("Content-type: application/json");
                echo json_encode($response);
                exit();
            }
        }else{
            $response = array('status'=>202,'message'=>$this->upload->display_errors());
            header("Content-type: application/json");
            echo json_encode($response);
            exit();
        }
    }

    public  function customer_registration($registration_data){
        $username = $registration_data['username'];
        $email = $registration_data['email'];
        if($this->customer_model->check_username($username)== true){
         return 201;
     }
     elseif($this->customer_model->check_email($email) == true){
         return 202;
     }else{
        $register_id = $this->customer_model->register_customer($registration_data);
        if(!empty($register_id)){
         return $register_id;
     }
 }
}

    public function order_details($code){
        $this->data['order'] = $this->customer_model->order_details($code);
        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'customer';
        $this->data['view_file'] = 'order_details';
        $this->data['page_title'] = 'My Orders #invoice no '.$this->data['order']->code.' | shilpaolic.com';
        $this->template->_shop_ui($this->data);
    }

    public  function order_pending(){
        $this->data['pending_orders'] = $this->customer_model->get_customer_pending_orders();
        $this->data['ongoing_orders'] = $this->customer_model->get_customer_ongoing_orders();
        $this->data['success_orders'] = $this->customer_model->get_customer_success_orders();
        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'customer';
        $this->data['view_file'] = 'order';
        $this->data['page_title'] = 'My Pending orders | shilpaolic.com';
        $this->template->_shop_ui($this->data);
    }

    public function orders(){
        $data = array();
        if(isset($_GET['status'])){
            $status = $_GET['status'];
            if($status == 'all'){
                $orders = $this->customer_model->get_customer_orders();
            }else if($status == 'pending'){
                $orders = $this->customer_model->get_customer_orders(1);
            }else if($status == 'on_delivery'){
                $orders = $this->customer_model->get_customer_orders(2);
            }else if($status == 'delivered'){
                $orders = $this->customer_model->get_customer_orders(3);
            }
            foreach ($orders as $key => $row) {
                if($row->delivery_status == 1){
                    $delivery_status = "Pending";
                }
                elseif($row->delivery_status == 2){
                    $delivery_status = "Ondelivered";
                }else{
                    $delivery_status = "Delivered";
                }
                if($row->payment_status == 1){
                    $payment_status = "Pending";
                }
                elseif($row->payment_status == 2){
                    $payment_status = "Onchecking";
                }else{
                    $payment_status = "Confirmed";
                }
                $sub_array = array();
                $sub_array[] = $row->code;
                $sub_array[] = dateFormater($row->sales_at);
                $sub_array[] = $delivery_status;
                $sub_array[] = $payment_status;
                $sub_array[] = $row->grand_total;

                $data[] = $sub_array;
            }
            $output = array(
                'draw'    => intval($_POST['draw']),
                'recordsTotal'  => $this->customer_model->count_total_row_of_order(),
                'recordsFiltered'  => $this->customer_model->count_total_row_of_order(),
                'data'    => $data
            );
            echo json_encode($output);
        }
    }


        public function order() {
        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'customer';
        $this->data['view_file'] = 'order';
        $this->data['page_title'] = 'My Orders | shilpaolic';
        $this->template->_shop_ui($this->data);
    }
}
