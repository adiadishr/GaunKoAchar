<?php
include '../dbconnect.php';
$uid = $_GET['user_id'];

$q = mysqli_query($conn, "DELETE FROM user where user_id='$uid'");

header('location:manageUsr.php?page=manage_users');
