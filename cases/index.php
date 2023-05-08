<?php include './cases.php'; ?>

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
        <!-- Left side bar -->
        <div class="left-side-bar">
            <h3>SUSPECTS</h3>
            <ul class="suspects">
                <?php echo $suspects;?>
            </ul>
        </div>

        <!-- Main content area -->
        <div class="main-content">
            <div class="cases-head">
                <h2>Recorded Cases</h2>
                <form method="get" class="search">
                    <input type="search" name="query" placeholder="Search case...">
                    <input type="submit" name="search" value="Search">
                </form>

                <div>Update Case</div>
            </div>
            <table>
                <thead>
                    <tr>
                        <th>Case Serial No</th>
                        <th>Suspect Name</th>
                        <th>Victim Name</th>
                        <th>Case Type</th>
                        <th>Incident</th>
                        <th>Location</th>
                        <th>Date</th>
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