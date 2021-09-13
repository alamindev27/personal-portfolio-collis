<?php require_once 'inc/header.php';
$select = "SELECT * FROM hero";
$query =  mysqli_query($conn, $select);
$assoc = mysqli_fetch_assoc($query);
?>
<div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin: 0 auto;">
  <form action="update-hero.php" method="post" enctype="multipart/form-data">
    <div class="form-layout form-layout-5">
      <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit hero</h3>
      <hr>
      <div class="row">
        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Intro:</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <input type="text" class="form-control" name="title" placeholder="Enter intro" required value="<?= $assoc['title'] ?>">
        </div>
      </div><!-- row -->
      <div class="row mg-t-20">
        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Name:</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <input type="text" class="form-control" name="name" placeholder="Enter name" required value="<?= $assoc['name'] ?>">
          <input type="hidden" value="<?= $assoc['id'] ?>" name="id">
        </div>
      </div>
      <div class="row mg-t-20">
        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Hero Image:</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <input type="file" class="form-control" name="image" required onchange="document.getElementById('hero').src = window.URL.createObjectURL(this.files[0])" value="<?php if(isset($assoc['image'])) echo 'upload/hero/'.$assoc['image'] ?>">
          <span class="text-danger">
            <?php 
              if (isset($_SESSION['imageError'])) {
                echo $_SESSION['imageError'];
                unset($_SESSION['imageError']);
              }
             ?>
          </span>
        </div>
      </div>
      <?php if (isset($_SESSION['exitsHero'])) {?>
        <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
          <div class="d-flex align-items-center justify-content-start">
            <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
            <div>
              <h5 class="mg-b-2 tx-danger"><?= $_SESSION['exitsHero'] ?></h5>
            </div>
          </div><!-- d-flex -->
        </div><!-- alert -->
        <?php
        unset($_SESSION['exitsHero']);
      } ?>
      <div class="row mg-t-30">
        <div class="col-sm-8 mg-l-auto">
          <div class="form-layout-footer">
            <button class="btn btn-info">Save Chage</button>
          <img src="upload/hero/<?= $assoc['image'] ?>" style="width: 70px;float: right;border: 2px solid #aaa;" id="hero">
          </div><!-- form-layout-footer -->
        </div><!-- col-8 -->
      </div>
    </div><!-- form-layout -->
  </form>
</div>
<?php require_once 'inc/footer.php'; ?>


