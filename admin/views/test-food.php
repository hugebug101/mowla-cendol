<?php
$pageTitle = "test food";

require '../controllers/FoodController.php';
require '../partials/head.php';
require '../partials/nav.php';
require '../partials/header.php';

// Pagination configuration
$itemsPerPage = 6; // Number of items to display per page
$currentpage = isset($_GET['page']) ? $_GET['page'] : 1; // Get the current page from the query parameter

// Handle form submission
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['foodName']) && isset($_POST['foodPrice'])) {
        $foodName = $_POST['foodName'];
        $foodPrice = $_POST['foodPrice'];

        $foodController = new FoodController();
        $foodController->addFood($foodName, $foodPrice);
    }
}

?>

<main>

    <main>
        <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
            <div class="overflow-hidden px-5 ">
                <h2 class="text-xl font-semibold mb-2">Add New Food Item</h2>
                <!-- Form for adding new food item -->
            </div>

            <div class=" m-5">
                <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
                    <?php
                    $foodController = new FoodController();
                    $totalItems = $foodController->getTotalFoodCount(); // Get the total number of food items
                    $totalPages = ceil($totalItems / $itemsPerPage); // Calculate the total number of pages

                    $foods = $foodController->getPaginatedFoods($currentpage, $itemsPerPage); // Get the foods for the current page

                    foreach ($foods as $food) : ?>

                        <div class="p-4 bg-white rounded-lg shadow-md">
                            <div class="font-semibold mb-2"><?= $food['foodName'] ?></div>
                            <div class="text-gray-500 mb-2">Price: RM <?= number_format($food['foodPrice'], 2) ?></div>
                            <!-- Actions for each food item -->
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <!-- Pagination links -->
            <div class="flex justify-center items-center mt-4">
                <?php if ($totalPages > 1) : ?>
                    <ul class="flex space-x-2">
                        <?php if ($currentpage > 1) : ?>
                            <li>
                                <a href="?page=<?= $currentpage - 1 ?>"
                                   class="px-3 py-1 rounded-md bg-blue-500 text-white">
                                    Previous
                                </a>
                            </li>
                        <?php endif; ?>

                        <?php for ($page = 1; $page <= $totalPages; $page++) : ?>
                            <li>
                                <a href="?page=<?= $page ?>"
                                   class="px-3 py-1 rounded-md <?= $page == $currentpage ? 'bg-blue-500 text-white' : 'bg-gray-200 text-gray-700' ?>">
                                    <?= $page ?>
                                </a>
                            </li>
                        <?php endfor; ?>

                        <?php if ($currentpage < $totalPages) : ?>
                            <li>
                                <a href="?page=<?= $currentpage + 1 ?>"
                                   class="px-3 py-1 rounded-md bg-blue-500 text-white">
                                    Next
                                </a>
                            </li>
                        <?php endif; ?>
                    </ul>
                <?php endif; ?>
            </div>

        </div>
    </main>

</main>

<?php include '../partials/footer.php'; ?>

