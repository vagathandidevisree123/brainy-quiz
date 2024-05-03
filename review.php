<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reviews</title>
    
</head>
<body>
<?php
    // Database connection
    $servername = "localhost";
    $username = "root"; // Change to your MySQL username
    $password = ""; // Change to your MySQL password
    $dbname = "quiz"; // Change to your database name

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $helpful = $_POST["helpful"];
        $clear = $_POST["clear"];
        $rating = $_POST["rating"];
        $review = $_POST["review"];
  
        $sql = "INSERT INTO review (helpful, clear, rating , review) VALUES ('$helpful', '$clear', '$rating',  '$review')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>New record created successfully</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
    $conn->close();
    ?>
    <h1>For the Home page</h1>
<a href="Home.html"> <button>Click here </button></a>
</body>
</html>


