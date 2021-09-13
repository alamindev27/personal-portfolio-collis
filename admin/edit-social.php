<?php require_once 'inc/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM social WHERE id = $id";
$query =  mysqli_query($conn, $select);
$assoc = mysqli_fetch_assoc($query);
?>

    <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin:0 auto;">
      <form action="update-social.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $assoc['id'] ?>" name="id">
        <div class="form-layout form-layout-5">
          <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit Social</h3>
          <hr>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Link:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="link" placeholder="Enter link" required value="<?= $assoc['link'] ?>">
            </div>
          </div><!-- row -->
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Select Icon:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control" name="icon" required>
                <option value>Select Icon</option>
                <option class="text-capitalize" value="fa fa-facebook">facebook</option>
                <option class="text-capitalize" value="fa fa-twitter">twitter</option>
                <option class="text-capitalize" value="fa fa-google-plus">google-plus</option>
                <option class="text-capitalize" value="fa fa-linkedin">linkedin</option>
                <option class="text-capitalize" value="fa fa-pinterest">pinterest</option>
                <option class="text-capitalize" value="fa fa-instagram">instagram</option>
                <option class="text-capitalize" value="fa fa-youtube-play">youtube</option>
                <option class="text-capitalize" value="fa fa-whatsapp">whatsapp</option>
                <option class="text-capitalize" value="fa fa-skype">skype</option>
                <option class="text-capitalize" value="fa fa-telegram">telegram</option>
              </select>
            </div>
          </div>
          <?php if (isset($_SESSION['uploadportfolio'])) {?>
            <div class="alert alert-success alert-bordered pd-y-20" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
              <div class="d-flex align-items-center justify-content-start">
                <i class="icon ion-ios-checkmark alert-icon tx-52 tx-success mg-r-20"></i>
                <div>
                  <h5 class="mg-b-2 tx-success"><?= $_SESSION['uploadportfolio'] ?></h5>
                </div>
              </div><!-- d-flex -->
            </div><!-- alert -->
            <?php
            unset($_SESSION['uploadportfolio']);
          } ?>

          <div class="row mg-t-30">
            <div class="col-sm-8 mg-l-auto">
              <div class="form-layout-footer">
                <button class="btn btn-info">Add Portfolio</button>
              </div><!-- form-layout-footer -->
            </div><!-- col-8 -->
          </div>
        </div><!-- form-layout -->
      </form>
    </div>
</div>
<?php require_once 'inc/footer.php'; ?>


