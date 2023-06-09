<?php
session_start();
// include database connection file
include("../db/Connections.php");

// Function to update website guidelines in the database
function updateWebsiteGuidelines($id, $title, $content)
{
    global $conn;

    // Prepare the SQL statement
    $sql = "UPDATE guidelines SET title=?, content=? WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);

    // Bind the parameters
    mysqli_stmt_bind_param($stmt, 'ssi', $title, $content, $id);

    // Execute the statement
    $result = mysqli_stmt_execute($stmt);

    // Check if the update was successful
    if ($result) {
        return true;
    } else {
        return false;
    }

    // Close the statement
    mysqli_stmt_close($stmt);
}

// Handle form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $title = $_POST["title"];
    $content = $_POST["content"];

    // Update website guidelines
    $updateSuccess = updateWebsiteGuidelines($id, $title, $content);

    if ($updateSuccess) {
        $message = "Website guidelines updated successfully!";
        // Redirect to view-guidelines.php after 5 seconds
        header("refresh:2; url=view-guidelines.php");
    } else {
        $message = "Error updating website guidelines.";
    }
}

// Retrieve the current guidelines from the database
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    $sql = "SELECT * FROM guidelines WHERE id=?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $result = mysqli_stmt_get_result($stmt);
    $row = mysqli_fetch_assoc($result);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Website Guidelines</title>
    <style>
        /* CSS styles for the form */
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: rgb(0, 109, 139);
        }

        h2 {
            color: khaki;
            text-align: center;
        }

        form {
            margin-top: 20px;
            text-align: center;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        textarea {
            width: 50%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            margin-bottom: 10px;
        }

        input[type="submit"],
        input[type="button"] {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover,
        input[type="button"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <?php if (isset($message)) : ?>
        <p><?php echo $message; ?></p>
    <?php endif; ?>

    <?php if (isset($row)) : ?>
        <h2>Update Website Guidelines</h2>
        <form method="POST" action="<?php echo $_SERVER["PHP_SELF"]; ?>">
            <input type="hidden" name="id" value="<?php echo $row["id"]; ?>">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo $row["title"]; ?>" required><br><br>
            <label for="content">Content:</label><br>
            <textarea id="content" name="content" rows="5" cols="40" required><?php echo $row["content"]; ?></textarea><br><br>
            <input type="submit" value="Update">
            <input type="button" value="Cancel" onclick="location.href='view-guidelines.php';">
        </form>
    <?php else : ?>
        <p></p>
    <?php endif; ?>

    <?php
    // Close the database connection
    mysqli_close($conn);
    ?>
</body>
</html>
