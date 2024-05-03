
<?php
// Database connection
$conn = mysqli_connect("localhost", "root", "", "quiz");

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// SQL query to retrieve data
$sql = "SELECT * FROM review";
$result = mysqli_query($conn, $sql); //[Adnan Ali, adduadnanali@gmail.com, Nice one] //Gayathri ggpv@gmail.com Great Quality
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Customer Reviews</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>


<div class="container mt-5">
    <h2>Customer Reviews</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Is our quiz helpful?</th>
                <th>Were the instructions clear ?</th>
                <th>Rating</th>
                <th>Review</th>
            </tr>
        </thead>
        <tbody>
           <?php
            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["helpful"] . "</td>";
                    echo "<td>" . $row["clear"] . "</td>";
                    echo "<td>" . $row["rating"] . "</td>";
                    echo "<td>" . $row["review"] . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No records found</td></tr>";
            }
            ?>           
        </tbody>
    </table>
    <a href="Home.html" class="btn btn-dark">Go Back</a>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
// Close connection
mysqli_close($conn);
?>


