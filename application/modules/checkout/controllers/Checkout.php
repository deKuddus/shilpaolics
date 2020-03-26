<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Checkout extends Frontend_Controller {

	function __construct(){
        parent::__construct();
		$this->load->model('checkout_model');
        $this->load->module('customer');
        $this->load->module('products');
        $this->load->module('template');
    }

    public function index() {
    	$this->manage();
    }

    public function manage(){

        $this->data['home_page'] = TRUE;
        $this->data['customer_data'] = $this->customer_model->get_customer_data();
        $this->data['view_module'] = 'checkout';
        $this->data['view_file'] = 'checkout';
        $this->data['page_title'] = "My Checkout | shilpaolic.com";
        $this->template->_shop_ui($this->data);
    }

    public function proceed_to_checkout()
    {

        $ship_to = $this->input->post('ship_to');
        $checkout_type  = $this->input->post('checkout_type');
        $payment_method = $this->input->post('payment_method');
        if(empty($payment_method)){
            $status = array('status'=>201,'message'=>'select your payment method');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else{
            if($checkout_type == 1){
                if(isset($ship_to) && $ship_to == 1){
                   $this->checkout_as_guest();
                }else{
                    $this->checkout_as_guest_ship_to_another();
                }
            }else if($checkout_type == 2){
                if(isset($ship_to) && $ship_to == 1){
                    $this->checkout_with_register_ship_to_me();
                }else{
                    $this->checkout_with_register_ship_to_another();
                }
            }else{
                if(isset($ship_to) && $ship_to == 1){
                    $this->checkout_as_loggedin_user_ship_to_me();
                }else{
                   $this->checkout_as_loggedin_user_ship_to_another();
                }
            }
        }
    }

    public function checkout_as_guest($value='')
    {
        $guest_data = $this->customer_data_as_guest();
        $shipping_data = $this->shipping_data();
        $product_array = array();
        $grand_total = 0;
        $vat = 0;
        $vat_percent = 0;
        foreach ($this->cart->contents() as  $cart_value) {
            $value = $this->products_model->get_product_by_id($cart_value['id']);
            $fetch_array = [
                'id'=>$value->id,
                'qty'=>$cart_value['qty'],
                'option'=>[
                    'color'=>$value->color,
                    'size'=>'X,XL'
                ],
                'price'=>$cart_value['price'],
                'name'=>$cart_value['name'],
                'shiping'=>50,
                'tax'=>5,
                'image'=>$value->feature_image1,
                'cupon'=>'er78e',
            'sub_total'=>($cart_value['subtotal']/*+5+50*/)
                ];
                $product_array['product_data'][] = $fetch_array;
                $grand_total = $grand_total+$fetch_array['sub_total'];
                $vat = $vat+$value->tax;
            }
            $vat_percent = 0;
            $shiping_cost = config('shipping_charge');
            date_default_timezone_set('UTC');
            $sales_at = date('m-d-Y,h:i:s A');
            $product = json_encode($product_array);

            $sales_array = $this->sales_array_as_guest_ship_to_another($guest_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at,$shipping_data);
        if($this->checkout_model->proceed_to_checkout($sales_array) == true){
            $status = array('status'=>600,'message'=>'Order confirmed');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }

    public function checkout_as_guest_ship_to_another()
    {
        $guest_data = $this->customer_data_as_guest();
        $product_array = array();
        $grand_total = 0;
        $vat = 0;
        $vat_percent = 0;
        foreach ($this->cart->contents() as  $cart_value) {
            $value = $this->products_model->get_product_by_id($cart_value['id']);
            $fetch_array = [
                'id'=>$value->id,
                'qty'=>$cart_value['qty'],
                'option'=>[
                    'color'=>$value->color,
                    'size'=>'X,XL'
                ],
                'price'=>$cart_value['price'],
                'name'=>$cart_value['name'],
                'shiping'=>50,
                'tax'=>5,
                'image'=>$value->feature_image1,
                'cupon'=>'er78e',
                'sub_total'=>($cart_value['subtotal']/*+5+50*/)
            ];
            $product_array['product_data'][] = $fetch_array;
            $grand_total = $grand_total+$fetch_array['sub_total'];
            $vat = $vat+$value->tax;
        }
        $vat_percent = 0;
        $shiping_cost = 50;
        date_default_timezone_set('UTC');
        $sales_at = date('m-d-Y,h:i:s A');
        $product = json_encode($product_array);

        $sales_array = $this->sales_array_as_guest_ship_to_me($guest_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at);
        if($this->checkout_model->proceed_to_checkout($sales_array) == true){
           $status = array('status'=>600,'message'=>'Order confirmed');
           header("Content-type: application/json");
           echo json_encode($status);
           exit();
       }
    }


    public function checkout_with_register_ship_to_me()
    {
        $customer_data = $this->customer_data_for_register();
        $shipping_data = $this->shipping_data();
        $customer_registration = $this->customer->customer_registration($customer_data);
        if($customer_registration != 201 && $customer_registration != 202){
                        //remove user name after complete registration to store data into sales table
            unset($customer_data['username']);
            unset($customer_data['password']);
            $product_array = array();
            $grand_total = 0;
            $vat = 0;
            $vat_percent = 0;
            foreach ($this->cart->contents() as  $cart_value) {
                $value = $this->products_model->get_product_by_id($cart_value['id']);
                $fetch_array = [
                    'id'=>$value->id,
                    'qty'=>$cart_value['qty'],
                    'option'=>[
                        'color'=>$value->color,
                        'size'=>'X,XL'
                    ],
                    'price'=>$cart_value['price'],
                    'name'=>$cart_value['name'],
                    'shiping'=>50,
                    'tax'=>5,
                    'image'=>$value->feature_image1,
                    'cupon'=>'er78e',
                'sub_total'=>($cart_value['subtotal']/*+5+50*/)
                ];
                $product_array['product_data'][] = $fetch_array;
                $grand_total = $grand_total+$fetch_array['sub_total'];
                $vat = $vat+$value->tax;
            }
            $vat_percent = 0;
            $shiping_cost = 50;
            date_default_timezone_set('UTC');
            $sales_at = date('m-d-Y,h:i:s A');
            $product = json_encode($product_array);
            $customer_data = json_encode($customer_data);

            $sales_array = $this->sales_array_as_register_ship_to_another($customer_registration,$customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at,$shipping_data);
            if($this->checkout_model->proceed_to_checkout($sales_array) == true){
                $status = array('status'=>600,'message'=>'Order confirmed');
                header("Content-type: application/json");
                echo json_encode($status);
                exit();
            }
        }else if($customer_registration == 201){
            $status = array('status'=>201,'message'=>'username for registrstion not available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else if($customer_registration == 202){
            $status = array('status'=>201,'message'=>'email for registrstion not available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }

    public function checkout_with_register_ship_to_another()
    {
        $customer_data = $this->customer_data_for_register();
        $customer_registration = $this->customer->customer_registration($customer_data);
        if($customer_registration != 201 && $customer_registration != 202){
                        //remove user name after complete registration to store data into sales table
            unset($customer_data['username']);
            unset($customer_data['password']);
            $product_array = array();
            $grand_total = 0;
            $vat = 0;
            $vat_percent = 0;
            foreach ($this->cart->contents() as  $cart_value) {
                $value = $this->products_model->get_product_by_id($cart_value['id']);
                $fetch_array = [
                    'id'=>$value->id,
                    'qty'=>$cart_value['qty'],
                    'option'=>[
                        'color'=>$value->color,
                        'size'=>'X,XL'
                    ],
                    'price'=>$cart_value['price'],
                    'name'=>$cart_value['name'],
                    'shiping'=>50,
                    'tax'=>5,
                    'image'=>$value->feature_image1,
                    'cupon'=>'er78e',
                'sub_total'=>($cart_value['subtotal']/*+5+50*/)
                ];
                $product_array['product_data'][] = $fetch_array;
                $grand_total = $grand_total+$fetch_array['sub_total'];
                $vat = $vat+$value->tax;
            }
            $vat_percent = 0;
            $shiping_cost = 50;
            date_default_timezone_set('UTC');
            $sales_at = date('m-d-Y,h:i:s A');
            $product = json_encode($product_array);
            $customer_data = json_encode($customer_data);

            $sales_array = $this->sales_array_as_register_ship_to_me($customer_registration,$customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at);
            if($this->checkout_model->proceed_to_checkout($sales_array) == true){
                $status = array('status'=>600,'message'=>'Order confirmed');
                header("Content-type: application/json");
                echo json_encode($status);
                exit();
            }
        }else if($customer_registration == 201){
            $status = array('status'=>201,'message'=>'username for registrstion  not available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else if($customer_registration == 202){
            $status = array('status'=>201,'message'=>'email for registrstion not available');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }

    public function checkout_as_loggedin_user_ship_to_me()
    {
        $customer_data = $this->customer_data_as_guest();
        $product_array = array();
        $grand_total = 0;
        $vat = 0;
        $vat_percent = 0;
        foreach ($this->cart->contents() as  $cart_value) {
            $value = $this->products_model->get_product_by_id($cart_value['id']);
            $fetch_array = [
                'id'=>$value->id,
                'qty'=>$cart_value['qty'],
                'option'=>[
                    'color'=>$value->color,
                    'size'=>'X,XL'
                ],
                'price'=>$cart_value['price'],
                'name'=>$cart_value['name'],
                'shiping'=>50,
                'tax'=>5,
                'image'=>$value->feature_image1,
                'cupon'=>'er78e',
            'sub_total'=>($cart_value['subtotal']/*+5+50*/)
            ];
            $product_array['product_data'][] = $fetch_array;
            $grand_total = $grand_total+$fetch_array['sub_total'];
            $vat = $vat+$value->tax;
        }
        $vat_percent = 0;
        $shiping_cost = 50;
        date_default_timezone_set('UTC');
        $sales_at = date('m-d-Y,h:i:s A');
        $product = json_encode($product_array);

        $sales_array = $this->sales_array_as_login_ship_to_me($customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at);
        if($this->checkout_model->proceed_to_checkout($sales_array) == true){
            $status = array('status'=>600,'message'=>'Order confirmed');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }

    public function checkout_as_loggedin_user_ship_to_another()
    {
        $customer_data = $this->customer_data_as_guest();
        $shipping_data = $this->shipping_data();
        $product_array = array();
        $grand_total = 0;
        $vat = 0;
        $vat_percent = 0;
        foreach ($this->cart->contents() as  $cart_value) {
            $value = $this->products_model->get_product_by_id($cart_value['id']);
            $fetch_array = [
                'id'=>$value->id,
                'qty'=>$cart_value['qty'],
                'option'=>[
                    'color'=>$value->color,
                    'size'=>'X,XL'
                ],
                'price'=>$cart_value['price'],
                'name'=>$cart_value['name'],
                'shiping'=>50,
                'tax'=>5,
                'image'=>$value->feature_image1,
                'cupon'=>'er78e',
            'sub_total'=>($cart_value['subtotal']/*+5+50*/)
            ];
            $product_array['product_data'][] = $fetch_array;
            $grand_total = $grand_total+$fetch_array['sub_total'];
            $vat = $vat+$value->tax;
        }
        $vat_percent = 0;
        $shiping_cost = 50;
        date_default_timezone_set('UTC');
        $sales_at = date('m-d-Y,h:i:s A');
        $product = json_encode($product_array);

        $sales_array = $this->sales_array_as_login_ship_to_another($customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at,$shipping_data);
        if($this->checkout_model->proceed_to_checkout($sales_array) == true){
            $status = array('status'=>600,'message'=>'Order confirmed');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }
    public  function customer_data_as_guest()
    {
        $guest_data = json_encode([
            'name'=>$this->input->post('customer_name'),
            'email'=>$this->input->post('customer_email'),
            'contact'=>$this->input->post('customer_contact'),
            'city'=>$this->input->post('customer_city'),
            'address'=>$this->input->post('customer_address'),
            'zip_code'=>$this->input->post('customer_zip_code'),
            'country'=>$this->input->post('customer_country'),
            'state'=>$this->input->post('customer_state')
        ]);
        return $guest_data;
    }

    public function customer_data_for_register()
    {
        $customer_data = [
            'name'=>$this->input->post('customer_name'),
            'username'=>$this->input->post('customer_user_name'),
            'email'=>$this->input->post('customer_email'),
            'contact'=>$this->input->post('customer_contact'),
            'city'=>$this->input->post('customer_city'),
            'address'=>$this->input->post('customer_address'),
            'zip_code'=>$this->input->post('customer_zip_code'),
            'country'=>$this->input->post('customer_country'),
            'state'=>$this->input->post('customer_state'),
            'password'=>$this->input->post('customer_password')
        ];
        return $customer_data;
    }
    public function sales_array_as_login_ship_to_me($customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at)
    {
        $sales_array = [
            'code' => (rand(1,99).time()),
            'customer_id'=> $this->session->userdata('user_id'),
            'guest_details'=>$customer_data,
            'product_details'=>$product,
            'shipping_address'=>$customer_data,
            'vat'=>$vat,
            'vat_percent'=> $vat_percent,
            'shipping_cost'=> $shiping_cost,
            'payment_type'=>$this->input->post('payment_method'),
            'payment_details'=>'',
            'payment_at'=> '',
            'grand_total'=>$grand_total,
            'sales_at'=>$sales_at,
            'delivery_at'=>''
        ];
        return $sales_array;
    }

    public function sales_array_as_login_ship_to_another($customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at,$shipping_data)
    {
        $sales_array = [
            'code' => (rand(1,99).time()),
            'customer_id'=> $this->session->userdata('user_id'),
            'guest_details'=>$customer_data,
            'product_details'=>$product,
            'shipping_address'=>$shipping_data,
            'vat'=>$vat,
            'vat_percent'=> $vat_percent,
            'shipping_cost'=> $shiping_cost,
            'payment_type'=>$this->input->post('payment_method'),
            'payment_details'=>'',
            'payment_at'=> '',
            'grand_total'=>$grand_total,
            'sales_at'=>$sales_at,
            'delivery_at'=>''
        ];
        return $sales_array;
    }

    public function sales_array_as_guest_ship_to_me($guest_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at){
        $sales_array = [
            'code' => (rand(1,99).time()),
            'customer_id'=> 0,
            'guest_details'=>$guest_data,
            'product_details'=>$product,
            'shipping_address'=>$guest_data,
            'vat'=>$vat,
            'vat_percent'=> $vat_percent,
            'shipping_cost'=> $shiping_cost,
            'payment_type'=>$this->input->post('payment_method'),
            'payment_details'=>'',
            'payment_at'=> '',
            'grand_total'=>$grand_total,
            'sales_at'=>$sales_at,
            'delivery_at'=>''
        ];
        return $sales_array;
    }

    public function sales_array_as_guest_ship_to_another($guest_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at,$shipping_data)
    {
        $sales_array = [
            'code' => (rand(1,99).time()),
            'customer_id'=> 0,
            'guest_details'=>$guest_data,
            'product_details'=>$product,
            'shipping_address'=>$shipping_data,
            'vat'=>$vat,
            'vat_percent'=> $vat_percent,
            'shipping_cost'=> $shiping_cost,
            'payment_type'=>$this->input->post('payment_method'),
            'payment_details'=>'',
            'payment_at'=> '',
            'grand_total'=>$grand_total,
            'sales_at'=>$sales_at,
            'delivery_at'=>''
        ];
        return $sales_array;
    }

    public function sales_array_as_register_ship_to_me($customer_id,$customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at)
    {
        $sales_array = [
            'code' => (rand(1,99).time()),
            'customer_id'=> $customer_id,
            'guest_details'=>$customer_data,
            'product_details'=>$product,
            'shipping_address'=>$customer_data,
            'vat'=>$vat,
            'vat_percent'=> $vat_percent,
            'shipping_cost'=> $shiping_cost,
            'payment_type'=>$this->input->post('payment_method'),
            'payment_details'=>'',
            'payment_at'=> '',
            'grand_total'=>$grand_total,
            'sales_at'=>$sales_at,
            'delivery_at'=>''
        ];
        return $sales_array;
    }

    public function sales_array_as_register_ship_to_another($customer_id,$customer_data,$product,$vat,$vat_percent,$shiping_cost,$grand_total,$sales_at,$shipping_data)
    {
        $sales_array = [
            'code' => (rand(1,99).time()),
            'customer_id'=> $customer_id,
            'guest_details'=>$customer_data,
            'product_details'=>$product,
            'shipping_address'=>$shipping_data,
            'vat'=>$vat,
            'vat_percent'=> $vat_percent,
            'shipping_cost'=> $shiping_cost,
            'payment_type'=>$this->input->post('payment_method'),
            'payment_details'=>'',
            'payment_at'=> '',
            'grand_total'=>$grand_total,
            'sales_at'=>$sales_at,
            'delivery_at'=>''
        ];
        return $sales_array;
    }

    public function shipping_data()
    {
        $shipping_data = json_encode([
            'name'=>$this->input->post('ship_another_first_name')." ".$this->input->post('ship_another_last_name'),
            'email'=>$this->input->post('ship_another_email_address'),
            'contact'=>$this->input->post('ship_another_mobile'),
            'city'=>$this->input->post('ship_another_city'),
            'address'=>$this->input->post('ship_another_address'),
            'zip_code'=>$this->input->post('ship_another_postal_code'),
            'country'=>$this->input->post('ship_another_country'),
            'state'=>$this->input->post('ship_another_state')
        ]);
        return $shipping_data;
    }
    public function read_josn()
    {
       $a = $json = json_decode( file_get_contents(base_url().'/test.json'),true);
        foreach ($a as  $value) {
            echo "<pre>";
            print_r($value);
        }
    }
}
