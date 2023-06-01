<!-- view_image.php -->
<!DOCTYPE html>
<html>
<head>
    <title>View Image</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css"
        integrity="sha384-3BqAR1eHUhJG7DrD9p8F5lmB6C0jte8+u9JfFCg1uPtiwaTEuTk/RyNvIMquQt5W"
        crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">View Image</h1>
        <?php
        session_start();
        include('../db/Connections.php');

        $connection = new Connection();
        $mysqli = $connection->connect();

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $sql = "SELECT * FROM images WHERE id = $id";
            $result = $mysqli->query($sql);

            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                $base64Image = $row['image'];
                echo "<img src='data:image;base64,$base64Image' class='img-fluid' alt='Uploaded Image'>";
            } else {
                echo "Image not found.";
            }
        }
        ?>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
</body>
</html>
