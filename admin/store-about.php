<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$txt = mysqli_real_escape_string($conn, $_POST['txt']);
		$select = "SELECT * FROM about";
		$query = mysqli_query($conn, $select);
		$assoc = mysqli_fetch_assoc($query);
		if ($assoc > 0) {
			$_SESSION['exits'] = 'About already exits.';
			header('location:add-about.php');
		}else{
			$insert = "INSERT INTO about (description, txt) VALUES ('$description', '$txt')";
			if (mysqli_query($conn, $insert)) {
				$_SESSION['success'] = 'Successfull.';
				header('location:view-about.php');
			}
		}
	}else{
		header('location:add-about.php');
	}
 ?>