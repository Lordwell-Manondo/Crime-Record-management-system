<?php
session_start();

// Include the file for database connection
require_once '../db/Connections.php';

// Include the Twilio PHP SDK
require_once __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$accountSid = 'ACa7a8f81a7a2635a24bc25ef2ab93a4b0';
$authToken = '8b76b8bb54132712794c60246d4acb0a';
$twilioServiceSid = 'VA43800a8e172de2a9ba301038c68d9009';

// Function to verify the entered code
function verifyCode($phoneNumber, $verificationCode)
{
    global $accountSid, $authToken, $twilioServiceSid;

    $client = new Client($accountSid, $authToken);

    $verificationCheck = $client->verify->v2->services($twilioServiceSid)
        ->verificationChecks
        ->create(['to' => $phoneNumber, 'code' => $verificationCode]);

    return $verificationCheck->status === 'approved';
}

// Function to insert form data into the database
function insertFormData($phone, $location, $description)
{
    // Replace this with your code to insert form data into the database
    // ...

    // Return true if the insertion is successful, otherwise false
    return true;
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the entered verification code
    $enteredVerificationCode = $_POST['verification_code'];

    // Verify the code
    $phoneNumber = $_SESSION['phone'];
    $location = $_SESSION['location'];
    $description = $_SESSION['description'];

    if (verifyCode($phoneNumber, $enteredVerificationCode)) {
        // Verification successful
        // Insert the form data into the database
        if (insertFormData($phoneNumber, $location, $description)) {

             // saving the case into database
             $query = "insert into reportform ( phone, location, description) values ('$phoneNumber', '$location', '$description')";
            
             //executing the above statement
             mysqli_query($conn, $query);
            // Data insertion successful
            $successMessage = 'Form submitted successfully!';

            // Clear session data
            session_unset();
            session_destroy();
        } else {
            // Data insertion failed
            $errorMessage = 'Error inserting form data into the database.';
        }
    } else {
        // Invalid verification code
        $errorMessage = 'Invalid verification code.';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify Code</title>
</head>
<body>
    <h2>Verify Code</h2>
    <?php if (isset($errorMessage)) : ?>
        <div style="color: red; text-align: center;"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    <?php if (isset($successMessage)) : ?>
        <div style="color: green; text-align: center;"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="verification_code">Verification Code:</label>
        <input type="text" name="verification_code" id="verification_code" placeholder="Verification Code" required>
        <br>
        <input type="submit" value="Verify">
    </form>
</body>
</html>
