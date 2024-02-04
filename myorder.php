<?php
include("./dbconnect.php");
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<body class="">
    <?php
    include("./navbar.php");
    ?>
    <div class="">
        <div class="">
            <div class="">
                <h1>MY ORDER</h1>
            </div>

            <div>
                <table class="">
                    <thead class="">
                        <tr>
                            <th scope="col">Order No.</th>
                            <th scope="col">Username</th>
                            <th scope="col">Item Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody class="">
                        <?php
                        if (isset($_SESSION["user_id"])) {
                            $user_id = $_SESSION["user_id"];

                            $sql = "SELECT * FROM orders WHERE user_id = '$user_id'";
                            $result = mysqli_query($conn, $sql);
                            $totalPrice = 0; 

                            while ($order = mysqli_fetch_array($result)) {
                                echo "<tr>
                                    <td>$order[order_id]</td>
                                    <td>$order[order_date]</td>
                                    <td>$order[flavors]</td>
                                    <td>$order[ingredients]</td>
                                    <td>$order[price]</td>
                                    <td>$order[notes]</td>
                                    <td>$order[status]</td>
                                </tr>";

                                
                                $totalPrice += floatval($order['price']);
                            }
                        }
                        ?>
                    </tbody>
                </table>

                <?php
                if (isset($_SESSION["user_id"])) {
                   
                    if (mysqli_num_rows($result) > 0) {
                        echo "<div class='grand-total' style='font-size:30px'>
                                <span><b>Total Price:  Rs. $totalPrice</b></span>
                            </div>";
                    } else {
                        echo "<div class='no-orders'>
                                <span>No orders found.</span>
                            </div>";
                    }
                }
                ?>
            </div>
        </div>
    </div>
</body>
<?php
    include("./navbar.php");
    ?>
    </  html>