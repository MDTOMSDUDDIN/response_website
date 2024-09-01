<?php 
session_start();
require '../db.php';
$id=$_SESSION['logged_id'];
$name=$_POST['name'];
$email=$_POST['email'];
$country=$_POST['country'];
$gender=$_POST['gender'];


$update="UPDATE users SET name='$name',email='$email',country='$country',gender='$gender' WHERE id=$id";
mysqli_query($db_connection,$update);
$_SESSION['updated']='profile information updated !! ';
header('location:profile.php');
?>