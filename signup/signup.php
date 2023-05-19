<?php
session_start();
include_once '../common/db_con.php';
require_once '../vendor/autoload.php';

use Twilio\Rest\Client;

// Function to generate a random 6-digit code
function generateCode() {
    return rand(100000, 999999);
}

// Function to send SMS using Twilio
function sendSMSUsingTwilio($accountSid, $authToken, $twilioNumber, $phone, $message) {
    try {
        $client = new Client($accountSid, $authToken);

        $client->messages->create(
            $phone,
            [
                'from' => $twilioNumber,
                'body' => $message
            ]
        );

        return true;
    } catch (Exception $e) {
        // Log or handle the exception appropriately
        return false;
    }
}

// Check if the signup form was submitted
if (isset($_POST['signup'])) {
    // Retrieve form data
    $name = $_POST['name'];
    $username = $_POST['uname'];
    $phone = $_POST['phone'];
    $password = $_POST['password'];
    $re_password = $_POST['re_password'];

    // Check if all form fields are filled
    if (empty($name) || empty($username) || empty($phone) || empty($password) || empty($re_password)) {
        $error = "Please fill in all fields.";
    }
    // Check if passwords match
    elseif ($password !== $re_password) {
        $error = "Passwords do not match.";
    }
    // Check if the phone number is valid
    elseif (!preg_match('/^\+?\d{7,}$/', $phone)) {
        $error = "Invalid phone number.";
    } else {
        // Generate verification code
        $verification_code = generateCode();

        // Prepare and execute the database query
        $db = new Connection();
        $conn = $db->getConnection();
        $stmt = $conn->prepare("INSERT INTO users (name, username, phone, password, verification_code) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$name, $username, $phone, $password, $verification_code]);

        // Check if the user was successfully added to the database
        if ($stmt->rowCount() === 1) {
            // Twilio configuration
            $twilioAccountSid = 'AC1818122a442971639e68dee6662bbe99';
            $twilioAuthToken = '3736e90642ce83fcde827c4e54e8b0ad';
            $twilioPhoneNumber = '+12525126359';

            // Send SMS using Twilio
            if (sendSMSUsingTwilio($twilioAccountSid, $twilioAuthToken, $twilioPhoneNumber, $phone, $verification_code)) {
                $success = "Sign up successful. Please check your phone for the verification code.";
            } else {
                $error = "Error occurred while sending the verification code.";
            }
        } else {
            $error = "Error occurred while signing up. Please try again.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>SIGN UP</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <h2>SIGN UP</h2>
        <?php if (isset($error)) { ?>
            <p class="error"><?php echo $error; ?></p>
        <?php } ?>
        <?php if (isset($success)) { ?>
            <p class="success"><?php echo $success; ?></p>
        <?php } ?>

        <label>Name</label>
        <input type="text" name="name" placeholder="Full Name" required>

        <label>Username</label>
        <input type="text" name="uname" placeholder="Username" required>

        <label>Phone Number</label>
        <input type="text" name="phone" placeholder="Phone Number" required>

        <label>Password</label>
        <input type="password" name="password" placeholder="Password" required>

        <label>Re-enter Password</label>
        <input type="password" name="re_password" placeholder="Re-enter Password" required>

        <button type="submit" name="signup">Sign Up</button>
        <a href="../login/Login_user.php" class="ca">Already have an account? : Login</a>
    </form>
</body>
</html>
