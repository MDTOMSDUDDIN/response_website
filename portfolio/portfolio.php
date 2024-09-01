<?php 
require '../db.php';
require '../includes/header.php';

$select="SELECT * FROM portfolios";
$select_res=mysqli_query($db_connection,$select);

?>
<div class="row">
    <div class="col-lg-8">
        <div class="card ">
            <div class="card-header bg-primary">
                <h4 class="text-white"> Portfolio list </h4>
            </div>
            <div class="card-body">
                <?php  if(isset($_SESSION['updated'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['updated']?></div>
                <?php } unset($_SESSION['updated'])?>
                
                <?php  if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php } unset($_SESSION['success'])?>
                
                <table class="table table-bordered table-responsive">
                    <tr>
                        <th>SL.</th>
                        <th>Title</th>
                        <th>Category</th>
                        <th >Image</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                <?php  foreach($select_res as $index=> $portfolio) {?>
                    <tr>
                        <td><?=$index+1?></td>
                        <td><?=$portfolio['title']?></td>
                        <td><?=$portfolio['category']?></td>
                        <td><img src="../uploads/portfolio/<?=$portfolio['image']?>"  alt=""></td>
                        <td>
                        <a href="status.php?id=<?=$portfolio['id']?>" class="badge badge-<?=$portfolio['status']==1?'success':'light'?>"><?=$portfolio['status']==1?'Active':'Deactive' ?> </a>
                        </td>

                        <td width="100">
                        <a  href="edit.php?id=<?=$portfolio['id']?>"  class="btn btn-primary shadow btn-xs sharp  "><i class="fa fa-pencil"></i></a>

                        <a data-link="delete.php?id=<?=$portfolio['id']?>"  data-toggle="modal" data-target="#exampleModalCenter" class="btn btn-danger shadow btn-xs sharp del "><i class="fa fa-trash"></i></a>
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
                <h4 class="text-white">Add New Portfolio</h4>
            </div>
            <div class="card-body">
                <?php if(isset($_SESSION['success'])){ ?>
                    <div class="alert alert-success"><?=$_SESSION['success']?></div>
                <?php }unset($_SESSION['success']) ?>
                <form action="portfolio_post.php" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="" class="form-label">Title</label>
                        <input type="text" name="title" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">category</label>
                        <input type="text" name="category" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="" class="form-label">images</label>
                        <input type="file" name="image" class="form-control"  onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">
                        <div class="mb-2">
                            <img src="" id="blah" alt="" width="100">
                        </div>
                        <?php  if(isset($_SESSION['err'])){?>
                            <strong class="text-danger"><?=$_SESSION['err']?></strong>
                        <?php } unset($_SESSION['err'])?>
                    </div>
                    <div class="mb-3">
                        <button class="btn btn-primary">ADD PORTFOLIO </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?php require '../includes/footer.php'; ?>
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
<!-- script code -->
<script>
  $('.del').click(function(){
    var link=$(this).attr('data-link');
    $('.yes').click(function(){
      window.location.href=link;
    })
  })
</script>