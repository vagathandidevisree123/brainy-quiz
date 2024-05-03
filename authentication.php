php
Copy code
<?php
// Database connection details
$servername = "localhost";
$username = "root"; // Change to your MySQL username
$password = ""; // Change to your MySQL password
$dbname = "quiz"; // Change to your database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if the form is submitted using POST method
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve username and password from the form
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Prepare SQL query to select user from the admin table with parameterized query to prevent SQL injection
    $sql = "SELECT * FROM admin WHERE username=? AND password=?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $username, $password);
    $stmt->execute();
    $result = $stmt->get_result();

    // Check if any row is returned (user found)
    if ($result->num_rows > 0) {
        // User authenticated successfully
        // Redirect to admin-panel.php
        header("Location: admin-panel.php");
        // Exit to prevent further execution
        exit;
    } else {
        // User not found or invalid credentials
        echo "<script>alert('Invalid username or password');</script>";
    }
}

// Close connection
$conn->close();
?>