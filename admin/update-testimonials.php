<?php 
	require_once '../db.php';
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
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
				header('location:edit-testimonials.php');
			}else{
				$img_name = strtolower(str_replace(' ', '-', $name));
				$image_name =rand(0000000,9999999).$img_name.'.'.$extention;
				$select = "SELECT * FROM Testimonials WHERE id = $id";
			    $query = mysqli_query($conn, $select);
			    $assoc = mysqli_fetch_assoc($query);
			    if (file_exists('upload/testimonials/'.$assoc['image'])) {
			    	unlink('upload/testimonials/'.$assoc['image']);
			    }
		    	$uploadFolder = 'upload/testimonials/'.$image_name;
				move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
				$update = "UPDATE testimonials SET description = '$description', name = '$name', title = '$title', image = '$image_name' ";
				if (mysqli_query($conn, $update)) {
					$_SESSION['success'] = 'Successfull.';
					header('location:view-testimonials.php');
				}else{
					$_SESSION['imageError']='Insert Faield.';
					header('location:edit-testimonials.php');
				}
			}	
		}
	}else{
		header('location:edit-testimonials.php');
	}
 ?>