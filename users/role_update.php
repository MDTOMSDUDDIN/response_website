<?php
session_start();
require '../db.php';
$role_id=$_POST['role'];
$user_id=$_POST['user_id'];

$update="UPDATE users SET role=$role_id WHERE id=$user_id";
mysqli_query($db_connection,$update);
$_SESSION['role']='Role Assign successfull !';
header('location:users.php');
?>