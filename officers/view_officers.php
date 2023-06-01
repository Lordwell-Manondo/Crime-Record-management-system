<html>
<head>
	<title>View Officers</title>
  
</head>
<body>
    <header>
    <form method="post" action="" style="margin-left: 0;">
      <input type="text" name="service_no" placeholder="Use employee number">
        <input type="submit" name="search" value="Search">
      </form>

      <a class="logout-link" href="../home/Admin_landing_page.php" class="logout-link">Home</a>  
</header>

  <h1>OFFICERS</h1>
	<br>
	<table>
		<tr>
			<th>First Name</th>
			<th>Last Name</th>
			<th>Employee Number</th>
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
    // Create a new instance of the Connection class
    $connection = new Connection();
    
    // Call the connect() method to establish a database connection
      $conn = $connection->connect();


		if(isset($_POST['search'])) {
			$service_no = $_POST['service_no'];
			$sql = "SELECT * FROM officers WHERE service_no='$service_no'";
		} else {
			$sql = "SELECT * FROM officers";

		}

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["first_name"] . "</td>";
				echo "<td>" . $row["last_name"] . "</td>";
				echo "<td>" . $row["service_no"] . "</td>";
				echo "<td>" . $row["date_of_entry"] . "</td>";
				echo "<td>" . $row["officer_rank"] . "</td>";
				echo "<td>" . $row["station"] . "</td>";
        echo "<td><a href='edit_officer.php?id=" . $row["id"] . "' style='background-color: #3663c9; text-decoration: none; border-radius: 10px;'>Edit</a></td>";
				echo "<td><a href='delete_officer.php?id=" . $row["id"] . "' style='background-color: #8f1907; text-decoration: none; border-radius: 10px;
        cursor: pointer;'' onclick='return confirm(\"Are you sure you want to delete this officer?\")'>Delete</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<span style='color: red;'>NO MATCH WITH ANY OFFICER EMPLOYEE NUMBER</span>";
        // Set the refresh time to 5 seconds
          $refreshTime = 5;

          // Generate the meta tag with the refresh time
          $metaTag = "<meta http-equiv='refresh' content='$refreshTime'>";

          // Output the meta tag
          echo $metaTag;
		}

// Close the connection
mysqli_close($conn);
?>
	</table>
	<br>
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
        background-color: whil;
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
</style>
</body>
</html>
