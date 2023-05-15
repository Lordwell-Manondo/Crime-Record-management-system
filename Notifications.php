<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifications (<?php echo mysqli_num_rows($result); ?>)</title>
    <style>
       <style>
  /* Style the links as buttons */
  button {
    border: none;
    background-color: #007bff;
    color: #fff;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
  }
  
  /* Style the container for the messages */ 

    .message {
    margin: 10px auto;
    max-width: 700px;
    height: 90px;
    margin-bottom: 10px;
    background-color: #fff;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 10px;
    box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);



  }
  
  /* Style the title link */
  .title a {
    font-size: 16px;
    font-weight: bold;
    color: #000;
    text-decoration: none;
    display: block;
    margin-bottom: 5px;
  }
  
  /* Style the info section */
  .info {
    font-size: 14px;
    color: #666;
    margin-bottom: 5px;
  }
  
  /* Style the read more link */
  .read-more {
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
    cursor: pointer;
  }
  
  /* Style the full message display */
  .full-message {
    display: none;
    font-size: 14px;
    color: #666;
    margin-top: 10px;
  }
  
  /* Style the hide full message button */
  .hide-full-message {
    font-size: 14px;
    color: #007bff;
    text-decoration: none;
    cursor: pointer;
    margin-top: 10px;
  }
  
  /* Add this rule to set the background color of the outside container */
  body {
    background-color: rgb(0, 109, 139);

  }

  /* Style the unread notifications */
h1 {
  color: gold;
  text-align: center;
}

</style>

</head>
<body>
    <?php
    // Connect to the MySQL database
    include('Connections.php');

    // SQL statement
    $sql = "SELECT * FROM reportform";

    // Step 3: Execute the SQL statement
    $result = mysqli_query($conn, $sql);

    // Step 4: Fetch the data

    // check if the data is available in the database

    echo '<h1>Notifications ('. mysqli_num_rows($result) .')</h1>';
    echo '<div class="data-container">';
    if (mysqli_num_rows($result) > 0) {
        // display the recorded cases of each row
        $count = 1;
        while ($row = mysqli_fetch_array($result)) {
            // Use the retrieved data as desired
            echo '<div class="message">';
            echo '<div class="title"><a href="#">' . $row["name"] . '</a></div>';
            echo '<div class="info">';
            echo '<div><strong>Phone: </strong>' . $row["phone"] . '</div>';
            echo '<div><strong>Date: </strong>' . $row["date"] . '</div>';
            echo '<div><strong>Location: </strong>' . $row["location"] . '</div>';
            echo '</div>';
           

            if (strlen($row["incident"]) > 2) {
                echo '<div class="read-more">Read More</div>';
                echo '<div class="full-message">' . $row["incident"] . '</div>';

           

            } else {
                echo '<div class="description">' . $row["incident"] . '</div>';
            }


            echo'</div>';

            $count++;
        }
    } 
    // Step 5: Close the database connection
    mysqli_close($conn);

    ?>

    <script>
        // Show the full message when Read More link is clicked
    
        var readMoreLinks = document.getElementsByClassName('read-more');
        for (var i = 0; i < readMoreLinks.length; i++) {
            readMoreLinks[i].addEventListener('click', function() {
                var parentMessage = this.parentElement;
                var fullMessage = parentMessage.getElementsByClassName('full-message')[0];
                fullMessage.style.display = 'block';
                this.style.display = 'none';
            });
        }
    </script>
</body>
</html>
