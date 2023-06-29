<?php
// Include the database connection file
include('../db/Connections.php');

// Check if the form is submitted via POST method
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $suspect = $_POST['suspect'];
    $victim = $_POST['victim'];
    $incident = $_POST['incident'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $status = 'Open';

    // Generate the serial number based on case category/type
    $serialNumber = generateSerialNumber($type, $conn);

    // Save the case into the database
    $query = "INSERT INTO cases (serial_no, suspect_name, victim_name, incident, location, date, type, status) VALUES ('$serialNumber', '$suspect', '$victim', '$incident', '$location', '$date', '$type', '$status')";
    mysqli_query($conn, $query);

    // Redirect to a success message page
    header("Location: added_case_message.php");
    exit;
}

// Function to generate the serial number
function generateSerialNumber($type, $conn)
{
    $prefix = '';
    $length = 0;

    switch ($type) {
        case 'Criminal offense':
            $prefix = 'CO';
            $length = 9;
            break;
        case 'Traffic violation':
            $prefix = 'TV';
            $length = 9;
            break;
        case 'Domestic violation':
            $prefix = 'DV';
            $length = 9;
            break;
        case 'Cybercrime':
            $prefix = 'CR';
            $length = 9;
            break;
        case 'Child protection':
            $prefix = 'CP';
            $length = 9;
            break;
        case 'Human right violation':
            $prefix = 'HRV';
            $length = 10;
            break;
        case 'Environmental offense':
            $prefix = 'EO';
            $length = 9;
            break;
        case 'Financial crime':
            $prefix = 'FC';
            $length = 9;
            break;
        case 'Public order offense':
            $prefix = 'POO';
            $length = 10;
            break;
        default:
            // Handle invalid case category
            echo "There was an error in generating the case serial number.";
            return '';
    }

    // Get the current year
    $currentYear = date('Y');

    // the case initial number
    $number = 1;

    // Generate the serial number
    $serial = $prefix ."/". $currentYear . "/" . $number;

    // Check if the generated serial number already exists in the database
    $query = "SELECT COUNT(*) as count FROM cases WHERE serial_no = '$serial'";
    $result = $conn->query($query);
    $row = $result->fetch_assoc();

    if ($row['count'] > 0) {
        // Number already exists, increment it until a unique number is found
        while ($row['count'] > 0) {
            $number++;
            $serial = $prefix ."/".$currentYear . "/" . $number;

            $query = "SELECT COUNT(*) as count FROM cases WHERE serial_no = '$serial'";
            $result = $conn->query($query);
            $row = $result->fetch_assoc();
        }
    }

    return $serial;
}
?>


<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/css/bootstrap.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">


<title>Recorded cases</title>
</head>
<body>
<?php include('../home/officer_incharge_session.php');?>
<style>
        body {
            background-color: white;
        }
        
   
        .form-control:focus {
            box-shadow: none;
            border-color: #ff8c00;
        }
        .contact-form {
            background-color: #fff;
            border-radius: 10px;
            margin-top: 2px;
           
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
            width: fit-content;
            margin-left: 40%;
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

        @media (max-width: 768px) {
            .navbar-nav {
                flex-direction: column;
            }
            .navbar-nav .nav-item {
                margin: 10px 0;
            }
            .navbar-toggler {
                margin-left: auto;
            }
        }
       
        @media (max-width: 768px) {
            .logo {
                .flex-direction: column;
            }
        }
        .registercase{
            color: white;
            margin-left: 35%;
            font-size: 20px;
        }
        .fas .fa-angle-down:hover{
            font-weight: 100; 
        }
        
        i {
            color: gray;
        }
        .dropdown-menu{
            background-color: rgb(0, 109, 139); 
             width: 60px;
             margin-left: 320px;
             color: white;
            }
         .dropdown-item{
          color: white;
         } 
         .dropdown-item:hover{
          color: black;
         }
     li{
        list-style: none;
     }    
     
     </style>
<header>
<nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 109, 139);">

<div class="logo">
      <img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-top: 0px;">
    </div>



  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>

      <span class="registercase">CASE REGISTRATION</span>

      <li class="nav-item dropdown">
                    <a  class="nav-link" href="#"  id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fas fa-user" style="font-size: 25px; margin-left: 300px; color: darkgray;"></i>
                        <span style="color: white; font-size: 15px;"> <?php echo $name; ?></span>
                        <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>

                    </a>
                    <!-- submenu for profile -->
                    <ul class="dropdown-menu" aria-labelledby="submenu">
                    <li><a class="dropdown-item" style=" font-size: 20px%; " href="../home/home.php">Logout</a></li>
                    </ul>
                    </li>
 
    </nav> 
</header>
  
     <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDi1Re9rRPX6TGBv81ox0H7tRXfQ7eg9lo&libraries=places"></script>
    <script>
        // Initialize Google Places Autocomplete
        function initializeAutocomplete() {
            var input = document.getElementById('location');
            var autocomplete = new google.maps.places.Autocomplete(input);
        }
        google.maps.event.addDomListener(window, 'load', initializeAutocomplete);
    </script>
    <script>
    function goBack() {
        window.history.back();
    }
</script>



    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="contact-form">
                    <form method="POST" action="Record_case.php" id="case-record" name="case-record">
                            
                    <div class="form-group">
                            <label for="victim">Suspect name</label>
                            <input type="text" class="form-control" id="suspect" name="suspect" required>
                            <span class="error">Please enter suspect name</span>
                        </div>
                        <div class="form-group">
                            <label for="victim">Victim name</label>
                            <input type="text" class="form-control" id="victim" name="victim"  required>
                            <span class="error">Please enter suspect name</span>
                        </div>

                        <div class="form-group">
                            <label for="incident">Incident</label>
                            <textarea class="form-control" id="incident" name="incident"   required></textarea>
                            <span class="error">Please enter incident</span>
                        </div>
  
                       
                      <div class="form-group">
                            <label for="location">Location</label>
                            <input type="location" class="form-control"id="location" name="location" required>

                            <span class="error">Please enter Location</span>
                      </div>

                      <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" max="<?php echo date('Y-m-d'); ?>" required>
                            <span class="error">Please enter a valid date</span>
                        </div>

                        <div class="form-group">
                        <label for="my-dropdown">Crime type</label>
                            <select class="form-control" id="type" name="type">
                            <option value="Criminal offense">Criminal offense</option>
                            <option value="Traffic violation">Traffic violation</option>
                             <option value="Domestic violation">Domestic violation</option>
                             <option value="Cybercrime">Cybercrime</option>
                             <option value="Child protection">Child protection</option>
                             <option value="Human right violation">Human right violation</option>
                             <option value="Environmental offense">Environmental offense</option>
                             <option value="Financial crime">Financial crime</option>
                             <option value="Public order offense">Public order offense</option>
                           </select>
                           <span class="error">Please select crime type</span>
                        </div>

                      

                        <input type="submit" value="Submit">
        <button type="button" onclick="window.history.back();" style="margin-left: 70%;">Cancel</button>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
</body>
<?php include('../home/footer.html');?> 
</html>
       
