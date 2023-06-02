<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Adminator</title>
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
            margin-left: 50px;
            font-weight: 400;
            color: lightgray;
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
        
    </style>
</head>
<body>
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
                    <a  class="nav-link" href="#"  id="casesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Cases</a>
                    <!-- submenu for cases -->
                    <ul class="dropdown-menu" aria-labelledby="casesDropdown">
                        <li><a class="dropdown-item" style="margin-left: 0%;" href="../cases/Record_case.php">Record case</a></li>
                        <li><a class="dropdown-item" style="margin-left: 0%;" href="../cases/View_cases.php">View cases</a></li>
                        <li><a class="dropdown-item" style="margin-left: 0%;" href="../cases/View-assigned-cases.php">Assigned cases</a></li>
                        <li><a class="dropdown-item" style="margin-left: 0%;" href="../cases/cases_bargraph.php">Cases trend</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" id="officersDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Officers</a>
                    <!-- submenu for officers -->
                    <ul class="dropdown-menu" aria-labelledby="officersDropdown">
                    <li><a class="dropdown-item" style="margin-left: 0%;" href="../officers/add_officer.php">Add officers</a></li>
                    <li><a class="dropdown-item" style="margin-left: 0%;" href="../officers/view_officers.php">View officers</a></li>
                    </ul>
                    </li>
                    <li class="nav-item dropdown">
                    <a  class="nav-link" href="#"  id="dutiesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Duties</a>
                    <!-- submenu for duties -->
                    <ul class="dropdown-menu" aria-labelledby="dutiesDropdown">
                    <li><a class="dropdown-item" style="margin-left: 0%;" href="../duty/assign_duty.php">Assign duties</a></li>
                    <li><a class="dropdown-item" style="margin-left: 0%;" href="#">Assigned duties</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"  href="../news/News2.php">Add news</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"  href="../officers/view-users.php">Public user</a>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link"  href="../Notifications.php">Notifications (0)</a>
                    </li>
                    <li class="nav-item dropdown">
                    <a  class="nav-link" href="#"  id="profileDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fas fa-user"></i></a>
                    <!-- submenu for profile -->
                    <ul class="dropdown-menu" aria-labelledby="profileDropdown">
                    <li><a class="dropdown-item" style="margin-left: 0%;" href="../changepass/change-password-admin.php">Change password</a></li>
                    <li><a class="dropdown-item" style="margin-left: 0%;" href="#">View profile</a></li>
                    </ul>
                    </li>
                    <li class="nav-item">
                    <a class="nav-link" style="font-size: 95%; color: rgb(34, 34, 219);" href="logout.php">Logout</a>
                    </li>
                    </ul>
                    </div>
                    </nav>

                    <!-- Main content -->
<div class="content">
  <!-- Header -->
  <header>
      <!-- Header content -->
  </header>

  <!-- Page content -->
  <main>
      <!-- Your crime record management system content goes here -->
  </main>
</div>

<!-- Include Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<!-- Include Adminator JS -->
<script src="path/to/adminator.js"></script>

<h1>CRIME RECORD MANAGEMENT SYSTEM<h1>
  <h4>Creating a Safe and Secure Malawi.</h4>

</body>
</html>