<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$icon = $_POST['icon'];
		$insert = "INSERT INTO services (title, description, icon) VALUES ('$title', '$description', '$icon')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:add-services.php');
		}
	}else{
		header('location:add-services.php');
	}
 ?>