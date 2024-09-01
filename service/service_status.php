<?php
session_start();
require '../db.php';

$id=$_GET['id'];

$select="SELECT  status FROM services WHERE id=$id ";
$select_res=mysqli_query($db_connection,$select);
$select_assoc_service=mysqli_fetch_assoc($select_res);

if($select_assoc_service['status'] == 1){
    $update="UPDATE services SET status=0 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['updated']='Service Status Deactivated !!! ';
    header('location:service.php');
}else{
    $update="UPDATE services SET status=1 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['updated']='Service Status Activated !!! ';
    header('location:service.php');
}

?>