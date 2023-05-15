<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<header style=" text-align: center; color: white;">
  </header>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="Login-officer.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="emp_number" placeholder="User Employee number"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="#" class="ca">Change password</a>
     </form>
</body>
</html>