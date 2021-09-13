<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$delete = "DELETE FROM progress WHERE id = $id";
	$query = mysqli_query($conn, $delete);
	if ($query) {
		$_SESSION['success'] = 'Successfull.';
		header('location:trash-progress.php?id='.$id);
	}
 ?>