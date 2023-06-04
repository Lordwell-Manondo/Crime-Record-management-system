<?php
require_once('../common/tcpdf/tcpdf.php');
//linking up Record_case.php file with database using Connections.php file
include('../db/Connections.php');

// Create a new instance of the Connection class
$connection = new Connection();
    
// Call the connect() method to establish a database connection
$conn = $connection->connect();

// Create a new TCPDF instance
$pdf = new TCPDF('P', 'mm', 'A4', true, 'UTF-8');

// Set document information
$pdf->SetCreator('Group 1');
$pdf->SetAuthor('Group 1');
$pdf->SetTitle('Cases Report');

// Add a page
$pdf->AddPage();

// Set the font
$pdf->SetFont('helvetica', '', 12);

// Header
$pdf->SetFont('helvetica', 'B', 16); // Set font to bold and increase font size
$pdf->Cell(190, 20, 'Cases Report', 0, 1, 'C'); // Increase cell height to accommodate the larger font
$pdf->SetFont('helvetica', 'B', 12); // Reset font style and size for subsequent content

// Display case types with their counts
$pdf->Cell(190, 10, 'Case Types:', 0, 1);
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 12);

$sqlCaseTypes = "SELECT type, COUNT(*) as count FROM cases GROUP BY type ORDER BY count DESC";
$resultCaseTypes = mysqli_query($conn, $sqlCaseTypes);

// Create a table for case types
$pdf->SetFillColor(200, 220, 255); // Set table header fill color
$pdf->Cell(60, 10, 'Case Type', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(20, 10, 'Count', 1, 1, 'C', 1); // Table header cell

while ($rowCaseTypes = mysqli_fetch_assoc($resultCaseTypes)) {
    $pdf->Cell(60, 10, $rowCaseTypes['type'], 1, 0, 'C');
    $pdf->Cell(20, 10, $rowCaseTypes['count'], 1, 1, 'C');
}

$pdf->Ln(10);

// Display suspects with their case counts
$pdf->SetFont('helvetica', 'B', 12);
$pdf->Cell(190, 10, 'Suspects:', 0, 1);
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 12);

$sqlSuspects = "SELECT suspect_name, COUNT(*) as count FROM cases GROUP BY suspect_name ORDER BY count DESC";
$resultSuspects = mysqli_query($conn, $sqlSuspects);

// Create a table for suspects
$pdf->SetFillColor(200, 220, 255); // Set table header fill color
$pdf->Cell(100, 10, 'Suspect Name', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(40, 10, 'Count', 1, 1, 'C', 1); // Table header cell

while ($rowSuspects = mysqli_fetch_assoc($resultSuspects)) {
    $pdf->Cell(100, 10, $rowSuspects['suspect_name'], 1, 0, 'C');
    $pdf->Cell(40, 10, $rowSuspects['count'], 1, 1, 'C');
}

$pdf->Ln(10);

// Display 5 most recent open cases
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(190, 10, 'Recent Open Cases:', 0, 1);
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 12);

$sqlRecentOpenCases = "SELECT * FROM cases WHERE status = 'Open' ORDER BY date DESC LIMIT 5";
$resultRecentOpenCases = mysqli_query($conn, $sqlRecentOpenCases);

// Create a table for recent open cases
$pdf->SetFillColor(200, 220, 255); // Set table header fill color
$pdf->Cell(40, 10, 'Serial No', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(60, 10, 'Date', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(60, 10, 'Suspect', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(30, 10, 'Incident', 1, 1, 'C', 1); // Table header cell

while ($rowRecentOpenCases = mysqli_fetch_assoc($resultRecentOpenCases)) {
    $pdf->Cell(40, 10, $rowRecentOpenCases['id'], 1, 0, 'C');
    $pdf->Cell(60, 10, $rowRecentOpenCases['date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $rowRecentOpenCases['suspect_name'], 1, 0, 'C');
    $pdf->MultiCell(30, 10, $rowRecentOpenCases['incident'], 1, 'C');
}

$pdf->Ln(10);

// Display 5 most recent closed cases
$pdf->SetFont('helvetica', 'B', 14);
$pdf->Cell(190, 10, 'Recent Closed Cases:', 0, 1);
$pdf->Ln(5);
$pdf->SetFont('helvetica', '', 12);

$sqlRecentClosedCases = "SELECT * FROM cases WHERE status = 'Closed' ORDER BY date DESC LIMIT 5";
$resultRecentClosedCases = mysqli_query($conn, $sqlRecentClosedCases);

// Create a table for recent closed cases
$pdf->SetFillColor(200, 220, 255); // Set table header fill color
$pdf->Cell(40, 10, 'Serial No', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(60, 10, 'Date', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(60, 10, 'Suspect', 1, 0, 'C', 1); // Table header cell
$pdf->Cell(30, 10, 'Incident', 1, 1, 'C', 1); // Table header cell

while ($rowRecentClosedCases = mysqli_fetch_assoc($resultRecentClosedCases)) {
    $pdf->Cell(40, 10, $rowRecentClosedCases['id'], 1, 0, 'C');
    $pdf->Cell(60, 10, $rowRecentClosedCases['date'], 1, 0, 'C');
    $pdf->Cell(60, 10, $rowRecentClosedCases['suspect_name'], 1, 0, 'C');
    $pdf->MultiCell(30, 10, $rowRecentClosedCases['incident'], 1, 'C');
}

// Close and output the PDF
$pdf->Output('cases_report.pdf', 'D'); // 'D' parameter will force download the PDF

// Close the database connection
mysqli_close($conn);

?>