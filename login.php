<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body{
            background-color: lightgrey;
            margin: 50px 20px 0px 300px;
        }

        </style>
    
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
        $name = $_POST["name"];
        $email = $_POST["email"];
        $designation = $_POST["designation"];
        $age = $_POST["age"];
        $gender = $_POST["gender"];
  
        $sql = "INSERT INTO login (name, email, designation , age,gender) VALUES ('$name', '$email', '$designation', '$age' , '$gender')";
        if ($conn->query($sql) === TRUE) {
            echo "<div class='alert alert-success' role='alert'>New record created successfully</div>";
        } else {
            echo "<div class='alert alert-danger' role='alert'>Error: " . $sql . "<br>" . $conn->error . "</div>";
        }
    }
    $conn->close();
    ?>
    <h1>For the next page</h1>
<a href="Topics.html"> <button>Click here </button></a>
</body>
</html>
   