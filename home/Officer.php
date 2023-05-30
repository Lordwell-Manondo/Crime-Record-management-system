<!DOCTYPE html>
<html>
  <head>
    <title>Officer Page</title>
    <script src="js/bootstrap.js"></script>
    <style>
      body {
        background-color: rgb(0, 109, 139);
        margin: 20px;
      }
      .nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background-color: gray;
        padding: 10px;
      }
      .nav img {
        width: 50px;
        height: 50px;
        border-radius: 5px;
      }
      .nav h1 {
        display: inline-block;
        color: white;
        margin-left: 10%;
        font-size: 24px;
      }
      .nav a {
        font-size: 20px;
        color: white;
        text-decoration: none;
      }
      .nav a:hover {
        font-weight: bold;
        color: khaki;
      }
      .navbar {
        background-color: white;
        border-radius: 5px;
        margin-top: 20px;
        padding: 20px;
      }
      .navbar h2 {
        color: rgb(0, 109, 139);
        font-size: 24px;
        margin-bottom: 20px;
      }
      .navbar li {
        margin-bottom: 10px;
      }
      .navbar a {
        color: rgb(0, 109, 139);
        text-decoration: none;
        font-size: 20px;
      }
      .navbar a:hover {
        font-weight: bold;
      }
      .footer {
        position: absolute;
        bottom: 0;
        width: 100%;
        background-color: gray;
        color: white;
        text-align: center;
        padding: 10px;
      }
      .footer span {
        font-size: 16px;
      }
    </style>
  </head>
  <body>
    <main>
      <div class="nav">
        <img src="policeLog.PNG">
        <h1>CRIME RECORD MANAGEMENT SYSTEM</h1>
        <a href="Home.php">Logout</a>
      </div>
      <nav class="navbar">
        <h2>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a class="nav-link" href="#">Assigned work</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="../cases/View-cases-officer.php">View cases</a>
            </li>
          
            <li class="nav-item">
              <a class="nav-link" href="../changepass/change-password-officer.php">Change Password</a>
            </li>
          </ul>
        </h2>
      </nav>
    </main>
<style>
  .footer {
  position: absolute;
  bottom: 0.5;
  width: 100%;
  height: 30px;
  color: white; 
  background-color: rgb(0, 109, 139);
}
</style> 
<br><br><br><br>
<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6">
      </div>
      <div class="col-md-6">
        <p>CRMS is a crime record management system designed to help law enforcement agencies keep track of criminal activity and investigations.</p>
      </div>
    </div>
    <hr>
    <p class="text-muted">&copy; CRMS2023. All rights reserved.</p>
  </div>
</footer>

  
  </body>
</html>
