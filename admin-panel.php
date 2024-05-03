

Admin Control to delete the rows 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container my-5">
    <h2 class="text-center">Admin Panel</h2>
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>Is the quiz helpful ?</th>
                <th>Were the instructions clear ?</th>
                <th>Rating</th>
                <th>Review</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php
            // Database connection
            $conn = mysqli_connect("localhost", "root", "", "quiz");
            if ($conn === false) {
                die("ERROR: Could not connect. " . mysqli_connect_error());
            }
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if (isset($_POST['delete'])) {
                    // Delete record
                    $helpful = $_POST['helpful'];
                    $clear = $_POST['clear'];
                    $rating = $_POST['rating'];
                    $review = $_POST['review'];
                    $qry = "DELETE FROM review WHERE helpful='$helpful' AND clear='$clear'";
                    if (mysqli_query($conn, $qry)) {
                        echo "<div class='alert alert-success' role='alert'>Record deleted successfully.</div>";
                    } else {
                        echo "<div class='alert alert-danger' role='alert'>Error deleting record: " . mysqli_error($conn) . "</div>";
                    }
                }
            }

            $qry = "SELECT * FROM review";
            $result = mysqli_query($conn, $qry);

            if (mysqli_num_rows($result) > 0) {
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>";
                    echo "<td>" . $row["helpful"] . "</td>";
                    echo "<td>" . $row["clear"] . "</td>";
                    echo "<td>" . $row["rating"] . "</td>";
                    echo "<td>" . $row["review"] . "</td>";
                    echo "<td>";
                    echo "<form method='post' style='display: inline;'>";
                    echo "<input type='hidden' name='helpful' value='" . $row["helpful"] . "'>";
                    echo "<input type='hidden' name='clear' value='" . $row["clear"] . "'>";
                    echo "<input type='hidden' name='rating' value='" . $row["rating"] . "'>";
                    echo "<input type='hidden' name='review' value='" . $row["review"] . "'>";

                    echo "<button type='submit' class='btn btn-danger' name='delete'>Delete</button>";
                    echo "</form>";
                    echo "</td>";
                    echo "</tr>";

                    // Modal content...
                    echo "</div>";
                }
            } else {
                echo "<tr><td colspan='4'>No records found</td></tr>";
            }
            mysqli_close($conn);
            ?>
        </tbody>
    </table>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
