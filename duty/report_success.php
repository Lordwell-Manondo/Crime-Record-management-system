<?php
session_start();

if (!isset($_SESSION['service_no'])) {
    header('location: ../login/Login-officer.php');
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Process the form data and save the case findings
    $findings = $_POST['findings'];

    // TODO: Add code to save the case findings to the database

    // Redirect to a success page
    header('Location: report_success.php');
    exit();
}

// Retrieve the case number based on the id from the duty table
$serviceNo = $_SESSION['service_no'];

// TODO: Add code to fetch the case number from the database based on the id
// Replace the below placeholder code with your actual database query
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crms";

// Create a connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch the case number from the duty table
$sql = "SELECT serial_no FROM duty WHERE service_no = $serviceNo";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Case number found, retrieve the value
    $row = $result->fetch_assoc();
    $caseNumber = $row['serial_no'];
} else {
    // Case number not found, handle the error or set a default value
    $caseNumber = 'UNKNOWN';
}

$conn->close();

?>

<!DOCTYPE html>
<html>
<head>
    <title>Report Case Findings</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="stylesheet" href="../login/login.css">

</head>
<body>
    <?php include('../home/officer_session.php'); ?>
    <header>
            <nav class="navbar navbar-expand-lg " style="background-color: black;">
            <div class="log">
            <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
            <h3>REPORT CASE FINDINGS</h3>
            </div>
            </nav>
    </header>
    <br>
    <br>
    <div class="container">
        <h3>Case Details</h3>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="caseNumber">Case Serial Number</label>
                <input type="text" class="form-control" id="caseNumber" name="caseNumber" value="<?php echo $caseNumber; ?>" readonly>
            </div>
            <div class="form-group">
                <label for="findings">Case Findings</label>
                <textarea class="form-control" id="findings" name="findings" rows="5" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
