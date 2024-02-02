<?php
include('./dbconnect.php');
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['Add_To_cart'])) {
        $productDetail = mysqli_query($conn, "SELECT * FROM products WHERE product_name = '$_POST[product_name]'");
        $product = mysqli_fetch_array($productDetail);
        if ($product['stock'] < $_POST['quantity']) {
            echo '<script>alert("Insufficient stock");
        window.location.href="./index.php";</script>';
        } else 
        if (isset($_SESSION['cart'])) {
            $myitems = array_column($_SESSION['cart'], 'item_name');
            if (in_array($_POST['item_name'], $myitems)) {
                echo "<script>
        alert('Product already added');
        window.location.href='./cart.php';
        </script>";
            } else {
                $count = count($_SESSION['cart']);
                $_SESSION['cart'][$count] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1);

                // DB Insert Code
                echo "<script> alert('Product added to the cart');
      window.location.href='./cart.php';
      </script>";
            }
        } else {
            $_SESSION['cart'][0] = array('item_name' => $_POST['item_name'], 'price' => $_POST['price'], 'quantity' => 1);
            echo "<script>
    alert('Product added to the cart');
    window.location.href='./index.php';
    </script>";
        }
    }

    //for remove button
    if (isset($_POST['Remove_Item'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['item_name'] == $_POST['item_name']) {
                unset($_SESSION['cart'][$key]);               //removes home
                $_SESSION['cart'] = array_values($_SESSION['cart']);   //rearrange array after removing any item
                echo "<script>
      alert('Product Removed from the cart');
      window.location.href='./cart.php';
      </script>";
            }
        }
    }
    //to modify quantity
    if (isset($_POST['quantity'])) {
        foreach ($_SESSION['cart'] as $key => $value) {
            if ($value['item_name'] == $_POST['item_name']) {
                $_SESSION['cart'][$key]['quantity'] = $_POST['quantity'];
                echo "<script>window.location.href='admin/cart.php';</script>";
            }
        }
    }
}