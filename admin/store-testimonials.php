<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$image = $_FILES['image']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	 	if (in_array($extention, $format)) {
			if ($_FILES['image']['size'] > 9000000) {
				$_SESSION['imageError'] = 'File size to long';
				header('location:add-testimonials.php');
			}else{
				$img_name = strtolower(str_replace(' ', '-', $name));
				$image_name =rand(0000000,999999).$img_name.'.'.$extention;
		    	$uploadFolder = 'upload/testimonials/'.$image_name;
				move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
				$insert = "INSERT INTO testimonials (description, name, title, image) VALUES ('$description', '$name', '$title','$image_name')";
				if (mysqli_query($conn, $insert)) {
					$_SESSION['success'] = 'Successfull.';
					header('location:add-testimonials.php');
				}else{
					$_SESSION['imageError']='Insert Faield.';
					header('location:add-testimonials.php');
				}
			}	
		}
	}else{
		header('location:add-add-testimonials.php');
	}
 ?>