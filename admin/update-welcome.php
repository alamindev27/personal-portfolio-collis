<?php require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$txt = $_POST['text'];
		$update = "UPDATE welcome SET txt = '$txt' WHERE id = $id";
		$uq = mysqli_query($conn, $update);
		if ($uq) {
			$_SESSION['success'] = 'Successfull.';
			header('location:view-welcome.php?id='.$id);
		}else{
			$_SESSION['imageError']='Image upload faield.';
			header('location:view-welcome.php?id='.$id);
		}
	}else{
		header('location:edit-welcome.php');
	}
 ?>