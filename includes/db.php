<?php
$servername = "localhost";
$username = 'root';
$password = '';
$database = 'strumo';

//  Creating Connection
$connection = new mysqli($servername, $username, $password);

// Checking Connection
if ($connection->connect_errno != 0) {
    die('Connection Failed ' . $connection->connect_error);
}

// Creating Database
$sql = "CREATE DATABASE $database";

if ($connection->query($sql)) {
    echo "Database Created Successfully";
} else {
    echo "Error Creating Database: " . $connection->connect_error;
}
// $sql="UPDATE nischal_tbl SET username='nischal' where sid=1";
// $sql="SELECT * from users";
// $sql="DELETE from users where pid = 1";
// $sql = "INSERT INTO users VALUES 1,'Nischal','9805940865',21";