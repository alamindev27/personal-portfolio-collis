<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = mysqli_real_escape_string($conn, htmlspecialchars($_POST['name']));
		$email = mysqli_real_escape_string($conn, htmlspecialchars($_POST['email']));
		$subject = mysqli_real_escape_string($conn, htmlspecialchars($_POST['subject']));
		$phone = mysqli_real_escape_string($conn, htmlspecialchars($_POST['phone']));
		$message = mysqli_real_escape_string($conn, htmlspecialchars($_POST['message']));
		date_default_timezone_set('Asia/Dhaka');
		$tim = date('h:i');
		$dat = date('Y-M-d');
		$insert = "INSERT INTO mail (name, email, subject, phone, message, tim, dat) VALUES ('$name', '$email', '$subject', '$phone', '$message', '$tim', '$dat')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['success'] = 'Successfull';
			header('location:../index.php#form-messages');
		}
	}else{
		header('location:../index.php');
	}
	
 ?>