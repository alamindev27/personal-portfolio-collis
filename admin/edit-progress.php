<?php require_once 'inc/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM progress WHERE id = $id";
$query =  mysqli_query($conn, $select);
$assoc = mysqli_fetch_assoc($query);
?>
<div class="row">
    <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin:0 auto;">
      <form action="update-progress.php" method="post">
      	<input type="hidden" value="<?php echo $id ?>" name="id">
        <div class="form-layout form-layout-5">
          <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit Progress</h3>
          <hr>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Skill Name:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="name" placeholder="Enter skill name" required value="<?= $assoc['name'] ?>">
            </div>
          </div> <br>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Progress:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="number" min="1" max="100" class="form-control" name="progress" placeholder="Enter skill progress" required value="<?= $assoc['progress'] ?>">
            </div>
          </div><!-- row --> 
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


