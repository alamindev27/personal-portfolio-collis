<?php require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$id = $_POST['id'];
		$description = mysqli_real_escape_string($conn, $_POST['description']);
		$txt = mysqli_real_escape_string($conn, $_POST['txt']);
		$update = "UPDATE about SET description = '$description', txt = '$txt' WHERE id = $id";
		$uq = mysqli_query($conn, $update);
		if ($uq) {
			$_SESSION['success'] = 'Successfull.';
			header('location:view-about.php?id='.$id);
		}
	}else{
		header('location:edit-about.php?id='.$id);
	}
 ?>