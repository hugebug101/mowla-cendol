<?php
$pageTitle = "Food Delete";

require '../controllers/FoodController.php';
require '../partials/head.php';
require '../partials/nav.php';
require '../partials/header.php';
?>
<body class="bg-gray-100">
<div class="flex justify-center items-center min-h-screen">
    <div class="bg-white p-8 shadow-md rounded-lg max-w-md w-full">
        <h1 class="text-3xl font-bold text-center mb-6">Delete Food</h1>
        <?php
        $foodId = $_GET['id'];
        $foodController = new FoodController();
        $food = $foodController->getFoodById($foodId);
        ?>
        <form action="../controllers/FoodController.php" method="POST" class="space-y-4">
            <input type="hidden" name="action" value="deleteFood">
            <input type="hidden" name="foodID" value="<?= $_GET['id'] ?>">
            <div class="flex flex-col">
                <label for="foodName" class="text-gray-700">Food Name</label>
                <input type="text" id="foodName" name="foodName" value="<?= $food['foodName'] ?>"
                       class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none" disabled>
            </div>
            <div class="flex flex-col">
                <label for="foodPrice" class="text-gray-700">Food Price</label>
                <input type="text" id="foodPrice" name="foodPrice" value="<?= $food['foodPrice'] ?>"
                       class="border border-gray-300 rounded-md px-3 py-2 focus:outline-none" disabled>
            </div>
            <div class="flex justify-end">
                <button type="submit"
                        class="bg-red-500 hover:bg-red-600 text-white font-bold px-4 py-2 rounded-md">Delete
                </button>
            </div>
        </form>
    </div>
</div>
</body>

<?php require '../partials/footer.php'; ?>
