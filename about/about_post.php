<?php 
session_start();
require '../db.php';


$designation=$_POST['designation'];
$name=$_POST['name'];
$desp=$_POST['desp'];

$update="UPDATE abouts SET designation='$designation',name='$name',desp='$desp' ";
mysqli_query($db_connection,$update);
$_SESSION['about']='About information successfull !!!';
header('location:about.php');

?>

<?php require '../includes/footer.php' ?>