<?php
// Database connection
$host = "localhost"; // database server (in this case, the same machine where the PHP code is running)
$username = "root"; // database username
$password = ""; // database password (leave this blank if you have not set a password for MySQL)
$dbname = "newsdata"; // database name (replace this with the name of your database)

$conn = mysqli_connect($host, $username, $password, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $title = $_POST["title"];
    $description = $_POST["description"];
    $date = $_POST["date"];
    $type = $_POST["type"];
    
    // File upload
    $target_dir = "C:/xampp/htdocs/News/uploads/"; // update this with the root directory you want to use
    $target_file = $target_dir . basename($_FILES["file"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
    
    // Check if file is an image or a video
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "mp4" && $imageFileType != "mov" && $imageFileType != "avi") {
        echo "Sorry, only JPG, JPEG, PNG, MP4, MOV, and AVI files are allowed.";
        $uploadOk = 0;
    }
    
    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }
    
    // Check file size (max 50MB)
    if ($_FILES["file"]["size"] > 50000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }
    
    // Upload file
    if ($uploadOk == 1) {
        if (move_uploaded_file($_FILES["file"]["tmp_name"], $target_file)) {
            echo "The file ". basename( $_FILES["file"]["name"]). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    
    // Insert data into database
    $sql = "INSERT INTO news (title, description, date, type, file_url) VALUES ('$title', '$description', '$date', '$type', '$target_file')";
    
    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully.";
    } else {
        echo "Error: " . $sql . "<br>" . mysqli_error($conn);
    }
    
    // Close database connection
    mysqli_close($conn);
}
?>
