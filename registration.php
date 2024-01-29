<?php
require 'dbconnection.php';
session_start(); // Add this line to start the session

if (!empty($_SESSION["id"])) {
  header("Location: index.php");
  exit; // Add exit here to prevent further execution
}

if (isset($_POST["submit"])) {
  $username = $_POST['username'];
  $first_name = $_POST['first_name'];
  $last_name = $_POST['last_name'];
  $password = $_POST['password'];
  $password2 = $_POST['password2'];
  $contact_number = $_POST['contact_number'];
  $address = $_POST['address'];

  // Check if the username already exists
  $duplicate = mysqli_query($conn, "SELECT * FROM user WHERE username = '$username'");

  if (!$duplicate) {
    // Query execution failed, show the error message
    echo "Error: " . mysqli_error($conn);
    exit; // Stop the script execution to prevent further issues
  }

  if (mysqli_num_rows($duplicate) > 0) {
    echo "<script>alert('Username or Email Has Already Taken');</script>";
  } else {
    if ($password == $password2) {
      // Use prepared statements to prevent SQL injection
      $hashed_password = password_hash($password, PASSWORD_DEFAULT);
      $password = md5($password);
      $query = "INSERT INTO user (`first_name`, `last_name`, `username`, `password`, `contact_number`, `address`, role_id)
      VALUES(?, ?, ?, ?, ?, ?, 2)";


      $stmt = mysqli_prepare($conn, $query);
      mysqli_stmt_bind_param($stmt, "ssssss", $first_name, $last_name, $username, $password, $contact_number, $address);

      if (mysqli_stmt_execute($stmt)) {
        echo "<script>alert('Registration Successful');</script>";
        header ("Location:homepage.php");
      } else {
        echo "Error: " . mysqli_error($conn);
      }

      mysqli_stmt_close($stmt); // Close the prepared statement
    } else {
      echo "<script>alert('Password Does Not Match');</script>";
    }
  }
}
?>