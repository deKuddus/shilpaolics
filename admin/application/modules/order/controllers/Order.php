<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends Admin_Controller {

	protected $delivery_status;
	protected $payment_status;
	function __construct()
	{
		parent::__construct();
		$this->load->model('order_model');
	}

	public function index() {
		$this->manage();
	}

	public function manage() {
		$this->data['category_page'] = TRUE;
		$this->data['table_page'] = TRUE;
		$this->data['view_module'] = 'order';
		$this->data['view_file'] = 'manage';
		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}

	public function show(){	
		$data = array();

		foreach($this->order_model->show() as $row)
		{
			if($row->delivery_status == 1){
				$this->delivery_status = "<span class='label label-danger'>[".(($row->is_checked)?$row->is_checked:'Admin')." : Pending]</span>";
			}
			elseif($row->delivery_status == 2){
				$this->delivery_status = "<span class='label label-warning'>[".(($row->is_checked)?$row->is_checked:'Admin')." : Ondelivered]</span>";
			}else{
				$this->delivery_status = "<span class='label label-success'>[".(($row->is_checked)?$row->is_checked:'Admin')." : Delivered]</span>";
			}
			if($row->payment_status == 1){
				$this->payment_status = "<span class='label label-danger'>[".(($row->is_checked)?$row->is_checked:'Admin')." : Pending]</span>";
			}
			elseif($row->payment_status == 2){
				$this->payment_status = "<span class='label label-warning'>[".(($row->is_checked)?$row->is_checked:'Admin')." : Onchecking]</span>";
			}else{
				$this->payment_status = "<span class='label label-success'>[".(($row->is_checked)?$row->is_checked:'Admin').": Paid]</span>";
			}
			$customer_info = json_decode($row->guest_details);
			$sub_array = array();
			$sub_array[] = $row->id;
			$sub_array[] = $row->code;
			$sub_array[] = $customer_info->name;
			$sub_array[] = $row->sales_at;
			$sub_array[] = $row->grand_total;
			$sub_array[] = $this->delivery_status;
			$sub_array[] = $this->payment_status;
			$sub_array[] = '<div class="btn-group"><button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button><ul class="dropdown-menu" x-placement="top-start" style="position: absolut top: -2p left: 0p will-change: top, lef"><li><a class="dropdown-item" data-toggle="modal" data-target="#full_invoice" onclick="view_full_invoice('.$row->code.')">View</a></li><li><a class="dropdown-item" onclick="delete_invocie('.$row->code.')">Delete</a></li><li><a href="'.base_url('order/print_order/'.$row->code).'" class="dropdown-item" target="_blank">Print</a></li><li><a data-toggle="modal" data-target="#change_delevery_status" class="dropdown-item mak_status" onclick="change_delevery_status('.$row->code.',this)">Delivery Status</a></li></ul></div>';
			$data[] = $sub_array;
		}
		$output = array(
			'draw'    => intval($_POST['draw']),
			'recordsTotal'  => $this->order_model->count_total_row_of_order(),
			'recordsFiltered'  => $this->order_model->count_total_row_of_order(),
			'data'    => $data
		);
		echo json_encode($output);
	}

	public function get_order_by_code()
	{
		$code = $this->input->post('code');
		echo json_encode($this->order_model->show($code));
	}

	public function delete_invoice()
	{
		$code = $this->input->post('code');
		$delete = $this->order_model->delete_invoice($code);
		if($delete == true){
			$status = array('status'=>200,'message'=>'Invoice Deleted');
			header("Content-type: application/json");
			echo json_encode($status);
			exit();
		}
	}

	public function change_delevery_status(){
		$code = $this->input->post('code');
		$status = $this->order_model->get_invoice_delivery_status($code);
		$option = '';
		foreach ($this->order_model->get_delivery_status() as $key => $value) {
			if($value->id == $status->delivery_status){
				$option.= "<option selected value='".$value->id."'>".$value->name."</option>";
			}else{
				$option.= "<option value='".$value->id."'>".$value->name."</option>";
			}
		}

		echo $option;
	}

	public function submit_order_status(){
		$code = $this->input->post('code');
		$status = [
			'delivery_status' => $this->input->post('status'),
			'is_checked' => $this->session->userdata('username')
		];
		$success = $this->order_model->submit_order_status($code,$status);
		if($success == true){
			$status = array('status'=>200,'message'=>'status successfully changed');
			header("Content-type: application/json");
			echo json_encode($status);
			exit();
		}
	}

	public function print_order($code)
	{
		$this->data['order'] = $this->order_model->get_order_by_code($code);
		$this->data['table_page'] = TRUE;
		$this->data['view_module'] = 'order';
		$this->data['view_file'] = 'print';
		$this->load->module('template');
		$this->template->_shop_admin($this->data);
	}


	
}
