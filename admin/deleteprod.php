<?php
include '../dbconnect.php';
$pid = $_GET['product_id'];

$q = mysqli_query($conn, "DELETE FROM products WHERE product_id='$pid'");

header('location:manageprod.php?page=notification');
