<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$Delete = "DELETE FROM about WHERE id = $id";
	if (mysqli_query($conn, $Delete)) {
		$_SESSION['success'] = 'Successfull.';
		header('location:view-about.php?id='.$id);
	}
 ?>