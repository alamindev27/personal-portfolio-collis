<?php 
	require_once '../db.php';
	session_start();
	$id = $_GET['id'];
	$select = "SELECT * FROM Testimonials WHERE id = $id";
    $query = mysqli_query($conn, $select);
    $assoc = mysqli_fetch_assoc($query);
    if (file_exists('upload/testimonials/'.$assoc['image'])) {
    	unlink('upload/testimonials/'.$assoc['image']);
    }
	$permanentDelete = "DELETE FROM Testimonials WHERE id = $id";
	if (mysqli_query($conn, $permanentDelete)) {
		$_SESSION['success'] = 'Successfull.';
		header('location:trash-testimonials.php?id='.$id);
	}
 ?>