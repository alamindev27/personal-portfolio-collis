<?php require_once 'inc/header.php';
  $select = "SELECT * FROM services WHERE status = 2";
  $query = mysqli_query($conn, $select);
?>
 <table class="table table-bordered table-colored table-primary">
    <thead>
      <tr>
        <th class="wd-5p text-center">ID</th>
        <th class="wd-25p text-center">Title</th>
        <th class="wd-40p text-center">Description</th>
        <th class="wd-10p text-center">Icon</th>
        <th class="wd-30p text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($query as $key => $services): ?>
      <tr>
        <th class="text-center" scope="row"><h5><?= isset($services['title']) ? ++$key : '' ?></h5></th>
        <td class="text-center text-capitalize"><h5><?= isset($services['title']) ? $services['title'] : '' ?></h5></td>
        <td class="text-center text-capitalize"><h5><?= isset($services['description']) ? $services['description'] : '' ?></h5></td>
        <td class="text-center text-uppercase">          <i style="width: 50px;border: 1px solid #aaa;color: #fff;background-color: #96C346;height: 50px; text-align: center;font-size: 25px;line-height: 50px;border-radius: 50%;" class="<?= isset($services['icon']) ? $services['icon'] : '' ?>"></i>
        </td>
        <?php if (isset($services['title'])): ?>
        <td class="text-center">
          <a href="restore-services.php?id=<?= $services['id'] ?>" class="btn btn-info">Restore</a>
          <a href="delete-services-permanent.php?id=<?= $services['id'] ?>" class="btn btn-danger">Delete Permanent</a>
        </td>
        <?php endif;
      endforeach ?>
      </tr>
    </tbody>
  </table>


<?php require_once 'inc/footer.php'; ?>