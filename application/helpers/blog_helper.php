<?php
defined('BASEPATH') OR exit('No direct script access allowed');


function textShort($text , $limit = 300){
        $text = $text."";
        $text = substr($text , 0 ,$limit);
        $text = substr($text , 0 ,strripos($text ,' '));
        $text = $text."....";
        return $text;
}

function dateFormater($date){
    return date('F j, Y, g:i a', strtotime($date));
}



?>