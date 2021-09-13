<?php require_once 'inc/header.php';
  $select = "SELECT * FROM portfolios INNER JOIN category ON portfolios.cate_id = category.cat_id WHERE status = 2";
  $query = mysqli_query($conn, $select);
?>

 <table class="table table-bordered table-colored table-primary">
            <thead>
              <tr>
                <th class="wd-5p text-center">ID</th>
                <th class="wd-15p text-center">Title</th>
                <th class="wd-15p text-center">Category</th>
                <th class="wd-35p text-center">Description</th>
                <th class="wd-15p text-center">Image</th>
                <th class="wd-10p text-center">Acrion</th>
              </tr>
            </thead>
            <tbody>

            <?php foreach ($query as $key => $portfolio): ?>
              <tr>
                <th class="text-center" scope="row"><?= ++$key ?></th>
                <td class="text-center"><?= $portfolio['title'] ?></td>
                <td class="text-center"><?= $portfolio['cate_name'] ?></td>
                <td><?= substr($portfolio['description'], 0,300) ?> <a href="single-portfolio.php?id= <?= $portfolio['id'] ?>">' [ Read More ]'</a></td>
                <td class="text-center">
                  <img style="width:150px;" src="upload/portfolio/<?= $portfolio['image'] ?>">
                </td>
                <td class="text-center">
                  <a href="single-portfolio.php?id=<?= $portfolio['id'] ?>" class="btn  btn-info">View</a> <br><br>
                  <a href="restore-portfolio.php?id=<?= $portfolio['id'] ?>" class="btn  btn-secondary">Restore</a><br><br>
                  <a href="delete-portfolio-permanent.php?id=<?= $portfolio['id'] ?>" class="btn  btn-danger">Delete Permanent</a>
                </td>
              </tr>
            <?php endforeach ?>     
            </tbody>
          </table>


<?php require_once 'inc/footer.php'; ?>