<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$cate_id = mysqli_real_escape_string($conn, $_POST['cate_id']);
		$image = $_FILES['image']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	 	if (in_array($extention, $format)) {
			if ($_FILES['image']['size'] > 9000000) {
				$_SESSION['imageError'] = 'File size to long';
				header('location:edit-portfolio.php?id='.$id);
			}else{
				$img_name = strtolower(str_replace(' ', '-', $title));
				$image_name =rand(00000,99999).$img_name.'.'.$extention;
				$select = "SELECT * FROM portfolios INNER JOIN category ON portfolios.cate_id = category.cat_id WHERE id = $id";
				$query = mysqli_query($conn, $select);
				$assoc = mysqli_fetch_assoc($query);
				if (file_exists('upload/portfolio/'.$assoc['image'])) {
					unlink('upload/portfolio/'.$assoc['image']);
				}
		    	$uploadFolder = 'upload/portfolio/'.$image_name;
				move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
				$update = "UPDATE `portfolios` SET title = '$title', image = '$image_name', description = '$description', cate_id = '$cate_id' WHERE id = $id";
				$uquery = mysqli_query($conn, $update);
				if ($uquery) {
				  	$_SESSION['uploadportfolio'] = 'Update Successfull.';
				  	header('location:edit-portfolio.php?id='.$id);
				}
			}	
		}
	}else{
		header('location:edit-portfolio.php?id='.$id);
	}
 ?>