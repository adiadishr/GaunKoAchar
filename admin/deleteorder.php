<?php
include '../dbconnect.php';
$oid = $_GET['oid'];

$q = mysqli_query($conn, "DELETE FROM orders where oid  ='$oid'");

header('location:manageorder.php?page=manage_orders');