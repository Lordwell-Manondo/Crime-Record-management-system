<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="Login-officer.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>Service Number</label>
     	<input type="text" name="service_no" placeholder="Service Number"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<a href="" class="ca">Forgot Password</a><button type="submit" >Login</button>
     </form>
</body>
</html>