<?php
session_start();
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <form method="post">
            <div class="form-group">
                <label for="suspect">Suspect:</label>
                <input type="text" class="form-control" id="suspect" name="suspect" value="<?php echo $suspect ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="victim">Victim:</label>
                <input type="text" class="form-control" id="victim" name="victim" value="<?php echo $victim ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="incident">Incident:</label>
                <textarea class="form-control" id="incident" name="incident" rows="3"><?php echo $incident ?? ''; ?></textarea>
            </div>

            <div class="form-group">
                <label for="location">Location:</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo $location ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="date">Date:</label>
                <input type="date" class="form-control" id="date" name="date" value="<?php echo $date ?? ''; ?>">
            </div>

            <div class="form-group">
                <label for="type">Case type:</label>
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
                <label for="status">Status:</label>
                <select class="form-control" id="status" name="status">
                    <option value="Open">Open</option>
                    <option value="Closed">Closed</option>
                </select>
            </div>

            <button type="submit" name="submit" class="btn btn-primary">Update</button>
        </form>
    </div>
    <style>
         
        label{
            font-size: 20px;
        }
        </style>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
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
