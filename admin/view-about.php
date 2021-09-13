<?php require_once 'inc/header.php';
  $select = "SELECT * FROM about";
  $query = mysqli_query($conn, $select);
  $assoc = mysqli_fetch_assoc($query);
?>
 <table class="table table-bordered table-colored table-primary">
    <thead>
      <tr>
        <th class="wd-50p text-center">Description</th>
        <th class="wd-20p text-center">Skill Title</th>
        <th class="wd-20p text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <th scope="row">
        	<h5><?php if (isset($assoc['description'])) echo $assoc['description'] ?></h5>
        </th>
        <td class="text-center text-capitalize">
        	<h5><?php if (isset($assoc['txt'])) echo $assoc['txt'] ?></h5>
        </td>
        <?php if (isset($assoc['description'])): ?>
        <td class="text-center">
          <a href="edit-about.php?id=<?= $assoc['id'] ?>" class="btn btn-info">Edit</a>
          <a href="delete-about.php?id=<?= $assoc['id'] ?>" class="btn btn-danger">Delete</a>
        </td>
      <?php endif ?>
      </tr>
    </tbody>
  </table>


<?php require_once 'inc/footer.php'; ?>