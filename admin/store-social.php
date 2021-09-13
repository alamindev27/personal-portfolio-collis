<?php require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$link =  mysqli_real_escape_string($conn,$_POST['link']);
		$icon = $_POST['icon'];
		$insert = "INSERT INTO social (link, icon) VALUES ('$link', '$icon')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:add-social.php');
		}
	}else{
		header('location:add-social.php');
	}
 ?>