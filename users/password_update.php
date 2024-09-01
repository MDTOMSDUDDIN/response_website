<?php 
session_start();
require '../db.php';

$user_id=$_POST['user_id'];
$select="SELECT * FROM users WHERE id=$user_id ";
$select_res=mysqli_query($db_connection,$select);
$after_assoc=mysqli_fetch_assoc($select_res);

$current_password=$_POST['current_password'];
$new_password=$_POST['new_password'];
$after_hash=password_hash($new_password,PASSWORD_DEFAULT);
$confirm_password=$_POST['confirm_password'];
 $flag=false;
 if(empty($current_password)){
    $flag=true;
    $_SESSION['current_pass_err']='Please enter your current password ? ';
 }else{
    if(!password_verify($current_password,$after_assoc['password'])){
        $flag=true;
        $_SESSION['current_pass_err']='Try again corected current password !? ';
    }
 }

 if(empty($new_password)){
    $flag=true;
    $_SESSION['new_pass_err']='Please enter new password ? ';
 }
 if(empty($confirm_password)){
    $flag=true;
    $_SESSION['confirm_pass_err']='Please enter confirm password ?';
 }else{
    if($new_password !=$confirm_password){
        $flag=true;
        $_SESSION['confirm_pass_err']='new_password and confirm password not mass ??';
    }
 }

if($flag){
    header("location:profile.php");
}else{
    $update="UPDATE users SET password='$after_hash' WHERE id=$user_id";
    mysqli_query($db_connection,$update);
    $_SESSION['pass_updated']='Password has changed !! ';
    header('location:profile.php');

}
?>
