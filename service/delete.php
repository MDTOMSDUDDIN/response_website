
<?php
session_start();
require '../db.php';

$id=$_GET['id'];

$delete="DELETE FROM services WHERE id=$id ";
mysqli_query($db_connection,$delete);

$_SESSION['delete']='services Delete successfull !';
header('location:service.php');
?>