<?php 
	require_once '../db.php';
	require_once 'inc/header.php';
	$id = $_GET['id'];
	// $select = "SELECT * FROM portfolios WHERE id = $id";
	$select = "SELECT * FROM portfolios INNER JOIN category ON portfolios.cate_id = category.cat_id WHERE id = $id";
	$query = mysqli_query($conn, $select);
	$assoc = mysqli_fetch_assoc($query);
 ?>
 <div style="text-align: center; ">
 	<img src="upload/portfolio/<?= $assoc['image'] ?>" style="width: 300px; height: auto; border: 2px solid #ddd;box-shadow: 0px -2px 35px 2px #000;">
 </div>
 <br><br><br>
 <div>
 	<h3><?= $assoc['cate_name'] ?></h3>
 	<h5><?= $assoc['title'] ?></h5><br>
 	<p><?= nl2br($assoc['description']) ?></p>
 </div>




 <?php 
 	require_once 'inc/footer.php';
  ?>