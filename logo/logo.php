<?php 
require '../db.php';
require '../includes/header.php';

$select_logo="SELECT * FROM logos ";
$select_logo_res=mysqli_query($db_connection,$select_logo);
$select_assoc_logo=mysqli_fetch_assoc($select_logo_res);

?>

<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white" >Change Logo</h4>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['logo'])){?>
                  <div class="alert alert-success"><?=$_SESSION['logo']?></div>
                <?php }unset($_SESSION['logo']) ?>

             <form action="logo_post.php" method="POST" enctype="multipart/form-data">
               <div class="mb-3">
                <label for="" class="form-label">Change Header Logo :</label>
                <input type="file" name="header_logo" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                  <div class="mb-1">
                    <img src="../uploads/logo/<?=$select_assoc_logo['header_logo']?>" id="blah" alt="" width="150">
                  </div>
                     <?php if(isset($_SESSION['err'])){?>
                        <strong class="text-danger"><?=$_SESSION['err']?></strong>
                     <?php }unset($_SESSION['err']) ?>
                </div>

               <div class="mb-3">
                <label for="" class="form-label">Change Footer Logo :</label>
                <input type="file" name="footer_logo" class="form-control" onchange="document.getElementById('blah2').src = window.URL.createObjectURL(this.files[0])">
                <div class="mb-1">
                    <img src="../uploads/logo/<?=$select_assoc_logo['footer_logo']?>" id="blah2" alt="" width="150">
               </div>
                   
             </div>

               <div class="mb-3">
                <button type="submit" class="btn btn-primary">Update</button>
               </div>
             </form>
            </div>
        </div>
    </div>
</div>


<?php require '../includes/footer.php' ?>