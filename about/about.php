<?php 
require '../db.php';
require '../includes/header.php';

$select_about="SELECT * FROM abouts ";
$select_about_res=mysqli_query($db_connection,$select_about);
$select_assoc_about=mysqli_fetch_assoc($select_about_res);

?>

<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white" >Update about information </h4>
            </div>
        <div class="card-body">

               <?php if(isset($_SESSION['about'])){?>
                  <div class="alert alert-success"><?=$_SESSION['about']?></div>
                <?php }unset($_SESSION['about']) ?>

            <form action="about_post.php" method="POST">
                <div class="mb-3">
                    <label for="" class="form-label">Designation</label>
                    <input type="text" name="designation" class="form-control" value="<?=$select_assoc_about['designation']?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Name</label>
                    <input type="text" name="name" class="form-control"  value="<?=$select_assoc_about['name']?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Description</label>
                    <textarea name="desp" class="form-control " rows="5"><?=$select_assoc_about['desp']?></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary ">Update</button>
                </div>


            </form>
        </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white text-center">Update Images </h4>
            </div>
            <div class="card-boby">
                <?php if(isset($_SESSION['image'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['image']?></div>
                <?php } unset($_SESSION['image'])?>
                <form action="about_image.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Upload Image</label>
                        <input type="file" name="image" class="form-control" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="my-2">
                            <img src="../uploads/about/<?=$select_assoc_about['image']?>" alt="" id="blah" width="100">
                        </div>
                        <?php if(isset($_SESSION['err'])){ ?>
                           <strong><?=$_SESSION['err']?></strong>
                         <?php }unset($_SESSION['err']) ?>   
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


<?php require '../includes/footer.php' ?>