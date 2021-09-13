<?php require_once '../db.php'; 
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$link = mysqli_real_escape_string($conn, $_POST['link']);
		$icon = $_POST['icon'];
		$update = "UPDATE social SET link = '$link', icon = '$icon' WHERE id = $id ";
		if (mysqli_query($conn, $update)) {
			$_SESSION['success'] = 'Successfull.';
			header('location:view-social.php?id='.$id);
		}
	}else{
		header('location:edit-social.php?id='.$id);
	}
?>