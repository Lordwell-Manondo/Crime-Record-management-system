<?php
session_start();

    //linking up Record_case.php file with database using Connections.php file
    include('Connections.php');
   
//defining and initializing variables that will be used to pass values into database     
 if($_SERVER['REQUEST_METHOD'] == "POST") {
    $suspect = $_POST['suspect'];
    $victim = $_POST['victim'];
    $incident = $_POST['incident'];
    $location = $_POST['location'];
    $date = $_POST['date'];
    $crime = $_POST['crime'];
    $file = $_POST['file'];
                
              
            
            // saving the case into database
            $query = "insert into cases (suspect_name, victim_name, incident, file, location, date, type) values ('$suspect', '$victim' ,'$incident', '$file', '$location', '$date', '$crime')";
            
            //executing the above statement
            mysqli_query($con, $query);
           
            //give this message if the process of saving the case was successful
           echo" Case recorded";
            exit;
 }
        else
        {
            //printing this message  if the process of saving the case was not successful
            //echo "Please enter valid information!";
        }
        
        ?>





<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record case</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-Dv78Sm9XbiIbS8ykO4GpxbEikx4s4w4sLM8WY7V+jvocEy9IaUBM0tZu0tPHq3IvguNN7wQ2EoYB3Cq3j/9XGQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
 
</head>
<div class="navbar">
 <h1>CRIME RCORD MANAGEMENT SYSTEM</h1>
 <a href="Home.html">Logout</a>
</div>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="contact-form">
                    <h3 class="text-center">Record case</h3>
                    <form method="POST" action="Record_case.php" id="case-record" name="case-record">
                        <div class="form-group">
                            <label for="victim">Suspect name</label>
                            <input type="text" class="form-control" id="suspect" name="suspect" required>
                            <span class="error">Please enter suspect name</span>
                        </div>
                        <div class="form-group">
                            <label for="victim">Victim name</label>
                            <input type="text" class="form-control" id="victim" name="victim"  required>
                            <span class="error">Please enter suspect name</span>
                        </div>

                        <div class="form-group">
                            <label for="incident">Incident</label>
                            <textarea class="form-control" id="incident" name="incident" rows="5"  required></textarea>
                            <span class="error">Please enter incident</span>
                        </div>
                          
                        <div class="form-group">
                        <label for="file">Attach file:</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>
                        

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="location" class="form-control"id="location" name="location" required>

                            <span class="error">Please enter Location</span>
                      </div>

                      <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter todays date" required>
                            <span class="error">Please enter a valid date</span>
                        </div>

                        <div class="form-group">
                        <label for="my-dropdown">Crime type</label>
                            <select class="form-control" id="crime" name="crime">
                            <option value="Theft">Theft</option>
                            <option value="Vandalism">Vandalism</option>
                             <option value="Violent">Violent</option>
                           </select>
                           <span class="error">Please select crime type</span>
                        </div>

  

                        <div class="text-center">
                            <button type="Submit" id="submit-btn" class="btn btn-lg btn-block">Submit</button>
                        
                            
                       
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: aqua;
        }
        .form-control:focus {
            box-shadow: none;
            border-color: #ff8c00;
        }
        .contact-form {
            background-color: #fff;
            border-radius: 10px;
            margin-top: 30px;
            margin-bottom: 30px;
            padding: 30px;
            box-shadow: 0px 0px 20px 0px rgba(0,0,0,0.1);
        }
        .contact-form label {
            font-weight: 600;
            color: #333;
        }
       
        .contact-form button {
            background-color: #4cc3f1;
            border-color: #ff8c00;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .contact-form button:hover {
            background-color: #0c3779;
            border-color: #ff8000;
            color: #fff;
            
        }
        .contact-form .error {
            color: #dc3545;
            font-size: 12px;
            display: none;
        }
        .back-button {
        
            background-color: #4cc3f1;
            border-color: #ff8c00;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }


        .back-button:hover {
             background-color: navy;
        }
       .navbar h1{
            color: white;
            font-size: 40px;
            margin-left: 25%;
            }
             .navbar{
                  background-color: gray;
                  margin-top: 2px;
                  
                  padding: 10px;
                  border-radius: 3px;
                   }
                   .navbar a{
            margin-right: 5%;
            }
           
        

    </style>

    <script>
       
