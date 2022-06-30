<?php 
session_start(); 
include "db_conn.php";

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['re_password']) && isset($_POST['email'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$email = validate($_POST['email']);
	$pass = validate($_POST['password']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	

	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required");
	    exit();
	}
	else if(empty($pass)){
        header("Location: signup.php?error=Password is required");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required");
	    exit();
	}

	else if(empty($name)){
        header("Location: signup.php?error=Name is required");
	    exit();
	}
	else if(empty($email)){
        header("Location: signup.php?error=Email is required");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another");
	        exit();
		}else {
           $sql2 = "INSERT INTO `users`(user_name, email, password, name) VALUES('$uname', '$email', '$pass', '$name')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
           	 header("Location: signup.php?success=Your account has been created successfully. Please check your email to comfirm it.");
	         exit();
           }else {
	           	header("Location: signup.php?error=unknown error occurred");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}
