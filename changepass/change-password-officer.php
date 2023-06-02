<?php 
session_start();
include ("../db/Connections.php");
// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

if (isset($_SESSION['id']) && isset($_SESSION['service_no'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="change-p-officer.php" method="post">
     	<h2>Change Password</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>

     	<?php if (isset($_GET['success'])) { ?>
            <p class="success"><?php echo $_GET['success']; ?></p>
        <?php } ?>

     	<label>Old Password</label>
     	<input type="password" 
     	       name="op" 
     	       placeholder="Old Password">
     	       <br>

     	<label>New Password</label>
     	<input type="password" 
     	       name="np" 
     	       placeholder="New Password">
     	       <br>

     	<label>Confirm New Password</label>
     	<input type="password" 
     	       name="c_np" 
     	       placeholder="Confirm New Password">
     	       <br>

     	<button type="submit">CHANGE</button>
          <a href="../home/officer.php" class="ca">HOME</a>
     </form>
</body>
</html>

<?php 
}else{
     header("Location: ../login/Login-officer.php");
     exit();
}
 ?>