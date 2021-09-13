<?php require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$counter = $_POST['counter'];
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$icon = $_POST['icon'];
		$insert = "INSERT INTO counterup (counter, title, icon) VALUES ('$counter', '$title', '$icon')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:add-counterup.php');
		}
	}else{
		header('location:add-counterup.php');
	}
 ?>