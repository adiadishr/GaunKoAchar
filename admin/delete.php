<?php
include '../dbconnection.php';
if(isset($_GET['deleteid'])){
    $user_id =$_GET['deleteid'];

    $sql = "DELETE FROM `user` WHERE user_id = $user_id";
    $result= mysqli_query($conn,$sql);
    if ($result) {
        // echo" Deleted successfully";
        header("Location: display.php");
        } else{
            die(mysqli_error($conn));
        }
}

?>