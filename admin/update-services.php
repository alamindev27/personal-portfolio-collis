<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = mysqli_real_escape_string($conn, $_POST['id']);
		$title =  mysqli_real_escape_string($conn, $_POST['title']);
		$description =  $_POST['description'];
		$icon = $_POST['icon'];
		$update = "UPDATE services SET title = '$title', description = '$description', icon = '$icon' WHERE id = $id ";
		if (mysqli_query($conn, $update)) {
			$_SESSION['success'] = 'Successfull.';
			header("location:view-services.php?id=".$id);
		}
	}else{
		header('location:edit-services.php');
	}
 ?>