<?php require_once 'inc/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM services WHERE id = $id";
$query =  mysqli_query($conn, $select);
$assoc = mysqli_fetch_assoc($query);
?>
<div class="row">
    <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin:0 auto;">
      <form action="update-services.php" method="post">
        <input type="hidden" value="<?php echo $id ?>" name="id">
        <div class="form-layout form-layout-5">
          <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit Services</h3>
          <hr>
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
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Icon:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control text-uppercase" name="icon" required>
                <option value>Select Icon</option>
                <option value="fa fa-desktop">Desktop</option>
                <option value="fa fa-exclamation-triangle">Error</option>
                <option value="fa fa-search">Search</option>
                <option value="fa fa-envelope-open">Envelope open</option>
                <option value="fa fa-graduation-cap">Graduation</option>
                <option value="fa fa-wordpress">Wordpress</option>
                <option value="fa fa-youtube">Youtube</option>
                <option value="fa fa-html5">html5</option>
                <option value="fa fa-laptop">laptop</option>
                <option value="fa fa-bolt">bolt</option>
                <option value="fa fa-bookmark-o">bookmark</option>
                <option value="fa fa-database">database</option>
                <option value="fa fa-file">file</option>
              </select>
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


