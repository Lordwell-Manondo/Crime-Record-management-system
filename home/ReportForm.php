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

// Function to send verification code via SMS
function sendVerificationCode($phoneNumber)
{
    global $accountSid, $authToken, $twilioServiceSid;

    $client = new Client($accountSid, $authToken);

    $verification = $client->verify->v2->services($twilioServiceSid)
        ->verifications
        ->create($phoneNumber, 'sms');

    return $verification;
}

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

// Variable to track success message
$successMessage = '';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get the form values
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $description = $_POST["description"];

    // Call the function to send the verification code via SMS
    $verification = sendVerificationCode($phone);

    // Store the form data and phone number in session for later use
    $_SESSION['phone'] = $phone;
    $_SESSION['location'] = $location;
    $_SESSION['description'] = $description;

    // Redirect to the verification page
    header("Location: verify_code.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Form</title>
</head>
<body>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi1Re9rRPX6TGBv81ox0H7tRXfQ7eg9lo&libraries=places"></script>
    <script>
        // Initialize Google Places Autocomplete
        function initializeAutocomplete() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
        google.maps.event.addDomListener(window, 'load', initializeAutocomplete);
    </script>
    
    <?php if (!empty($successMessage)) : ?>
        <div style="color: green; text-align: center;"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
    <h2>Report Incident</h2>
        <label for="phone">Phone:</label>
        <input type="text" name="phone" id="phone" placeholder="+265xxxxxxxxx" required>
        <br>
        <label for="location">Location:</label>
        <input type="text" name="location" id="location" placeholder="Location" required>
        <br>
        <label for="description">Description:</label>
        <textarea name="description" id="description" rows="4" placeholder="Include names of suspects and any other information" required></textarea>
        <br>
        <input type="submit" value="Submit">
        <button type="button" onclick="window.history.back();">Cancel</button>
    </form>
</body>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(0, 109, 139);
    }
    
    h2 {
        color: black;
        text-align: center;
    }
    
    label {
        display: block;
        margin-bottom: 5px;
    }
    
    input[type="text"],
    textarea {
        width: 100%;
        padding: 5px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
    }
    
    input[type="submit"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
    }
    button[type="button"] {
        background-color: #4CAF50;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-left: 232px;
    }
    
    input[type="submit"]:hover {
        background-color: #45a049;
    }
    form {
        width: 400px;
        border: 2px solid #ccc;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        margin: auto;
    }
</style>

</html>
