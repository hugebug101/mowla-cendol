<?php
// Connect to the database
require 'db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $name = $_POST['name'];
    $food = $_POST['food'];
    $quantity = $_POST['quantity'];
    $date = $_POST['date'];

    // Prepare and execute the SQL query
    $query = "INSERT INTO orders (name, food, quantity, order_date) VALUES (:name, :food, :quantity, :order_date)";
    $statement = $db->prepare($query);
    $statement->bindParam(':name', $name);
    $statement->bindParam(':food', $food);
    $statement->bindParam(':quantity', $quantity);
    $statement->bindParam(':order_date', $date);
    $statement->execute();

    // Redirect to success page with the customer name as a URL parameter
    header('Location: success.php?name=' . urlencode($name));
    exit();
}
