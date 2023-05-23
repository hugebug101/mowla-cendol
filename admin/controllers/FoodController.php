<?php
require '/Users/anas/Desktop/mowla-cendol/db_connect.php';

class FoodController
{
    function getFoods()
    {
        $query = /** @lang text */
            "SELECT * FROM food";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $food = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $food;
    }

    function sortByName()
    {
        $query = /** @lang text */
            "SELECT * FROM food ORDER BY name ASC";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $food = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $food;
    }

    function getFoodById($foodId)
    {
        $query = /** @lang text */
            "SELECT * FROM food WHERE id = :foodId";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':foodId', $foodId);
        $statement->execute();
        $food = $statement->fetch(PDO::FETCH_ASSOC);
        return $food;
    }

    function addFood($foodName, $foodPrice)
    {
        $query = /** @lang text */
            "INSERT INTO food (foodName, foodPrice) VALUES (:foodName, :foodPrice)";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':foodName', $foodName);
        $statement->bindParam(':foodPrice', $foodPrice);
        $statement->execute();
    }

    function deleteFood($foodId)
    {
        $query = /** @lang text */
            "DELETE FROM food WHERE id = :foodId";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':foodId', $foodId);
        $statement->execute();
    }

    public function updateFood($foodName, $foodPrice, $foodId)
    {
        $query = /** @lang text */
            "UPDATE food SET foodName = :foodName, foodPrice = :foodPrice WHERE id = :foodId";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':foodId', $foodId);
        $statement->bindParam(':foodName', $foodName);
        $statement->bindParam(':foodPrice', $foodPrice);
        $statement->execute();
    }

    function getFoodByUserID($userID)
    {
        $query = /** @lang text */
            "SELECT f.foodName
        FROM food_order AS fo
        JOIN food AS f ON f.id = fo.food_id
        JOIN `orders` AS o ON o.id = fo.order_id
        WHERE o.id = :userID";

        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':userID', $userID);
        $statement->execute();

        $foods = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $foods;
    }

}