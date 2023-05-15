<?php 
 session_start();
 include("Connections.php");
include './assign_duty.php'; 
?>

<!DOCTYPE html>
<html>
<head>
	<title>Assign Duty</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/index.css" rel="stylesheet" type="text/css">
    <link href="../css/duty.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include '../common/top_bar.php'; ?>
    <?php echo $message; ?>
	<main>
        <h2>Assign Duty</h2>
        <form method="post">
            <label for="case_id">Case ID:</label>
            <select name="case_id" id="case_id">
                <option selectable="false" style="color: #aaa;">Choose Case</option>
                <?php echo $cases; ?>
            </select>

            <label for="emp_number">Employee Number:</label>
            <select name="emp_number" id="emp_number">
                <option selectable="false" style="color: #aaa;">Choose Officer</option>
                <?php echo $officers; ?>
            </select>

            <label for="date_to_report">Date to Report:</label>
            <input type="date" name="date_to_report" id="date_to_report"><br/>

            <input type="submit" name="submit" value="Assign">
            <input type="button" name="cancel" value="Cancel" onclick="history.go(-1);">
        </form>
    </main>
</body>
</html>
