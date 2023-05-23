<?php
require '/Users/anas/Desktop/mowla-cendol/db_connect.php';

class OrderController
{

    function getOrders()
    {
        $query = /** @lang text */
            "SELECT o.id, o.customerName, o.orderDate, o.doneStatus, f.foodName, fo.foodQuantity FROM orders o
          INNER JOIN food_order fo ON o.id = fo.order_id
          INNER JOIN food f ON f.id = fo.food_id";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    function getOrdersByDate($date)
    {
        $query = /** @lang text */
            "SELECT o.id, o.customerName, o.orderDate, o.doneStatus, f.foodName, fo.foodQuantity FROM orders o
          INNER JOIN food_order fo ON o.id = fo.order_id
          INNER JOIN food f ON f.id = fo.food_id
          WHERE o.orderDate = :date";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindValue(':date', $date);
        $statement->execute();
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    public function getDoneOrders()
    {
        $query = /** @lang text */
            "SELECT o.id, o.customerName, o.orderDate, o.doneStatus, f.foodName, fo.foodQuantity FROM orders o
              INNER JOIN food_order fo ON o.id = fo.order_id
              INNER JOIN food f ON f.id = fo.food_id
              WHERE o.done = 1";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $orders = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $orders;
    }

    public function getOrdersSortedByDoneStatus($ascending)
    {
        $query = /** @lang text */
            "SELECT * FROM orders ORDER BY doneStatus " . ($ascending ? "ASC" : "DESC");
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
    }
}
