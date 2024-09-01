<?php
session_start();
require '../db.php';

$name=$_POST['name'];
$desgination=$_POST['desgination'];
$feedback=$_POST['feedback'];
$image=$_FILES['image'];

if($image['name'] == ''){
    $insert="INSERT INTO feedbacks(name,desgination,feedback)VALUES('$name','$desgination','$feedback') ";
    mysqli_query($db_connection,$insert);
    $_SESSION['feedback']='Feedback Inserted successfully !!!';
    header('location:../index.php#feedback');
}else{
    $after_explode=explode('.',$image['name']);
    $extension=end($after_explode);
    $allowed_extention=array('png','jpg');
    if(in_array($extension,$allowed_extention)){
        if($image['size']<=1000000){
            $file_name=uniqid().$extension;
            $new_location="../uploads/feedback/".$file_name;
            move_uploaded_file($image['tmp_name'],$new_location);
            $insert="INSERT INTO feedbacks(name,desgination,feedback,image)VALUES('$name','$desgination','$feedback','$file_name') ";
            mysqli_query($db_connection,$insert);
            $_SESSION['updated']='Feedback updated successfully !!!';
            header('location:../index.php#feedback');
        
        }else{
            $_SESSION['err']='Image size max 1 MB !';
             header('location:../index.php#feedback');
        }
    }else{
        $_SESSION['err']='Only Image allowed JPG,PNG formatted ??';
        header('location:../index.php#feedback');
    }
}
?>