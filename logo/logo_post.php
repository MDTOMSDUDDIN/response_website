<?php 
session_start();
require '../db.php';

$select_logo="SELECT * FROM logos ";
$select_logo_res=mysqli_query($db_connection,$select_logo);
$select_assoc_logo=mysqli_fetch_assoc($select_logo_res);


$header_logo=$_FILES['header_logo'];
$footer_logo=$_FILES['footer_logo'];
$flag=false;

//header logo  
if($header_logo['name'] !=''){
    $after_explode=explode('.',$header_logo['name']);
    $extension= end($after_explode);
    $allowed_extention=array('png');
    if(in_array($extension,$allowed_extention)){
        if($header_logo['size'] <= 1000000){
           $delete_form='../uploads/logo/'.$select_assoc_logo['header_logo'];
           unlink($delete_form);
           $file_name=uniqid().'.'.$extension;
           $new_location='../uploads/logo/'.$file_name;
           move_uploaded_file($header_logo['tmp_name'],$new_location);

           $update="UPDATE logos SET header_logo='$file_name' ";
           mysqli_query($db_connection,$update);

           $flag=true;

        }else{
           $_SESSION['err']='logo size must be not greater than 1MB !';
           header('location:logo.php');
       }

   }else{
       $_SESSION['err']='Only allowed PNG file ??';
       header('location:logo.php');
   }
}
//footer logo 
if($footer_logo['name'] !=''){
    $after_explode=explode('.',$footer_logo['name']);
    $extension= end($after_explode);
    $allowed_extention=array('png');
    if(in_array($extension,$allowed_extention)){
        if($footer_logo['size'] <= 1000000){
           $delete_form='../uploads/logo/'.$select_assoc_logo['footer_logo'];
           unlink($delete_form);
           $file_name=uniqid().'.'.$extension;
           $new_location='../uploads/logo/'.$file_name;
           move_uploaded_file($footer_logo['tmp_name'],$new_location);

           $update="UPDATE logos SET footer_logo='$file_name' ";
           mysqli_query($db_connection,$update);

           $flag=true;

        }else{
           $_SESSION['err']='logo size must be not greater than 1MB !';
           header('location:logo.php');
       }

   }else{
       $_SESSION['err']='Only allowed PNG file ??';
       header('location:logo.php');
   }
}


if($flag){
    $_SESSION['logo']="logo updated ";
     header('location:logo.php');
}
?>

<?php require '../includes/footer.php' ?>
 