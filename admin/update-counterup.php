<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$counter = $_POST['counter'];
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$icon = $_POST['icon'];
$update = "UPDATE counterup SET counter = '$counter', title = '$title', icon = '$icon' WHERE id = $id ";
		if (mysqli_query($conn, $update)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:view-counterup.php');
		}
	}else{
		header('location:edit-counterup.php');
	}

 ?>