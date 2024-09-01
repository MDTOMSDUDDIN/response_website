<?php
require '../db.php';

$image=$_FILES['image'];

$select_about="SELECT * FROM abouts ";
$select_about_res=mysqli_query($db_connection,$select_about);
$select_assoc_about=mysqli_fetch_assoc($select_about_res);

$after_explode=explode('.',$image['name']);
$extension=end($after_explode);
$allowed_extention=array('png');


if(in_array($extension,$allowed_extention)){
    if($image['size'] <= 1000000){
       $delete_form='../uploads/about/'.$select_assoc_about['image'];
       unlink($delete_form);
       $file_name= uniqid().'.'.$extension;
       $new_location='../uploads/about/'.$file_name;
       move_uploaded_file($image['tmp_name'],$new_location);

       $update="UPDATE abouts SET image='$file_name' ";
       mysqli_query($db_connection,$update);
       $_SESSION['image']='About image uploaded successfull  !';
       header('location:about.php');
    }else{
        $_SESSION['err']='Image size must be not greater than 1 MB ??';
        header('location:about.php');
   }

}else{
   $_SESSION['err']='Only allowed PNG file ??';
   header('location:about.php');
}

?>