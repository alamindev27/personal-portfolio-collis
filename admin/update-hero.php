<?php 
	require_once '../db.php';
session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$title = mysqli_real_escape_string($conn, $_POST['title']);
		$name = mysqli_real_escape_string($conn, $_POST['name']);
		$image = $_FILES['image']['name'];
		$arr = explode('.', $image);
	 	$extention = end($arr);
	 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
	 	if (in_array($extention, $format)) {
			if ($_FILES['image']['size'] > 90000) {
				$_SESSION['imageError'] = 'File size to long';
				header('location:edit-hero.php?id='.$id);
			}else{
				$img_name = strtolower(str_replace(' ', '-', $name));
				$image_name = $id.'.'.$img_name.'.'.$extention;
				$scount = "SELECT COUNT(*) as total FROM hero";
			    $sq = mysqli_query($conn, $scount);
			    $assoc = mysqli_fetch_assoc($sq);
			    if ($assoc['total'] < 1) {
			    	$_SESSION['exitsHero'] = 'Hero section not found.';
			    	header('location:edit-hero.php?id='.$id);
			    }else{
			    	$select = "SELECT * FROM hero WHERE id = $id";
					$query = mysqli_query($conn, $select);
					$assoc = mysqli_fetch_assoc($query);
					if (file_exists('upload/hero/'.$assoc['image'])) {
						unlink('upload/hero/'.$assoc['image']);
					}
			    	$uploadFolder = 'upload/hero/'.$image_name;
					move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
					$update = "UPDATE hero SET title = '$title', name = '$name', image = '$image_name' WHERE id = $id";
					$uq = mysqli_query($conn, $update);
					if ($uq) {
						$_SESSION['success'] = 'Successfull.';
						header('location:edit-hero.php?id='.$id);
					}else{
						$_SESSION['imageError']='Image upload faield.';
						header('location:edit-hero.php?id='.$id);
					}
			    }
		    	
			}
		}
	}else{
		header('location:edit-hero.php');
	}

 ?>