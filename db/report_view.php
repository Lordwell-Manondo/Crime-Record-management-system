<?php

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected data from the form
    $selectedData = $_POST['data'];

    $serializedData = serialize($selectedData);

    // Redirect to report.php with selected data as a query parameter
    header("Location: report.php?data=$serializedData");
    exit();
}
//linking up Record_case.php file with database using Connections.php file
include('../db/Connections.php');

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Retrieve data from the database
$sqlCaseTypes = "SELECT type, COUNT(*) as count FROM cases GROUP BY type ORDER BY count DESC";
$resultCaseTypes = mysqli_query($conn, $sqlCaseTypes);

$sqlSuspects = "SELECT suspect_name, COUNT(*) as count FROM cases GROUP BY suspect_name ORDER BY count DESC";
$resultSuspects = mysqli_query($conn, $sqlSuspects);

$sqlRecentOpenCases = "SELECT * FROM cases WHERE status = 'Open' ORDER BY date DESC LIMIT 5";
$resultRecentOpenCases = mysqli_query($conn, $sqlRecentOpenCases);

$sqlRecentClosedCases = "SELECT * FROM cases WHERE status = 'Closed' ORDER BY date DESC LIMIT 5";
$resultRecentClosedCases = mysqli_query($conn, $sqlRecentClosedCases);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cases Report</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: rgb(0, 109, 139);
            margin: 20px;
            color: white;
        }
        h1 {
            color: khaki;
            font-weight: 300;
            margin-top: 24px;
            text-align: center;
            flex: auto;
        }
        h2 {
            margin-top: 40px;
            margin-bottom: 10px;
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: auto;
            margin-bottom: 20px;
            max-width: 720px;
        }
        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #626262;
        }
        .header {
            display: flex;
            align-items: center;
            justify-content: space-between;
            margin-bottom: 20px;
        }
        .print-button {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            width: 72px;
            text-align: center;
            margin-right: 32px;
        }
        .print-container {
            position: relative;
        }
        .dropdown-form {
            display: none;
            position: absolute;
            top: 32px;
            right: 20px;
            background-color: rgb(0, 109, 139);
            width: 228px;
            padding: 10px;
            border-radius: 5px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1;
        }
        .dropdown-form.open {
            display: block;
        }
        .dropdown-form label {
            display: block;
            margin-bottom: 5px;
        }
        .dropdown-form input[type="checkbox"] {
            margin-bottom: 10px;
        }
        .dropdown-form input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            border: none;
            padding: 5px 10px;
            border-radius: 5px;
            cursor: pointer;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>Cases Report</h1>
        <div class="print-container">
            <div class="print-button" onclick="toggleDropdownForm()"><i class="fas fa-file-download"></i> Print</div>
            <div class="dropdown-form" id="dropdownForm">
                <form method="post" action="" onsubmit="toggleDropdownForm()">
                    <p>Select data to print:</p>
                    <label><input type="checkbox" name="data[]" value="case_types" checked> Case Types</label>
                    <label><input type="checkbox" name="data[]" value="suspects" checked> Suspects</label>
                    <label><input type="checkbox" name="data[]" value="recent_open_cases" checked> Recent Open Cases</label>
                    <label><input type="checkbox" name="data[]" value="recent_closed_cases" checked> Recent Closed Cases</label>
                    <br>
                    <input type="submit" value="Generate Report">
                </form>
            </div>
        </div>
    </div>

    <h2>Case Types:</h2>
    <table>
        <tr>
            <th>Case Type</th>
            <th>Count</th>
        </tr>
        <?php while ($rowCaseTypes = mysqli_fetch_assoc($resultCaseTypes)) { ?>
            <tr>
                <td><?php echo $rowCaseTypes['type']; ?></td>
                <td><?php echo $rowCaseTypes['count']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Suspects:</h2>
    <table>
        <tr>
            <th>Suspect Name</th>
            <th>Count</th>
        </tr>
        <?php while ($rowSuspects = mysqli_fetch_assoc($resultSuspects)) { ?>
            <tr>
                <td><?php echo $rowSuspects['suspect_name']; ?></td>
                <td><?php echo $rowSuspects['count']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Recent Open Cases:</h2>
    <table>
        <tr>
            <th>Serial No</th>
            <th>Date</th>
            <th>Suspect</th>
            <th>Incident</th>
        </tr>
        <?php while ($rowRecentOpenCases = mysqli_fetch_assoc($resultRecentOpenCases)) { ?>
            <tr>
                <td><?php echo $rowRecentOpenCases['id']; ?></td>
                <td><?php echo $rowRecentOpenCases['date']; ?></td>
                <td><?php echo $rowRecentOpenCases['suspect_name']; ?></td>
                <td><?php echo $rowRecentOpenCases['incident']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <h2>Recent Closed Cases:</h2>
    <table>
        <tr>
            <th>Serial No</th>
            <th>Date</th>
            <th>Suspect</th>
            <th>Incident</th>
        </tr>
        <?php while ($rowRecentClosedCases = mysqli_fetch_assoc($resultRecentClosedCases)) { ?>
            <tr>
                <td><?php echo $rowRecentClosedCases['id']; ?></td>
                <td><?php echo $rowRecentClosedCases['date']; ?></td>
                <td><?php echo $rowRecentClosedCases['suspect_name']; ?></td>
                <td><?php echo $rowRecentClosedCases['incident']; ?></td>
            </tr>
        <?php } ?>
    </table>

    <script>
        function toggleDropdownForm() {
            var dropdownForm = document.getElementById('dropdownForm');
            dropdownForm.classList.toggle('open');
        }
    </script>
</body>
</html>
