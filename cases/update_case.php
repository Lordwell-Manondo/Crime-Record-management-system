<?php
session_start();
include('../db/Connections.php');

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

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
<html>
    <head>
    <title>Updating-case</title>    
    <head>
        <body>
<form method="post">
    <label class="input-label">Supect:</label>
    <input type="text" name="suspect" value="<?php echo $suspect ?? ''; ?>">

    <label class="input-label">Victim:</label>
    <input type="text" name="victim" value="<?php echo $victim ?? ''; ?>">


    <label class="input-label">Incident:</label>
    <input type="textarea" name="incident" style="height: 70px;" value="<?php echo $incident ?? ''; ?>">

    <label class="input-label">Location:</label>
    <input type="text" name="location" value="<?php echo $location ?? ''; ?>">
                    

    <label class="input-label">Date:</label>
    <input type="date" name="date" value="<?php echo $date ?? ''; ?>">
   
    <div class="case-type">
       <label class="input-label">Case type:</label>
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

       <div class="case-status">
       <label class="input-label">Status:</label>
           <select class="form-control" id="status" name="status">
                          
                          <option value="Open">Open</option>
                            <option value="Closed">Closed</option>
                             
            </select>
       </div>
    <button type="submit" name="submit">Update</button>
    
    
</form>
<style>
  body{
    background-color: rgb(0, 109, 139);
  }
  form {
    background-color: white;
  width: 600px;
  height: 680px;
  margin: auto;
  font-family: Arial, sans-serif;
  background-color: #f8f8f8;
  padding: 20px;
  border-radius: 5px;
  
}

label {
  display: block;
  margin-left: 25px;
  margin-top: 15px;
  font-size: 20px;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}
input{
    margin-left: 20px;
    width: 500px;
    height: 45px;
    font-size: 20px;
    border-radius: 5px;
    border-width: 1.5px;
    font-weight: 350;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
select{
    width: 500px;
    margin-left: 20px;
    height: 45px;
    font-size: 20px;
    border-radius: 5px;
    border-width: 1.5px;
    font-weight: 350;
    font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;
}
button{
    margin-top: 15px;
    margin-left: 200px;
    width: 100px;
    height: 40px;
   font-size: 20px;
   background-color: lightgreen;
   border-radius: 3px;
  
}
button:hover{
    font-weight: lighter;
}


</style>
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
