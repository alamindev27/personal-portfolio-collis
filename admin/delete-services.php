<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "UPDATE services SET status = 2 WHERE id = $id";
	$query = mysqli_query($conn, $delete);
	if ($query) {
		$_SESSION['success'] = 'Successfull.';
		header('location:view-services.php?id='.$id);
	}
 ?>