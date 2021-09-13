<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		foreach ($_POST['select'] as $key => $id) {
			$update = "UPDATE mail SET status = 2 WHERE id = $id";
			if (mysqli_query($conn, $update)) {
				$_SESSION['success'] = "Successfull";
				header('location:view-mail.php');
			}
		}
	}else{
		header('location:view-mail.php');
	}
 ?>