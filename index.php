<!DOCTYPE html>
<html>
<head>
	<title>LOGIN</title>
	<header style=" text-align: center; color: white;">
            <div>
                <h1>You must login firt to access our services!</h1>
            </div>
  </header>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
     <form action="Login_user.php" method="post">
     	<h2>LOGIN</h2>
     	<?php if (isset($_GET['error'])) { ?>
     		<p class="error"><?php echo $_GET['error']; ?></p>
     	<?php } ?>
     	<label>User Name</label>
     	<input type="text" name="uname" placeholder="User Name"><br>

     	<label>Password</label>
     	<input type="password" name="password" placeholder="Password"><br>

     	<button type="submit">Login</button>
          <a href="signup.php" class="ca">Create an account</a>
     </form>
</body>
</html>