<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Stock extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('stock_model');
		$this->load->module('product');
    }

    public function index() {
    	$this->manage();
    }

    public function manage() {
        $products = array();
        foreach ($this->product_model->get_product() as  $product) {
            $products[$product->id] = $product->title; 
        }
        $this->data['home_page'] = TRUE;
        $this->data['products'] = $products;
        $this->data['view_module'] = 'stock';
        $this->data['view_file'] = 'manage';
        $this->load->module('template');
        $this->template->_shop_admin($this->data);
    }


   public function show()
   {
        $data = array();
        foreach ($this->stock_model->show() as $p_key => $stock) {
            $sub_array = array();
            foreach ($this->product_model->get_all_category() as $key => $category) {
                if($stock->category_id == $category->id){
                    $category_name = $category->category_name;
                }
            }
            if($stock->type == 1){
             $stock_type = "Stock In"; 
            }elseif($stock->type == 2){
             $stock_type = "Stock Out"; 
            }elseif($stock->type == 3){
             $stock_type = "Damaged"; 
            }
            $sub_array[] = '<input type="checkbox" class="stock_id" name="stock_id[]" value="'.$stock->id.'">';
            $sub_array[] = $stock->id;
            $sub_array[] = $stock_type;
            $sub_array[] = "<a href='".base_url("product/view?id=$stock->product_id")."'>".$stock->product_id."</a>";
            $sub_array[] = $category_name;
            $sub_array[] = $stock->quantity;
            $sub_array[] = $stock->rate;
            $sub_array[] = $stock->total;
            $sub_array[] = dateFormater($stock->created_at);
            $sub_array[] = $stock->remarks;
            $sub_array[] = '<div class="btn-group">
                      <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
                      <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
                        <li><a class="dropdown-item" onclick="delete_stock('.$stock->id.')">Delete</a></li>
                        <li><a class="dropdown-item" data-toggle="modal" data-target="#edit_new_stock" onclick="edit_stock('.$stock->id.')"">Edit</a></li>
                      </ul>
                    </div>';
            $data[] = $sub_array;
        }
        $output = array(
            'draw'    => intval($_POST['draw']),
            'recordsTotal'  => $this->stock_model->count_stock(),
            'recordsFiltered'  => $this->stock_model->count_stock(),
            'data'    => $data
        );
        echo json_encode($output);
   }

   /*
   * @add method used to add new stock
   *     and update quantity 
   *    in product table
   *
   */
   public function add()
   {
        $stock_data = array();
        $product = $this->product_model->get_product($_POST['product_id']);
        if($_POST['type'] == 1){
            $new_quantity = ($_POST['quantity']+$product->quantity);
        }else if($_POST['type'] == 2 OR $_POST['type'] == 3){
            $new_quantity = ($product->quantity-$_POST['quantity']);
            if($new_quantity < 0){
                $data = array('status'=>300,'message'=>'woops! quantity will be negative');
                header("Content-type: application/json");
                echo json_encode($data);
                exit();
            }
        }
        foreach ($_POST as $key => $value) {
            // if($key == 'type'){
            //     continue;
            // }else{
             $stock_data[$key] = $value;
            //}
        }

       $stock_data['category_id']=$product->category_id;
       $stock_data['total']= ($stock_data['rate']*$stock_data['quantity']);
       $stock_data['created_by']=$this->session->userdata('role_id');

       $insert = $this->stock_model->add_stock($stock_data);
       if($insert == true){
        if($this->product_model->update_product_quantity($_POST['product_id'],$new_quantity)){
            $data = array('status'=>200,'message'=>'stock added');
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
       }
   }

   /*
   * @edit function 
   *    used to edit stock
   *
   *
   */
    public function edit()
    {
        $stock_id = $this->input->post('stock_id');
        $stock = $this->stock_model->get_stock_by_id($stock_id);
        if(isset($stock)){
            echo json_encode($stock);
        }
    }

    /*
    *
    * @update method used
    *   to update sotck entry
    * 
    */
    public function update()
    {
        $stock_id = $this->input->post('stock_id');
        $stock = $this->stock_model->get_stock_by_id($stock_id);
        $product = $this->product_model->get_product($stock->product_id);
        $operation = $this->input->post('operation');

        $quantity_previous = ($product->quantity - $stock->quantity);
        if($operation == "+"){
          $new_quantity = $quantity_previous + $this->input->post('quantity');
        }else if($operation == "-"){
          $new_quantity = $quantity_previous - $this->input->post('quantity');
          if($new_quantity < 0){
            $data = array('status'=>300,'message'=>'Woops! quantity will be negative');
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
          }
        }
        $stock_data = [
            'type' => $this->input->post('type'),
            'quantity' => $this->input->post('quantity'),
            'rate' => $this->input->post('rate'),
            'total' => ($this->input->post('rate') * $this->input->post('quantity')),
            'remarks'=> $this->input->post('remarks')
        ];
        if($this->stock_model->update($stock_id,$stock_data) == true){
            if($this->product_model->update_product_quantity($product->id,$new_quantity)){
            $data = array('status'=>200,'message'=>'stock updated');
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
        }
    }

    /*
    *
    *@delete() used to delete  
    *   a single row for single select
    *mulitple delete for mulitple select
    */
   public function delete()
   {
       $stock_id = $this->input->post('stock_id');
       $delete = $this->stock_model->delete($stock_id);
       if($delete == true){
          $data = array('status'=>200,'message'=>'stock deleted');
          header("Content-type: application/json");
          echo json_encode($data);
          exit();
       }else{
          $data = array('message'=>'failed to delete');
          header("Content-type: application/json");
          echo json_encode($data);
          exit();
       }

   }
    
    /*
    *
    * get stock type 
    *
    */

    public function get_stock_type()
    {
        $types = $this->stock_model->get_stock_type();
        if(isset($types)){
            echo json_encode($types);
        }
    }
}
