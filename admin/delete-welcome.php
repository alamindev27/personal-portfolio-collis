<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$select = "SELECT * FROM welcome WHERE id = $id";
	$selectQuery = mysqli_query($conn, $select);
	$selectAssoc = mysqli_fetch_assoc($selectQuery);
	$delete = "UPDATE welcome SET status = 2 WHERE id = $id";
	$query = mysqli_query($conn, $delete);
	if ($query) {
		$_SESSION['success'] = 'Successfull.';
		header('location:view-welcome.php?id='.$id);
	}
 ?>