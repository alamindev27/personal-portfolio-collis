<?php require_once 'inc/header.php';
  $select = "SELECT * FROM welcome WHERE status = 2";
  $query = mysqli_query($conn, $select);
?>
 <table class="table table-bordered table-colored table-primary">
    <thead>
      <tr>
        <th class="wd-5p text-center">ID</th>
        <th class="wd-30p text-center">Animated Text</th>
        <th class="wd-20p text-center">Action</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($query as $key => $welcome): ?>
        
      
      <tr>
        <th class="text-center" scope="row"><h2><?php echo ++$key ?></h2></th>
        <td class="text-center text-capitalize"><h2><?php if (isset($welcome['txt'])) echo $welcome['txt'] ?></h2></td>


        <?php if (isset($welcome['txt'])): ?>
        <td class="text-center">
          <a href="restore-welcome.php?id=<?= $welcome['id'] ?>" class="btn btn-info">Restore</a>
          <a href="delete-welcome-permanent.php?id=<?= $welcome['id'] ?>" class="btn btn-danger">Delete Permanent</a>
        </td>
        <?php endif;



      endforeach ?>
      </tr>
    </tbody>
  </table>


<?php require_once 'inc/footer.php'; ?>