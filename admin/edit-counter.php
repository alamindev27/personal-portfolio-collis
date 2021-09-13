<?php require_once 'inc/header.php';
$id = $_GET['id'];
$select = "SELECT * FROM counterup WHERE id = $id";
$query =  mysqli_query($conn, $select);
$assoc = mysqli_fetch_assoc($query);
?>
<div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin: 0 auto;">
  <form action="update-counterup.php" method="post">
    <input type="hidden" value="<?php echo $id ?>" name="id">
    <div class="form-layout form-layout-5">
      <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit Counterup</h3>
      <hr>
      <div class="row">
        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Add Counter:</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <input type="number" min="1" class="form-control" name="counter" placeholder="Enter counter" required value="<?= $assoc['counter'] ?>">
        </div>
      </div> <br>
      <div class="row">
        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Add Title:</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <input type="text" class="form-control" name="title" placeholder="Enter title" required value="<?= $assoc['title'] ?>">
        </div>
      </div> <br>
      <div class="row">
        <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Add icon:</label>
        <div class="col-sm-8 mg-t-10 mg-sm-t-0">
          <select class="form-control" name="icon" required>
                <option value>Select Icon</option>
                <option class="text-capitalize" value="fa fa-coffee">coffee</option>
                <option class="text-capitalize" value="fa fa-handshake-o">handshake</option>
                <option class="text-capitalize" value="fa fa-heart">heart</option>
                <option class="text-capitalize" value="fa fa-trophy">trophy</option>
                <option class="text-capitalize" value="fa fa-user-circle-o">user-circle</option>
                <option class="text-capitalize" value="fa fa-thumbs-up">thumbs-up</option>
                
              </select>
        </div>
      </div>
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
<?php require_once 'inc/footer.php'; ?>


