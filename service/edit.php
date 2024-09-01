<?php
require '../db.php';
require '../includes/header.php';
$id=$_GET['id'];
$select="SELECT  * FROM services WHERE id=$id ";
$select_res=mysqli_query($db_connection,$select);
$select_assoc_service=mysqli_fetch_assoc($select_res);

?>
<div class="row">
<div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Update Services </h4>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php }unset($_SESSION['success']) ?>
                <form action="update.php" method="POST">
                    <div class="mb-3">
                        <input type="hidden" name="id" value="<?=$select_assoc_service['id']?>">
                        <label for="" class="form-label">Title :</label>
                        <input type="text" name="title" class="form-control" value="<?=$select_assoc_service['title']?>">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description :</label>
                        <textarea name="desp" class="form-control" rows="5"><?=$select_assoc_service['desp']?></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Update Service</button>
                </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php require '../includes/footer.php'?>