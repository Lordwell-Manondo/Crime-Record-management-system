<!DOCTYPE html>
<html>
  <head>
    <title>Admin_page</title>
    <head>
      
        <!-- Add the Bootstrap CSS file -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

<!-- Bootstrap CSS -->
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNVeGfN" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

    
  
</head>
  <body>
   
  

<main>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
       
          <header>
            <nav class="navbar">

                <h2> 
                   <ul class="navbar-nav" >
                        <div class="log">
                           <img src="plog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px; margin-left: 0px; margin-top: 0px;">
                        </div>
           
                               <li class="nav-item dropdown">
                                    <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   style="color: rgb(19, 17, 17);">
                                         Cases
                                       </a>
                                      <div  class="dropdown-menu" style="margin-left: 50px;" aria-labelledby="navbarDropdown">
                                  <a class="dropdown-item" href="../cases/Record_case.php" style="font-size: 20px; font-weight: 100; ">Record case</a>
                                 <a class="dropdown-item" href="../cases/View_cases.php"    style="font-size: 20px; font-weight: 100;">View cases</a>
                                 <a class="dropdown-item" href="../cases/View-assigned-cases.php"    style="font-size: 20px; font-weight: 100;">View  assigned cases</a>
                                 <a class="dropdown-item" href="../cases/cases_bargraph.php"    style="font-size: 20px; font-weight: 100;">Cases trend</a>
                                </div>
                          </li>
                
                          <li class="nav-item dropdown">
                            <a  class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   style="color: rgb(19, 17, 17);">
                                 Officers
                               </a>
                              <div  class="dropdown-menu" style="margin-left: 50px;" aria-labelledby="navbarDropdown">
                          <a class="dropdown-item" href="../officers/add_officer.php" style="font-size: 20px; font-weight: 100; ">Add officers</a>
                         <a class="dropdown-item" href="../officers/view_officers.php"    style="font-size: 20px; font-weight: 100;">View officers</a>

                        </div>
                  </li>

              <li class="nav-item" >
                       <a class="nav-link" href="../duty/assign_duty.php"  style="color: rgb(19, 17, 17); margin-left: 50px;"  >Assign work</a>
              </li>
              
             
              <li class="nav-item"  >
                       <a class="nav-link" href="../news/News2.php"  style="color: rgb(19, 17, 17);" >Add news</a>
              </li>
             
            <li class="nav-item">
             <a class="nav-link" href="../officers/view-users.php"  style="color: rgb(19, 17, 17);"  >Public Users</a>

             </li>
            <li style="margin-left: 10px; margin-top: -25px;">
              <a class="nav-link" href="../Notifications.php">
                <svg class="notification" xmlns="http://www.w3.org/2000/svg" style="margin-top: -15px; font-weight: 500;" width="25" height="25" fill="currentColor" class="bi bi-bell-fill" viewBox="0 0 16 16">
                  <path d="M8 16a2 2 0 0 0 2-2H6a2 2 0 0 0 2 2zm.995-14.901a1 1 0 1 0-1.99 0A5.002 5.002 0 0 0 3 6c0 1.098-.5 6-2 7h14c-1.5-1-2-5.902-2-7 0-2.42-1.72-4.44-4.005-4.901z"/>
                </svg><span class="badge badge-danger">2</span>
                <p style="font-size: 20px; margin-left: -20px; color: rgb(19, 17, 17); ">Notifications  </p>
                
              </a>
            </li>
                    
                <li class="nav-item dropdown"  style="margin-left: 30px;margin-top: -40px;  color: rgb(19, 17, 17);">
                <a class="nav-link" href="#"  ><svg  class="login" xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16" >
                        <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                        <path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z"/>
                          </svg>
                          <p style="font-size: 20px; margin-left: -5px; color: rgb(19, 17, 17);">Account</p>
                        
                          
                            <a   style="margin-left: 120px; margin-top: -95px;" class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"   style="color: rgb(19, 17, 17); margin-left: 1px;">
                            </a>   
                              <div class="dropdown-menu">
                                            <a class="dropdown-item" href="../changepass/change-password-admin.php" style="font-size: 20px; font-weight: 100; ">Change password</a>
                                           <a class="dropdown-item" href="#" style="font-size: 20px; font-weight: 100;">View profile</a>
                                   </div>
                                     
                               </li> 
                            </div>
                          </ul>
                      </h2>

                      <a href="logout.php"> <svg class="logout"  xmlns="http://www.w3.org/2000/svg" width="30" height="35" fill="gray" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-left: 1275px; margin-top: -140;">
                            <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                            <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                          </svg> <p style="font-size: 13px; color: black;  font-weight: 15px; margin-left: 1270px; margin-top: -70px;">Logout</p></a>
              
                    </nav>
                  
                   
                 </header>
             <nav>
         <div>
    </main>
   
  <h1>CRIME RECORD MANAGEMENT SYSTEM<h1>
    <h3>Creating a Safe and Secure Malawi.</h3>
  <style>
    h1{
      color: khaki;
      font-weight: 300;
      margin-top: 200px;
      text-align: center;
      
    }
   
    h3{
      color: white;
      font-weight: 300;
      text-align: center;
      margin-top: -180px;
      
    }

    body{
      background-color: rgb(0, 109, 139);
    }
    
    .notification:hover{
      font-weight: 1000;
      color: #1e1d1d;
    }
    a:hover{
      font-weight: 300;
    }
    svg:hover{
    font-weight: bold;
     color: black;
    }
   
    hr{
     background-color: white;
    }
    .nav-top{
   padding: 1px;
   height: 24px;
 }

  .nav-link{
  font-size: 20px;
  margin-left: 50px;
  font-weight: 500;
  padding: 30px;
  font-family: system-ui, -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;

   }
   .signout{
    margin-left: 1200;
   }
h2{
  height: 45px ;
}
 </style>
  <div>
    <script>
      function openPopup() {
        // Add code to create and show the pop-up window or modal here
        Notifications
      }
    </script>
 </body>

    <footer class="footer">
  <div class="container">
    <span class="text-muted" ></span>
  </div>
</footer>
</html>