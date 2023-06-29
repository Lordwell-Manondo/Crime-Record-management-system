<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer in-charge </title>

 
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    
 
    
</head>

<body>

  <style>
    body {
      background-color: white;
    }

    a {
      padding: 10%;
      font-size: 20px;
      margin-right: 30px;
      font-weight: 400;
      color: white;
      text-decoration: none;
      display: flex;
    }

    h1 {
      color: gold;
      font-weight: 1000;
      margin-top: 10%;
      text-align: center;
    }

    h4 {
      color: white;
      font-weight: 300;
      text-align: center;
      margin-top: 12%;
    }

    a:hover {
      color: aliceblue;
      text-decoration: none;
      font-weight: 600;
    }

    i {
      color: gray;
    }
   
.fas .fa-angle-down:hover {
  transform: rotate(180deg);
}
    
    @media (max-width: 768px) {
      .navbar-nav {
        flex-direction: column;
      }

      .navbar-nav .nav-item {
        margin: 10px 0;
      }
    }

    .dropdown-menu {
      background-color: rgb(0, 109, 139);;
     width: 100%;  
    }

      .dropdown-item{
            color: white;
             font-size: 100%;   
         }  
 .navbar-toggler {
        margin-left: auto;
      }
  .navbar-toggler-icon {
    background-color: white;
  }

  .navbar-toggler {
    border-color: white;
  }
  </style>



<?php include('officer_incharge_session.php');?>
  
  <!-- <?php include ('Notifications.php'); ?>  -->
  

  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: rgb(0, 109, 139);">
    <div class="log">
      <img src="policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon" ></span>
    </button>

    
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">

     
        <li class="nav-item dropdown">
          <a class="nav-link" style="color: white;" href="#" id="casesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Cases
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550;"></i>
          </a>
          <!-- submenu for cases -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item"  href="../cases/Record_case.php">Register case</a></li>
            <hr>
            <li><a class="dropdown-item"  href="../cases/View_cases.php">View cases</a></li>
            <hr>
            
            <li class="nav-item">
              <a class="nav-link" href="../report">
                <i tooltip="Generate Report" style="font-size: 20px; color: white; margin-left: 15px;">Report</i>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" style="color: white;" href="#" id="officersDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Officers
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550;"></i>
          </a>
          <!-- submenu for officers -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item"  href="../officers/add_officer.php">Add officers</a></li>
            <hr>
            <li><a class="dropdown-item"  href="../officers/view_officers.php">View officers</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" style="color: white;" href="#" id="dutiesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            News
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550;"></i>
          
          </a>
          <!-- submenu for duties -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item"  href="../news/news2.php">Add news</a></li>
            <hr>
            <li><a class="dropdown-item"  href="#">View news</a></li>
          </ul>
        </li>
          
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link" style="color: white;" href="#" id="dutiesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Guidelines
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550;"></i>
          </a>
          <!-- submenu for duties -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item"  href="add-guidelines.php">Add Guidelines</a></li>
            <hr>
            <li><a class="dropdown-item"  href="view-guidelines.php">View Guidelines</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="Notifications.php">Notifications (<span id="notification-count"><?php echo mysqli_num_rows($result); ?></span>)</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-user" style="font-size: 30px; color: white;"></i>
            <span style="color: white; font-size: 15px;"> <?php echo $name; ?></span>
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>
            
          </a>
          
          <!-- submenu for profile -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item" style=" font-size: 100%; " href="../changepass/change-password-officer-incharge.php">Change password</a></li>
            <hr>
            <li><a class="dropdown-item" style=" font-size: 100%; " href="#">View profile</a></li>
            <hr>
            <li><a class="dropdown-item" style=" font-size: 100%; " href="logout.php">Logout</a></li>
          </ul>
        </li>
      
         </ul>
    </div>
  </nav> 

<h1>CRIME RECORD MANAGEMENT SYSTEM</h1>


<!-- Add your important content here -->
<div class="container" style="text-align: center;">
  <div class="row">
    <div class="col-md-12">
      <div class="alert alert-info" role="alert">
        <strong>Important:</strong> Our mission is to create a safe and secure community. <br> <br>
        Together, let's work towards reducing crime and ensuring the well-being of everyone. <br><br>Remember to stay vigilant and report any suspicious activities to the authorities. <br><br>Together, we can make a difference!
      </div>
    </div>
  </div>
</div>

</body>
</html>
