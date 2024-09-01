<?php 
require '../db.php';
require '../includes/header.php';

$id=$_GET['id'];

$select="SELECT * FROM skills WHERE id=$id ";
$select_res=mysqli_query($db_connection,$select);
$after_assoc=mysqli_fetch_assoc($select_res);
?>
<div class="row">
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white ">Skill Edit </h3>
            </div>
            <div class="card-body">
                <form action="skill_update.php" method="POST">
                <div class="mb-3">
                    <input type="hidden" value="<?=$id?>" name="id">
                    <label for="" class="form-label">Skill Name :</label>
                    <input type="text" name="skill_name" class="form-control" value="<?=$after_assoc['skill_name']?>">
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Percentage  :</label>
                    <input type="number" name="percentage" class="form-control" value="<?=$after_assoc['percentage']?>">
                </div>
                <div class="mb-3">
                   <button class="btn btn-primary" >Update</button>
                </div>  
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php' ?>