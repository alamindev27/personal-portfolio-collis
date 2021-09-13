<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$txt = mysqli_real_escape_string($conn, $_POST['text']);
		$insert = "INSERT INTO welcome (txt) VALUES ('$txt')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:add-welcome.php');
		}else{
			$_SESSION['welcomeError'] = 'Faield.';
			header('location:add-welcome.php');
		}
	}else{
		header('location:add-welcome.php');
	}
 ?>