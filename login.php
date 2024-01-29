<?php
session_start(); // Initialize the session

require 'dbconnection.php';
if (!empty($_SESSION["user_id"])) {
    header("Location: homepage.php");
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM `user` WHERE username = '$username'");

    if (!$result) {
        echo "Error: " . mysqli_error($conn);
        exit;
    }

    $row = mysqli_fetch_assoc($result);

    if (mysqli_num_rows($result) > 0) {
        $role_id = $row['role_id'];

        if ($role_id == '1') {
            // Admin login
            if (md5($password) == $row['password']) {
                $_SESSION['username'] = $username;
                $_SESSION['role_id'] = '1';
                header('location: admin/admindashboard.php');
                exit;
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        } elseif ($role_id == '2') {
            // User login
            if (md5($password) == $row['password']) {
                $_SESSION["user_id"] = $row["user_id"];
                $_SESSION['loggedin'] = TRUE;
                $_SESSION['username'] = $username;
                $_SESSION['role_id'] = '2';
                header('location: homepage.php');
                exit;
            } else {
                echo "<script>alert('Wrong Password');</script>";
            }
        }
    }
}
?>