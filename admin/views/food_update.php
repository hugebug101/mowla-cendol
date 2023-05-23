<?php
$pageTitle = "Food Update";

require '../controllers/FoodController.php';
require '../partials/head.php';
require '../partials/nav.php';
require '../partials/header.php';

$foodId = $_GET['id'];
$foodController = new FoodController();
$food = $foodController->getFoodById($foodId);

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['foodName']) && isset($_POST['foodPrice'])) {
        $foodName = $_POST['foodName'];
        $foodPrice = $_POST['foodPrice'];

        $foodController->updateFood($foodName, $foodPrice, $foodId);

        $food['foodName'] = $foodName;
        $food['foodPrice'] = $foodPrice;

        echo "<script>alert('Food updated successfully!');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Food</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 shadow-md rounded-md max-w-md w-full">
        <h1 class="text-3xl font-bold text-center mb-6">Update Food</h1>

        <form action="" method="POST" class="space-y-4">
            <div class="flex flex-col">
                <label for="foodName" class="text-gray-700">Food Name</label>
                <input type="text" id="foodName" name="foodName" placeholder="Enter food name"
                       value="<?= $food['foodName'] ?>"
                       class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500"
                       required>
            </div>

            <div class="flex flex-col">
                <label for="foodPrice" class="text-gray-700">Food Price</label>
                <input type="text" id="foodPrice" name="foodPrice" placeholder="Enter food price"
                       value="<?= $food['foodPrice'] ?>"
                       class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:border-blue-500"
                       required>
            </div>

            <div class="flex justify-end">
                <button type="submit"
                        class="bg-blue-500 hover:bg-blue-600 text-white font-bold px-4 py-2 rounded-md">Update
                </button>
            </div>
        </form>
    </div>
</div>
</body>

</html>

<?php require '../partials/footer.php'; ?>
