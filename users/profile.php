<?php require '../db.php' ?>
<?php require '../includes/header.php' ?>

<div class="row">
    <div class="col-lg-4 ">
        <div class="card">
            <div class="card-header bg-primary" >
                <h4 class="text-white ">  Update Profile information</h4>
            </div>
            <div class="card-body">

            <?php if(isset($_SESSION['updated'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['updated']?></div>
                <?php } unset($_SESSION['updated'])?>
                
                <form action="profile_update.php" method="POST">
                <div class="mb-3">
                    <label  class="form-label"> Name :</label>
                    <input type="text" class="form-control" name="name" value="<?=$after_assoc_log['name']?>">
                </div>
                <div class="mb-3">
                    <label class="form-label">Email :</label>
                    <input type="email" class="form-control" name="email" value="<?=$after_assoc_log['email'] ?>">
                </div>
                <div class="mb-3">
            <select name="country" class="form-control">
                <option value="">--Select Your Country</option>
                <option value="BAN"<?=($after_assoc_log['country']=='BAN' ? 'selected':'' )?>>BAN</option>
                <option value="USA<?=($after_assoc_log['country']=='USA' ? 'selected':'' )?>">USA</option>
                <option value="IND"<?=($after_assoc_log['country']=='IND' ? 'selected':'' )?>>IND</option>
                <option value="AUS"<?=($after_assoc_log['country']=='AUS' ? 'selected':'' )?>>AUS</option>
            </select>
            </div>
            <div class="mb-3">
            <div class="form-check">
             <input class="form-check-input" name="gender" type="radio" value="male" id="flexCheckDefault" <?=($after_assoc_log['gender']=='male' ? 'checked':'' )?>>
                <label class="form-check-label" for="flexCheckDefault">
                    Male
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input"  name="gender" type="radio" value="female" id="flexCheckChecked" <?=($after_assoc_log['gender']=='female' ? 'checked':'' )?>>
                <label class="form-check-label" for="flexCheckChecked">
                    Female
                </label>
              </div>
            </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-info">
                <h4 class="text-white">Update Password </h4>
            </div>
            <div class="card-body">

                <?php if(isset($_SESSION['pass_updated'])){ ?>
                <?php $_SESSION['pass_updated'] ?>
                   <div class="alert alert-success"><?=$_SESSION['pass_updated']?></div>
                <?php } unset($_SESSION['pass_updated']); ?>


               <form action="password_update.php" method="POST">
               <div class="mb-3">
                    <input type="hidden" name="user_id" value="<?=$after_assoc_log['id']?>">
                    <label for="" class="form-label">Current Password</label>
                    <input class="form-control" type="password" name="current_password">
                        <?php if(isset( $_SESSION['current_pass_err'])){ ?>
                            <strong class="text-danger"><?= $_SESSION['current_pass_err']?></strong>
                        <?php }unset( $_SESSION['current_pass_err']); ?>  
                </div>

                <div class="mb-3">
                    <label for="" class="form-label" >New  Password</label>
                    <input class="form-control" type="password" name="new_password" >
                    <?php if(isset( $_SESSION['new_pass_err'])){ ?>
                        <strong class="text-danger"><?= $_SESSION['new_pass_err']?></strong>
                     <?php }unset( $_SESSION['new_pass_err']); ?>  
                </div>
                <div class="mb-3">
                    <label for="" class="form-label">Confirm Password</label>
                    <input class="form-control" type="password" name="confirm_password">
                    <?php if(isset( $_SESSION['confirm_pass_err'])){ ?>
                       <strong class="text-danger"><?= $_SESSION['confirm_pass_err']?></strong>
                     <?php }unset( $_SESSION['confirm_pass_err']); ?>  
                </div>
                <div class="mb-3">
                    <button type="submit" name="submit" class="btn btn-info">Update</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Upload profile Photo</h4>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['photo_updated'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['photo_updated']?></div>
                <?php }unset($_SESSION['photo_updated']) ?>
             <form action="photo_upload.php" method="POST" enctype="multipart/form-data">
                <div class="mb-3">
                <input type="hidden" name="user_id" value="<?=$after_assoc_log['id']?>">
                    <label for="" class="form-label">Upload Photo :</label>
                    <input type="file" name="photo" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">>
                    <?php if(isset($_SESSION['err'])){ ?>
                        <strong class="text-danger"> <?=$_SESSION['err']?> </strong>
                     <?php } unset($_SESSION['err'])?> 
                     <div>
                        <img src="" id="blah" alt="" width="100">
                     </div>  
                </div>

                <div class="mb-3">
                    <button type="submit" class="btn btn-primary">Upload</button>
                </div>
             </form>

            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php' ?>