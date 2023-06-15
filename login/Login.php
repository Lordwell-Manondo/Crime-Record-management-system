<?php
// Include the database connection file
require_once '../db/Connections.php';

// Function to verify hashed password
function verifyPassword($password, $hashedPassword)
{
    return password_verify($password, $hashedPassword);
}

// Function to authenticate officers
function authenticateOfficer($serviceNo, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM officers WHERE service_no = ?");
    $stmt->bind_param("s", $serviceNo);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (verifyPassword($password, $hashedPassword)) {
            echo "Officer authentication successful!";
            header("Location: ../home/Officer.php");
            exit();
        } else {
            echo "Invalid service number or password for officer.";
        }
    } else {
        // Officer not found, proceed to check if the user is an officer in charge
        authenticateOfficerInCharge($serviceNo, $password);
    }
}

// Function to authenticate officer in charge
function authenticateOfficerInCharge($userName, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM login_officer_incharge WHERE user_name = ?");
    $stmt->bind_param("s", $userName);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];

        if (verifyPassword($password, $hashedPassword)) {
            echo "Officer in charge authentication successful!";
            header("Location: ../home/Officer-incharge_landing_page.php");
            exit();
        } else {
            echo "Invalid username or password for officer in charge.";
        }
    } else {
        // Officer in charge not found, display error message
        echo "Invalid username or password for officer and officer in charge.";
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if role is set
    if (isset($_POST['role'])) {
        // Retrieve the form data based on the selected role
        $role = $_POST['role'];
        $serviceNo = "";
        $userName = "";
        $password = "";

        if ($role === 'officer') {
            // Check if service_no and password are set
            if (isset($_POST['service_no']) && isset($_POST['password'])) {
                $serviceNo = $_POST['service_no'];
                $password = $_POST['password'];
            }
        } elseif ($role === 'officer_in_charge') {
            // Check if user_name and password are set
            if (isset($_POST['user_name']) && isset($_POST['password'])) {
                $userName = $_POST['user_name'];
                $password = $_POST['password'];
            }
        }

        // Perform authentication based on the role and provided data
        if ($role === 'officer' && $serviceNo !== "" && $password !== "") {
            authenticateOfficer($serviceNo, $password);
        } elseif ($role === 'officer_in_charge' && $userName !== "" && $password !== "") {
            authenticateOfficerInCharge($userName, $password);
        } else {
            echo "Invalid role selected or missing required fields.";
        }
    } else {
        echo "Role not selected.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(0, 109, 139);
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }

        .container {
            background-color: #fff;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 400px;
            max-width: 100%;
        }

        h1 {
            text-align: center;
            margin-bottom: 30px;
        }

        label {
            display: block;
            margin-bottom: 10px;
            font-weight: bold;
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
        }

        .form-group {
            display: flex;
            flex-direction: column;
            margin-bottom: 20px;
        }

        .form-group label {
            margin-bottom: 5px;
        }

        .button-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
        }

        button {
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            flex-grow: 1;
            margin-right: 5px;
        }

        button:last-child {
            margin-right: 0;
        }

        button:hover {
            background-color: #45a049;
        }

        .forgot-password {
            text-align: center;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Login</h1>
        <form method="POST" action="">
            <div class="form-group">
                <label for="role">Role:</label>
                <select id="role" name="role" onchange="toggleFields()">
                    <option value="officer">Officer</option>
                    <option value="officer_in_charge">Officer in Charge</option>
                </select>
            </div>

            <div id="serviceNoField" style="display: none;" class="form-group">
                <label for="service_no">Service Number:</label>
                <input type="text" id="service_no" name="service_no">
            </div>

            <div id="userNameField" style="display: none;" class="form-group">
                <label for="user_name">User Name:</label>
                <input type="text" id="user_name" name="user_name">
            </div>

            <div class="form-group">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password">
            </div>

            <div class="button-group">
                <button type="submit">Login</button>
                <button type="button" onclick="forgotPassword()">Forgot Password</button>
            </div>
        </form>
    </div>

    <script>
        function toggleFields() {
            var role = document.getElementById("role").value;
            var serviceNoField = document.getElementById("serviceNoField");
            var userNameField = document.getElementById("userNameField");

            if (role === "officer") {
                serviceNoField.style.display = "block";
                userNameField.style.display = "none";
            } else if (role === "officer_in_charge") {
                serviceNoField.style.display = "none";
                userNameField.style.display = "block";
            } else {
                serviceNoField.style.display = "none";
                userNameField.style.display = "none";
            }
        }

        function forgotPassword() {
            // Add your logic for the "Forgot Password" functionality here
            alert("Forgot Password clicked!");
        }

        // Call the toggleFields() function when the page loads
        toggleFields();
    </script>
</body>
</html>

