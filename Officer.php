<?php
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Officer Page</title>
    <head>
     <script src="js/bootstrap.js"></script>
     <link rel="stylesheet" href="HomeStyling.css">
     <link rel="stylesheet" href="Admin_landing_page.css">
     
  </head>
  <body>
    
    <main>
       
      <div class="nav">

      

      
         
        <header>
       
       
        <nav class="navbar">
        <div style="background-color: gray">
        <img src="policeLog.PNG" style="display: inline-block; width: 5%; height: 5%; margin-left: 1%; border-radius: 5px; margin-top: 1%">
        <h1 style="display: inline-block; color: white; margin-left: 25%">CRIME RECORD MANAGEMENT SYSTEM</h1>
        <a href="Home.html"   style="margin-left: 300px;">Logout</a>
      </div>
        <hr>

         <h2> 

            <ul class="navbar-nav" >

               <!-- <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
              </svg> -->
              <li class="nav-item" >
                <a class="nav-link" href="#">View Assigned work</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="#">View cases</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="#">Report Work</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="ReportForm.php">Report incident</a>
              </li>
              <li class="nav-item" >
                <a class="nav-link" href="#">Notifications</a>
              </li>

              
            </ul>
            </h2>
                  
        </nav>

      </header>
      <div>
     </main>
     <style>
       a:hover{
    font-weight: bold;
    color: khaki;
    
  }
  .nav-link{
  font-size: 22px;
    font-weight: lighter;
    
  }
 
     </style>
  
    </body>

    <script>

const menuIcon = document.getElementById('svg');

menuIcon.addEventListener('click', function() {
  // Add code here to perform the desired action when the icon is clicked
});

    </script>

<footer class="footer">
  <div class="container">
    <span class="text-muted" >&copy; @CRMS2023.</span>
  </div>
</footer>
</html>