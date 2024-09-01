<?php
require '../db.php';
require '../includes/header.php';
$select="SELECT * FROM feedbacks";
$select_res=mysqli_query($db_connection,$select);

?>
<div class="row">
    <div class="col-lg-8 m-auto">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white"> All Feedbacks </h4>
            </div>
        </div>
        <div class="card-body">
            <?php if(isset($_SESSION['deleted'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['deleted']?></div>
            <?php }unset($_SESSION['deleted']) ?>
            <table class="table table-bordered">
                <tr>
                    <th>SL.</th>
                    <th>Name</th>
                    <th>Desgination</th>
                    <th>image</th>
                    <th>Feedback</th>
                    <th>Action</th>
                </tr>

                <?php foreach($select_res as $index=>$feedback){ ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$feedback['name']?></td>
                        <td><?=$feedback['desgination']?></td>
                        <td>
                            <?php if($feedback['image'] == null ) { ?>
                                <!-- <img src="../uploads/feedback/defualt.png" alt="" width='100'> -->
                                <div class="text-danger" style="width:100px; height:100px ; background:black; border-radius:50% ;text-align:center; line-height: 100px; font-size:80px;" ><?=substr($feedback['name'],0,1)?></div>
                            <?php } else{ ?>
                                <img src="../uploads/feedback/<?=$feedback['image']?>" alt="" width='100'>
                            <?php } ?>
                        </td>
                        <td><?=$feedback['feedback']?></td>
                        
                        <td>
                        <a href="delete.php?id=<?=$feedback['id']?>" class="btn btn-danger shadow btn-xs sharp "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                <?php } ?>
            </table>
        </div>
    </div>
</div>

<?php require '../includes/footer.php' ?>