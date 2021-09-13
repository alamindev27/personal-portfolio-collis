<?php require_once 'inc/header.php';
  $select = "SELECT * FROM hero";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
?>
 <table class="table table-bordered table-colored table-primary">
    <thead>
      <tr>
        <th class="wd-5p text-center">ID</th>
        <th class="wd-30p text-center">Title</th>
        <th class="wd-20p text-center">Name</th>
        <th class="wd-20p text-center">Image</th>
        <th class="wd-20p text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th class="text-center" scope="row"><h2><?php if (isset($assoc['title'])) echo "01" ?></h2></th>
        <td class="text-center text-capitalize"><h2><?php if (isset($assoc['title'])) echo $assoc['title'] ?></h2></td>
        <td class="text-center text-capitalize"><h2><?php if (isset($assoc['name'])) echo $assoc['name'] ?></h2></td>
        <td class="text-center">
          <img src="<?php if (isset($assoc['image'])) echo 'upload/hero/'.$assoc['image'] ?>" style="width: 100px;">
        </td>
        <?php if (isset($assoc['title'])): ?>
        <td class="text-center">
          <a href="edit-hero.php?id=<?= $assoc['id'] ?>" class="btn btn-info">Edit</a>
          <a href="delete-hero.php?id=<?= $assoc['id'] ?>" class="btn btn-danger">Delete</a>
        </td>
      <?php endif ?>
      </tr>
    </tbody>
  </table>


<?php require_once 'inc/footer.php'; ?>