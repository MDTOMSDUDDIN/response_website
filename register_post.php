<?php
session_start();

require 'db.php';

$name = $_POST['name'];
$email = $_POST['email'];
$password = $_POST['password'];
$after_hash=password_hash($password,PASSWORD_DEFAULT);
$confirm_password = $_POST['confirm_password'];
$country = $_POST['country'];
$gender = $_POST['gender'];

$upper = preg_match('@[A-Z]@', $password);
$lower = preg_match('@[a-z]@', $password);
$number = preg_match('@[0-9]@', $password);
$spsl = preg_match('@[#,$,%,^,&,*]@', $password);

$flag = false;

if(empty($name)){
    $flag = true;
    $_SESSION['nam_err'] = 'Please Enter Your Name';
}
else {
    $_SESSION['name'] = $name;
}
if(empty($email)){
    $flag = true;
    $_SESSION['email_err'] = 'Please Enter Your Email';
}else {
        $_SESSION['email'] = $email;
    } 
if(empty($password)){
    $flag = true;
    $_SESSION['pass_err'] = 'Please Enter Your Password';
}
else{
    if(!$upper || !$lower || !$number || !$spsl || strlen($password) < 8){
        $flag = true;
        $_SESSION['pass_err'] = 'Password contains uppercase, lowercase, number, spcial and min 8 charecter';
    }
}
if(empty($confirm_password)){
    $flag = true;
    $_SESSION['conpass_err'] = 'Please Enter confirm Password';
}
else {
    if($password != $confirm_password){
        $flag = true;
        $_SESSION['conpass_err'] = 'Password and confirm password does not match';
    }
}
if(empty($country)){
    $flag = true;
    $_SESSION['country_err'] = 'Please select your country';
}
else{
    $_SESSION['country'] = $country;
}
if(empty($gender)){
    $flag = true;
    $_SESSION['gen_err'] = 'Please select your Gender';
}
else{
    $_SESSION['gender'] = $gender;
}

if($flag){
    header('location:register.php');
}

else{

    //insert
    $insert = "INSERT INTO users(name, email, password, country, gender)VALUES('$name', '$email', '$after_hash','$country', '$gender')";
    mysqli_query($db_connection, $insert);

    $_SESSION['success'] = 'User Registration successfull!';
    unset($_SESSION['name']);
    unset($_SESSION['email']);
    unset($_SESSION['gender']);
    unset($_SESSION['country']);

    header('location:users/users.php');



}


?>