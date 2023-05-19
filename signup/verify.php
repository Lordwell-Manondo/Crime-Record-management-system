<?php
session_start();
include_once '../common/db_con.php';

// Check if the verification form was submitted
if (isset($_POST['verify'])) {
    // Retrieve form data
    $verification_code = $_POST['verification_code'];
    $phone = $_SESSION['phone'];

    // Prepare and execute the database query
    $stmt = $db->prepare("SELECT * FROM users WHERE phone = ? AND verification_code = ?");
    $stmt->execute([$phone, $verification_code]);

    // Check if the verification code matches
    if ($stmt->rowCount() === 1) {
        // Update user status to verified
        $stmt = $db->prepare("UPDATE users SET verified = 1 WHERE phone = ?");
        $stmt->execute([$phone]);

        // Redirect to success page or perform any other actions
        header("Location: success.php");
        exit();
    } else {
        $error = "Invalid verification code.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Phone Verification</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h2>Phone Verification</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>

        <label>Verification Code</label>
        <input type="text" name="verification_code" placeholder="Verification Code" required>

        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
