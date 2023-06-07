<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Officer</title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

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
      color: darkgray;
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
      width: 60px;
      }
      .dropdown-item{
            color: white;
         } 
         h2{
            color: khaki;
            font-family: font-family: Arial, Helvetica, sans-serif;
            text-align: center;
            margin-top: 100px;
         } 
</style>
</head>
<body>
   <!-- Main content -->
<div class="content">
  
  <!-- Header -->
  <header>
      <!-- Header content -->
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-secondary">

    <div class="log">
          <img src="plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
      </div>
      
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
          </li>
                  <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="../duty/officer_duties.php">Assigned cases</a>
                  </li>
              <li class="nav-item ">
                  <a class="nav-link" style="color: white;" href="../cases/View-cases-officer.php">View cases</a>
                </li>


                  <li class="nav-item dropdown">
          <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
            aria-expanded="false">
            <i class="fas fa-user" style="font-size: 30px;"></i>
            <i class="fas fa-angle-down" style="margin-left: 5px; color: white; font-size: small; font-weight: 550; transition: transform 0.3s;"></i>
          </a>
          <!-- submenu for profile -->
          <ul class="dropdown-menu" aria-labelledby="submenu">
            <li><a class="dropdown-item" style="font-size: 100%; " href="../changepass/change-password-officer-incharge.php">Change password</a></li>
            <!-- <li><a class="dropdown-item" style="font-size: 100%; " href="#">View profile</a></li> -->
            <li><a class="dropdown-item" style="font-size: 100%; " href="logout.php">Logout</a></li>
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
  </header>
  <!-- Page content -->
  
</head>
<body>
  <h2>CRIME RECORD MANAGEMENT SYSTEM</h2>


</main>
</div>
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include Adminator JS -->
<script src="path/to/adminator.js"></script>
</body>
</html>
