<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$progress = $_POST['progress'];
		$update = "UPDATE progress SET name = '$name', progress = '$progress' WHERE id = $id ";
		if (mysqli_query($conn, $update)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:view-progress.php?id='.$id);
		}
	}else{
		header('location:edit-progress.php');
	}
 ?>