<?php

require '/Users/anas/Desktop/mowla-cendol/db_connect.php';

$foodController = new FoodController();
$foodController->handleRequest();

class FoodController
{
    public function handleRequest()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['action'])) {
                $foodController = new FoodController();

                $action = $_POST['action'];

                switch ($action) {
                    case 'getAllFood':
                        $this->handleGetAllFood();
                        break;
                    case 'addFood':
                        $this->handleAddFood();
                        break;
                    case 'deleteFood':
                        $this->handleDeleteFood();
                        break;
                    case 'updateFood':
                        $this->handleUpdateFood();
                        break;
                    default:
                        break;
                }
            }
        }
    }

    private function handleGetAllFood()
    {
        $foods = $this->getFoods();
        $this->redirectToCustomerOrder();
    }

    public function getFoods()
    {
        $query = /** @lang text */
            "SELECT * FROM food";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $food = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $food;
    }

    private function redirectToCustomerOrder()
    {
        header("Location: ../../views/test.php");
        exit();
    }

    public function handleAddFood()
    {
        if (isset($_POST['foodName']) && isset($_POST['foodPrice'])) {
            $foodName = $_POST['foodName'];
            $foodPrice = $_POST['foodPrice'];
            $this->addFood($foodName, $foodPrice);
            $this->redirectToFoodPage();
        }
    }

    public function addFood($foodName, $foodPrice)
    {
        $query = /** @lang text */
            "INSERT INTO food (foodName, foodPrice) VALUES (:foodName, :foodPrice)";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':foodName', $foodName);
        $statement->bindParam(':foodPrice', $foodPrice);
        $statement->execute();
    }

    public function redirectToFoodPage()
    {
        header("Location: ../views/food.php");
        exit();
    }

    public function handleDeleteFood()
    {
        if (isset($_POST['foodID'])) {
            $foodId = $_POST['foodID'];
            $this->deleteFood($foodId);
            $this->redirectToFoodPage();
        }
    }

    public function deleteFood($foodId)
    {
        $query = /** @lang text */
            "DELETE FROM food WHERE id = :foodId";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':foodId', $foodId);
        $statement->execute();
    }

    public function handleUpdateFood()
    {
        if (isset($_POST['foodID'])) {
            $foodId = $_POST['foodID'];
            $foodName = $_POST['foodName'];
            $foodPrice = $_POST['foodPrice'];
            $this->updateFood($foodName, $foodPrice, $foodId);
            $this->redirectToFoodPage();
        }
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

        if ($statement->rowCount() > 0) {
            $_SESSION['message'] = 'Food updated successfully!';
        } else {
            $_SESSION['message'] = 'Failed to update food.';
        }

//        die(var_dump($_SESSION['message']));

        $this->redirectToFoodPage();
    }

    public function sortByName()
    {
        $query = /** @lang text */
            "SELECT * FROM food ORDER BY name ASC";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $food = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $food;
    }

    public function getFoodById($foodId)
    {
        $query = /** @lang text */
            "SELECT * FROM food WHERE id = :foodId";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':foodId', $foodId);
        $statement->execute();
        $food = $statement->fetch(PDO::FETCH_ASSOC);
        return $food;
    }

    public function getFoodByUserID($userID)
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

    public function getTotalFoodCount()
    {
        $query = /** @lang text */
            "SELECT COUNT(*) FROM food";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $count = $statement->fetchColumn();
        return $count;
    }

    public function getPaginatedFoods($currentPage, $itemsPerPage)
    {
        $offset = ($currentPage - 1) * $itemsPerPage;
        $query = /** @lang text */
            "SELECT * FROM food LIMIT :itemsPerPage OFFSET :offset";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->bindParam(':itemsPerPage', $itemsPerPage, PDO::PARAM_INT);
        $statement->bindParam(':offset', $offset, PDO::PARAM_INT);
        $statement->execute();
        $foods = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $foods;
    }

    public function getAllFood()
    {
        $query = /** @lang text */
            "SELECT * FROM food";
        $statement = $GLOBALS['db']->prepare($query);
        $statement->execute();
        $food = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $food;
    }
}

