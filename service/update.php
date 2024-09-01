<?php 
session_start();
require '../db.php';
$id=$_POST['id'];
$title=$_POST['title'];
$desp=$_POST['desp'];

$update="UPDATE services SET title='$title',desp='$desp' WHERE id=$id ";
mysqli_query($db_connection,$update);
$_SESSION['update']='Service updated successfully !! ';
header('location:service.php');
?>