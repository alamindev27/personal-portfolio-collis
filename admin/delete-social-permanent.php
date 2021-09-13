<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$permanentDelete = "DELETE FROM social WHERE id = $id";
	if (mysqli_query($conn, $permanentDelete)) {
		$_SESSION['success'] = 'Successfull.';
		header('location:trash-welcome.php?id='.$id);
	}
 ?>