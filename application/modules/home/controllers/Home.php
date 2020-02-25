<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends Frontend_Controller {

	function __construct()
    {
        parent::__construct();
        $this->load->model('home_model');
		$this->load->module('template');
    }

    public function index() {
    	$this->products();
    }

 //    public function manage() {
 //        $this->data['home_page'] = TRUE;

 //        $this->data['view_module'] = 'home';
 //        $this->data['view_file'] = 'manage';
 //        $this->data['categories'] = $this->home_model->get_all_categories_for_home();
 //        $this->data['sliders'] = $this->home_model->get_3_active_slider();
 //        $this->load->module('template');
 //        $this->template->_shop_ui($this->data);
	// }



    public function products($rowno=0){

        // Row per page
        $rowperpage = 1;

        // Row position
        if($rowno != 0){
          $rowno = ($rowno-1) * $rowperpage;
        }       
     
        // Pagination Configuration
        $config['base_url'] = base_url().'home/products';
        $config['use_page_numbers'] = TRUE;
        $config['total_rows'] = $this->home_model->get_total_product_in_store();
        $config['per_page'] = $rowperpage;
        $config["uri_segment"] = 1;

        // Initialize
        $this->pagination->initialize($config);

        $page = ($this->uri->segment(1)) ? $this->uri->segment(1) : 0;

        // Get records
        $product_record = $this->home_model->get_all_products($rowperpage,$page);

        // Initialize $data Array
        $this->data['pagination'] = $this->pagination->create_links();
        $this->data['onsale_products'] = $product_record;
        $this->data['categories'] = $this->home_model->get_all_categories_for_home();
        $this->data['sliders'] = $this->home_model->get_3_active_slider();
        $this->data['products'] = $this->home_model->get_latest_8_products();
        $this->data['page_title'] = "SHILPAOLIC | Home";
        $this->data['view_module'] = 'home';
        $this->data['view_file'] = 'manage';
        $this->template->_shop_ui($this->data);
 
    }


    public function get_all_categories(){
        $pid = $this->input->post('id');
        $categories  = $this->home_model->get_all_categories($pid);
        echo json_encode($categories);
    }

    public function category_list(){
        $pid = $this->input->post('id');
        $categories  = $this->home_model->category_list($pid);
         echo json_encode($categories);
    }


    public function load_slider(){
        $slider = $this->home_model->get_3_active_slider();
        echo json_encode($slider);
    }

  

	
}
