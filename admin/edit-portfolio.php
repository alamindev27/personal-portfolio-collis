<?php require_once 'inc/header.php';
  $id = $_GET['id'];
  $select = "SELECT * FROM portfolios INNER JOIN category ON portfolios.cate_id = category.cat_id WHERE id = $id";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
?>
<div class="row">
    <div class="col-xl-6 mg-t-20 mg-xl-t-0" style="margin:0 auto;">
      <form action="update-portfolio.php" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?= $assoc['id'] ?>" name="id">
        <div class="form-layout form-layout-5">
          <h3 class="tx-gray-800 tx-uppercase tx-bold tx-14 mg-b-10 text-center">Edit Portfolios</h3>
          <hr>
          <div class="row">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Title:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="text" class="form-control" name="title" placeholder="Enter title" required value="<?= $assoc['title'] ?>">
            </div>
          </div><!-- row -->
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Description:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <textarea name="description" class="form-control" rows="5"required placeholder="Enter your Portfolio Description"><?= $assoc['description']?></textarea>
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Select Category:</label>
            <?php 
            $selectCategory = "SELECT * FROM category WHERE stutas = 1  ORDER BY cate_name ASC";
            $categoryQuery = mysqli_query($conn, $selectCategory);
             ?>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <select class="form-control" name="cate_id">
                <option value >Select</option>
                <?php foreach ($categoryQuery as $key => $category): ?>
                  <option class="text-capitalize" value = "<?= $category['cat_id'] ?>"><?= $category['cate_name'] ?></option>
                <?php endforeach ?>
              </select>
            </div>
          </div>
          <div class="row mg-t-20">
            <label class="col-sm-4 form-control-label"><span class="tx-danger">*</span> Thumbnail:</label>
            <div class="col-sm-8 mg-t-10 mg-sm-t-0">
              <input type="file" onchange="document.getElementById('c').src = window.URL.createObjectURL(this.files[0])" class="form-control" name="image" required>
              <span>
                <?php 
                  if (isset($_SESSION['imageError'])) {
                    echo $_SESSION['imageError'];
                    unset($_SESSION['imageError']);
                  }
                 ?>
              </span>
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
            <div class="col-sm-6 mg-l-auto">
              <div class="form-layout-footer">
                <button class="btn btn-info">Save</button>
              </div><!-- form-layout-footer -->
            </div><!-- col-8 -->
            <div class="col-sm-2">
              <img id="c" src="upload/portfolio/<?= $assoc['image'] ?>" style="width: 60px;">
            </div>
          </div>
        </div><!-- form-layout -->
      </form>
    </div>
</div>
<?php require_once 'inc/footer.php'; ?>


