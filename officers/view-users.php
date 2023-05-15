<html>
<head>
	<title>View Users</title>
</head>
<body>
    <header>
    <form method="post" action="" style="margin-left: 0;">
      <input type="text" name="user_name" placeholder="Use username">
        <input type="submit" name="search" value="Search">
      </form>

      <a href="Admin_landing_page.html" class="logout-link">Back</a>
      
    </header>

  <h1>Users</h1>
	<br>
	<table>
		<tr>
			<th>Name</th>
			<th>User Name</th>
		</tr>
		<?php
		// connect to database
		session_start();
		include('../db/Connections.php');

		if(isset($_POST['search'])) {
			$user_name = $_POST['user_name'];
			$sql = "SELECT * FROM users WHERE user_name='$user_name'";
		} else {
			$sql = "SELECT * FROM users";

		}

		$result = mysqli_query($conn, $sql);

		if(mysqli_num_rows($result) > 0){
			while ($row = mysqli_fetch_assoc($result)) {
				echo "<tr>";
				echo "<td>" . $row["name"] . "</td>";
				echo "<td>" . $row["user_name"] . "</td>";
			}
		} 
        else 
        {
			echo "<span style='color: khaki;'>No matches with any User!</span>";
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
