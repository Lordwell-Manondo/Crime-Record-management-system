<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home page </title>
    <!-- Include Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
</head>
    <style>
        body {
            background-color: rgb(0, 109, 139);
            margin-bottom: 15%;
          
            
        }
        
        a {
            padding: 10%;
            font-size: 20px;
            margin-right: 70px;
            font-weight: 400;
            color: white;
            text-decoration: none;
            display: flex;
        }
        
        
        h1 {
            color: khaki;
            font-weight: 300;
            margin-top: 200px;
            text-align: center;
        }
        
        h4 {
            color: white;
            font-weight: 300;
            text-align: center;
            margin-top: -180px;
        }
        
        a:hover {
            font-weight: 300;
            color: aliceblue;
            text-decoration: none;
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
        .dropdown-menu{
            background-color: transparent;
            width: 90px;
            }
            footer {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 20%;
            background-color: rgb(184, 179, 137);
            padding: 20px;
            color: #fff;
            text-align: center;
            font-size: 14px;
        }
        
        .contact {
            text-align: start;
            margin-left: 3%;
            font-size: 100%;
            padding: 0%;
            height: fit-content;
        }
        
        
        @media (max-width: 576px) {
            .contact {
                text-align: center;
                margin-left: 0;
            }
        }
        @media (max-width: 576px) {
            h1 {
                font-size: 24px;
            }
            
            h4 {
                font-size: 14px;
            }
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
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <div class="log">
          <img src="plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
      </div>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav ml-auto">
              <li class="nav-item dropdown">
                  <a  class="nav-link" style="color: white;" href="#"  id="home" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Home</a>
                 
              </li>
              <li>
                  <a class="nav-link" style="color: white;" href="../news/News.php">News</a>
              </li>
                  <li class="nav-item dropdown">
                  <a  class="nav-link" style="color: white;" href="#"  id="duties" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Guidelines</a>
                  
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="ReportForm.php">Report incident</a>
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="#">FAQ</a>
                  </li>

                  <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-user" style="font-size: 30px; width: 60px; background-color: transparent;"></i>
                    </a>
                <!-- submenu for profile -->
                <ul class="dropdown-menu" style="background-color: transparent;">
                    <li><a class="nav-link" style="color: white;" href="../login/Master_login_register.php">Login</a></li>            
                </ul>
                </li>
                </li>
                  
                 </ul>
                  </div>
                  </nav>
  </header>
 
  <!-- Page content -->
  <main>
   
    <h1 >CRIME RECORD MANAGEMENT SYSTEM<h1>
      <h4 >Creating a Safe and Secure Malawi.</h4>
      <!-- Your crime record management system content goes here -->
  </main>
</div>
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


</body>

</html>