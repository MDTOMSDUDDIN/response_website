<?php 
session_start();
require '../db.php';
$id=$_GET['id'];

$delete="DELETE FROM users WHERE id=$id ";
mysqli_query($db_connection,$delete);

$_SESSION['success']='user Delete successfully !';
header('location:users.php')
?>