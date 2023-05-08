<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
  include "connection.php";

  if (isset($_POST['op']) && isset($_POST['np']) && isset($_POST['c_np'])) {

    function validate($data){
      $data = trim($data);
      $data = stripslashes($data);
      $data = htmlspecialchars($data);
      return $data;
    }

    $op = validate($_POST['op']);
    $np = validate($_POST['np']);
    $c_np = validate($_POST['c_np']);

    if (empty($op)) {
      header("Location: change-password.php?error=Old password is required");
      exit();
    } elseif (empty($np)) {
      header("Location: change-password.php?error=New Password is required");
      exit();
    } elseif ($np !== $c_np) {
      header("Location: change-password.php?error=The confirmation does not match");
      exit();
    } else {
      // hashing the password
      $op = md5($op);
      $np = md5($np);
      $id = $_SESSION['id'];

      $sql = "SELECT password FROM users WHERE id='$id' AND password='$op'";

      $result = mysqli_query($conn, $sql);

      if (mysqli_num_rows($result) === 1) {
        $sql_2 = "UPDATE users SET password='$np' WHERE id='$id'";
        mysqli_query($conn, $sql_2);
        header("Location: change-password.php?success=Your password has been changed successfully");
        exit();
      } else {
        header("Location: change-password.php?error=Incorrect password");
        exit();
      }
    }
  } else {
    header("Location: change-password.php");
    exit();
  }
} else {
  header("Location: Login_admin.php");
  exit();
}
?> 





<?php 
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="style.css">
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
     	<input type="text" name="op" placeholder="Old Password"><br>

     	<label>New Password</label>
     	<input type="password" name="np" placeholder="New Password"><br>

     	<label>Confirm New Password</label>
     	<input type="password" name="c_np" placeholder="Confirm New Password"><br>
 
     	<button type="submit">CHANGE</button>
          <a href="home.php" class="ca">HOME</a>
     </form></body>
</html>

<?php 
}else{
     header("Location: index.php");
     exit();
}
 ?>