<?php
?>
<!DOCTYPE html>
<html>
<head>
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
</head>
<body>
  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg" style="background-color: black;">
    <div class="log">
      <img src="../home/policeLog.PNG" style="height: 65px; width: 65px; margin-left: 5px; border-radius: 25px;  margin-top: 0px;">
      <h2>Assigned cases</h2>
    </div>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav"
      aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
         <!-- Add your navbar items here -->
      </ul>
    </div>
  </nav>

  <!-- Content -->
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="text-center mt-5">
            <br>
          <h3 class="text-white">THE DUTY HAS BEEN SUCCESSFULLY ASSIGNED</h3><br>
          <p class="text-white">You may view all assigned cases</p>
          <a href="../cases/View-assigned-cases.php" class="btn btn-primary btn-lg">View</a>
        </div>
      </div>
    </div>
  </div>

  <style>
    body {
      background-color: white;
    }

    .navbar {
      background-color: rgb(0, 109, 139);
    }

    .log img {
      height: 65px;
      width: 65px;
      margin-left: 5px;
      border-radius: 25px;
      margin-top: 0px;
    }

    h3{
      color: white;
      font-weight: 400;
      margin-top: 60px;
      margin-left: auto;
      margin-right: auto;
      width: fit-content;
    }

    p {
      color: white;
      text-align: center;
      font-size: 25px;
    }
    h2{
        color: white;
        margin-left: 400px;
        margin-top: -50px;
        word-spacing: 10px;
    }
  </style>

  <!-- Bootstrap Scripts -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
