<?php require_once 'inc/header.php';
  $select = "SELECT * FROM social WHERE status = 2";
  $query = mysqli_query($conn, $select);
?>
 <table class="table table-bordered table-colored table-primary">
    <thead>
      <tr>
        <th class="wd-5p text-center">ID</th>
        <th class="wd-30p text-center">Icon</th>
        <th class="wd-30p text-center">Link</th>
        <th class="wd-20p text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($query as $key => $social): ?>
        
      
      <tr>
        <th class="text-center" scope="row"><h5><?php if (isset($social['icon'])) echo ++$key ?></h5></th>
        <td class="text-center text-capitalize">
          <i style="width: 50px;border: 1px solid #aaa;color: #fff;background-color: #96C346;height: 50px; text-align: center;font-size: 25px;line-height: 50px;border-radius: 50%;" class="<?php if (isset($social['icon'])) echo $social['icon'] ?>"></i>
        </td>
        <td class="text-center"><a href="<?php if (isset($social['link'])) echo $social['link'] ?>"><h5><?php if (isset($social['link'])) echo $social['link'] ?></h5></a></td>


        <?php if (isset($social['icon'])): ?>
        <td class="text-center">
          <a href="restore-social.php?id=<?= $social['id'] ?>" class="btn btn-info">Restore</a>
          <a href="delete-social-permanent.php?id=<?= $social['id'] ?>" class="btn btn-danger">Delete Permanent</a>
        </td>
        <?php endif;



      endforeach ?>
      </tr>
    </tbody>
  </table>


<?php require_once 'inc/footer.php'; ?>