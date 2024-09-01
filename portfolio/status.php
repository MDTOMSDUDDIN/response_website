<?php
session_start();
require '../db.php';

$id=$_GET['id'];

$select="SELECT  status FROM portfolios WHERE id=$id ";
$select_res=mysqli_query($db_connection,$select);
$select_assoc_portfolio=mysqli_fetch_assoc($select_res);

if($select_assoc_portfolio['status'] == 1){
    $update="UPDATE portfolios SET status=0 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['updated']='portfolio Status Deactivated !!! ';
    header('location:portfolio.php');
}else{
    $update="UPDATE portfolios SET status=1 WHERE id=$id";
    mysqli_query($db_connection,$update);
    $_SESSION['updated']='portfolio Status Activated !!! ';
    header('location:portfolio.php');
}

?>