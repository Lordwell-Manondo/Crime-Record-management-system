<?php
session_start();

// Include the file for database connection
require_once '../db/Connections.php';

// Include the Twilio PHP SDK
require_once __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$accountSid = 'AC1818122a442971639e68dee6662bbe99';  // Replace with your Twilio Account SID
$authToken = '3736e90642ce83fcde827c4e54e8b0ad';  // Replace with your Twilio Auth Token
$twilioServiceSid = 'VA9fd36c293180923fb622962bb51edf8b';  // Replace with your Twilio Verify Service SID

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
<nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);;">
    <div class="log">
        <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
    </div>
    <div>
        <h1 style="color: white; text-align: center; margin-left: 270px;">CRIME RECORD MANAGEMENT</h1>
    </div>
</nav>
<body>

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

<script>
    // Initialize Google Places Autocomplete
    function initializeAutocomplete() {
        var input = document.getElementById('location');
        var autocomplete = new google.maps.places.Autocomplete(input);
    }
    google.maps.event.addDomListener(window, 'load', initializeAutocomplete);
</script>

<?php if (!empty($successMessage)) : ?>
    <div style="color: blue; text-align: center;"><?php echo $successMessage; ?></div>
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
<?php include('../home/footer.html');?>
<style>
    body {
        font-family: Arial, sans-serif;
        background-color: white;
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
        background-color: blue;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        border-radius: 5px;
    }
    
    button[type="button"] {
        background-color: grey;
        color: white;
        padding: 10px 20px;
        border: none;
        cursor: pointer;
        margin-left: 300px;
        border-radius: 5px;
    }
    
    input[type="submit"]:hover {
        background-color: blue;
        
    }
    
    form {
        width: 550px;
        border: 2px solid #ccc;
        padding: 30px;
        background: #fff;
        border-radius: 15px;
        margin: auto;
        margin-top: 40px;
    }
</style>

</html>
