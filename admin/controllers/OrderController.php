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

    public function updateDoneStatus($orderId, $doneStatus)
    {
        // Update the doneStatus in the orders table
        $updateQuery = "UPDATE orders SET doneStatus = :doneStatus WHERE id = :orderId";
        $updateStatement = $GLOBALS['db']->prepare($updateQuery);
        $updateStatement->bindParam(':doneStatus', $doneStatus);
        $updateStatement->bindParam(':orderId', $orderId);
        $updateStatement->execute();
    }


    function createOrder($customerName, $orderDate, $doneStatus, $foodItems)
    {
        if (!is_array($foodItems)) {
            // Handle the case when $foodItems is not an array
            return;
        }

        // Insert order information into the orders table
        $insertOrderQuery = "INSERT INTO orders (customerName, orderDate, doneStatus) VALUES (:customerName, :orderDate, :doneStatus)";
        $insertOrderStatement = $GLOBALS['db']->prepare($insertOrderQuery);
        $insertOrderStatement->bindParam(':customerName', $customerName);
        $insertOrderStatement->bindParam(':orderDate', $orderDate);
        $insertOrderStatement->bindParam(':doneStatus', $doneStatus);

        $insertOrderStatement->execute();


        // Get the last inserted order ID
        $orderId = $GLOBALS['db']->lastInsertId();

        // Insert food items and quantities into the food_order table
        $insertFoodQuery = "INSERT INTO food_order (order_id, food_id, foodQuantity) VALUES (:orderId, :foodId, :foodQuantity)";
        $insertFoodStatement = $GLOBALS['db']->prepare($insertFoodQuery);


        foreach ($foodItems as $foodItem) {
            if (!isset($foodItem['id']) || !isset($foodItem['quantity'])) {
                die(var_dump($foodItem));
                // Handle the case when $foodItem does not have the expected keys
                continue;
            }

            $foodId = $foodItem['id'];
            $foodQuantity = $foodItem['quantity'];

            $insertFoodStatement->bindParam(':orderId', $orderId);
            $insertFoodStatement->bindParam(':foodId', $foodId);
            $insertFoodStatement->bindParam(':foodQuantity', $foodQuantity);
            $insertFoodStatement->execute();
        }
    }

//    function createOrder($customerName, $orderDate, $doneStatus, $foodItems)
//    {
//        if (!is_array($foodItems)) {
//            // Handle the case when $foodItems is not an array
//            return;
//        }
//
//        // Insert order information into the orders table
//        $insertOrderQuery = "INSERT INTO orders (customerName, orderDate, doneStatus) VALUES (:customerName, :orderDate, :doneStatus)";
//        $insertOrderStatement = $GLOBALS['db']->prepare($insertOrderQuery);
//        $insertOrderStatement->bindParam(':customerName', $customerName);
//        $insertOrderStatement->bindParam(':orderDate', $orderDate);
//        $insertOrderStatement->bindParam(':doneStatus', $doneStatus);
//
//        $insertOrderStatement->execute();
//
//        // Get the last inserted order ID
//        $orderId = $GLOBALS['db']->lastInsertId();
//
//        // Prepare the parameters for the food items query
//        $insertFoodQuery = "INSERT INTO food_order (order_id, food_id, foodQuantity) VALUES ";
//        $foodParams = [];
//        $foodItemsCount = count($foodItems);
//
//        foreach ($foodItems as $index => $foodItem) {
//            if (!isset($foodItem['id']) || !isset($foodItem['quantity'])) {
//                // Handle the case when $foodItem does not have the expected keys
//                continue;
//            }
//
//            $foodId = $foodItem['id'];
//            $foodQuantity = $foodItem['quantity'];
//
//            $insertFoodQuery .= "(:orderId{$index}, :foodId{$index}, :foodQuantity{$index})";
//            $foodParams[":orderId{$index}"] = $orderId;
//            $foodParams[":foodId{$index}"] = $foodId;
//            $foodParams[":foodQuantity{$index}"] = $foodQuantity;
//
//            if ($index !== $foodItemsCount - 1) {
//                $insertFoodQuery .= ",";
//            }
//        }
//
//        // Insert food items and quantities into the food_order table
//        $insertFoodStatement = $GLOBALS['db']->prepare($insertFoodQuery);
//        $insertFoodStatement->execute($foodParams);
//    }


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
