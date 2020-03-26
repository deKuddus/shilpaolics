<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// use DatePeriod;
// use DateTime;
// use DateInterval;

class Cart extends Frontend_Controller {

    protected $quantity = 1;
    protected $discount = 0;
	function __construct()
    {
        parent::__construct();
		$this->load->model('cart_model');
        $this->load->module('template');
    }

    public function index() {
    	$this->manage();
    }

    public function manage() {


        $this->data['home_page'] = TRUE;
        $this->data['view_module'] = 'cart';
        $this->data['page_title'] = 'My Cart | shilpaolic.com';
        $this->data['view_file'] = 'cart';
        $this->template->_shop_ui($this->data);
    }

    public function contents()
    {
        $cart = $this->cart->contents();
        if(!empty($cart)){
            if(isset($_SESSION['coupon'])){
                header("Content-type: application/json");
                echo json_encode(['cart' => $cart,'coupon' => $_SESSION['coupon']]);
                exit();
            }else{
             header("Content-type: application/json");
             echo json_encode(['cart' => $cart,'coupon' => '']);
             exit(); 
            }
            
        }else{
            header("Content-type: application/json");
            echo json_encode(['cart' => null]);
            exit();
        }
    }

    public function count_cart(){
        $size = count($this->cart->contents());
        if($size > 0){
            echo $size;
        }else{
            echo 0;
        }
    }


    public function remove_from_cart_by_row_id(){
        $row_id = $this->input->post('row_id');
        if($this->cart->remove($row_id)){
            $status = array('status'=>200,'message'=>'Product Removed From Your Cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }


    public function add_to_cart()
    {
        $quantity = $this->input->post('quantity');
        if(isset($quantity) && $quantity != ""){
            $this->quantity = $quantity;
        }
        $product_id = $this->input->post('product_id');
        $product = $this->cart_model->get_product_by_id($product_id);
        global $price;

        if($product->special_price >= 0 && $this->today_is_under_special_price($product->start_from,$product->end_at) == true){
            $price = ($this->quantity * $product->special_price);
        }elseif($product->discount >= 0){
             if($product->discount_type == 2){
                  $discounted_price_after_calculation = ($product->sale_price*$product->discount)/100;
                  $price =  ($product->sale_price - $discounted_price_after_calculation);
                }else if($product->discount_type == 1){
                   $price = ($product->sale_price - $product->discount);
                }
        }else{
            $price = $product->sale_price;
        }

        $data = array(
            'id'      => $product->id,
            'qty'     => $this->quantity,
            'price'   => $price,
            'name'    => $product->title,
            'image' => $product->feature_image1,
            'discount'=>$this->discount,
            'vat' => ($price*($product->tax/100)),
        );
        $rowid = $this->cart->insert($data);

        if(!empty($rowid)){
            $status = array('status'=>201,'message'=>'product added to your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else{
            $status = array('status'=>404,'message'=>'Failed added to your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }

    public function today_is_under_special_price($from,$to)
    {
        $all_date = array();
        $period = new DatePeriod(
            new DateTime($from),
            new DateInterval('P1D'),
            new DateTime($to.' +1 day')
        );

        foreach ($period as $key => $value) {
            $all_date[] =  $value->format('Y-m-d');
        }
        $today = date('Y-m-d');
        if(in_array($today, $all_date)){
            return true;
        }else{
            return false;
        }
    }

    public function update_cart(){        

        $data = array(
            'rowid' =>$this->input->post('row_id') ,
            'qty'   =>$this->input->post('qty')
        );

       $rowid = $this->cart->update($data);
       if(!empty($rowid)){
            $status = array('status'=>201,'message'=>'Quantity updated to your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }else{
            $status = array('status'=>404,'message'=>'Quantity update failed your cart');
            header("Content-type: application/json");
            echo json_encode($status);
            exit();
        }
    }
	
    public  function remove_all_from_cart(){
        $this->cart->destroy();
        $status = array('status'=>200,'message'=>'All Product Removed From Your Cart');
        header("Content-type: application/json");
        echo json_encode($status);
        exit();
    }

    public function apply_coupon()
    {
        $coupon = $this->input->post('coupon');
        if($coupon){
            $validate_coupon = $this->cart_model->validate_coupon($coupon);
            if($validate_coupon != false){
                $array = ['code' => $coupon,'amount' => $validate_coupon->discount_value];
                $_SESSION['coupon'] = $array;
                header("Content-type: application/json");
                $status = array('status' => 200,'message' => 'coupon applied');
                echo json_encode($status);
                exit();
            }else{
                header("Content-type: application/json");
                $status = array('status' => 300,'message' => 'woops! coupon is not valid');
                echo json_encode($status);
                exit();
            }
        }
    }
}
