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
        <input type="password" name="op" placeholder="Old Password" required>
        <br>

        <label>New Password</label>
        <input type="password" name="np" placeholder="New Password" required>
        <br>

        <label>Confirm New Password</label>
        <input type="password" name="c_np" placeholder="Confirm New Password" required>
        <br>

        <button type="submit" style="background-color: blue;">CHANGE</button>

        <a href="../home/officer.php" class="ca">HOME</a>
    </form>
</body>
</html>
