<html>
<head>
	<title>View Officers</title>
  
</head>
<body>
    <header>
    <form method="post" action="" style="margin-left: 0;">
      <input type="text" name="employee_number" placeholder="Use Employee Number">
        <input type="submit" name="search" value="Search">
      </form>

      <a href="Admin_landing_page.html" class="logout-link"">
      <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-left: 65px;">
     <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
      <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
     </svg> 
     <p >Logout</p> 
    </a>
      
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
		include('Connections.php');
		include('Functions.php');

		if(isset($_POST['search'])) {
			$employee_number = $_POST['employee_number'];
			$sql = "SELECT * FROM officers WHERE employee_number='$employee_number'";
		} else {
			$sql = "SELECT * FROM officers";

		}

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["first_name"] . "</td>";
				echo "<td>" . $row["last_name"] . "</td>";
				echo "<td>" . $row["employee_number"] . "</td>";
				echo "<td>" . $row["date_of_entry"] . "</td>";
				echo "<td>" . $row["officer_rank"] . "</td>";
				echo "<td>" . $row["station"] . "</td>";
        echo "<td><a href='edit_officer.php?id=" . $row["id"] . "' style='background-color: blue; text-decoration: none;'>Edit</a></td>";
				echo "<td><a href='delete_officer.php?id=" . $row["id"] . "' style='background-color: red; text-decoration: none;'' onclick='return confirm(\"Are you sure you want to delete this officer?\")'>Delete</a></td>";
				echo "</tr>";
			}
		} else {
			echo "<span style='color: red;'>NO MATCH WITH ANY OFFICER NUMBER</span>";
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
    margin: 0;
    padding: 0;
    background-color: rgb(0, 109, 139);
    font-family: Arial, sans-serif;
  }


    header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 10px;
    }

    form {
        /* display: left; */
        align-items: left;
        justify-content: left;
        flex-grow: 1;
    }

    input[type="text"] {
        padding: 5px;
        margin-right: 5px;
        border-radius: 3px;
        border: 1px solid #ccc;
    }

    input[type="submit"] {
        padding: 5px 15px;
        background-color: #4CAF50;
        color: white;
        border: none;
        border-radius: 3px;
        cursor: pointer;
    }
    .logout-link {
        display: flex;
        align-items: center;
        text-decoration: none;
        color: black;
    }

    .logout-link svg {
        width: 25px;
        height: 25px;
        fill: currentColor;
        margin-right: 5px;
    }

    .logout-link p {
        font-size: 15px;
        margin-right: 20px;
    }

   


  h1 {
    text-align: center;
    margin-top: 20px;
    color: white;
  }

  form {
    text-align: center;
    margin-top: 20px;
  }

  table {
    border-collapse: collapse;
    width: 100%;
    margin: 0 20px 0 20px;
  }

  th, td {
    padding: 10px;
    text-align: center;
  }

  th {
    background-color: #333;
    color: #fff;
  }

  tr:nth-child(even) {
    background-color: #f2f2f2;
  }

  a {
    display: inline-block;
    padding: 10px 20px;
    /* background-color: #333; */
    color: #fff;
    text-decoration: none;
    margin-right: 20px;
  }

  a:hover {
  font-weight: bold;
  }

  input[type="text"] {
    padding: 10px;
    margin-right: 10px;
    border-radius: 5px;
    border: 1px solid #ccc;
  }

  input[type="submit"] {
    padding: 10px 20px;
    background-color: green;
    color: #fff;
    border: none;
    border-radius: 5px;
    cursor: pointer;
  }
</style>
</body>
</html>
