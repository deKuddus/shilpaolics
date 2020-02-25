<?php 
	defined('BASEPATH') OR exit('No direct script access allowed');
	
	function slider()
	{
		$CI =& get_instance();
		$query = $CI->db->query("select * from slider where is_active = 1 limit 3");
		return $query->result();
	}

	function get_logo()
	{
		$CI =& get_instance();
		$query = $CI->db->where(['config_key'=>'site_logo','status'=>1])->limit(1)->get('config');
		$logo = $query->row();
		return $logo->value;
	}

	function get_user_fullname_by_username($username)
	{
		$CI =& get_instance();
		$query = $CI->db->select('name')->where('username',$username)->get('users');
		$name = $query->row();
		if($name){
			return $name->name;
		}else{
			return 1;
		}
	}

	//============================================
	function show_product_by_category($pid = 0){
	global $tab_cat;
	$CI =& get_instance();
	$CI->db->select('id,category_name,pid')->from('category')->where(['pid'=>$pid,'show_home'=>1]);
	$query = $CI->db->get();
	return $query->result();
}

function countsubcat($pid){
	$CI =& get_instance();
	$CI->db->select('count(pid) AS cat')->from('category')->where('pid',$pid)->limit(1);
	$query = $CI->db->get();
	return $query->result();
}

function count_subcat_incat($pid){
	$CI =& get_instance();
	$CI->db->select('*')->from('category')->where('pid',$pid)->order_by('id','asc');
	$query = $CI->db->get();
	return $query->result();
}

function product_by_cat($cat_id){

	$CI =& get_instance();
	$CI->db->select('*')->from('products')->where(['sub_category_id'=>$cat_id,'is_active'=>1]);
	$query = $CI->db->get();
	return $query->result();
}

function get_product_by_id($id){
	$CI =& get_instance();
	$id = implode(',',$id);
	$where = "id IN ('".$id."')";
	$query = $CI->db->where($where)->get('products');
	return $query->result();
}

function get_category_pid_by_id($category_id){
	$CI =& get_instance();
	$query = $CI->db->select('pid')->from('category')->where('id',$category_id)->get();
	$p_id = $query->row();
	$query1 = $CI->db->select('id')->from('category')->where('pid',$p_id->pid)->get();
	$result = $query1->result();
	$categor = array();
	foreach ($result as $key => $value) {
		$categor[$key] = $value->id;
	}
	return $categor = implode(',',$categor);

}

 function get_related_product($product_id,$category_id,$brand_id){
	$all_category = get_category_pid_by_id($category_id);
	$CI =& get_instance();
	$where = "category_id IN ($all_category) AND brand_id = $brand_id AND id != $product_id";
	$query = $CI->db->select("*")->from('products')->where($where)->get();
	return $query->result();
}

function brand_by_brand_id($brand_id){
	$CI =&get_instance();
	$query = $CI->db->select('name')->where('id',$brand_id)->get('brand');
	$brand = $query->row();
	return $brand->name;

}

function get_best_selling_for_header_limit3(){
	$CI =&get_instance();
	$query = $CI->db->where('is_active',1)->order_by('best_selling','desc')->limit(4)->get('products');
	return $query->result();

}

function get_discount_type()
{
	$CI = &get_instance();
	$query = $CI->db->get('types');
	return $query->result();
}


?>