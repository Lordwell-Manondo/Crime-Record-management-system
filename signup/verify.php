<?php
session_start();
require_once '../db/Connections.php';

if (isset($_POST['verify'])) {
    $verification_code = $_POST['verification_code'];
    $phone = $_SESSION['phone'];
    
    // Create a database connection
    $connection = new Connection();
    $db = $connection->connect();

    $stmt = $db->prepare("SELECT * FROM users WHERE phone = ? AND verification_code = ?");
    $stmt->bind_param("ss", $phone, $verification_code);
    $stmt->execute();

    $result = $stmt->get_result();
    if ($result->num_rows === 1) {
        $stmt = $db->prepare("UPDATE users SET is_verified = 1 WHERE phone = ?");
        $stmt->bind_param("s", $phone);
        $stmt->execute();
        $success = "Phone number verified successfully.";

        header("Location: ../login/Login_user.php");
        exit();
    } else {
        $error = "Invalid verification code. Please try again.";
    }

    $stmt->close();
    $db->close();
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
        <?php if (isset($success)) { ?>
            <p class="success"><?php echo $success; ?></p>
        <?php } ?>

        <label>Verification Code</label>
        <input type="text" name="verification_code" placeholder="Enter the verification code" required>

        <button type="submit" name="verify">Verify</button>
    </form>
</body>
</html>
