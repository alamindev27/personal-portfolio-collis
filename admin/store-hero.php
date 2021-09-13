<?php require_once '../db.php'; 
session_start();
$adminid = $_SESSION['loginAdminId'];
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
	$title = mysqli_real_escape_string($conn, $_POST['title']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$image = $_FILES['image']['name'];
	$arr = explode('.', $image);
 	$extention = end($arr);
 	$format = ['png', 'jpg', 'jpeg', 'PNG', 'JPG', 'JPEG'];
 	if (in_array($extention, $format)) {
		if ($_FILES['image']['size'] > 9000000) {
			$_SESSION['imageError'] = 'File size to long';
			header('location:hero.php');
		}else{
			$img_name = strtolower(str_replace(' ', '-', $name));
			$image_name = $adminid.'.'.$img_name.'.'.$extention;
			$scount = "SELECT COUNT(*) as total FROM hero";
		    $sq = mysqli_query($conn, $scount);
		    $assoc = mysqli_fetch_assoc($sq);
		    if ($assoc['total'] > 0) {
		    	$_SESSION['exitsHero'] = 'Hero section already exits.';
		    	header('location:hero.php');
		    }else{
		    	$uploadFolder = 'upload/hero/'.$image_name;
				move_uploaded_file($_FILES['image']['tmp_name'], $uploadFolder);
				$insert = "INSERT INTO hero (title, name, image) VALUES ('$title', '$name', '$image_name')";
				$uq = mysqli_query($conn, $insert);
				if ($uq) {
					$_SESSION['success'] = 'Successfull.';
					header('location:hero.php');
				}else{
					$_SESSION['imageError']='Image upload faield.';
					header('location:hero.php');
				}
		    }
	    	
		}
	}else{
		$_SESSION['imageError'] = 'File formate not allow';
		header('location:hero.php');
	}
}else{
	header('location:hero.php');
}
?>