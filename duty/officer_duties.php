<?php 

session_start();

if (isset($_SESSION['employee_number'])) {
    // include database connection file
    include_once("../common/db_con.php");
    // Retrieve the list of cases from the database
    $sql = "SELECT * FROM `duty` JOIN `cases` ON duty.case_id=cases.id JOIN officers ON officers.employee_number=duty.emp_number WHERE emp_number = ". $_SESSION["employee_number"] . " ORDER BY date_assigned";
    $result = mysqli_query($conn, $sql);
    $cases = "";
    $suspects = "";
    // Display the list of cases in an HTML table
    if (mysqli_num_rows($result) > 0) {
    while ($row = mysqli_fetch_assoc($result)) {
        $cases .= "<tr><td>" . $row["serial_no"] . "</td><td>" . $row["suspect_name"] . "</td><td>" . $row["victim_name"] . "</td><td>" . $row["case_type"] . "</td><td>" . $row["incident"] . "</td><td>" . $row["location"] . "</td><td>" . $row["date"] . "</td></tr>";
        $suspects .= "<li><a href='#'>".$row['suspect_name']."</a></li>";
    }
    }

    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Recorded Cases</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link href="../css/index.css" rel="stylesheet" type="text/css">
    <link href="../css/cases.css" rel="stylesheet" type="text/css">

    <style>
        .suspects {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }

        .cases-head {
            display: flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }

        .suspects li {
            padding: 8px 16px;
            border-bottom: 1px solid #ddd;
        }
        .search {
            width: 100%;
            max-width: 400px;
            padding: 8px;
            border-radius: 4px;
            display: flex;
            flex-direction: row;
            flex-wrap: wrap;
            justify-content: center;
            margin: 8px;
        }

        .search input[type=search] {
            width: 60%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .search input[type=submit] {
            width: 20%;
            padding: 8px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
            cursor: pointer;
        }

    </style>
</head>
<body>
	<!-- Top bar -->
	<?php include '../common/top_bar.php';?>

	<div class="main">

        <!-- Main content area -->
        <div class="main-content">
            <div class="cases-head">
                <h2>Recorded Cases</h2>
                <!-- <form method="get" class="search">
                    <input type="search" name="query" placeholder="Search case...">
                    <input type="submit" name="search" value="Search">
                </form>

                <div>Update Case</div> -->
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Case ID</th>
                        <th>Date Assigned</th>
                        <th>Date to Report</th>
                        <th>Suspect Name</th>
                        <th>Victim Name</th>
                        <th>Incident</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php echo $cases; ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>