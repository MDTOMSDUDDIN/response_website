<?php
session_start();
require '../db.php';

$user_id=$_POST['user_id'];
$select="SELECT * FROM users WHERE  id=$user_id";
$select_res=mysqli_query($db_connection,$select);
$after_assoc=mysqli_fetch_assoc($select_res);


$photo=$_FILES['photo'];

$after_explode=explode('.',$photo['name']);
$extension= end($after_explode);
$allowed_extention= array( ' png ' , 'jpg');
if(in_array($extension , $allowed_extention)){
    if($photo['size'] <= 100000){
        if($after_assoc['photo'] !=null){
            $delete_form="../uploads/users/".$after_assoc['photo'];
            unlink($delete_form);
        }
      $file_name = uniqid() . '.' .$extension ;
      $new_location="../uploads/users/".$file_name;
      move_uploaded_file($photo['tmp_name'],$new_location);
      
      
     $update="UPDATE users SET photo='$file_name' WHERE id='$user_id' ";
     mysqli_query($db_connection,$update);
     $_SESSION['photo_updated']='Profile Photo Updated !';
     header('location:profile.php');
    }else{
        $_SESSION['err']='Image size max  1mb  ?';
        header('location:profile.php');
    }
}else{
    $_SESSION['err']='Only PNG and JPG format allowed ?';
    header('location:profile.php');
}
?> 