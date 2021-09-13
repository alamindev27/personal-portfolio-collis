<?php 
	require_once 'inc/header.php';
	$id = $_GET['id'];
    $select = "SELECT * FROM Testimonials WHERE id = $id";
    $query = mysqli_query($conn, $select);
    $assoc = mysqli_fetch_assoc($query);
?>
<div class="row">
    <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin:0 auto;">
      <form action="update-testimonials.php" method="post" enctype="multipart/form-data">
      	<input type="hidden" value="<?= $assoc['id'] ?>" name="id">
        <div class="form-layout form-layout-5">
          <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit Testimonials</h3>
          <hr>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Name:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="name" placeholder="Enter name" required value="<?= $assoc['name'] ?>">
            </div>
          </div><!-- row --> <br>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Title:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="title" placeholder="Enter title" required value="<?= $assoc['title'] ?>">
            </div>
          </div><!-- row --> <br>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Description:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <textarea class="form-control" name="description" placeholder="Enter Description" required rows="5"><?= $assoc['description'] ?></textarea>
            </div>
          </div> <br>
		<div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Image:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="file" class="form-control" name="image" required  onchange="document.getElementById('c').src = window.URL.createObjectURL(this.files[0])">
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
          <div class="row ">
            <div class="col-sm-6 mg-l-auto">
              <div class="form-layout-footer">
                <button class="btn btn-info">Save</button>
              </div><!-- form-layout-footer -->
            </div><!-- col-8 -->
            <div class="col-sm-2">
            	<img id="c" src="upload/testimonials/<?= $assoc['image'] ?>" style="width:60px;">
            </div>
          </div>
        </div><!-- form-layout -->
      </form>
    </div> 
</div>



<?php require_once 'inc/footer.php'; ?>


