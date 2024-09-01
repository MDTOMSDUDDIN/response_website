<?php
session_start();
require '../db.php';
$skill_name=$_POST['skill_name'];
$percentage=$_POST['percentage'];

$inasert="INSERT INTO skills(skill_name,percentage)VALUES('$skill_name','$percentage')";
mysqli_query($db_connection,$inasert);
$_SESSION['skill']='New skill added sucessfull ! ';
header('location:skill.php');
?>