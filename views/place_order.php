<?php
require '/Users/anas/Desktop/mowla-cendol/db_connect.php';
require_once '../admin/controllers/OrderController.php';
session_start();

$custName = $_POST['custName'];

$items = $_SESSION['cart'];

foreach ($items as &$item) {
    $item['custName'] = $custName;
}

$orderController = new OrderController();

$orderController->createOrder($custName, date('Y-m-d'), 0, $items);

unset($_SESSION['cart']);

$message = 'Order placed successfully!';
header('Location: ../views/test.php?message=' . urlencode($message));
exit();
?>
