<?php
include('./dbconnect.php');
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Add_To_cart'])) {
        $product_name = mysqli_real_escape_string($conn, $_POST['item_name']);
        $productDetail = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$product_name'");
        $product = mysqli_fetch_array($productDetail);

        if ($product['stock'] < $_POST['quantity']) {
            echo '<script>alert("Insufficient stock");
                window.location.href="./shop-detail.php";</script>';
            exit();
        }

        if (isset($_SESSION['cart'])) {
            if (is_string($_SESSION['cart'])) {
                // Decode the JSON data into an array
                $cart = json_decode($_SESSION['cart'], true);
                
                // Check if decoding was successful
                if (json_last_error() === JSON_ERROR_NONE && is_array($cart)) {
                    $_SESSION['cart'] = $cart; // Update the session variable
                } else {
                    // Handle the case where decoding fails
                    echo "<script>
                        alert('Error decoding cart data');
                        window.location.href='./index.php';
                    </script>";
                    exit();
                }
            }
        
            $myitems = array_column($_SESSION['cart'], 'item_name');
            if (in_array($_POST['item_name'], $myitems)) {
                echo "<script>
                    alert('Product already added');
                    window.location.href='./cart.php';
                </script>";
                exit();
            }
        }

        // Create an array for the item
        $item = array(
            'item_name' => $_POST['item_name'],
            'price' => $_POST['price'],
            'quantity' => $_POST['quantity']
        );

        // Add the item to the "cart" session variable
        $_SESSION['cart'][] = $item;

        // Redirect to cart.php after adding an item
        header("Location: ./cart.php");
        exit();
    }

    // For remove button
    if (isset($_POST['Remove_Item'])) {
        $item_name_to_remove = $_POST['item_name'];
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['item_name'] == $item_name_to_remove) {
                unset($_SESSION['cart'][$key]);
                $_SESSION['cart'] = array_values($_SESSION['cart']);
                // Redirect to cart.php after removing an item
                header("Location: ./cart.php");
                exit();
            }
        }
    }

    // To modify quantity
    if (isset($_POST['quantity'])) {
        $quantities = $_POST['quantity'];
        $item_names = $_POST['item_name'];
        foreach ($item_names as $key => $item_name) {
            foreach ($_SESSION['cart'] as $index => $value) {
                if ($value['item_name'] == $item_name) {
                    $_SESSION['cart'][$index]['quantity'] = $quantities[$key];
                }
            }
        }
        // Redirect to cart.php after modifying quantity
        header("Location: ./cart.php");
        exit();
    }
}
?>
