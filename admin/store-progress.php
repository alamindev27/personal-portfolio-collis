<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$progress = $_POST['progress'];
		$insert = "INSERT INTO progress (name, progress) VALUES ('$name', '$progress')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:view-progress.php');
		}
	}else{
		header('location:add-progress.php');
	}
 ?>