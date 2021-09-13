<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$email = $_POST['email'];
		$image = $_FILES['image']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	 	if (in_array($extention, $format)) {
			if ($_FILES['image']['size'] > 9000000) {
				$_SESSION['imageError'] = 'File size to long';
				header('location:edit-profile.php');
			}else{
				$img_name = strtolower(str_replace(' ', '-', $name));
				$image_name =rand(0000000,999999).$img_name.'.'.$extention;
				$select = "SELECT * FROM admin WHERE id = $id";
				$query = mysqli_query($conn, $select);
				$assoc = mysqli_fetch_assoc($query);
				if (file_exists('upload/profile/'.$assoc['image'])) {
					unlink('upload/profile/'.$assoc['image']);
				}
		    	$uploadFolder = 'upload/profile/'.$image_name;
				move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
				$update = "UPDATE admin SET name = '$name', email = '$email', image = '$image_name' WHERE id = $id ";
				if (mysqli_query($conn, $update)) {
					$_SESSION['success'] = 'Successfull.';
					header('location:edit-profile.php');
				}else{
					$_SESSION['imageError']='Insert Faield.';
					header('location:edit-profile.php');
				}
			}	
		}
	}else{
		header('location:edit-profile.php');
	}
 ?>