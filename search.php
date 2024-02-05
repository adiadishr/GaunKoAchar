<?php
    include "navbar.php";
    include "dbconnect.php";
 ?>
<!doctype html>
<html lang="en">

<body>
    <?php 
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['search'])) {
    $searchTerm = $_POST['search'];

    // Sanitize the user input (to prevent SQL injection)
    $searchTerm = $conn->real_escape_string($searchTerm);

    // Construct the SQL query
    $sql = "SELECT * FROM products WHERE product_name LIKE '%$searchTerm%'";

    // Execute the query
    $result = $conn->query($sql);
    if (!$result) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
    if ($result->num_rows > 0) {
            echo "<h2 class='text-center'>Search Results:</h2>";
            echo "<div class='container'>";
            while ($row = $result->fetch_assoc()) {
                echo "<div class='card' style='width: 18rem;'>";
                echo "<img src='img/{$row['product_image']}' class='card-img-top' alt='...'>";
                echo "<div class='card-body'>";
                echo "<h5 class='card-title'>" . $row['product_name'] . "</h5>";
                echo "<p class='card-text'>Rs. " . $row['product_price'] . "</p>";
                if (isset($_SESSION['email'])) {    
                    echo "<a href='shop.php?product_id=" . $row['product_id'] . "' class='btn btn-primary'>Buy</a>";
                } else { 
                    echo "<a href='login.php' class='btn btn-primary'>Buy</a>";
                }
                echo "</div>";
                echo "</div>";
            }
            echo "</div>";
        } else {
            echo "<div class='container'>";
            echo "<p class='text-center'>No results found.</p>";
            echo "</div>";
        }
    }
    ?>


<?php include "footer.php"?>
</body>

</html>