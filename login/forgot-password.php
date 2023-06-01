<?php
session_start(); 
include "../db/Connections.php";
// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve the form data
    $serviceNo = $_POST["service_no"];

    // Generate a verification code
    $verificationCode = generateVerificationCode();

    // Check if the service number exists in the database
    $stmt = $conn->prepare("SELECT * FROM officers WHERE service_no = ?");
    $stmt->bind_param("s", $serviceNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        // Store the verification code in the database
        $stmt = $conn->prepare("UPDATE officers SET verification_code = ? WHERE service_no = ?");
        $stmt->bind_param("ss", $verificationCode, $serviceNo);
        $stmt->execute();

        // Send the verification code to the user's email
        $row = $result->fetch_assoc();
        $toEmail = $row['email'];

        $message = "Please use the following verification code to reset your password: $verificationCode";

        // Send the verification code email using PHPMailer
        require './PHPMailer/src/PHPMailer.php';
        $mail = new PHPMailer\PHPMailer\PHPMailer();

        // Enable SMTP debugging (0 = off, 2 = verbose/debug)
        $mail->SMTPDebug = 0;
        $mail->isSMTP();
        $mail->Host = 'your_smtp_host';
        $mail->SMTPAuth = true;
        $mail->Username = 'your_username';
        $mail->Password = 'your_password';
        $mail->SMTPSecure = 'tls'; // Enable TLS encryption, `ssl` also accepted
        $mail->Port = 587; // TCP port to connect to

        $mail->setFrom($fromEmail, $fromName);
        $mail->addAddress($toEmail);
        $mail->Subject = $subject;
        $mail->Body = $message;

        if (!$mail->send()) {
            $error = 'An error occurred while sending the email: ' . $mail->ErrorInfo;
        } else {
            // Show the verification code entry form
            $showCodeEntryForm = true;
        }
    } else {
        // No matching user found
        $error = "Invalid service number.";
    }
}

// Check if the verification code entry form is submitted
if (isset($_POST['verify_code'])) {
    // Retrieve the form data
    $serviceNo = $_POST["service_no"];

    // Check if the entered verification code matches the one stored in the database
    $stmt = $conn->prepare("SELECT * FROM officers WHERE service_no = ?");
    $stmt->bind_param("s", $serviceNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if ($row['verification_code'] === $_POST['verification_code']) {
            // Verification code is correct, show the password reset form
            $showCodeEntryForm = false;
            $showResetForm = true;
        } else {
            // Verification code is incorrect
            $error = "Invalid verification code.";
            $showCodeEntryForm = true;
        }
    } else {
        // No matching user found
        $error = "Invalid service number.";
        $showCodeEntryForm = true;
    }
}


// Check if the password reset form is submitted
if (isset($_POST['reset_password'])) {
    // Retrieve the form data
    $newPassword = $_POST["new_password"];
    $serviceNo = $_POST["service_no"];

    // Hash the new password
    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

    // Update the password in the database
    $stmt = $conn->prepare("UPDATE officers SET password = ?, verification_code = NULL WHERE service_no = ?");
    $stmt->bind_param("ss", $hashedPassword, $serviceNo);
    $stmt->execute();

    // Check if the password update was successful
    if ($stmt->affected_rows > 0) {
        // Password updated successfully
        $message = "Your password has been reset successfully.";
    } else {
        // No matching user found
        $error = "Invalid service number.";
    }
}

// Function to generate a verification code
function generateVerificationCode($length = 6) {
    $chars = '0123456789';
    $verificationCode = '';
    for ($i = 0; $i < $length; $i++) {
        $index = rand(0, strlen($chars) - 1);
        $verificationCode .= $chars[$index];
    }
    return $verificationCode;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Forgot Password</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <div class="container">
        <div class="forgot-password-form">
            <h2>Forgot Password</h2>
            <?php if (isset($error)) echo "<p class='error'>$error</p>"; ?>
            <?php if (isset($message)) echo "<p class='message'>$message</p>"; ?>

            <?php if (!isset($showCodeEntryForm) || $showCodeEntryForm) { ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <label for="service_no">Service Number:</label>
                    <input type="text" name="service_no" required><br><br>
                    <input type="submit" name="verify_code" value="Send Verification Code">
                </form>
            <?php } ?>

            <?php if (isset($showCodeEntryForm) && $showCodeEntryForm) { ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="service_no" value="<?php echo $serviceNo; ?>">
                    <label for="verification_code">Verification Code:</label>
                    <input type="text" name="verification_code" required><br><br>
                    <input type="submit" name="verify_code" value="Verify Code">
                </form>
            <?php } ?>

            <?php if (isset($showResetForm) && $showResetForm) { ?>
                <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <input type="hidden" name="service_no" value="<?php echo $serviceNo; ?>">
                    <label for="new_password">New Password:</label>
                    <input type="password" name="new_password" required><br><br>
                    <input type="submit" name="reset_password" value="Reset Password">
                </form>
            <?php } ?>
        </div>
    </div>
</body>
</html>

