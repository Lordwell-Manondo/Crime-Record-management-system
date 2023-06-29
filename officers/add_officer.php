<?php
// Connect to the database
session_start();
include('../db/Connections.php');


// Include the password hashing library
require_once __DIR__ . '/../vendor/autoload.php';

// Function to generate a random password
function generateRandomPassword($length = 8) {
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $password = '';
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, strlen($characters) - 1)];
    }
    return $password;
}

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    // Prepare the SQL statement
    $stmt = $conn->prepare("INSERT INTO officers (first_name, last_name, service_no, position, date_of_entry, officer_rank, station, password) VALUES (?, ?, ?,'officer', ?, ?, ?, ?)");

    // Bind the parameters to the statement
    $stmt->bind_param("sssssss", $first_name, $last_name, $service_no, $date_of_entry, $officer_rank, $station, $hashed_password);

    // Set the parameter values
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $service_no = $_POST["service_no"];
    $date_of_entry = $_POST["date_of_entry"];
    $officer_rank = $_POST["officer_rank"];
    $station = $_POST["station"];
    $password = generateRandomPassword(); // Generate a random password

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // // Execute the statement 
        if ($stmt->execute()) {
            // Redirect to the officer_details.php page with the service number and password as URL parameters
            header("Location: officer_details.php? first_name=" . urlencode($first_name) . "&last_name=" . urlencode($last_name) ."&service_no=" . urlencode($service_no) . "&password=" . urlencode($password));
            exit;
        } else {
            echo "Error: " . $stmt->error;
        }

    // Close the statement
    $stmt->close();

    // Close the connection
    $conn->close();
}
?>

<html>
<head>
    <title>Add Officer</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../login/login.css">
</head>

<body>
    <header>
         <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: black;">
    <div class="log">
      <img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
      <h3>ADD OFFICER</h3>

    
    </div>
  </nav>
    </header>
    
    <form action="add_officer.php" method="post">
        <label>First Name:</label>
        <input type="text" name="first_name" required>
        <label>Last Name:</label>
        <input type="text" name="last_name" required>
        <label>Service number:</label>
        <input type="text" name="service_no" required>
        <label>Date of Entry:</label>
        <input type="date" name="date_of_entry" required>
        <label>Officer Rank:</label>
        <select name="officer_rank" required>
            <option value="" selected disabled hidden>Select Rank</option>
            <option value="Sub-Inspector">Sub-Inspector</option>
            <option value="Assistant Sub-Inspector">Assistant Sub-Inspector</option>
            <option value="Sergeant">Sergeant</option>
            <option value="Corporal">Corporal</option>
            <option value="Constable">Constable</option>
        </select><br><br>
        <label>Station:</label>
        <select name="station" required>
            <option value="" selected disabled hidden>Select Police Unit</option>
            <option value="Matawale">Matawale</option>
            <option value="Domasi">Domasi</option>
            <option value="Mpunga">Mpunga</option>
            <option value="Mpondabwino">Mpondabwino</option>
            <option value="Jali">Jali</option>
        </select><br><br>
        <div style="text-align:center">
        <input type="submit" value="Add Officer">
        <input type="button" value="View officers" onclick="location.href='view_officers.php';">
        </div>
    </form>
</body>

 <style>
    body {
        font-family: Arial, sans-serif;
        background-color: rgb(0, 109, 139);
        color: white;
    }

    a {
        display: inline;
        float: left;
        color: #ffffff;
        text-decoration: none;
        margin-right: 10px;
        font-size: 30px;
    }

    h2 {
        text-align: center;
        color: white;
        font-weight: 200px;
        padding-top: 10px
    }

    form {
        width: 50%;
        margin: 0 auto;
        background-color: #fff;
        border: 1px solid #ccc;
        padding: 20px;
        border-radius: 5px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 10px;
        color: #333;
    }

    input[type="text"],
    input[type="password"],
    select {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
        font-size: 16px;
    }

    input[type="date"] {
        width: 100%;
        padding: 10px;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
        margin-bottom: 20px;
        ali
        font-size: 16px;
    }

    input[type="submit"],
    input[type="button"] {
        background-color: blue;
        color: white;
        padding: 12px 20px;
        border: none;
        border-radius: 4px;
        cursor: pointer;
        font-size: 16px;
        margin-right: 90px;
    }

    input[type="submit"]:hover,
    input[type="button"]:hover {
        background-color: blue;
    }

    .error {
        color: red;
        font-weight: bold;
    }

    .success {
        color: green;
        font-weight: bold;
    }
    h3{
        text-align: center;;
    }
</style> 
<?php include('../home/footer.html');?> 

</html>
