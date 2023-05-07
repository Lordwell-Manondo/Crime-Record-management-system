<!DOCTYPE html>
<html>
<head>
    <title>Assign Work</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .heading {
            color: navy;
            text-align: center;
        }

        .btn-primary {
            background-color: #4cc3f1;
            border-color: #black;
            color: #fff;
        }

        .btn-primary:hover, .btn-primary:focus {
            background-color: #000080;
            border-color: #FFFFFF;
        }

        input[type="file"]::-webkit-file-upload-button {
            background-color: #4cc3f1;
            color: #fff;
            padding: 8px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-box {
            border: 1px solid #ddd;
            border-radius: 5px;
            padding: 20px;
            background-color: #FFFFFF;
            max-width: 500px;
            margin: 0 auto;
            box-shadow: 0px 0px 5px rgba(0,0,0,0.2);
        }

        body {
            background-color: aqua;
        }

        .back-button {
            float: right;
            background-color: #4cc3f1;
            border-color: #black;
            color: #fff;
            font-weight: 600;
            transition: background-color 0.3s ease;
        }

        .back-button:hover, .back-button:focus {
            background-color: navy;
            border-color: #black;
        }

        .back-button:hover span {
            color: #FFFFFF;
        }

        .back-button span {
            color: #FFFFFF;
            transition: color 0.3s;
        }
    </style>
</head>
<body>
    <header>
        <div class="container mt-5">
            <h1 class="heading">Assign Work</h1>
            <div class="form-box"  class="form-group">
                <form action="News.php" method="post" enctype="multipart/form-data">
                    <div>
                        <label for="title">Case ID:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div><br>
                    <div>
                        <label for="title">Officer ID:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div><br>
                    <div>
                        <label for="date">Date Assigned:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div><br>
                
                    <div>
                        <label for="date">Date to Report:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <br>                    
                    <button type="submit" class="btn btn-primary">Assign</button>
                    <button type="button" class="btn back-button" onclick="history.back()">Back</button>

                </form>
            </div>
        </div>
    </header>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</body>
</html>
