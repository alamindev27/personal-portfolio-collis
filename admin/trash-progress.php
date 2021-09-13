<?php require_once 'inc/header.php';
  $select = "SELECT * FROM progress WHERE status = 2";
  $query = mysqli_query($conn, $select);
?>
 <table class="table table-bordered table-colored table-primary">
    <thead>
      <tr>
        <th class="wd-5p text-center">ID</th>
        <th class="wd-30p text-center">Skill Name</th>
        <th class="wd-30p text-center">Progress</th>
        <th class="wd-20p text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($query as $key => $progress): ?>
      <tr>
        <th class="text-center" scope="row"><h5><?= isset($progress['name']) ? ++$key : '' ?></h5></th>
        <td class="text-center text-uppercase"><h5><?= isset($progress['name']) ? $progress['name'] : '' ?></h5></td>
        <td class="text-center text-uppercase"><h5><?= isset($progress['progress']) ? $progress['progress'].'%' : '' ?></h5></td>
        <?php if (isset($progress['name'])): ?>
        <td class="text-center">
          <a href="restore-progress.php?id=<?= $progress['id'] ?>" class="btn btn-info">Restore</a>
          <a href="delete-progress-permanent.php?id=<?= $progress['id'] ?>" class="btn btn-danger">Delete Permanent</a>
        </td>
        <?php endif;
      endforeach ?>
      </tr>
    </tbody>
  </table>


<?php require_once 'inc/footer.php'; ?>