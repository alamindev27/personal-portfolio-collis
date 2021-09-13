<?php 
	session_start();
	$adminId = $_SESSION['loginAdminId'];
	if (!$adminId) {
		header('location:index.php');
	}
 ?>