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
    
        <script>
              window.addEventListener('DOMContentLoaded', () => {
            const words = document.querySelectorAll('.word');
            let currentIndex = 0;

            setInterval(() => {
                words[currentIndex].classList.remove('show');

                if (currentIndex === words.length - 1) {
                    words[0].classList.add('show');
                    currentIndex = 0;
                } else {
                    words[currentIndex + 1].classList.add('show');
                    currentIndex++;
                }
            }, 4000);
        });
    </script>

    <style>
         body {
        background-color:white;
         }     
        
        .navbar-nav .nav-link {
            margin-left: 90px;
            margin-right: 60px;
            margin-top: 5px;
            font-size: 20px;
            spacing: 2px;
        }

       

        .news-container {
            margin: 10px;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: white;
            width: 800px;
            height: 600px;
            display: inline-block;
            overflow: hidden;
        }

        .news-title {
            font-size: 20px;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .news-date {
            font-size: 14px;
            color: #888;
            margin-bottom: 5px;
        }

        .news-details {
            margin-bottom: 15px;
        }

        .news-image {
            max-width: 200px;
            max-height: 200px;
            margin-top: 10px;
        }

        .news-container-wrapper {
            width: 100%;
            overflow-x: scroll;
            white-space: nowrap;
        }
        
        h1, h4 {
            text-align: center;
            color: rgb(0, 109, 139);;
        }
        
        main {
            margin-top: 0;
        }
        .footer {
        background-color: black;
        color: white;
        text-align: center;
        padding: 20px 0;
        }

            
        @keyframes moveText {
            0% {
                transform: translateX(100%);
                opacity: 0;
            }
            40%, 60% {
                opacity: 1;
            }
            100% {
                transform: translateX(-100%);
                opacity: 0;
            }
        }

        .moving-text {
            white-space: nowrap;
            animation: moveText 10s linear infinite;
       
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
</head>
<body>
  
    

                    <!-- Main content -->
<div class="content">
  
  <!-- Header -->
  <header>
      <!-- Header content -->
      <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " style="background-color: black;">
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
                  <a  class="nav-link" style="color: white;" href="guidelines.php">Guidelines</a>
                  
                  </li>
                  <li class="nav-item">
                  <a class="nav-link" style="color: white;" href="ReportForm.php">Report incident</a>
                  </li>
                

                  <li class="nav-item dropdown">
                <a class="nav-link" href="#" id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true"
                    aria-expanded="false">
                    <i class="fas fa-user" style="font-size: 30px; width: 60px; background-color: transparent;"></i>
                    </a>
                <!-- submenu for profile -->
                <ul class="dropdown-menu" style="background-color: transparent;">
                    <li><a class="nav-link" style="color: white;" href="../login/Login.php">Login</a></li>            
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
    <div class="moving-text">     
        <span class="word show">Creating</span>
        <span class="word">a</span>
        <span class="word">Safe</span>
        <span class="word">and</span>
        <span class="word">Secure</span>
        <span class="word">Malawi</span>
    
    </div>
  </main>
</div>
<div>
     <!-- Include the news details from display.php -->
     <?php
    include('display.php');
    ?>
      <!-- Your crime record management system content goes here -->
  </main>
</div>
<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<?php include('footer.html');?>

</body>

</html>