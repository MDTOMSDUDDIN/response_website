<?php require '../db.php'  ?>
<?php require '../includes/header.php' ?>
<?php 
$select="SELECT * FROM users";
$select_res=mysqli_query($db_connection,$select);
?>
<div class="row">
  <div class="col-lg-8">
    <div class="card">
      <div class="card-header bg-primary">
        <h4 class="text-white">Users List </h4>
        <a  class="btn btn-light" data-toggle="modal" data-target="#basicModal" >Add New </a>
      <!-- Modal -->
  <div class="modal fade" id="basicModal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
      <form action="../register_post.php" method="POST" >
        <div class="modal-header">
            <h5 class="modal-title">Add new user </h5>
            <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
            </button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
              <label for="" class="form-label">Name</label>
              <input type="text" name="name" class="form-control">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Email</label>
              <input type="email" name="email" class="form-control">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">Password</label>
              <input type="password" name="password" class="form-control">
            </div>
            <div class="mb-3">
              <label for="" class="form-label">confirm_Password</label>
              <input type="password" name="confirm_password" class="form-control">
            </div>
            <div class="mb-3">
            <select name="country" class="form-control">
              <option value="">--Select Your Country</option>
                  <option value="BAN">BAN</option>
                  <option value="USA">USA</option>
                  <option value="IND">IND</option>
                  <option value="AUS">AUS</option>
              </select>
            </div>
            <div class="mb-3">
            <div class="form-check">
             <input class="form-check-input" name="gender" type="radio" value="male" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                    Male
                </label>
                </div>
                <div class="form-check">
                <input class="form-check-input"  name="gender" type="radio" value="female" id="flexCheckChecked">
                <label class="form-check-label" for="flexCheckChecked">
                    Female
                </label>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <?php if($after_assoc_log['role']==1) {?>
            <button type="submit" class="btn btn-primary">Add User</button>
            <?php } ?>
        </div>
        </form>
        </div>
      </div>
  </div>
      </div>

      <div class="card-body">
      <?php if(isset($_SESSION['success'])){ ?>
        <div class="alert alert-success"><?=$_SESSION['success']?></div>
      <?php } unset($_SESSION['success']) ?>
        <div class="table-responsive">
        <table class="table table-bordered ">
          <tr>
            <th>SL.</th>
            <th>Name </th>
            <th>Email</th>
            <th>Country</th>
            <th>Gender</th>
            <th>Photo</th>
          <?php if($after_assoc_log['role']==1){ ?>
            <th>Action</th>
          <?php } ?>
          </tr>
        <?php foreach($select_res as $sl=> $user){ ?>
          <tr>
              <td><?=$sl+1?></td>
            <td><?= $user['name']?></td>
            <td><?= $user['email']?></td>
            <td><?= $user['country']?></td>
            <td><?= $user['gender']?></td>
            <td><?php if($user['photo']== null){ ?>
            <strong>Preview no Photo</strong>  
            <?php } else{ ?>
            <img src="/response_website/uploads/users/<?=$user['photo']?>" alt="" width="50px" >
            <?php } ?></td>
            <?php if($after_assoc_log['role']==1){ ?>
            <td>
              <a data-link="user_delete.php?id=<?=$user['id']?>"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp tom "><i class="fa fa-trash"></i></a>
            </td>
            <?php } ?>
          </tr>
        <?php } ?>
            
          </tr>
        </table>
        </div>
        
      </div>
    </div>
  </div>
  <?php if($after_assoc_log['role']==1){ ?>
    <div class="col-lg-4">
      <div class="card">
        <div class="card-header bg-success">
          <h4 class="text-white">Assign Role </h4>
        </div>
        <div class="card-body">
          <?php if(isset($_SESSION['role'])){ ?>
            <div class="alert alert-success"><?=$_SESSION['role']?></div>
          <?php }unset($_SESSION['role']) ?>
          <form action="role_update.php" method="POST">
            <div class="mb-3">
              <label for="" class="form-label">Select Role :</label>
              <select name="role" class="form-control">
                <option value="">Select Role</option>
                <option value="1">Super Admin</option>
                <option value="2">Admin</option>
                <option value="3">Moderator</option>
                <option value="4">Editor</option>
              </select>
            </div>

            <div class="mb-3">
              <label for="" class="form-label">Select User :</label>
              <select name="user_id" class="form-control">
                <option value="">Select User</option>
                <?php  foreach($select_res as $user){ ?>
                <option value="<?=$user['id']?>"><?=$user['name']?></option>
             <?php } ?>
              </select>
            </div>
            <div class="md-3">
              <button type="submit" class="btn btn-success" >Assign Role</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  <?php } ?>
</div>
<!-- modal  -->
<div class="modal fade" id="exampleModalCenter">
  <div class="modal-dialog modal-dialog-centered" role="document">
  <div class="modal-content ">
    <div class="modal-header">
    <h5 class="modal-title">Are you sure want to Delete this users ?</h5>
    <button type="button" class="close" data-dismiss="modal"><span>×</span>
    </button>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success light" data-dismiss="modal">NO ,Dont</button>
        <button type="button" class="btn btn-danger yes">yes,Delete</button>
      </div>
    </div>
  </div>
</div>
<?php require '../includes/footer.php' ?>
<script>
  $('.tom').click(function(){
    var link=$(this).attr('data-link');
    $('.yes').click(function(){
      window.location.href=link;
    })
  })
</script>