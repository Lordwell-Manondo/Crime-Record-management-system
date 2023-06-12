<?php
// Linking up Connections.php file with the database
include('../db/Connections.php');

// Create a new instance of the Connection class
$connection = new Connection();

// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Define dataset names and corresponding table names
$datasets = [
    'Case Types' => 'case_types',
    'Suspects' => 'suspects',
    'Recent Open Cases' => 'recent_open_cases',
    'Recent Closed Cases' => 'recent_closed_cases'
];

// Retrieve selected dataset and chart type from the query parameters
$selectedDataset = isset($_GET['dataset']) ? $_GET['dataset'] : 'Case Types';
$selectedChartType = isset($_GET['chart']) ? $_GET['chart'] : 'Pie Chart';

// Retrieve data based on the selected dataset
$selectedTable = $datasets[$selectedDataset];

$sqlQuery = '';
if ($selectedTable === 'case_types') {
    $sqlQuery = "SELECT type, COUNT(*) as count FROM cases GROUP BY type ORDER BY count DESC";
} elseif ($selectedTable === 'suspects') {
    $sqlQuery = "SELECT suspect_name, COUNT(*) as count FROM cases GROUP BY suspect_name ORDER BY count DESC";
} elseif ($selectedTable === 'recent_open_cases') {
    $sqlQuery = "SELECT * FROM cases WHERE status = 'Open' ORDER BY date DESC LIMIT 5";
} elseif ($selectedTable === 'recent_closed_cases') {
    $sqlQuery = "SELECT * FROM cases WHERE status = 'Closed' ORDER BY date DESC LIMIT 5";
}

$dateSqlQuery = '';
if ($selectedTable === 'recent_open_cases') {
    $dateSqlQuery = "SELECT date, COUNT(*) as count FROM cases WHERE status = 'Open' GROUP BY date ORDER BY date";
} elseif ($selectedTable === 'recent_closed_cases') {
    $dateSqlQuery = "SELECT date, COUNT(*) as count FROM cases WHERE status = 'Closed' GROUP BY date ORDER BY date";
}

$result = mysqli_query($conn, $sqlQuery);
if ($dateSqlQuery)
    $dateResult = mysqli_query($conn, $dateSqlQuery);

// Close the database connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Cases Report</title>
    <link rel="stylesheet" type="text/css" href="style.css">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        function printContent() {
            var content = document.querySelector('.content').innerHTML;
            var printWindow = window.open('', '', 'width=800,height=600');
            printWindow.document.open();
            printWindow.document.write('<html><head><title>Print</title></head><body>' + content + '</body></html>');
            printWindow.document.close();
            printWindow.print();
        }
    </script>
</head>
<body>
<div class="header">
    <div class="header-main">
        <h1>Cases Report</h1>
        <ul class="chart-tabs">
            
            <li class="<?php echo ($selectedChartType === 'Pie Chart') ? 'active' : ''; ?>">
                <a href="?dataset=<?php echo $selectedDataset; ?>&chart=Pie Chart">Pie Chart</a>
            </li>
            <li class="<?php echo ($selectedChartType === 'Bar Chart') ? 'active' : ''; ?>">
                <a href="?dataset=<?php echo $selectedDataset; ?>&chart=Bar Chart">Bar Chart</a>
            </li>
            <li class="<?php echo ($selectedChartType === 'Table') ? 'active' : ''; ?>">
                <a href="?dataset=<?php echo $selectedDataset; ?>&chart=Table">Table</a>
            </li>
        </ul>
    </div>
    <div class="print-container">
        <div class="print-button" onclick="printContent()"><i class="fas fa-file-download"></i> Print</div>
    </div>
</div>

<div class="container">
    <div class="sidebar">
        <ul>
            <?php foreach ($datasets as $datasetName => $datasetTable) { ?>
                <li <?php echo ($selectedDataset === $datasetName) ? 'class="active"' : ''; ?>>
                    <a href="?dataset=<?php echo $datasetName; ?>&chart=<?php echo $selectedChartType; ?>"><?php echo $datasetName; ?></a>
                </li>
            <?php } ?>
        </ul>
    </div>

    <div class="content">
        <?php if ($selectedChartType === 'Pie Chart') { ?>
            <h2><?php echo $selectedDataset; ?>:</h2>
            <div id="chart"></div>
        <?php } elseif ($selectedChartType === 'Bar Chart') { ?>
            <h2><?php echo $selectedDataset; ?>:</h2>
            <div id="chart"></div>
        <?php } elseif ($selectedChartType === 'Table') { ?>
            <h2><?php echo $selectedDataset; ?>:</h2>
            <table>
                <?php if ($selectedTable === 'recent_open_cases' || $selectedTable === 'recent_closed_cases') { ?>
                    <tr>
                        <th>Serial No</th>
                        <th>Date</th>
                        <th>Suspect</th>
                        <th>Incident</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['id']; ?></td>
                            <td><?php echo $row['date']; ?></td>
                            <td><?php echo $row['suspect_name']; ?></td>
                            <td><?php echo $row['incident']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } elseif ($selectedTable === 'case_types') { ?>
                    <tr>
                        <th>Case Type</th>
                        <th>Count</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['type']; ?></td>
                            <td><?php echo $row['count']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } elseif ($selectedTable === 'suspects') { ?>
                    <tr>
                        <th>Suspect</th>
                        <th>Count</th>
                    </tr>
                    <?php while ($row = mysqli_fetch_assoc($result)) { ?>
                        <tr>
                            <td><?php echo $row['suspect_name']; ?></td>
                            <td><?php echo $row['count']; ?></td>
                        </tr>
                    <?php } ?>
                <?php } ?>
            </table>
        <?php } ?>
    </div>
</div>

<script type="text/javascript">
    google.charts.load('current', { 'packages': ['corechart', 'table'] });
    google.charts.setOnLoadCallback(drawChart);

    function drawChart() {
        <?php if ($selectedChartType === 'Pie Chart') { ?>
            // Prepare data for the Pie Chart
            var data = new google.visualization.DataTable();
            data.addColumn('string', '<?php echo $selectedDataset; ?>');
            data.addColumn('number', 'Count');
            <?php while ($row = mysqli_fetch_assoc($dateResult ?? $result)) { ?>
                data.addRow(['<?php echo $row['date'] ?? $row['type'] ?? $row['suspect_name']; ?>', <?php echo $row['count']; ?>]);
            <?php } ?>

            // Set chart options for the Pie Chart
            var options = {
                title: '<?php echo $selectedDataset; ?>',
                pieHole: 0.4,
                height: 400,
                backgroundColor: 'rgb(0, 109, 139)',
                legend: { textStyle: { color: '#fff' } },
                titleTextStyle: { color: '#fff' },
                chartArea: { left: 20, top: 40, width: '100%', height: '70%' }
            };

            // Create and draw the Pie Chart
            var chart = new google.visualization.PieChart(document.getElementById('chart'));
            chart.draw(data, options);
        <?php } elseif ($selectedChartType === 'Bar Chart') { ?>
            // Prepare data for the Bar Chart
            var data = new google.visualization.DataTable();
            data.addColumn('string', '<?php echo $selectedDataset; ?>');
            data.addColumn('number', 'Count');
            <?php while ($row = mysqli_fetch_assoc($dateResult ?? $result)) { ?>
                data.addRow(['<?php echo $row['date'] ?? $row['type'] ?? $row['suspect_name']; ?>', <?php echo $row['count']; ?>]);
            <?php } ?>

            // Set chart options for the Bar Chart
            var options = {
                title: '<?php echo $selectedDataset; ?>',
                height: 400,
                backgroundColor: 'rgb(0, 109, 139)',
                legend: { textStyle: { color: '#fff' } },
                titleTextStyle: { color: '#fff' },
                chartArea: { left: 60, top: 40, width: '100%', height: '70%' }
            };

            // Create and draw the Bar Chart
            var chart = new google.visualization.BarChart(document.getElementById('chart'));
            chart.draw(data, options);
        <?php } ?>
    }

    function printContent() {
        var content = document.querySelector('.content').innerHTML;
        document.body.innerHTML = content;
        window.print();
        window.location.reload();
    }
</script>
</body>
</html>
