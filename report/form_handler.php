<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the selected data from the form
    $selectedData = $_POST['data'];

    $serializedData = serialize($selectedData);

    // Redirect to report.php with selected data as a query parameter
    header("Location: report.php?data=$serializedData");
    exit();
}
?>
