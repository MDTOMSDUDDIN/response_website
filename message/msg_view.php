<?php
require '../db.php';
require '../includes/header.php';

$id=$_GET['id'];

$update="UPDATE messages SET status=1 WHERE id=$id  ";
mysqli_query($db_connection,$update);



$select="SELECT * FROM messages  WHERE id=$id ";
$select_res=mysqli_query($db_connection,$select);
$select_assoc=mysqli_fetch_assoc($select_res);


?>
<div class="row">
    <div class="col-lg-6" m-auto>
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white">Message Details </h3>
            </div>
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <td>Name</td>
                    <td><?=$select_assoc['name']?></td>
                </tr>
                <tr>
                    <td>Email</td>
                    <td><?=$select_assoc['email']?></td>
                </tr>
                <tr>
                    <td>Subject</td>
                    <td><?=$select_assoc['subject']?></td>
                </tr>
                <tr>
                    <td>Message</td>
                    <td><?=$select_assoc['message']?></td>
                </tr>
            </table>
        </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php' ?>