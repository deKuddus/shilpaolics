<?php 

	function config($key)
	{
		$CI =& get_instance();
		$query = $CI->db->select('value')->where('config_key',$key)->get('config');
		foreach ($query->result() as $key => $value) {
			return $value->value;
		}
	}

 ?>