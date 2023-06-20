<!DOCTYPE html>
<html>
<head>
    <title>View Officers</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
            $(document).ready(function(){
            $("#myInput").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#myTable tr").filter(function() {
                $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
            });
        </script>
    
</head>
<body>
<header>
    <form method="post" action="">
        <input type="text" name="search_query" id="myInput" placeholder="Search Officer">
        <input type="submit" name="search" value="Search">
    </form>
    <a class="logout-link" href="../home/Officer-incharge_landing_page.php" class="logout-link">Home</a>
</header>

<h1>OFFICERS</h1>
<br>
<table>
    <tr>
        <th>First Name</th>
        <th>Last Name</th>
        <th>Service Number</th>
        <th>Date of Entry</th>
        <th>Officer Rank</th>
        <th>Station</th>
        <th>Edit</th>
        <th>Delete</th>
    </tr>
    <?php
    // connect to database
    session_start();
    include('../db/Connections.php');

    $searchQuery = isset($_POST['search_query']) ? $_POST['search_query'] : '';

    if (isset($_POST['search'])) {
        $escapedSearchQuery = mysqli_real_escape_string($conn, $searchQuery);
        $sql = "SELECT * FROM officers WHERE 
                first_name LIKE '%$escapedSearchQuery%' OR 
                last_name LIKE '%$escapedSearchQuery%' OR 
                service_no LIKE '%$escapedSearchQuery%' OR 
                officer_rank LIKE '%$escapedSearchQuery%' OR 
                station LIKE '%$escapedSearchQuery%'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_assoc($result)) {
                echo "<tr>";
                echo "<td>" . $row["first_name"] . "</td>";
                echo "<td>" . $row["last_name"] . "</td>";
                echo "<td>" . $row["service_no"] . "</td>";
                echo "<td>" . $row["date_of_entry"] . "</td>";
                echo "<td>" . $row["officer_rank"] . "</td>";
                echo "<td>" . $row["station"] . "</td>";
                echo "<td><a href='edit_officer.php?id=" . $row["id"] . "' style='background-color: #3663c9; text-decoration: none; border-radius: 10px;'>Edit</a></td>";
                echo "<td><a href='delete_officer.php?id=" . $row["id"] . "' style='background-color: #d11a2a; text-decoration: none; border-radius: 10px;' onclick='return confirm(\"Are you sure you want to delete this officer?\")'>Delete</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='8'><span style='color: red;'>No matching search: Search again after 10 seconds</span></td></tr>";
            // Set the refresh time to 5 seconds
                $refreshTime = 10;
                
            // Generate the meta tag with the refresh time
            $metaTag = "<meta http-equiv='refresh' content='$refreshTime'>";

            // Output the meta tag
            echo $metaTag;
        }
    } else {
        $sql = "SELECT * FROM officers";
        $result = mysqli_query($conn, $sql);

        while ($row = mysqli_fetch_assoc($result)) {
            echo '<tbody id="myTable">';

            echo "<tr>";
            echo "<td>" . $row["first_name"] . "</td>";
            echo "<td>" . $row["last_name"] . "</td>";
            echo "<td>" . $row["service_no"] . "</td>";
            echo "<td>" . $row["date_of_entry"] . "</td>";
            echo "<td>" . $row["officer_rank"] . "</td>";
            echo "<td>" . $row["station"] . "</td>";
            echo "<td><a href='edit_officer.php?id=" . $row["id"] . "' style='background-color: #3663c9; text-decoration: none; border-radius: 10px;'>Edit</a></td>";
            echo "<td><a href='delete_officer.php?id=" . $row["id"] . "' style='background-color: #d11a2a; text-decoration: none; border-radius: 10px;' onclick='return confirm(\"Are you sure you want to delete this officer?\")'>Delete</a></td>";
            echo "</tr>";
        }
    }

    // Close the connection
    mysqli_close($conn);
    ?>
</table>
<div class="suggestions-container"></div>


<style>
    body {
        margin: auto;
        padding: 0;
        background-color: rgb(0, 109, 139);
        font-family: Arial, sans-serif;
    }

    header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
        min-height: 50px;
        outline: 1px solid white;
        background-color: white;
    }

    form {
        text-align: center;
        margin-top: 10px;
        flex-grow: 1;
    }

    input[type="text"] {
        padding: 7px;
        margin-right: 5px;
        border-radius: 5px;
        border: 3px solid #ccc;
    }

    input[type="submit"] {
        padding: 10px 20px;
        background-color: green;
        color: #fff;
        border: gray;
        border-radius: 10px;
        cursor: pointer;
    }

    .logout-link {
        text-decoration: none;
        color: black;
    }

    .logout-link svg {
        margin-bottom: 0;
        color: red;
    }

    h1 {
        text-align: center;
        margin-top: 20px;
        color: white;
    }

    table {
        border-collapse: collapse;
        width: 90%;
        margin: auto;
        margin-border:
    }

    th, td {
        padding: 10px;
        text-align: center;
    }

    th {
        background-color: #454d59;
        color: #fff;
    }

    tr:nth-child(odd) {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #cbcfd4;
    }

    a {
        display: inline-block;
        padding: 10px 20px;
        color: #fff;
        text-decoration: none;
        margin-right: 20px;
    }

    a:hover {
        font-weight: bold;
    }

    .suggestions-container {
        position: absolute;
        width: 90%;
        margin: auto;
        background-color: #fff;
        max-height: 200px;
        overflow-y: auto;
        box-shadow: 0 2px 5px rgba(0, 0, 0, 0.3);
        z-index: 1;
        display: none;
    }

    .suggestion-item {
        padding: 10px;
        cursor: pointer;
    }

    .suggestion-item:hover,
    .suggestion-item.active {
        background-color: #f2f2f2;
    }
</style>
</body>
</html>
