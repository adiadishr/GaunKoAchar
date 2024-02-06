<!DOCTYPE html>
<html lang="en">

<head>
    <?php
    include('navbar.php');
    ?>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Order Details</title>

</head>

<body>
    <h2>Order Details</h2>
    <table border="1">
        <thead>
            <tr>
                <th>Order ID</th>
                <th>Username</th>
                <th>Email</th>
                <th>Address</th>
                <th>Product ID</th>
                <th>Product Name</th>
                <th>Quantity</th>
                <th>Total Price</th>
            </tr>
        </thead>
        <tbody>
            <?php
            while ($row = mysqli_fetch_assoc($result)) {
                echo '<tr>';
                echo '<td>' . $row['order_id'] . '</td>';
                echo '<td>' . $row['username'] . '</td>';
                echo '<td>' . $row['email'] . '</td>';
                echo '<td>' . $row['address'] . '</td>';
                echo '<td>' . $row['product_id'] . '</td>';
                echo '<td>' . $row['product_name'] . '</td>';
                echo '<td>' . $row['quantity'] . '</td>';
                echo '<td>' . $row['total_price'] . '</td>';
                echo '</tr>';
            }
            ?>
        </tbody>
    </table>
</body>

</html>