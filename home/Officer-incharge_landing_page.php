
<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer in-charge </title>

 
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    
</head>

<body>

  <style>
    body {
      background-color: rgb(0, 109, 139);
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
      color: khaki;
      font-weight: 300;
      margin-top: 14%;
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
    
    @media (max-width: 768px) {
      .navbar-nav {
        flex-direction: column;
      }

      .navbar-nav .nav-item {
        margin: 10px 0;
      }
      

      .navbar-toggler {
        margin-left: auto;
      }
    }

    .dropdown-menu {
      background-color: transparent;
     width: 100%;  
    }

      .dropdown-item{
            color: white;
             font-size: 100%;
           
         }  
         .footer {
        width: 100%;
        color: white;
        text-align: center;
        padding: 10px;
  position: absolute;
  bottom: 0;
  height: 30px;
  background-color: rgb(0, 109, 139);
}
      .footer span {
        font-size: 16px;
      }
     
  </style>



<?php include('officer_incharge_session.php');?>
  
  <!-- <?php include ('Notifications.php'); ?>  -->
  

  <!-- Navbar -->

  <nav class="navbar navbar-expand-lg " style="background-color: black;">
    <div class="log">
      <img src="plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
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
            <li><a class="dropdown-item"  href="../cases/Record_case.php">Record case</a></li>
            <li><a class="dropdown-item"  href="../cases/View_cases.php">View cases</a></li>
            <li><a class="dropdown-item"  href="../cases/cases_statistics.php">Cases trend</a></li>
            <li class="nav-item">
              <a class="nav-link" href="../db/report.php">
                <i class="fas fa-file-download" tooltip="Generate Report" style="font-size: 20px; color: white; margin-left: 15px;">PrintReport</i>
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
            <li><a class="dropdown-item"  href="../officers/view_officers.php">View officers</a></li>
          </ul>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" style="color: white;" href="#" id="dutiesDropdown" role="button" data-toggle="dropdown"
            aria-haspopup="true" aria-expanded="false">
            Duties
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550;"></i>
          </a>
          <!-- submenu for duties -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item"  href="../duty/assign_duty.php">Assign duties</a></li>
            <li><a class="dropdown-item"  href="../cases/View-assigned-cases.php">Assigned duties</a></li>
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
            <li><a class="dropdown-item"  href="add-guidelines.php">Add new</a></li>
            <li><a class="dropdown-item"  href="view-guidelines.php">View Guidelines</a></li>
          </ul>
        </li>

        <li class="nav-item">
          <a class="nav-link" style="color: white;" href="Notifications.php">Notifications (<span id="notification-count"><?php echo mysqli_num_rows($result); ?></span>)</a>
        </li>

        <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-user" style="font-size: 30px;"></i>
            <span style="color: white; font-size: 15px;"> <?php echo $name; ?></span>
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>
            
          </a>
          
          <!-- submenu for profile -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item" style=" font-size: 100%; " href="../changepass/change-password-officer-incharge.php">Change password</a></li>
            <li><a class="dropdown-item" style=" font-size: 100%; " href="#">View profile</a></li>
            <li><a class="dropdown-item" style=" font-size: 100%; " href="logout.php">Logout</a></li>
          </ul>
        </li>
        <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="#"></a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="#"></a>
                  </li>
                  
                  
      </ul>
    </div>
  </nav>

  
<h1>CRIME RECORD MANAGEMENT SYSTEM</h1>
  <h4>Creating a Safe and Secure Malawi.</h4>

  
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
 
<br><br><br><br>
<footer class="footer">
  <div class="container">

     <hr style="color: white;">
    <p class="text-muted">&copy; CRMS2023. All rights reserved.</p>
  </div>
</footer>



</body>
</html>
