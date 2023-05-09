<?php include './add_officer.php'; ?>

<!DOCTYPE html>
<html>
<head>
	<title>Adding Officer</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="../css/index.css" rel="stylesheet" type="text/css">
    <link href="../css/duty.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php include '../common/top_bar.php'; ?>
    <?php echo $message; ?>
	<main>
        <h2>Adding Officer</h2>
        <form method="post">

            <label for="name">Name:</label>
            <input type="text" name="name" id="name" placeholder="Fullname">

            <label for="dob">Date of Birth:</label>
            <input type="date" name="dob" id="dob">

            <label for="employee_num">Employee No:</label>
            <input type="text" name="employee_num" id="employee_num">

            <label for="rank">Officer Rank:</label>
            <select name="rank" id="rank">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="5">4</option>
                <option value="5">5</option>
            </select>

            <label for="station">Station:</label>
            <select name="station" id="station">
                <option value="Station 1">Station 1</option>
                <option value="Station 2">Station 002</option>
                <option value="Station 3">Station 003</option>
            </select>

            <label for="password">Password:</label>
            <input type="password" name="password" id="password">

            <br/>

            <input type="submit" name="submit" value="Add">
            <input type="button" name="cancel" value="Cancel" onclick="history.go(-1);">
        </form>
    </main>
</body>
</html>
