<?php
include('../db/Connections.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];


    $service_no='';
    $officers='';
// Retrieve data from the database
$id = $_GET['id'];
$sql = "SELECT * FROM cases WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


$cases="";
// Check if $row is not null before trying to access its indices
if (isset($row)) {
    // Populate the input fields with the retrieved data
    $case = $row['serial_no'];
   
    
}}
else{
    echo'no case selected';
}

// Retrieve the available officer IDs from the database
$sql = "SELECT * FROM `officers` WHERE `position`= 'officer' ORDER BY `service_no`";
$result = mysqli_query($conn, $sql);
$officers  = "";
if (mysqli_num_rows($result) > 0) {
  while ($row = mysqli_fetch_assoc($result)) {
   
  
  
   // get officers from database 
  
  $first_name= $row['first_name'];
  $last_name = $row['last_name'];
  $officers.="<option value='".$row['service_no']."'>".$row['service_no']." (" . $row['first_name'] .' '.$row['last_name'] . ")</option>";
    
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $service_no = $_POST['service_no'];
    $date_to_report = $_POST['date_to_report'];

    // send the duty details into the database
    $sql = "INSERT INTO duty (serial_no, service_no, date_to_report)
            VALUES ('$case', '$service_no', '$date_to_report')";

    // Execute/saving the details
    mysqli_query($conn, $sql);


    //success message
    header("location: dutyAssigned.php");
  exit();
}
// Close database connection
mysqli_close($conn);
}


?>
<!DOCTYPE html>
<html>
<head>
    <title>Assign duty</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
<body>
<?php include('../home/officer_incharge_session.php');?>
<div class="box-content">
<div class="content">
  
  <!-- Header -->
  <header>
      <!-- Header content -->
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);">
      <div class="log">
          <img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
             
                 
          <span class="heading">Duty Assignment</span>
        </div>

        <li class="nav-item dropdown">
                    <a  class="nav-link" href="#"  id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-right: 150px;">
                        <i class="fas fa-user" style="font-size: 25px;  color: blue;"></i>
                        <span style="color: white; font-size: 15px;"> <?php echo $name; ?></span>
                        <i class="fas fa-angle-down" style=" color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>

                    </a>
                    <!-- submenu for profile -->
                    <ul class="dropdown-menu" aria-labelledby="submenu">
                    <li><a class="dropdown-item" style=" font-size: 20px%; color: white;" href="../home/home.php">Logout</a></li>
                    </ul>
                    </li>
     </nav>
  </header>



    <div class="container">
        <form method="post">
         
<div class="form-group">
    <label for="serial_no">Case Serial Number</label>
    <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo $case; ?>" required>
</div>

<div class="form-group">
    <label for="service_no">Select officer</label>
   <li> <select type="checkbox" class="form-control" id="service_no" style="width: 80%;" name="service_no" required>
   <?php
        
            echo $officers; 
        
        ?>
    </select>
</div>

                <div class="form-group">
                <label for="date">Date to report</label>
                <input type="date" class="form-control" id="date_to_report" name="date_to_report"  min="<?php echo date('Y-m-d'); ?>" required>
            </div>

            <input type="submit" value="Submit" style="padding: 6px; margin-left: 100px; border-radius: 5px; background-color: blue; color:white;">
        <button type="button" onclick="window.history.back();" style="margin-left: 55%; background-color: grey; border-radius: 5px; color:white;">Cancel</button>
        </form>
    </div>
</div>
    <style>
        body{
            background-color: white;
        }
        
        form{
            background-color: white;
            height: 400px;
            width: 600px;
            margin-top: 10px;
            border-radius: 5px;
            width: 70%;
            margin-left: 15%;
        } 
        label{
            font-size: 20px;
            margin-left: 10%;
            margin-top: 3%;

        }
       
        .heading{
            
            color: white;
            margin-right: 300px;
            font-size: 25px;
        }
        .box-container{
            border: 1px solid white;
        }
        input[id="date_to_report"], input[id="serial_no"], select{
            width: 80%;
            margin-left: 10%;
            height: 10%;
           
        }
        button{
            margin-left: 10%;
        }
        li{
            list-style: none;
        }
        
        </style>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
<?php include('../home/footer.html');?>

</html>




