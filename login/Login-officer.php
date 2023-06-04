<?php 
session_start(); 
include "../db/Connections.php";

if (isset($_POST['service_no']) && isset($_POST['password'])) {

	function validate($data){
       $data = trim($data);
	   $data = stripslashes($data);
	   $data = htmlspecialchars($data);
	   return $data;
	}

	$service_no = validate($_POST['service_no']);
	$pass = validate($_POST['password']);

	if (empty($service_no)) {
		header("Location: index-officer.php?error=User Name is required");
	    exit();
	}else if(empty($pass)){
        header("Location: index-officer-icharge.php?error=Password is required");
	    exit();
	}else{
		// hashing the password
        $pass = md5($pass);

        
		$sql = "SELECT * FROM officers WHERE service_no='$service_no' AND password='$pass'";

		$result = mysqli_query($conn, $sql);

		if (mysqli_num_rows($result) === 1) {
			$row = mysqli_fetch_assoc($result);
            if ($row['service_no'] === $service_no && $row['password'] === $pass) {
            	$_SESSION['service_no'] = $row['service_no'];
            	$_SESSION['id'] = $row['id'];
            	header("Location: ../home/Officer.php");
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