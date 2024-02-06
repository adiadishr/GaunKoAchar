<?php
session_start();
include('./dbconnect.php');

if (mysqli_connect_error()) {
    echo "<script>
    alert('Cannot connect to the database');
    window.location.href='./cart.php';
    </script>";
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $total = 0;

    if (isset($_SESSION['cart'])) {
        $oid = rand(1, 100);
        $query1 = "INSERT INTO orders(item_name, price, quantity, order_id, orderedby, address, phone_no, payment_mode) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
        $stmt = mysqli_prepare($conn, $query1);

        foreach ($_SESSION['cart'] as $value) {
            $item_name = $value['Item_name'];
            $price = $value['price'];
            $quantity = $value['Quantity'];
            mysqli_stmt_bind_param($stmt, 'ssiissis', $item_name, $price, $quantity, $oid, $_POST['fname'], $_POST['address'], $_POST['phone_no'], $_POST['pay_mode']);
            mysqli_stmt_execute($stmt);
            $total += $price * $quantity;
        }

        unset($_SESSION['cart']);

        echo "<script>alert('Order Placed'); window.location.href='./index.php';</script>";
    } else {
        echo "<script>
    alert('Cart is empty.');
    window.location.href='./mycart.php';
    </script>";
    }
}
?>
