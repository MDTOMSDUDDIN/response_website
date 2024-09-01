<?php 
session_start();
require 'db.php';
$flag=false;


$email=$_POST['email'];
$password=$_POST['password'];

if(empty($email)){
$flag=true;
$_SESSION['email']="please enter your email address ??";
}
else{
    $select=" SELECT COUNT( *) as total FROM users WHERE email='$email' ";
    $select_res=mysqli_query($db_connection,$select );
    $after_assoc=mysqli_fetch_assoc($select_res);
    if($after_assoc['total']!=1 ) {
        $flag=true;
        $_SESSION['email']=" your email address does not mass ??";  
    }
}


if(empty($password)){
$flag=true;
$_SESSION['password']="please enter your password ??";
}else{
    $select=" SELECT * FROM users WHERE email='$email' ";
    $select_res=mysqli_query($db_connection,$select );
    $after_assoc=mysqli_fetch_assoc($select_res);
    if(!password_verify($password,$after_assoc['password'])){
        $flag=true;
        $_SESSION['password']="wrong password ??";
    }else{
        $_SESSION['successfully']="Login complete 100% ??";
        $_SESSION['logged_id']=$after_assoc['id'];
        header('location:dashboard.php');
    }
}
if($flag){
    header('location:login.php');
}
?>