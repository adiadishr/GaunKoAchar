<?php
include '../dbconnection.php';
if(isset($_GET['deleteid'])){
    $order_id =$_GET['deleteid'];

    $sql = "DELETE FROM `orders` WHERE order_id = $order_id";
    $result= mysqli_query($conn,$sql);
    if ($result) {
        // echo" Deleted successfully";
        header("Location: manageorder.php");
        } else{
            die(mysqli_error($conn));
        }
}

?>