<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Report Incident</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
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
        .contact-form button[type="report"] {
            background-color: #4cc3f1;
            border-color: #ff8c00;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }
        .contact-form button[type="report"]:hover {
            background-color: #0c3779;
            border-color: #ff8000;
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

    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6 mx-auto">
                <div class="contact-form">
                    <h3 class="text-center">Report an Incident</h3>
                    <form action="submit_form.php" method="post" id="contactForm">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter your name" required>
                            <span class="error">Please enter your name</span>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="phone" class="form-control" id="phone" name="phone" placeholder="Enter your phone" required>
                            <span class="error">Please enter a valid phone number</span>
                        </div>

                        <div class="form-group">
                            <label for="date">Date</label>
                            <input type="date" class="form-control" id="date" name="date" placeholder="Enter todays date" required>
                            <span class="error">Please enter a valid date</span>
                        </div>

                        <div class="form-group">
                            <label for="location">Location</label>
                            <input type="location" class="form-control"id="location" name="location" placeholder="Enter your location" required>

                            <span class="error">Please enter a valid Location</span>
                      </div>

                      <div class="form-group">
                            <label for="incident">Incident</label>
                            <textarea class="form-control" id="incident" name="incident" rows="5" placeholder="Enter the incident details" required></textarea>
                            <span class="error">Please enter an incident</span>
                        </div>
                        <div class="text-center">
                            <button type="Report" class="btn btn-lg btn-block">Report</button>
                            <button type="button" class="btn btn-lg btn-block back-button">Back</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document)