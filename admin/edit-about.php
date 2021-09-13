<?php require_once 'inc/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM about WHERE id = $id";
$query =  mysqli_query($conn, $select);
$assoc = mysqli_fetch_assoc($query);
?>
<div class="row">
    <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin:0 auto;">
      <form action="update-about.php" method="post">
        <input type="hidden" value="<?= $id ?>" name="id">
        <div class="form-layout form-layout-5">
          <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit About</h3>
          <hr>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Description:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <textarea class="form-control" name="description" placeholder="Enter Description" required rows="5"><?= $assoc['description'] ?></textarea>
            </div>
          </div> <br>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Skill Heading:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="txt" placeholder="Enter skill heading" required value="<?= $assoc['txt'] ?>">
            </div>
          </div><!-- row --> <br>

          <?php if (isset($_SESSION['exits'])) {?>
            <div class="alert alert-danger alert-bordered pd-y-20" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-close alert-icon tx-52 tx-danger mg-r-20"></i>
                <div>
                  <h5 class="mg-b-2 tx-danger"><?= $_SESSION['exits'] ?></h5>
                </div>
              </div><!-- d-flex -->
            </div><!-- alert -->
            <?php
            unset($_SESSION['exits']);
          } ?>
          <div class="row mg-t-30">
            <div class="col-sm-8 mg-l-auto">
              <div class="form-layout-footer">
                <button class="btn btn-info">Save</button>
              </div><!-- form-layout-footer -->
            </div><!-- col-8 -->
          </div>
        </div><!-- form-layout -->
      </form>
    </div> 
</div>



<?php require_once 'inc/footer.php'; ?>


