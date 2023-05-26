<?php
$pageTitle = "Foods";

require '../controllers/FoodController.php';
require '../partials/head.php';
require '../partials/nav.php';
require '../partials/header.php';

?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden px-5 ">
            <h2 class="text-xl font-semibold mb-2">Add New Food Item</h2>
            <form action="../controllers/FoodController.php" method="POST" class="flex items-center space-x-4">
                <input type="hidden" name="action" value="addFood">
                <label for="foodName" class="text-gray-700">Food Name:</label>
                <input type="text" id="foodName" name="foodName" class="px-4 py-2 border border-gray-300 rounded-md"
                       required>
                <label for="foodPrice" class="text-gray-700">Food Price:</label>
                <input type="text" id="foodPrice" name="foodPrice" class="px-4 py-2 border border-gray-300 rounded-md"
                       required>
                <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Add Food
                </button>
            </form>
        </div>
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">No</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Food Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Food Price</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Action</th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">

                <?php
                $foodController = new FoodController();
                $foods = $foodController->getFoods();
                $rowNumber = 1;
                foreach ($foods as $food) : ?>
                    <tr class="hover:bg-gray-50">
                        <td class="px-6 py-4"><?= $rowNumber ?></td>
                        <td class="px-6 py-4"><?= $food['foodName'] ?></td>
                        <td class="px-6 py-4">RM <?= number_format($food['foodPrice'], 2) ?></td>
                        <td class="px-6 py-4">
                            <a href="food_update.php?id=<?= $food['id'] ?>"
                               class="text-blue-500 hover:text-blue-600 mr-2 font-bold">
                                Edit
                            </a>
                            <a href="food_delete.php?id=<?= $food['id'] ?>"
                               class="text-red-500 hover:text-red-600 font-bold">
                                Delete
                            </a>
                        </td>
                    </tr>
                    <?php
                    $rowNumber++;
                endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<?php include '../partials/footer.php'; ?>
