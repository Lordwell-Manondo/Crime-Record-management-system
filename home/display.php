<?php
// Replace the placeholders with your actual database credentials
include "../db/Connections.php";

// Create a connection

// Check if the connection was successful
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

$query = "SELECT * FROM images";
$result = mysqli_query($conn, $query);

if (!$result) {
    echo $result . "<br/>" . mysqli_error($conn);
}

// Fetch all data into an array
$data = mysqli_fetch_all($result, MYSQLI_ASSOC);

if (count($data) > 0) {
?>

<style>
    .news-container {
        position: relative;
        width: calc(33.33% - 1cm); /* Adjust as needed */
        height: 400px; /* Increase the height as needed */
        margin: 10px 0.5cm; /* Adjust the margin as needed */
        overflow: hidden;
        border: 1px solid #ccc; /* Add a border for visual separation */
        border-radius: 5px; /* Add border radius for a rounded look */
        box-shadow: 0 0 5px rgba(0, 0, 0, 0.2); /* Add a shadow for depth */
        padding: 10px; /* Add padding for spacing */
        text-align: left; /* left align the content */
    }

    .news-image {
        transition: transform 0.5s;
        max-width: 100%; /* Make the image responsive within the container */
        height: auto; /* Maintain the aspect ratio */
        display: block; /* Remove any extra spacing */
        margin: left; /* Center align the image horizontally */
    }

    .news-image:hover {
        animation: rotation 5s infinite linear;
    }

    /* Rest of the keyframes */
</style>

<div style="display: flex; flex-wrap: wrap; justify-content: flex-start;">
    <?php
    $animationClasses = ['split-animation', 'wipe-animation', 'fly-animation'];
    $animationIndex = 0;

    // Display the latest retrieved data in the first container
    $latestData = array_shift($data);
    $title = $latestData['title'];
    $date = $latestData['date'];
    $image = $latestData['image'];
    $details = $latestData['details'];
    ?>

<div class="news-container" style="width: calc(100% - 1cm);">
    <div class="first-container">   <a href="#"><?php include 'slide.php'; ?></a><!-- Add a separate div for the first container -->
        <div class="content-wrapper" >
            <div style="flex: 1;">
                <h3 class="news-title" style="text-align: right;"><?php echo $title; ?></h3>
                <p class="news-date" style="text-align: right;">Date: <?php echo $date; ?></p>
                <img class="news-image <?php echo $animationClasses[$animationIndex]; ?>" src="<?php echo $image; ?>" alt="News Image" style="object-fit: contain; width: 100%; height: 100%;">
                <p class="news-details" style="text-align: right;"><?php echo addReadMoreLink($details); ?></p>
            </div>
            <div style="flex: 1;">
            </div>
        </div>
    </div>
</div>

            
      

    <?php
    // Move the existing data to the second line of containers
    foreach ($data as $row) {
        $title = $row['title'];
        $date = $row['date'];
        $image = $row['image'];
        $details = $row['details'];
        ?>

        <div class="news-container">
            <h3 class="news-title"><?php echo $title; ?></h3>
            <p class="news-date">Date: <?php echo $date; ?></p>
            <img class="news-image" src="<?php echo $image; ?>" alt="News Image">
            <p class="news-details"><?php echo addReadMoreLink($details); ?></p>
        </div>

        <?php
        $animationIndex++;
        if ($animationIndex >= count($animationClasses)) {
            $animationIndex = 0;
        }
    }
    ?>
</div>

<?php
} else {
    ?>

    <h3>No news found!</h3>

<?php
}

// Function to add "Read more" link after 10 words
function addReadMoreLink($text)
{
    $wordLimit = 10;
    $readMoreText = "Read more";
    $readMoreLink = "../news/News.php"; // Update the link to the actual file

    $words = explode(" ", $text);
    if (count($words) > $wordLimit) {
        $visibleWords = array_slice($words, 0, $wordLimit);
        $hiddenWords = array_slice($words, $wordLimit);
        $visibleText = implode(" ", $visibleWords);
        $hiddenText = implode(" ", $hiddenWords);
        $readMore = '<a href="' . $readMoreLink . '">' . $readMoreText . '</a>';
        $output = $visibleText . '... ' . $readMore;
        return $output;
    } else {
        return $text;
    }
}
?>


