<?php 
	require_once '../db.php';
session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$email = $_POST['email'];
		$password = $_POST['password'];
		$_SESSION['loginemailv'] = $email;
		$_SESSION['loginpassv'] = $password;
		if (empty($email)) {
			$_SESSION['email'] = 'Email is required.';
			header('location:index.php');
		}else if (empty($password)) {
			$_SESSION['password'] = 'Password is required.';
			header('location:index.php');
		}else{
			$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
	        if(!preg_match($pattern, $email)){
	        	$_SESSION['email'] = 'Invalid email address.';
				header('location:index.php');
	        }else{
	        	$selectCount = "SELECT COUNT(*) as addadmin,id,name, email, password FROM admin WHERE email = '$email'";
				$selectQuery = mysqli_query($conn, $selectCount);
				$selectAssoc = mysqli_fetch_assoc($selectQuery);
				if ($selectAssoc['addadmin'] < 1) {
					$_SESSION['email'] = 'Email not exits.';
					header('location:index.php');
				}else{
					$hash = $selectAssoc['password'];
					if (password_verify($password, $hash)) {
						$_SESSION['loginSuccess'] = 'Login Successfull.';
						$_SESSION['loginAdminId'] = $selectAssoc['id'];
						$_SESSION['loginAdminName'] = $selectAssoc['name'];
						header('location:dashboard.php');
					}else{
						$_SESSION['password'] = 'Password not match.';
						header('location:index.php');
					}

				}
	        }
		}
	}else{
		header('location:index.php');
	}
 ?>