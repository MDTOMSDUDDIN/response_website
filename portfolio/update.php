<?php 
require '../db.php';

$id=$_POST['id'];
$title=$_POST['title'];
$category=$_POST['category'];
$image=$_FILES['image'];

$select="SELECT image FROM portfolios WHERE id=$id ";
$select_res=mysqli_query($db_connection,$select);
$select_assoc=mysqli_fetch_assoc($select_res);

if($image['name'] != ' '){
    $after_explode=explode('.',$image['name']);
    $extension=end($after_explode);
    $allowed_extention=array('jpg','png');
        if(in_array($extension,$allowed_extention)){
            if($image['size']<=1000000){
                $dalete_form="../uploads/portfolio/".$select_assoc['image'];
                unlink($dalete_form);
                $file_name=uniqid().'.'.$extension;
                $new_location="../uploads/portfolio/".$file_name;
                move_uploaded_file($image['tmp_name'],$new_location);

                $update="UPDATE portfolios SET title='$title',category='$category',image='$file_name' WHERE id='$id' ";
                mysqli_query($db_connection,$update);
                $_SESSION['success']='Portfolios Updated Successfully !!';
                header('location:portfolio.php');

            }else{
                $_SESSION['err']='Image size does not greater than 1 MB  ??';
                header('location:edit.php?id=').$id;
            }
        }else{
    $_SESSION['err']='Only allowed JPG & PNG image formatted !!';
    header('location:edit.php?id='.$id);
    }

}
?>