<?php 
	require_once '../db.php';
session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$cate_id = mysqli_real_escape_string($conn, $_POST['cate_id']);
		$image = $_FILES['image']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	 	$insert = "INSERT INTO `portfolios`(`title`, `description`, `cate_id`) VALUES ('$title', '$description', '$cate_id')";
	 	$query = mysqli_query($conn, $insert);
		$id = mysqli_insert_id($conn);
	 	if (in_array($extention, $format)) {
			if ($_FILES['image']['size'] > 9000000) {
				$_SESSION['imageError'] = 'File size to long';
				header('location:add-portfolio.php');
			}else{
				$img_name = strtolower(str_replace(' ', '-', $title));
				$image_name =$id.$img_name.'.'.$extention;
		    	$uploadFolder = 'upload/portfolio/'.$image_name;
				move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
				$update = "UPDATE `portfolios` SET image = '$image_name' WHERE id = $id";
				$uquery = mysqli_query($conn, $update);
				if ($uquery) {
				  	$_SESSION['uploadportfolio'] = 'Portfolio Addet Successfull.';
				  	header('location:add-portfolio.php');
				}
			}	
		}
	}else{
		header('location:add-portfolio.php');
	}
 ?>