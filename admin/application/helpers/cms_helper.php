<?php
	defined('BASEPATH') OR exit('No direct script access allowed');
	/**
	* add meta title
	*/
	function add_meta_title($string) {
		$CI =& get_instance();
		$CI->data['meta_title'] = e($string) . ' - ' . $CI->data['meta_title']; 
	}

	/**
	* btn-btn_edit
	*/
	function btn_edit($uri) {
		return anchor($uri, '<i class="fa fa-edit"></i>');
	}

	/**
	* btn-btn_details
	*/
	function btn_details($uri) {
		return anchor($uri, '<i class="fa fa-info"></i>');
	}

	/**
	* btn_delete
	*/
	function btn_delete($uri) {
		return anchor($uri, '<i class="fa fa-remove"></i>', array(
				'onclick' => "return confirm('You are about to delete a record. This cannot be undone. Are you sure?');"
			));
	}

	/**
	* escape
	*/
	function e($string) {
		return htmlentities($string);
	}


	/**
	* Dump helper. Functions to dump variables to the screen, in a nicley formatted manner.
	*/
	
	function dump($data, $die = FALSE) {
		
		echo '<pre>'; print_r($data); echo '</pre>';

		if ($die) {
			die('Dumped!');
		}

	}

	/**
	*    Input any number in Bengali and the following function will return the English number.
	*/

	function bn2en_number ($number) {

	    $search_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
	    $replace_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
	    $en_number = str_replace($search_array, $replace_array, $number);

	    return $en_number;
	}

	/**
	*    Input any number in Bengali and the following function will return the English number.
	*/

	function en2bn_number ($number) {

	    $search_array= array("1", "2", "3", "4", "5", "6", "7", "8", "9", "0");
	    $replace_array= array("১", "২", "৩", "৪", "৫", "৬", "৭", "৮", "৯", "০");
	    $bn_number = str_replace($search_array, $replace_array, $number);

		// $bn_digits=array('০','১','২','৩','৪','৫','৬','৭','৮','৯');
		// $output = str_replace(range(0, 9),$bn_digits, $input);

	    return $bn_number;
	}

	
?>