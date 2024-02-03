<?php
session_start();
include('dbconnect.php');

// Check if the request is a POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get the updated cart data from the request body
    $requestData = json_decode(file_get_contents('php://input'), true);

    if (isset($requestData['cart'])) {
        // Update the session cart data
        $_SESSION['cart'] = $requestData['cart'];

        // Send a response back to the client
        header('Content-Type: application/json');
        echo json_encode(['success' => true]);
        exit;
    }
}

// If the request is not a valid POST request, send an error response
header('HTTP/1.1 400 Bad Request');
echo 'Bad Request';
exit;
?>
