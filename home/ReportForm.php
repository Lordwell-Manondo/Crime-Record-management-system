<?php
session_start();
// Linking the ReportForm.php file with the database using Connections.php file
include('../db/Connections.php');

// Check for form submission and session authentication
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_SESSION['id'])) {
    // Get form data
    $phone = $_POST["phone"];
    $location = $_POST["location"];
    $incident = $_POST["incident"];

    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO reportform (phone, location, incident) VALUES (?, ?, ?)");
    $stmt->bind_param("sss", $phone, $location, $incident);

    // Execute the statement
    if ($stmt->execute()) {
        // Check if the insertion was successful
        if ($stmt->affected_rows > 0) {
            // Display success message
            echo "<div><h2>Report sent</h2><h2><a href='Home.php'>Go To Home</a></h2></div>";
            exit;
        } else {
            // Display error message if insertion failed
            echo "Failed to send the report. Please try again.";
        }
    } else {
        // Display error message if execution failed
        echo "An error occurred while sending the report. Please try again.";
    }

    // Close the statement
    $stmt->close();
} else {
    // Display error message if form submission or authentication failed
    //echo "Invalid request. Please try again.";
}

// Close the database connection
$conn->close();
?>




<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Incident</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <style>
        body {
            background-color:  rgb(0, 109, 139);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #ff8c00;
        }
        .contact-form {
            background-color: #fff;
            border-radius: 10px;
            height: 500px;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 30px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
           
        }
        .contact-form label {
            font-weight: 600;
            color: #333;
        }


        .contact-form button[type="report"] {
            background-color: #4cc3f1;
            border-color: #ff8c00;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s ease;
            width: 30%;
            margin-top: 10px;
            margin-bottom: 10px;
            float: left;
        }
        .contact-form button[type="report"]:hover {
            background-color: #0c3779;
            border-color: #ff8000;
        }
        .contact-form .error {
            color: #dc3545;
            font-size: 12px;
            display: none;
        }
        .back-button {
        
            background-color: #4cc3f1;
            border-color: #ff8c00;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s ease;
            width: 30%;
            float: right;
        }


        .back-button:hover {
             background-color: navy;
        }
             
        .text-center.buttons {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

              

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="contact-form">
                    <h3 class="text-center">Report an Incident</h3>

                    <form action="ReportForm.php" method="post" id="contactForm">


                    <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" class="form-control"id="phone" name="phone" placeholder="Enter Phone number" required>

                            <span class="error">Please enter valid Phone number</span>
                      </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="location" class="form-control"id="location" name="location" placeholder="Enter your location" required>

                            <span class="error">Please enter valid Location</span>
                      </div>

                      <div class="form-group">
                            <label for="incident">Incident</label>
                            <textarea class="form-control" id="incident" name="incident" rows="5" placeholder="Enter the incident details" required></textarea>
                            <span class="error">Please enter an incident</span>
                        </div>
                        <div class="text-center">
                            <button type="Report" class="btn btn-lg btn-block">Report</button>
                            <button type="button" class="btn btn-lg btn-block back-button"><a href="Home.php" style="text-decoration: none; color: white;">Back</a></button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</html>