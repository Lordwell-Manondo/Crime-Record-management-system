<!DOCTYPE html>
<html>
<head>
    <title>News Form</title>
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
            <h1 class="heading">Add News and Events</h1>
            <div class="form-box">
                <form action="News.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="title">Title:</label>
                        <input type="text" class="form-control" id="title" name="title" required>
                    </div>
                    <div class="form-group">
                        <label for="description">Description:</label>
                        <textarea class="form-control" id="description" name="description" rows="3" required></textarea>
                    </div>
                    <div class="form-group">
                        <label for="date">Date:</label>
                        <input type="date" class="form-control" id="date" name="date" required>
                    </div>
                    <div class="form-group">
                        <label for="type">Type:</label>
                        <select class="form-control" id="type" name="type" required>
                            <option value="">Select type</option>
                            <option value="Sports">Sports</option>
                            <option value="Politics">Politics</option>
                            <option value="Entertainment">Entertainment</option>
                            <option value="Other">Other</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="file">File:</label>
                        <input type="file" class="form-control-file" id="file" name="file" required>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
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
