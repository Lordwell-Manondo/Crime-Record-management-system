<!-- <!DOCTYPE html>
<html>
<head>
    <title>Verify Phone Number</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="verification-check.php" method="post">
        <h2>Verify Your Phone Number</h2>
        <p>Please enter the verification code that was sent to <?php echo $_GET['phone']; ?></p>
        <?php if (isset($_GET['error'])) { ?>
            <p class="error"><?php echo $_GET['error']; ?></p>
        <?php } ?>
        <label>Verification Code</label>
        <input type="text" name="verification_code" placeholder="Enter verification code">
        <input type="hidden" name="phone" value="<?php echo $_GET['phone']; ?>">
        <button type="submit">Verify</button>
    </form>
</body>
</html> -->
