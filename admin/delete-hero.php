<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$select = "SELECT * FROM hero WHERE id = $id";
	$selectQuery = mysqli_query($conn, $select);
	$selectAssoc = mysqli_fetch_assoc($selectQuery);
	if (file_exists('upload/hero/'.$selectAssoc['image'])) {
		unlink('upload/hero/'.$selectAssoc['image']);
	}
	$delete = "DELETE FROM hero WHERE id = $id";
	$query = mysqli_query($conn, $delete);

	if ($query) {
		$_SESSION['success'] = 'Successfull.';
		header('location:view-hero.php?id='.$id);
	}
 ?>