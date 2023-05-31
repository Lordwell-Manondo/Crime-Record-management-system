<!-- upload_image.php -->
<!DOCTYPE html>
<html>
<head>
    <title>Upload Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-3BqAR1eHUhJG7DrD9p8F5lmB6C0jte8+u9JfFCg1uPtiwaTEuTk/RyNvIMquQt5W"
        crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Upload Image</h1>
        <form action="upload_image.php" method="post" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="image" class="form-label">Select Image:</label>
                <input type="file" class="form-control" id="image" name="image" required>
            </div>
            <button type="submit" class="btn btn-primary">Upload</button>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>

<?php
// upload_image.php (continued)
session_start();
include('../db/Connections.php');

$connection = new Connection();
$mysqli = $connection->connect();

if (isset($_FILES['image'])) {
    $file = $_FILES['image'];
    $fileName = $file['name'];
    $fileTmpName = $file['tmp_name'];
    $fileSize = $file['size'];
    $fileError = $file['error'];

    $fileExt = strtolower(pathinfo($fileName, PATHINFO_EXTENSION));
    $allowedExtensions = array('jpg', 'jpeg', 'png');

    if (in_array($fileExt, $allowedExtensions)) {
        if ($fileError === 0) {
            if ($fileSize < 5000000) { // Adjust the file size limit as per your requirement
                $imageData = file_get_contents($fileTmpName);
                $base64Image = base64_encode($imageData);

                $sql = "INSERT INTO images (image) VALUES ('$base64Image')";
                if ($mysqli->query($sql) === TRUE) {
                    $lastInsertedId = $mysqli->insert_id;
                    echo "<script>alert('Image uploaded successfully.');
                          window.location.href = 'view_image.php?id=$lastInsertedId';
                          </script>";
                } else {
                    echo "Error: " . $sql . "<br>" . $mysqli->error;
                }
            } else {
                echo "File size is too large. Please upload a file under 5MB.";
            }
        } else {
            echo "Error occurred while uploading the file.";
        }
    } else {
        echo "Invalid file format. Only JPG, JPEG, and PNG files are allowed.";
    }
}
?>
