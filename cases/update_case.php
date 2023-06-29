<?php
// session_start();
include('../db/Connections.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    // rest of your code


// Retrieve data from the database
$id = $_GET['id'];
$sql = "SELECT * FROM cases WHERE id = $id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);

// Check if $row is not null before trying to access its indices
if (isset($row)) {
    // Populate the input fields with the retrieved data
    $suspect = $row['suspect_name'];
    $victim = $row['victim_name'];
    $incident = $row['incident'];
    $location = $row['location'];
    $date = $row['date'];
    $type = $row['type'];
    $status = $row['status'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>Updating-case</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
    
</head>
<body>

<?php include('../home/officer_incharge_session.php');?>
  
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
             
                 
          <span class="heading">Update case</span>
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
    <div class="box-container">
        <form method="post">
            <div class="form-group">
                <label for="suspect">Suspect</label>
                <input type="text" class="form-control" id="suspect" name="suspect" value="<?php echo $suspect ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="victim">Victim</label>
                <input type="text" class="form-control" id="victim" name="victim" value="<?php echo $victim ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="incident">Incident</label>
                <textarea class="form-control" id="incident" name="incident" rows="3"><?php echo $incident ?? ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $location ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="date">Date</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="type">Case type</label>
                <select class="form-control" id="type" name="type">
                    <option value="<?php echo $type ?? ''; ?>"><?php echo $type ?? ''; ?></option>
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
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status">
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>

            <input type="submit" value="Submit" style="padding: 10px; margin-left: 100px;">
        <button type="button" onclick="window.history.back();" style="margin-left: 60%; padding: 10px;">Cancel</button>
        </form>
    </div>
</div>
    <style>
        body{
            background-color: white;
        }
         form{
            width: 80%;
            margin-left: 10%;
            margin-top: 10px;
            background-color: white;
            border-radius: 5px;
            height: 750px;
            height: fit-content;
            border-color: gray;
            
            
         }
        label{
            font-size: 20px;
            margin-left: 10%;
            font-weight: 600;
        }
        .heading{
            
            color: white;
            margin-right: 400px;
            font-size: 25px;
        }
        input[id="suspect"],input[id="victim"],input[id="location"],input[id="date"],select[id="type"],select[id="status"],textarea[id="incident"]{
            width: 80%;
            margin-left: 10%;
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


<?php
// Update the data in the database
if (isset($_POST['submit'])) {
    $suspect = $_POST['suspect'];
    $victim = $_POST['victim'];
    $incident = $_POST['incident'];
    $location = $_POST['location']; 
    $date = $_POST['date']; 
    $type = $_POST['type']; 
    $status = $_POST['status'];
    $sql = "UPDATE cases SET suspect_name='$suspect', victim_name='$victim', incident='$incident', location='$location', date='$date', type='$type', status='$status' WHERE id=$id";
    if (mysqli_query($conn, $sql)) {
        header("Location: case_updated_message.php");
        
    } else {
        echo "Error updating data: " . mysqli_error($conn);
    }
}
}
else{
    echo'no data found';
}
// Close database connection
mysqli_close($conn);
?> 
