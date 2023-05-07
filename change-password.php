<?php 
session_start();
include("Connections.php");

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="change-password.css">
</head>
<body>
	 <form action="change-p.php" method="post">
     	<h2>Change Password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
     		<p class="success"><?php echo $_GET['success']; ?></p>
     	<?php } ?>

     	<label>Old password</label>
     	<input type="password" name="op" placeholder="Old Password"><br>

     	<label>New Password</label>
     	<input type="password" name="np" placeholder="New Password"><br>

     	<label>Confirm New Password</label>
     	<input type="password" name="c_np" placeholder="Confirm New Password"><br>
 
     	<button type="submit">CHANGE</button>
          <a href="Login_admin.php" class="ca"></a>
     </form></body>
</html>

<?php 
}else{
     header("Location: Admin_landing_page.html");
     exit();
}
 ?>