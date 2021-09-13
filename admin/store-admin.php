<?php 
	require_once '../db.php';
	session_start();
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		$name = $_POST['name'];
		$email = $_POST['email'];
		$password = $_POST['password'];
		$cpass = $_POST['cpass'];
		$_SESSION['namev'] = $name;
		$_SESSION['emailv'] = $email;
		$_SESSION['passv'] = $password;
		$_SESSION['cpassv'] = $cpass;
		if (empty($name)) {
			$_SESSION['name'] = 'Name is required.';
			header('location:add-admin.php');
		}else if(empty($email)){
			$_SESSION['email'] = 'Email is required.';
			header('location:add-admin.php');
		}else if(empty($password)){
			$_SESSION['password'] = 'Password is required.';
			header('location:add-admin.php');
		}else if(empty($cpass)){
			$_SESSION['cpass'] = 'Confirm password is required.';
			header('location:add-admin.php');
		}else{
			$pattern1 = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,})$/i";
	        if(!preg_match($pattern1, $email)){
	        	$_SESSION['email'] = "Invalid email address";
	            header('location:add-admin.php');
	        }else{
	        	if (strlen($password) < 6 ) {
        		$_SESSION['password'] = "Password must be more than 6 charecters";
	            header('location:add-admin.php');
        	}else{
        		if ($password != $cpass) {
        			$_SESSION['cpass'] = "Password & Confirm password not match";
	            header('location:add-admin.php');
        		}else{
    				$selectCount = "SELECT COUNT(*) as addadmin FROM admin WHERE email = '$email'";
					$selectQuery = mysqli_query($conn, $selectCount);
					$selectAssoc = mysqli_fetch_assoc($selectQuery);
					if ($selectAssoc['addadmin'] > 0) {
						$_SESSION['email'] = "Email already exits";
	   					header('location:add-admin.php');
					}else{
						$en = password_hash($password, PASSWORD_DEFAULT);
        				$insert = "INSERT INTO admin (name, email, password) VALUES ('$name', '$email', '$en')";
        				$query = mysqli_query($conn, $insert);
        				if ($query) {
        					$_SESSION['addet'] = 'Adding a new admin successfull.';
        					header('location:add-admin.php');
        				}
					}
        		}
	        }
		}
	}
	}else{
		header('location:add-admin.php');
	}

 ?>