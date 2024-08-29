<?php
session_start();
include('orderServer.php');

$message = ""; // Initialize the variable

if (isset($_SESSION['Email'])) {
    // User is logged in, proceed to checkout
    $email = $_SESSION['Email'];

    // Check if the shopping cart is not empty
    if (isset($_SESSION["shopping_cart"]) && count($_SESSION["shopping_cart"]) > 0) {
        // Get the address information
        $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
        $address = isset($_POST['address']) ? $_POST['address'] : '';
        $city = isset($_POST['city']) ? $_POST['city'] : '';
        $state = isset($_POST['state']) ? $_POST['state'] : '';
        $zip = isset($_POST['zip']) ? $_POST['zip'] : '';

        // Validate and sanitize user input
        // ...

        // Establish a database connection
        $conn = new mysqli("localhost", "root", "", "beauté_rose");
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Insert the address into the database
        $sql_address = "INSERT INTO adress (State, Firstname, Address, City, ZIPcode, Email) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt_address = $conn->prepare($sql_address);
        if ($stmt_address === false) {
            die("Error occurred while preparing the address statement: " . $conn->error);
        }
        $stmt_address->bind_param("ssssis", $state, $firstname, $address, $city, $zip, $email);

        if ($stmt_address->execute()) {
            // Address insertion successful
            $addressID = $stmt_address->insert_id;

            // Get the order status
            $orderStatus = isset($_POST['order_status']) ? $_POST['order_status'] : 'Pending'; // Set a default value if not provided

            // Get the current date
            $orderDate = date("Y-m-d"); // Set the current date as the order date

            if ($orderDate === false) {
                die("Error occurred while getting the current date.");
            }

            // Insert an order into the order_mp table
            $sql_order = "INSERT INTO order_mp (Order_Date, Order_Status, Email, AdressID) VALUES (?, ?, ?, ?)";
            $stmt_order = $conn->prepare($sql_order);
            if ($stmt_order === false) {
                die("Error occurred while preparing the order statement: " . $conn->error);
            }
            $stmt_order->bind_param("sssi", $orderDate, $orderStatus, $email, $addressID);

            // Check if the order insertion is successful
            if ($stmt_order->execute()) {
                $message = "Checkout successful! Your order has been placed.";
            } else {
                $message = "Error occurred while placing the order: " . $conn->error;
            }
        } else {
            $message = "Error occurred while inserting the address: " . $conn->error;
        }
    } else {
        $message = "Your shopping cart is empty.";
    }
} else {
    $message = "You need to log in before proceeding to checkout.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payment Confirmation</title>
</head>
<body>
    <h1><?php echo $message; ?></h1>
</body>
</html>
