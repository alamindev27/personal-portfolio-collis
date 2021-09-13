<?php require_once '../db.php';
session_start();
	if ($_SERVER['REQUEST_METHOD'] = 'POST') {
		$c_name = mysqli_real_escape_string($conn, $_POST['c_name']);
		$insert = "INSERT INTO category (cate_name) VALUES ('$c_name')";
		if (mysqli_query($conn, $insert)) {
			$_SESSION['add_category_success'] = 'Category addet successfull.';
			header('location:add-portfolio.php');
		}
	}else{
		header('location:add-portfolio.php');
	}
?>