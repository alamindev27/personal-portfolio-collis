<?php 
	require_once '../db.php';
	require_once 'inc/header.php';
	$id = $_GET['id'];
	$update = "UPDATE mail SET notification = 'off' WHERE id = $id";
	mysqli_query($conn, $update);
	$select = "SELECT * FROM mail WHERE id = $id";
	$query = mysqli_query($conn, $select);
	$assoc = mysqli_fetch_assoc($query);
 ?>
<div class="card" style="width: 40rem;margin: 0 auto;">
  <div class="card-body">
    <h5 class="card-title"><?= $assoc['name'] ?> </h5>
    <h6 class="card-subtitle mb-2 text-muted"><?= $assoc['email'] ?></h6>
    <span class="text-primary"><?= $assoc['phone'] ?></span >
    <p><?= $assoc['tim'] ?> <?= $assoc['dat'] ?></p>

	<span class="text-capitalize font-italic font-weight-bold"><?= $assoc['subject'] ?></span>

    <p class="card-text"><?= $assoc['message'] ?></p>
    
  </div>
</div>
 <?php require_once 'inc/footer.php'; ?>