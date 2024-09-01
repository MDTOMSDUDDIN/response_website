<?php 
require '../db.php';
require '../includes/header.php';

$skill="SELECT * FROM skills";
$skill_res=mysqli_query($db_connection,$skill);

?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white">Skill List</h4>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['status'])){ ?>
                   <div class="alert alert-success"><?=$_SESSION['status']?></div>
                 <?php }unset($_SESSION['status']) ?>

                 <?php if(isset($_SESSION['Delete'])){ ?>
                   <div class="alert alert-success"><?=$_SESSION['Delete']?></div>
                 <?php }unset($_SESSION['Delete']) ?>

                 <?php if(isset($_SESSION['updated'])){ ?>
                   <div class="alert alert-success"><?=$_SESSION['updated']?></div>
                 <?php }unset($_SESSION['updated']) ?>


         <table class="table table-bordered">
                <tr>
                        <th>SL.</th>
                        <th>Skill</th>
                        <th>Percentage</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                <?php foreach ($skill_res as $index => $skill) { ?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$skill['skill_name']?></td>
                        <td><?=$skill['percentage']?></td>
                        <td>
                            <a href="status.php?id=<?=$skill['id']?>" class=" badge badge-<?=($skill['status']==1?'success':'light')?>"><?=($skill['status']==1?'Active':'Deactive')?></a>
                        </td>
                        <td>
                        <a  href="skill_edit.php?id=<?=$skill['id']?>"  class="btn btn-primary shadow btn-xs sharp  "><i class="fa fa-pencil"></i></a>


                        <a data-link="delete.php?id=<?=$skill['id']?>"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp tom "><i class="fa fa-trash"></i></a>
                        </td>
                    </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    
    <div class="col-lg-4">
        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="text-white text-center" >Add new Skill</h3>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['skill'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['skill']?></div>
                 <?php }unset($_SESSION['skill']) ?>

                <form action="skill_post.php" method="POST">
                    <div class="mb-3">
                    <label for=""  class="form-label">Skill Name</label>
                    <input type="text" name="skill_name" class="form-control">
                    </div>
                    <div class="mb-3">
                    <label for=""  class="form-label">Skill Percentage</label>
                    <input type="number" name="percentage" class="form-control">
                    </div>
                    <div class="mb-3">
                   <button class="btn btn-primary">Add New Skill</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- modal  -->
<?php require '../includes/footer.php' ?>
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

<script>
  $('.tom').click(function(){
    var link=$(this).attr('data-link');
    $('.yes').click(function(){
      window.location.href=link;
    })
  })
</script>