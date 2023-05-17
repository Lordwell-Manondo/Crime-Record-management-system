<?php 
session_start(); 
include ("../db/Connections.php");

if (isset($_POST['uname']) && isset($_POST['password'])
    && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['re_password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$uname = validate($_POST['uname']);
	$pass = validate($_POST['password']);
	$phone = validate($_POST['phone']);
	$re_pass = validate($_POST['re_password']);
	$name = validate($_POST['name']);

	$user_data = 'uname='. $uname. 'name='. $name .'&phone='. $phone;


	if (empty($uname)) {
		header("Location: signup.php?error=User Name is required&$user_data");
	    exit();
	}else if(empty($pass)){
        header("Location: signup.php?error=Password is required&$user_data");
	    exit();
	}
	else if(empty($re_pass)){
        header("Location: signup.php?error=Re Password is required&$user_data");
	    exit();
	}else if(!preg_match("/^[0-9]{10}$/", $phone)) {
        header("Location: signup.php?error=Phone number must be 10 digits&name=$name&uname=$uname");
        exit();
    }else if(empty($phone)) {
		header("Location: signup.php?error=Phone number is required&name=$name&uname=$uname");
		exit();
	}
	else if(empty($name)){
        header("Location: signup.php?error=Name is required&$user_data");
	    exit();
	}

	else if($pass !== $re_pass){
        header("Location: signup.php?error=The confirmation password  does not match&$user_data");
	    exit();
	}

	else{

		// hashing the password
        $pass = md5($pass);

	    $sql = "SELECT * FROM users WHERE user_name='$uname' ";
		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) > 0) {
			header("Location: signup.php?error=The username is taken try another&$user_data");
	        exit();
		}else {
           $sql2 = "INSERT INTO users(user_name, password, name, phone) VALUES('$uname', '$pass', '$name', '$phone')";
           $result2 = mysqli_query($conn, $sql2);
           if ($result2) {
			$sql = "SELECT * FROM users WHERE user_name='$uname' AND password='$pass'";

			$result = mysqli_query($conn, $sql);
	
			if (mysqli_num_rows($result) === 1) {
				$row = mysqli_fetch_assoc($result);
				if ($row['user_name'] === $uname && $row['password'] === $pass) {
					$_SESSION['user_name'] = $row['user_name'];
					$_SESSION['name'] = $row['name'];
					$_SESSION['id'] = $row['id'];
					header("Location: ../login/Login_user.php");
					exit();
				}else{
					header("Location: index.php?error=Incorect User name or password");
					exit();
				}
			}else{
				header("Location: index.php?error=Incorect User name or password");
				exit();
			}
	         
           }else {
	           	header("Location: signup.php?error=unknown error occurred&$user_data");
		        exit();
           }
		}
	}
	
}else{
	header("Location: signup.php");
	exit();
}