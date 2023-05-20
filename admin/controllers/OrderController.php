<?php
require '/Users/anas/Desktop/mowla-cendol/db_connect.php';

class OrderController
{

    function getOrders()
    {
        $query = "SELECT * FROM orders";
        $statement = $GLOBALS['db']->prepare($query);
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    function getOrdersByDate($date)
    {
        $query = "SELECT * FROM orders WHERE order_date = :date";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindValue(':date', $date);
        $statement->execute();
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }


    public function getDoneOrders()
    {
        $query = "SELECT * FROM orders WHERE done = 1";
        $statement = $GLOBALS['db']->prepare($query);
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }
}
