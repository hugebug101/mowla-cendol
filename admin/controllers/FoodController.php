<?php
require '/Users/anas/Desktop/mowla-cendol/db_connect.php';

class FoodController
{
    function getFood()
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
}