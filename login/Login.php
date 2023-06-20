<?php
include "../db/Connections.php";

// Start the session
session_start();

// Function to verify hashed password
function verifyPassword($password, $hashedPassword)
{
    return password_verify($password, $hashedPassword);
}

// Function to authenticate users
function authenticateOfficer($username, $password)
{
    global $conn;

    $stmt = $conn->prepare("SELECT * FROM officers WHERE service_no = ?");
    $stmt->bind_param("s", $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row['password'];
        $position = $row['position'];

        if (verifyPassword($password, $hashedPassword)) {

            if ($position === 'in-charge') {
                $_SESSION['first_name'] =$row['first_name'];
                $_SESSION['last_name'] =$row['last_name'];
                $_SESSION['id'] = $row['id'];
                     header("Location: ../home/Officer-incharge_landing_page.php");
                     exit();
                 }
            else if ($position === 'officer') {
        
                $_SESSION['service_no'] =$row['service_no'];
                $_SESSION['first_name'] =$row['first_name'];
                $_SESSION['last_name'] =$row['last_name'];
                $_SESSION['id'] = $row['id']; // Store officer username in session
                header("Location: ../home/Officer.php");
                exit();
            } 
        } else {
            return "Invalid username or password.";
        }
    } else {
        // if user is not found, return null
        return null;
    }
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if username and password are set
    if (isset($_POST['username']) && isset($_POST['password'])) {
        $username = $_POST['username'];
        $password = $_POST['password'];

        $errorMessage = "";

        // Perform user authentication
        $errorMessage = authenticateOfficer($username, $password);

        if (!empty($errorMessage)) {
            // echo '<div style="color: red; margin-bottom: 10px;">' . $errorMessage . '</div>';
        }
    } else {
        echo '<div style="color: red; margin-bottom: 10px;">Username and password are required.</div>';
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    
</head>
  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: black;">
    <div class="log">
      <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">

      
         </ul>
    </div>
  </nav>
<body>
    <div class="container">
    <div class="box-container">
        <?php
        if (!empty($errorMessage)) {
            echo '<div class="alert alert-danger">' . $errorMessage . '</div>';
        }
        ?>
        <form method="POST" action="">
            <h4 class="text-center" style="color: gray;">Login to start your session</h4>
            <hr>
            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-user"></i></span>
                    </div>
                    <input type="text" id="username" name="username" class="form-control" placeholder="User name" required>
                </div>
            </div>

            <div class="form-group">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fas fa-key"></i></span>
                    </div>
                    <input type="password" id="password" name="password" class="form-control" placeholder="Password" req>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-secondary btn-block" onclick="forgotPassword()">Forgot Password</button>
                </div>
            </div>
        </form>
    </div>
    </div>
    <script>
        function forgotPassword() {
            // Add your logic for forgot password
            alert("Currently this feature is not working, visit ICT center for help!");
        }
    </script>

    <style>
        body {
            background-color: rgb(0, 109, 139);
        }
        
        .container {
            background-color: rgb(0, 109, 139);
            width: 100%; 
            height: 300px;
            /* margin-left: 30%; */
            margin-top: 5%;
        }
        
        .form-group {
            margin-top: 10%;
        }
        
        h4 {
            
            margin-top: -5%;
        }
        
        i {
            width: 30px;
            color: blue;
        }
        
        button[type="button"] {
            width: fit-content;
            margin-top: 10%;
        }
        
        button[type="submit"] {
            margin-top: 10%;
            width: fit-content;
            margin-left: 30%;
        }
        .box-container{
            background-color: white;
            border-radius: 5px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            padding: 40px;
            width: 45%;
            margin-left: 25%;
         border: 1px black solid;
         
        }
        hr{
           border-color: gray;
        }
    </style>
    
</body>
</html>
