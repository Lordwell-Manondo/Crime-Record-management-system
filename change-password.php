<?php
	// check if form is submitted
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		// retrieve form data
		$old_password = $_POST['old_password'];
		$new_password = $_POST['new_password'];
		$confirm_password = $_POST['confirm_password'];
		
		// validate form data
		if (empty($old_password)) {
			echo "<p style='color: red;'>Please enter your old password.</p>";
		} elseif (empty($new_password)) {
			echo "<p style='color: red;'>Please enter your new password.</p>";
		} elseif (empty($confirm_password)) {
			echo "<p style='color: red;'>Please confirm your new password.</p>";
		} elseif ($new_password != $confirm_password) {
			echo "<p style='color: red;'>New password and confirm password do not match.</p>";
		} else {
			// TODO: check if old password matches current password in database
			
			// TODO: update password in database
			
			echo "<p style='color: green;'>Password changed successfully!</p>";
		}
	}
	?>

<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>

	<style>

body {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  height: 90vh;
  margin: 0;
  background-color: aqua;
}

h1 {
  text-align: center;
  margin-top: 0;
}

form {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  background-color: #fff;
  padding: 50px;
  border-radius: 5px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  width: 30%;
  margin: auto;
}

label {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  padding: 10px;
  font-size: 18px;
}

input[type="password"] {
  padding: 10px;
  border-radius: 5px;
  border: none;
  margin-bottom: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  font-size: 18px;
}

input[type="submit"] {
  background-color: #4CAF50;
  color: #fff;
  padding: 10px 20px;
  border: none;
  border-radius: 5px;
  cursor: pointer;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  font-size: 18px;
}

input[type="submit"]:hover {
  background-color: #3e8e41;
}

p {
  margin: 0;
}

p.error {
  color: red;
}

p.success {
  color: green;
}

input[type="date"] {
  padding: 10px;
  border-radius: 5px;
  border: none;
  margin-bottom: 10px;
  box-shadow: 0 2px 5px rgba(0,0,0,0.2);
  font-size: 18px;
}

	</style>
</head>
<body>
	<h1>Change Password</h1>
	
	<form method="POST">
		<label for="old_password">Old Password:</label>
		<input type="password" id="old_password" name="old_password" ><br><br>
		<label for="new_password">New Password:</label>
		<input type="password" id="new_password" name="new_password"><br><br>
			<label for="confirm_password">Confirm New Password:</label>
		<input type="password" id="confirm_password" name="confirm_password"><br><br>
		<input type="submit" value="Change Password">
	</form>
</body>
</html>
