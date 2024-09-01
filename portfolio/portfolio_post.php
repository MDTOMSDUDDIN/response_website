<?php 
session_start();
require '../db.php';

$title=$_POST['title'];
$category=$_POST['category'];
$image=$_FILES['image'];


$after_explode=explode('.',$image['name']);
$extension=end($after_explode);
$allowed_extention=array('jpg','png');
if(in_array($extension,$allowed_extention)){
    if($image['size']<=1000000){
        $file_name=uniqid().'.'.$extension;
        $new_location="../uploads/portfolio/".$file_name;
        move_uploaded_file($image['tmp_name'],$new_location);

        $insert="INSERT INTO portfolios(title,category,image)VALUES('$title','$category','$image') ";
        mysqli_query($db_connection,$insert);
        $_SESSION['success']='Portfolios Added Successfully !!';
        header('location:portfolio.php');

    }else{
        $_SESSION['err']='Image size does not greater than 1 MB  ??';
        header('location:portfolio.php');
    }
}else{
   $_SESSION['err']='Only allowed JPG & PNG image formatted !!';
   header('location:portfolio.php');
}


?>