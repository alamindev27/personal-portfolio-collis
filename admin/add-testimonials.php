<?php require_once 'inc/header.php';?>
<div class="row">
    <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin:0 auto;">
      <form action="store-testimonials.php" method="post" enctype="multipart/form-data">
        <div class="form-layout form-layout-5">
          <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Add Testimonials</h3>
          <hr>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Name:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="name" placeholder="Enter name" required>
            </div>
          </div><!-- row --> <br>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Title:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="title" placeholder="Enter title" required>
            </div>
          </div><!-- row --> <br>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Description:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <textarea class="form-control" name="description" placeholder="Enter Description" required rows="5"></textarea>
            </div>
          </div> <br>
		<div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Image:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="file" class="form-control" name="image" required>
              <label style="color: red; font-weight: bold;">
              	<?php 
              	if(isset($_SESSION['imageError'])){
              		echo $_SESSION['imageError'];
              		unset($_SESSION['imageError']);
              	}
              	 ?>
              	
              </label>
            </div>
          </div><!-- row --> 

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
                <button class="btn btn-info">Add testimonials</button>
              </div><!-- form-layout-footer -->
            </div><!-- col-8 -->
          </div>
        </div><!-- form-layout -->
      </form>
    </div> 
</div>



<?php require_once 'inc/footer.php'; ?>


