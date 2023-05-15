<?php 
session_start(); 
include "../db/Connections.php";

if (isset($_POST['emp_number']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$emp_number = validate($_POST['emp_number']);
	$pass = validate($_POST['password']);

	if (empty($emp_number)) {
		header("Location: index-officer.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index-officer.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM officers WHERE emp_number='$emp_number' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['emp_number'] === $emp_number && $row['password'] === $pass) {
            	$_SESSION['emp_number'] = $row['emp_number'];
            	$_SESSION['first_name'] = $row['first_name'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: ../officer.html");
		        exit();
            }else{
				header("Location: index-officer.php?error=Incorect User name or password");
		        exit();
			}
		}else{
			header("Location: index-officer.php?error=Incorect User name or password");
	        exit();
		}
	}
	
}else{
	header("Location: index-officer.php");
	exit();
}