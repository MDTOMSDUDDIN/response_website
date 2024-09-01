<?php 
session_start();
require '../db.php';
$id=$_GET['id'];

$delete="DELETE FROM portfolios WHERE id=$id ";
mysqli_query($db_connection,$delete);

$_SESSION['success']='portfolios Delete successfully !';
header('location:portfolio.php')
?>