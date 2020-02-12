<?php
require_once 'header.php';

if(isset($_POST['upload']) && $_POST['upload'] == 'Upload')
{
     $user_image = isset($_FILES['image'])?$_FILES['image']:array();//print_r($user_image);exit;
     $file_image = '';  
            
        $file_name = isset($user_image['name'])?$user_image['name']:'';
        $tmp_name = isset($user_image['tmp_name'])?$user_image['tmp_name']:'';
        $error = isset($user_image['error'])?$user_image['error']:0;
        $size = isset($user_image['size'])?$user_image['size']:'';
        $type = isset($user_image['type'])?$user_image['type']:'';
        $target_dir = "upload/";
        $ext = strtolower(end(explode('.',$file_name)));
        if($file_name!='')
        {
            
                $attachment_file = time().rand(100000,999999).'.'.$ext;
                move_uploaded_file($tmp_name,$target_dir.$attachment_file);
                $file_image = $attachment_file;
        }
        $ret = change_profile($file_image);
        header("location:dashboard.php?profile=".$ret);exit;
}
?>