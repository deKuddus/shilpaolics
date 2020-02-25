<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Setting extends Frontend_Controller {

	function __construct()
  {
    parent::__construct();
    $this->load->model('setting_model');
  }

  public function index() {
   $this->manage();
 }

 public function slider() {

  $this->data['home_page'] = TRUE;
  $this->data['view_module'] = 'setting';
  $this->data['view_file'] = 'slider';
  $this->load->module('template');
  $this->template->_shop_admin($this->data);
}


public function slider_show()
{
  $data = array();

  foreach($this->setting_model->slider_show() as $s_key=>$slider)
  {
    if($slider->is_active == 1){
      $is_active = '<div class="switch">
      <div class="onoffswitch">
      <input type="checkbox" onchange="change_slider_status('.$slider->id.',this)" checked="checked" class="onoffswitch-checkbox slider_status" id="example'.$s_key.'" value="0">
      <label class="onoffswitch-label" for="example'.$s_key.'">
      <span class="onoffswitch-inner"></span>
      <span class="onoffswitch-switch"></span>
      </label>
      </div>
      </div>';
    }else if($slider->is_active == 0){
      $is_active = '<div class="switch">
      <div class="onoffswitch">
      <input type="checkbox" onchange="change_slider_status('.$slider->id.',this)" class="onoffswitch-checkbox slider_status" id="example'.$s_key.'" value="1">
      <label class="onoffswitch-label" for="example'.$s_key.'">
      <span class="onoffswitch-inner"></span>
      <span class="onoffswitch-switch"></span>
      </label>
      </div>
      </div>';
    }
    $sub_array = array();
    $sub_array[] = '<input type="checkbox" name="product_id[]" class="slider_checkbox" value="'.$slider->id.'"/>';
    $sub_array[] = $slider->id;
    $sub_array[] = $slider->title;
    $sub_array[] = $slider->description;
    $sub_array[] = $slider->url;
    $sub_array[] = $is_active;
    $sub_array[] = "<img src='".FILE_UPLOAD_PATH.$slider->image."' alt='slider' height='100px' width='100px'>";
    $sub_array[] ='<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
    <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
    <li><a class="dropdown-item" data-toggle="modal" data-target="#edit_slider_modal" onclick="edit_slider('.$slider->id.')">Edit</a></li>
    <li><a class="dropdown-item" onclick="delete_slider('.$slider->id.')">Delete</a></li>
    </ul>
    </div>';
    $data[] = $sub_array;
  }
  $output = array(
    'draw'    => intval($_POST['draw']),
    'recordsTotal'  => $this->setting_model->count_total_row_of_slider(),
    'recordsFiltered'  =>$this->setting_model->count_total_row_of_slider(),
    'data'    => $data
  );
  echo json_encode($output);
}


public function slider_add()
{
  $config = [
    'upload_path' => "./slider_image/",
    'allowed_types' => "gif|jpg|png|jpeg",
    'overwrite' => false,
    'max_size' => "2048000",
    'height' => 128,
    'width' => 128,
    'encrypt_name'=>true
  ];
  if(!$_FILES['slider_image']){
   $status = array('status'=>201,'message'=>'please select a slider image');
   header("Content-type: application/json");
   echo json_encode($status);
   exit();
 }else{
  if(isset($_POST) && isset($_FILES)){
    $this->load->library('upload', $config);
    if($this->upload->do_upload('slider_image') == true){
      $data = $this->upload->data();
      $slider_image = 'slider_image/'.$data['file_name'];
    }else{
      $image_err = $this->upload->display_errors();
      header("Content-type: application/json");
      echo json_encode($image_err);
      exit();
    }

    $slider_data = array();
    foreach ($_POST as $key => $value) {
      $slider_data[$key] = $value;
    }
    $slider_data['image'] = $slider_image;
    $inserted_data = $this->setting_model->slider_add($slider_data);
    if($inserted_data == true){
      $status = array('status'=>200,'message'=>'slider added');
      header("Content-type: application/json");
      echo json_encode($status);
      exit();
    }
  }
}
}

public function slider_delete()
{
  $slider_id = $this->input->post('slider_id');
  $unlink_image = $this->setting_model->unlink_slider_image($slider_id);
  if($unlink_image == true){
    if($this->setting_model->slider_delete($slider_id) == true){
     $status = array('status'=>200,'message'=>'slider deleted');
     header("Content-type: application/json");
     echo json_encode($status);
     exit();
   }
 }
}

public function slider_edit()
{
  $slider_id = $this->input->post('slider_id');
  $slider = $this->setting_model->get_slider($slider_id);
  if(isset($slider)){
    echo json_encode($slider);
  }
}

public function slider_update()
{
  $slider_id = $this->input->post('slider_id');
  $config = [
    'upload_path' => "./slider_image/",
    'allowed_types' => "gif|jpg|png|jpeg",
    'overwrite' => false,
    'max_size' => "2048000",
    'height' => 128,
    'width' => 128,
    'encrypt_name'=>true
  ];
  if(!$_FILES['slider_image'] && isset($_POST)){
    $slider_data = array();
    foreach ($_POST as $key => $value) {
      if($key == 'slider_id'){
        continue;
      }else{
        $slider_data[$key] = $value;
      }
    }
    $inserted_data = $this->setting_model->slider_update($slider_data,$slider_id);
    if($inserted_data == true){
      $status = array('status'=>200,'message'=>'slider added');
      header("Content-type: application/json");
      echo json_encode($status);
      exit();
    }
  }else{
    if(isset($_POST) && isset($_FILES)){
      if($this->setting_model->unlink_slider_image($slider_id) == true)
        { $this->load->library('upload', $config);
      if($this->upload->do_upload('slider_image') == true){
        $data = $this->upload->data();
        $slider_image = 'slider_image/'.$data['file_name'];
      }else{
        $image_err = $this->upload->display_errors();
        header("Content-type: application/json");
        echo json_encode($image_err);
        exit();
      }
      $slider_data = array();
      foreach ($_POST as $key => $value) {
        if($key == 'slider_id'){
          continue;
        }else{
          $slider_data[$key] = $value;
        }
      }
      $slider_data['image'] = $slider_image;
      $inserted_data = $this->setting_model->slider_update($slider_data,$slider_id);
      if($inserted_data == true){
        $status = array('status'=>200,'message'=>'slider added');
        header("Content-type: application/json");
        echo json_encode($status);
        exit();
      }
    }
  }
}

}
public function logo()
{

  $this->data['home_page'] = TRUE;
  $this->data['view_module'] = 'setting';
  $this->data['view_file'] = 'logo';
  $this->load->module('template');
  $this->template->_shop_admin($this->data);
}

public function logo_add()
{
  $config = [
    'upload_path' => "./logo_image/",
    'allowed_types' => "gif|jpg|png|jpeg",
    'overwrite' => false,
    'max_size' => "2048000",
    'height' => 128,
    'width' => 128,
    'encrypt_name'=>true
  ];
  if(!$_FILES['logo_image']){
   $status = array('status'=>201,'message'=>'please select a logo image');
   header("Content-type: application/json");
   echo json_encode($status);
   exit();
 }else{
  if(isset($_POST) && isset($_FILES)){
    $this->load->library('upload', $config);
    if($this->upload->do_upload('logo_image') == true){
      $data = $this->upload->data();
      $logo_image = 'logo_image/'.$data['file_name'];
    }else{
      $image_err = $this->upload->display_errors();
      header("Content-type: application/json");
      echo json_encode($image_err);
      exit();
    }
    $logo_data = [
      'config_key'=>'site_logo',
      'title'=>$this->input->post('title'),
      'value'=>$logo_image,
      'status'=>0
    ];
    $inserted_data = $this->setting_model->logo_add($logo_data);
    if($inserted_data == true){
      $status = array('status'=>200,'message'=>'logo added');
      header("Content-type: application/json");
      echo json_encode($status);
      exit();
    }
  }
}
}

public function logo_show()
{
  $data = array();
  foreach($this->setting_model->logo_show() as $l_key=>$logo)
  {
    $sub_array = array();


    if($logo->status == 1){
      $status = '<div class="switch">
      <div class="onoffswitch">
      <input type="checkbox" onchange="change_logo_status('.$logo->id.',this)" checked="checked" class="onoffswitch-checkbox logo_status" id="example'.$l_key.'" value="0">
      <label class="onoffswitch-label" for="example'.$l_key.'">
      <span class="onoffswitch-inner"></span>
      <span class="onoffswitch-switch"></span>
      </label>
      </div>
      </div>';
    }else if($logo->status == 0){
      $status = '<div class="switch">
      <div class="onoffswitch">
      <input type="checkbox" onchange="change_logo_status('.$logo->id.',this)" class="onoffswitch-checkbox logo_status" id="example'.$l_key.'" value="1">
      <label class="onoffswitch-label" for="example'.$l_key.'">
      <span class="onoffswitch-inner"></span>
      <span class="onoffswitch-switch"></span>
      </label>
      </div>
      </div>';
    }

    $sub_array[] = '<input type="checkbox" name="logo_id[]" class="logo_checkbox" value="'.$logo->id.'"/>';
    $sub_array[] = $logo->id;
    $sub_array[] = $logo->title;
    $sub_array[] = $status;
    $sub_array[] = "<img src='".FILE_UPLOAD_PATH.$logo->value."' alt='logo' height='100px' width='100px'>";
    $sub_array[] ='<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
    <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
    <li><a class="dropdown-item" onclick="delete_logo('.$logo->id.')">Delete</a></li>
    </ul>
    </div>';

    $data[] = $sub_array;
  }
  $output = array(
    'draw'    => intval($_POST['draw']),
    'recordsTotal'  => $this->setting_model->count_total_row_of_logo(),
    'recordsFiltered'  =>$this->setting_model->count_total_row_of_logo(),
    'data'    => $data
  );
  echo json_encode($output);
}

public function logo_delete()
{
  $logo_id = $this->input->post('logo_id');
  $unlink_image = $this->setting_model->unlink_logo_image($logo_id);
  if($unlink_image == true){
    if($this->setting_model->logo_delete($logo_id) == true){
     $status = array('status'=>200,'message'=>'slider deleted');
     header("Content-type: application/json");
     echo json_encode($status);
     exit();
   }
 }
}


public function change_logo_status()
{
  $logo_id = $this->input->post('logo_id');
  $status = $this->input->post('status');
  $update_status = $this->setting_model->change_logo_status($logo_id,$status);
  if($update_status == true){
    $status = array('status'=>200,'message'=>'status changed');
    header("Content-type: application/json");
    echo json_encode($status);
    exit();
  }
}
//=========================================

public function discount_on()
{
  $this->data['home_page'] = TRUE;
  $this->data['view_module'] = 'setting';
  $this->data['view_file'] = 'discount_on';
  $this->load->module('template');
  $this->template->_shop_admin($this->data);
}

public function discount_on_add()
{
  if(isset($_POST)){
    $name = $this->input->post('name');
    if($name){
      $success = $this->setting_model->discount_on_add($name);
      if($success == true){
        $status = array('status'=>200,'message'=>'discount_on added');
        header("Content-type: application/json");
        echo json_encode($status);
        exit();
      }
    }
  }
}


public function discount_on_show()
{
  $data = array();
  foreach ($this->setting_model->discount_on_show() as $key => $discount_on) {
    $sub_array = array();
    $sub_array[] = "<input type='checkbox' class='discount_on_checkbox' value='".$discount_on->id."'>";
    $sub_array[] = $discount_on->id;
    $sub_array[] = $discount_on->name;
    $sub_array[] ='<div class="btn-group">
    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">Action</button>
    <ul class="dropdown-menu" x-placement="top-start" style="position: absolute; top: -2px; left: 0px; will-change: top, left;">
    <li><a class="dropdown-item" data-toggle="modal" data-target="#edit_discount_on_modal" onclick="edit_slider('.$discount_on->id.')">Edit</a></li>
    <li><a class="dropdown-item" onclick="delete_discount_on('.$discount_on->id.')">Delete</a></li>
    </ul>
    </div>';
    $data[] = $sub_array;
  }
  $output = array(
    'draw'    => intval($_POST['draw']),
    'recordsTotal'  => $this->setting_model->count_total_row_of_discount_on(),
    'recordsFiltered'  =>$this->setting_model->count_total_row_of_discount_on(),
    'data'    => $data
  );
  echo json_encode($output);

}

public function delete_discount_on()
{
  $discount_on_id = $this->input->post('discount_on_id');
  if($discount_on_id){
    if($this->setting_model->delete_discount_on($discount_on_id) == true){
     $status = array('status'=>200,'message'=>'slider deleted');
     header("Content-type: application/json");
     echo json_encode($status);
     exit();
   }
 }
}
}
