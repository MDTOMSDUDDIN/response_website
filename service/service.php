<?php 
require '../db.php';
require '../includes/header.php';

$select="SELECT * FROM services ";
$select_res=mysqli_query($db_connection,$select);

?>
<div class="row">
    <div class="col-lg-8">
        <div class="card">
            <div class="card-header bg-primary">
                <h4 class="text-white"> Services Lists</h4>
            </div>
            <div class="card-body">
             <?php if(isset($_SESSION['updated'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['updated']?></div>
              <?php }unset($_SESSION['updated']) ?>

              <?php if(isset($_SESSION['delete'])){ ?>
                <div class="alert alert-success"><?=$_SESSION['delete']?></div>
              <?php }unset($_SESSION['delete']) ?>

                <table class="table table-border table-responsive ">
                  <tr>
                    <th>SL.</th>
                    <th>Title</th>
                    <th>Description</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                <?php foreach($select_res as $index=>$service){ ?>
                  <tr>
                    <td><?=$index+1?></td>
                    <td><?=$service['title'] ?></td>
                    <td><?=$service['desp']?></td>
                    <td>
                        <a href="service_status.php?id=<?=$service['id']?>" class="badge badge-<?=$service['status']==1?'success':'light'?>"><?=$service['status']==1?'Active':'Deactive' ?> </a>
                    </td>
                    <td width="100">
                        <a  href="edit.php?id=<?=$service['id']?>"  class="btn btn-primary shadow btn-xs sharp  "><i class="fa fa-pencil"></i></a>

                        <a data-link="delete.php?id=<?=$service['id']?>"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp tom "><i class="fa fa-trash"></i></a>
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
                <h4 class="text-white">Add New Services </h4>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php }unset($_SESSION['success']) ?>
                <form action="service_post.php" method="POST">
                    <div class="mb-3">
                        <label for="" class="form-label">Title :</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">Description :</label>
                        <textarea name="desp" class="form-control" rows="5"></textarea>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary">Add Service</button>
                </div>
                </form>
            </div>
        </div>
    </div>

</div>

<?php require '../includes/footer.php'; ?>

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