<?php

	function image_config($path)
    {
      return  $config = array(
            'upload_path' => "../uploads/$path/",
            'allowed_types' => "gif|jpg|png|jpeg",
            'overwrite' => false,
            'max_size' => "2048000",
            'height' => 128,
            'width' => 128,
            'encrypt_name'=>true
        );
    }

    function unlink_file($file)
    {
        $file_array = explode('/', $file);
        if(in_array('default.png', $file_array)){
            return true;
        }else{
            $path = "../uploads/$file";
            if(@unlink($path)){
                return true;
            }
        }
    }

    function response($message = '',$status = '')
    {
        if(!empty($status)){
            $data = array($message);
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }else{
            $data = array('status'=>$status,'message'=>$message);
            header("Content-type: application/json");
            echo json_encode($data);
            exit();
        }
    }

 ?>
