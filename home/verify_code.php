<?php
session_start();

// Include the file for database connection
require_once '../db/Connections.php';

// Include the Twilio PHP SDK
require_once __DIR__ . '/../vendor/autoload.php';

use Twilio\Rest\Client;

// Twilio credentials
$accountSid = 'AC1818122a442971639e68dee6662bbe99';
$authToken = '3736e90642ce83fcde827c4e54e8b0ad';
$twilioServiceSid = 'VA9fd36c293180923fb622962bb51edf8b';

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
             $sql = "insert into reportform (phone, location, description) values ('$phoneNumber', '$location', '$description')";
            
             //executing the above statement
             mysqli_query($conn, $sql);
            // Data insertion successful
            $successMessage = 'Form submitted successfully!';
            header("Location: added_success.php");
            // Clear session data
            session_unset();
            session_destroy();
           
        } else {
            // Data insertion failed
            $errorMessage = 'Error inserting form data into the database.';
           

        }
    } else {
        // Invalid verification code
       echo"<span style='color: white; font-size: 30px; margin-left: 40%; margin-top: -50px;'> "."Invalid code"." </span>";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Verify Code</title>
</head>
<body>
    
    <?php if (isset($errorMessage)) : ?>
        <div style="color: red; text-align: center;"><?php echo $errorMessage; ?></div>
    <?php endif; ?>
    <?php if (isset($successMessage)) : ?>
        <div style="color: green; text-align: center;"><?php echo $successMessage; ?></div>
    <?php endif; ?>
    <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
        <label for="verification_code">Verify your number:</label>
        <br>
        <input type="text" name="verification_code" id="verification_code" placeholder="Enter given code" required>
        <br>
        <input type="submit" value="Submit" style=" width: 20%;">
        
        
        
    </form>
    <style>
        body{
            background-color: rgb(0, 109, 139);;
           
        }
        form{
            background-color: white;
            width: 50%;
            height: 250px;
            display: list;
            text-align: center;
            margin-left: 25%;
            border-radius: 2%;
            margin-top: 130px;
        }
        
        li{
            list-style: none;
        }
        input{
            width: 50%;
            height: 40px;
            margin-top: 30px;
        }
        input[type="text"]:hover {
        border-color: #45a0949;
        font-size: 20px;
    }
    label{
        font-size: 30px;
        
    }
   
    button{
            width: 50%;
            height: 40px;
            margin-top: 30px;
            font-size: 25px;
            width: 20%;
            color: darkgray;
            
            
    }
    </style>
</body>
</html>
