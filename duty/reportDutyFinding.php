<?php
include('../db/Connections.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];
$case='';
    // Retrieve data from the database
    $sql = "SELECT * FROM duty WHERE id = $id";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($result);

    // Check if $row is not empty and if 'serial_no' exists in $row
    if ( isset($row)) {
        // Populate the input fields with the retrieved data
        $case = $row['serial_no'];
       
    } 
} 
else {
    echo "No case selected";
}

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Report duty</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Stylesheet styles here */
    </style>
</head>
<body>
    
    <div class="box-content">
        <!-- Rest of the code remains the same -->
    </div>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>


<!DOCTYPE html>
<html>
<head>
    <title>Report duty</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        body {
            background-color: white;
        }
        
        form {
            background-color: white;
            height: 400px;
            width: 600px;
            margin-top: 10px;
            border-radius: 5px;
            width: 70%;
            margin-left: 15%;
        } 
        
        label {
            font-size: 20px;
            margin-left: 10%;
            margin-top: 3%;
        }
       
        .heading {
            color: white;
            margin-right: 300px;
            font-size: 25px;
        }
        
        .box-container {
            border: 1px solid white;
        }
        
        input[id="date_to_report"],
        input[id="serial_no"],
        textarea[id="incident"],
        select {
            width: 500px;
            padding: 5%;
        }
        
        button {
            margin-left: 10%;
        }
        
        li {
            list-style: none;
        }
        .container{
            border: 1px solid gray;
            width: 50%;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <?php include('../home/officer_incharge_session.php'); ?>
    <div class="box-content">
        <div class="content">
            <!-- Header -->
            <header>
                <!-- Navbar -->
                <nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 109, 139);">
                    <div class="log">
                        <img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ml-auto">
                            <span class="heading">Reporting duty findings</span>
                        </ul>
                    </div>
                    <li class="nav-item dropdown">
                        <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                        style="margin-right: 150px;">
                            <i class="fas fa-user" style="font-size: 25px; color: white;"></i>
                            <span style="color: white; font-size: 15px;"><?php echo $name; ?></span>
                            <i class="fas fa-angle-down" style="color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>
                        </a>
                        <!-- Submenu for profile -->
                        <ul class="dropdown-menu" aria-labelledby="submenu">
                            <li><a class="dropdown-item" style="font-size: 20px%; color: white;" href="../home/home.php">Logout</a></li>
                        </ul>
                    </li>
                </nav>
            </header>
        </div>

        <div class="container">
            <form method="post">
                <div class="form-group">
                    <label for="serial_no">Serial Number</label>
                    <input type="text" class="form-control" id="serial_no" name="serial_no" value="<?php echo $case; ?>">
                </div>

                <div class="form-group">
                <label for="incident">Case findings</label>
                <textarea class="form-control" id="incident" name="incident" rows="3"><?php echo $incident ?? ''; ?></textarea>
            </div>
                <!-- Add more input fields here -->

                <!-- Submit button -->
                <button type="submit" class="btn btn-primary">Submit</button>
               
            </form>
        
            </div>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    </body>
    <?php include('../home/footer.html'); ?>
</html>

