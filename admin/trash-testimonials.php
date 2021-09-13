<?php require_once 'inc/header.php';
  $select = "SELECT * FROM Testimonials WHERE status = 2";
  $query = mysqli_query($conn, $select);
?>

 <table class="table table-bordered table-colored table-primary">
            <thead>
              <tr>
                <th class="wd-5p text-center">ID</th>
                <th class="wd-15p text-center">Name</th>
                <th class="wd-15p text-center">Title</th>
                <th class="wd-35p text-center">Description</th>
                <th class="wd-15p text-center">Image</th>
                <th class="wd-10p text-center">Acrion</th>
              </tr>
            </thead>
            <tbody>
            <?php foreach ($query as $key => $testimonials): ?>
              <tr>
                <th class="text-center" scope="row"><?= ++$key ?></th>
                <td class="text-center"><?= $testimonials['name'] ?></td>
                <td class="text-center"><?= $testimonials['title'] ?></td>
                <td><?= $testimonials['description']?></td>
                <td class="text-center">
                  <img style="width:150px;" src="upload/testimonials/<?= $testimonials['image'] ?>">
                </td>
                <td class="text-center">
                  <a href="restore-testimonials.php?id= <?= $testimonials['id'] ?>" class="btn  btn-secondary">Restore</a><br><br>
                  <a href="delete-testimonials-permanent.php?id= <?= $testimonials['id'] ?>" class="btn  btn-danger">Delete Permanent</a>
                </td>
              </tr>
            <?php endforeach ?>     
            </tbody>
          </table>


<?php require_once 'inc/footer.php'; ?>