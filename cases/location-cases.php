<?php
include_once('pChart/pChart/pData.class');
include_once('pChart/pChart/pChart.class');

include('../db/Connections.php');
// Create a new instance of the Connection class
$connection = new Connection();

// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Retrieve the location parameter from the URL
$selectedLocation = $_GET['location'];

// Prepare the SQL query to retrieve case types and their counts for the selected location
$query = "SELECT type, COUNT(*) AS count FROM cases WHERE location = '" . mysqli_real_escape_string($conn, $selectedLocation) . "' GROUP BY type";

// Execute the query
$result = mysqli_query($conn, $query);

// Check if any rows were returned
if (mysqli_num_rows($result) > 0) {

    // Create arrays to store the case types and counts
    $caseTypes = array();
    $caseCounts = array();

    // Iterate through the rows and store each case type and count in the arrays
    while ($row = mysqli_fetch_assoc($result)) {
        $caseTypes[] = $row['type'];
        $caseCounts[] = $row['count'];
    }

    // Create a new pData object
    $data = new pData();

    // Add the data to the pData object
    $data->addPoints($caseCounts, 'Count');
    $data->setSerieDescription('Count', 'Count');
    $data->addPoints($caseTypes, 'Type');
    $data->setAbscissa('Type');

    // Create a new pChart object
    $chart = new pChart(600, 400);

    // Set the data to the chart
    $chart->setGraphArea(50, 30, 570, 370);
    $chart->drawFilledRoundedRectangle(7, 7, 593, 393, 5, 240, 240, 240);
    $chart->drawRoundedRectangle(5, 5, 595, 395, 5, 230, 230, 230);
    $chart->setShadow(TRUE, 3, 3, 0, FALSE);
    $chart->setFontProperties("pChart/Fonts/tahoma.ttf", 8);
    $chart->setGraphArea(60, 40, 570, 360);
    $chart->drawGraphArea(255, 255, 255, TRUE);
    $chart->drawScale($data, $chart->GetColor(0, 0, 0), TRUE, 0, 2);
    $chart->drawBarGraph($data, 50);
    $chart->setFontProperties("pChart/Fonts/tahoma.ttf", 10);
    $chart->drawTitle(50, 22, "Case Types Bar Graph", $chart->GetColor(0, 0, 0));
    $chart->Render("chart.png");

    // Display the chart
    echo '<img src="chart.png" alt="Bar Graph">';

} else {
    echo "No case types found for the selected location.";
}

// Close the database connection
mysqli_close($conn);
?>
