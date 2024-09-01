<?php 
session_start();
require '../db.php';
require '../includes/header.php';

$select_msg="SELECT * FROM messages ";
$select_msg_res=mysqli_query($db_connection,$select_msg)

?>
<div class="row">
    <div class="col-lg-10">
    <div class="card">
        <div class="card-header bg-primary">
            <h4 class="text-white">All Message Lists </h4>
        </div>
        <div class="card-body">

            <?php if(isset($_SESSION['deleted'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['deleted']?></div>
            <?php }unset($_SESSION['deleted']) ?>

            <table class="table table-bordered table-responsive">
                <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Action </th>
                </tr>
            <?php foreach($select_msg_res as $index=> $message){ ?>
                <tr class="<?=($message['status']==1?'':'bg-light text-blaci')?>">
                    <td><?=$index+1?></td>
                    <td><?=$message['name']?></td>
                    <td><?=$message['email']?></td>
                    <td><?=$message['subject']?></td>
                    <td><?=$message['message']?></td>
                    <td width="100">
                    <a href="msg_view.php?id=<?=$message['id']?>" class="btn btn-success shadow btn-xs sharp "> <i class="fa fa-eye text-black" style="line-height: 20px;"></i></a>

                      <a href="msg_delete.php?id=<?=$message['id']?>" class="btn btn-danger shadow btn-xs sharp "> <i class="fa fa-trash" style="line-height: 20px;"></i></a>
                    </td>
                </tr>
            <?php } ?>
            </table>
        </div>
    </div>
    </div>
</div>

<?php require '../includes/footer.php'; ?>


