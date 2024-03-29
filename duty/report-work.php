

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
 
 <a href="../home/Home.php"> <svg class="logout" xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="bi bi-box-arrow-right" viewBox="0 0 16 16" style="margin-left: 1280px;">
                  <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                  <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
                </svg> <p style="font-size: 10px; color: black; margin-left: 1280px; font-weight: 10px;">Logout</p></a>
           
                <a href="../home/Officer.php" style="text-decolation: none; margin-left: 50px; margin-top: -50px; color: white; font-size: 20px; font-weight: 100;">Back</a>

           
              </div>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="contact-form">
                    <h3 class="text-center">Report assigned work</h3>
                    <form method="POST" action="Record_case.php" id="case-record" name="case-record">
                            
                   
                        <div class="form-group">
                            <label for="incident"></label>
                            <textarea class="form-control" id="incident" name="incident" style="height: 200px;"   required></textarea>
                            <span class="error">Please enter incident</span>
                        </div>
  
                       
                        <div class="text-center">
                            <button type="Submit" id="submit-btn" class="btn btn-lg btn-block">Submit report</button>
                        </div>
                   
                    </form>
                </div>
            </div>
        </div>
    </div>

    <style>
        body {
            background-color: rgb(0, 109, 139);
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
            height: 400px;
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
            width: 165px;
            margin-left: 35%;
            font-weight: 100;
            font-family: Arial, Helvetica, sans-serif;
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
            .logout{
                color: black;
                margin-left: 80%;
            }
            logout:hover{
                color: khaki;
            }
           </style>
</body>
</html>
       
