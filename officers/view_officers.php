<!DOCTYPE html>
<html>
<head>
    <title>View Officers</title>
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/css/bootstrap.min.css">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">


        <!-- Include Bootstrap JS -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        <nav class="navbar navbar-expand-lg" style="background-color: rgb(0, 109, 139);">
                <div class="log">
                <img src="../home/plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
            </div>
        <!-- <span class="recordedcases">My Duties</span> -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        
            <form method="post" action="">
                <input type="text" name="search_query" id="myInput" placeholder="Search Officer">
                </form>
                    <li class="nav-item dropdown">
                            <a  class="nav-link" href="#"  id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fas fa-user" style="font-size: 25px; margin-left: 90px; color: darkgray;"></i>
                                <!-- <?php echo $myname; ?> -->
                                <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>

                            </a>
                            <!-- submenu for profile -->
                            <ul class="dropdown-menu" aria-labelledby="submenu">
                            <li><a class="dropdown-item" style=" font-size: 100%;" href="../home/home.php">Logout</a></li>
                            </ul>
                            </li>
            </nav>
</header>
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
        background-color: white;
        font-family: Arial, sans-serif;
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
        margin-bottom: 20%;
        margin-left: 5px;
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
<?php include('../home/footer.html');?> 
</html>
