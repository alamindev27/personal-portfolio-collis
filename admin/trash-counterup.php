<?php require_once 'inc/header.php';
  $select = "SELECT * FROM counterup WHERE status = 2";
  $query = mysqli_query($conn, $select);
?>
 <table class="table table-bordered table-colored table-primary">
    <thead>
      <tr>
        <th class="wd-5p text-center">ID</th>
        <th class="wd-30p text-center">Tilte</th>
        <th class="wd-10p text-center">Counter</th>
        <th class="wd-10p text-center">Icon</th>
        <th class="wd-20p text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($query as $key => $counter): ?>
        
      
      <tr>
        <th class="text-center" scope="row"><h5><?php if (isset($counter['icon'])) echo ++$key ?></h5></th>
        <td class="text-center text-capitalize">
          <h5><?php if (isset($counter['title'])) echo $counter['title'] ?></h5>
        </td>
        <td class="text-center"><h5><?php if (isset($counter['counter'])) echo $counter['counter'] ?></h5></td>

        <td class="text-center"><i style="width: 50px;border: 1px solid #aaa;color: #fff;background-color: #96C346;height: 50px; text-align: center;font-size: 25px;line-height: 50px;border-radius: 50%;" class="<?php if (isset($counter['icon'])) echo $counter['icon'] ?>"></i></td>
        <?php if (isset($counter['icon'])): ?>
        <td class="text-center">
          <a href="restore-counter.php?id=<?= $counter['id'] ?>" class="btn btn-info">Rerstore</a>
          <a href="delete-counter-permanent.php?id=<?= $counter['id'] ?>" class="btn btn-danger">Delete Permanent</a>
        </td>
        <?php endif;



      endforeach ?>
      </tr>
    </tbody>
  </table>


<?php require_once 'inc/footer.php'; ?>