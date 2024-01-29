<?php
include '../dbconnection.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <style>    
.admin {
  background-color: pink;
  color: #565959;
  border: none;
  border-radius: 5px;
  padding: 10px 20px;
  font-size: 16px;
  cursor: pointer;
}  
.admin {
  display: inline-block;
  font-weight: 400;
  text-align: center;
  vertical-align: middle;
  user-select: none;
  border: 1px solid transparent;
  padding: 10px 8px;
  font-size: 25px;
  line-height: 1.5;
  border-radius: 5px;
  transition: color 0.15s ease-in-out, background-color 0.15s ease-in-out, border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
}
    </style>
</head>
<body>
    <h1 > AdminDashboard </h1>
    <div class =" container  my-5">
        <div   >
            <button class ="admin"><a href="display.php" >Manage user</button></a>
            <button class ="admin"><a href="manageorder.php" >Manage Order</button></a>
            <button class ="admin"><a href="logout.php" >Logout</button></a>
            <button class ="admin"><a href="chiefregistration.php">Chef Registration</a>
</body>
</html>
