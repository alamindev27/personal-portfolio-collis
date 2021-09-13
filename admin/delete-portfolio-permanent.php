<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$select = "SELECT * FROM portfolios INNER JOIN category ON portfolios.cate_id = category.cat_id WHERE id = $id";
	$query = mysqli_query($conn, $select);
	$assoc = mysqli_fetch_assoc($query);
	if (file_exists('upload/portfolio/'.$assoc['image'])) {
		unlink('upload/portfolio/'.$assoc['image']);
	}
	$delete = "DELETE FROM portfolios WHERE id = $id";
	$query = mysqli_query($conn, $delete);
	if ($query) {
		$_SESSION['success'] = 'Successfull.';
		header('location:trash-portfolio.php?id='.$id);
	}
 ?>