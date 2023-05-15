<?php
session_start();
include('Connections.php');

// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST"){
    // Prepare the SQL statement
    $stmt =  $conn->prepare("UPDATE cases SET suspect_name=?, victim_name=?, incident=?, serial_no=?, location=?, date=?, type=? WHERE id=?");

    // Bind the parameters to the statement
    $stmt->bind_param("sssssssi", $suspect, $victim, $incident, $serial_no, $location, $date, $type, $id);

    // Set the parameter values
   $id = $_POST["id"];
    $suspect = $_POST['suspect'];
    $victim = $_POST['victim'];
    $incident = $_POST['incident'];
    $serial_no = $_POST['serial_no'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $type = $_POST['type'];

    // Execute the statement to update the data
    if ($stmt->execute()) {
        //give this message if the process of saving the case was successful
        header("Location: case_updated_message.php");
            exit;

    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();
}

// Check if a case ID was provided in the URL
if (isset($_GET["id"])) {
    // Retrieve the case data from the database
    $stmt = $conn->prepare("SELECT * FROM cases WHERE id=?");
    $stmt->bind_param("i", $id);
    $id = $_GET["id"];
    if ($stmt->execute()) {
        $result = $stmt->get_result();
        $case = mysqli_fetch_assoc($result);
        if (!$case) {
            echo "Error: No case found with ID " . $id;
        }
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close the statement
    $stmt->close();

    if ($case) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record case</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2"></script>

</head>
<div class="navbar">



 <a href="Home.html"> <svg class="logout" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-left: 1280px;">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg> <p style="font-size: 10px; color: black; margin-left: 1280px; font-weight: 10px;">Logout</p></a>
            </div>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="contact-form">
                    <h3 class="text-center">Update case</h3>
                    <form method="POST" action="update_case.php" id="case-record" name="case-record">
                        
                    <div class="form-group">
                            <label for="victim">Suspect name</label>
                            <input type="text" class="form-control" id="suspect" name="suspect" value="<?php echo $case['suspect_name']; ?>"  required>
                            <span class="error">Please enter suspect name</span>
                        </div>


           
                        
                        <div class="form-group">
                            <label for="victim">Victim name</label>
                            <input type="text" class="form-control" id="victim" name="victim" value="<?php echo $case['victim_name']; ?>"  required>
                            <span class="error">Please enter suspect name</span>
                        </div>

                        <div class="form-group">
                            <label for="incident">Incident</label>
                            <textarea class="form-control" id="incident" name="incident"  value="<?php echo $case['incident']; ?>" ></textarea>
                            <span class="error">Please enter incident</span>
                        </div>

                        <div class="form-group">
                            <label for="serial_no">Serial No.</label>
                            <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo $case['serial_no']; ?>"  required>
                            <span class="error">Please enter incident</span>
                        </div>
                          
                       
                      <div class="form-group">
                            <label for="location">Location</label>
                            <input type="location" class="form-control"id="location" name="location" value="<?php echo $case['location']; ?>"required>

                            <span class="error">Please enter Location</span>
                      </div>

                      <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" value="<?php echo $case['date']; ?>"  required>
                            <span class="error">Please enter a valid date</span>
                        </div>

                        <div class="form-group">
                        <label for="my-dropdown">Crime type</label>
                            <select class="form-control" id="type" name="type"  value="<?php echo $case['type']; ?>">
                            <option value="Theft">Theft</option>
                            <option value="Vandalism">Vandalism</option>
                             <option value="Violent">Violent</option>
                           </select>
                           <span class="error">Please select crime type</span>
                        </div>

                      

                        <div class="text-center">
                            <button type="submit" id="submit" value="Update" class="btn btn-lg btn-block">Update</button>
                        </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
  

    <style>
        body {
            background-color: rgb(0, 109, 139);
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #ff8c00;
        }
        .contact-form {
            background-color: #fff;
            border-radius: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 30px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .contact-form label {
            font-weight: 600;
            color: #333;
        }
       
        .contact-form button {
            background-color: #4cc3f1;
            border-color: #ff8c00;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .contact-form button:hover {
            background-color: #0c3779;
            border-color: #ff8000;
            color: #fff;
            
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
        }


        .back-button:hover {
             background-color: navy;
        }
       .navbar h1{
            color: white;
            font-size: 40px;
            margin-left: 25%;
            }
             .navbar{
                  background-color: gray;
                  margin-top: 2px;
                  
                  padding: 10px;
                  border-radius: 3px;
                   }
                   .navbar a{
            margin-right: 5%;
            }
            .logout{
                color: black;
                margin-left: 80%;
            }
            logout:hover{
                color: khaki;
            }
    
  </style>
</body>
</html>
<?php

 
} else {
        echo "Officer not found.";
    }
} else {
    echo "No officer ID provided.";
}

// Close the connnection
mysqli_close($conn);
?> 


