<?php
$pageTitle = 'Menu Page';
require_once '../admin/controllers/FoodController.php';
$foodController = new FoodController();

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 8;

$foods = $foodController->getPaginatedFoods($currentPage, $itemsPerPage);
$totalFoods = $foodController->getTotalFoodCount();
$totalPages = ceil($totalFoods / $itemsPerPage);
?>

<?php include '../partials/head.php'; ?>
<?php include '../partials/nav.php'; ?>
<?php include '../partials/header.php'; ?>

<main>
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <h2 class="sr-only">Products</h2>

        <div class="grid grid-cols-1 gap-x-6 gap-y-10 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 xl:gap-x-8">
            <?php foreach ($foods as $food) : ?>
                <a href="#" class="group flex flex-col items-end">
                    <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-lg bg-gray-200 xl:aspect-h-8 xl:aspect-w-7">
                        <img src="https://tailwindui.com/img/ecommerce-images/category-page-04-image-card-03.jpg"
                             alt="Person using a pen to cross a task off a productivity paper card."
                             class="h-48 w-full object-cover object-center group-hover:opacity-75">
                    </div>
                    <h3 class="mt-4 text-sm text-gray-700 self-end"><?= ucwords($food['foodName']) ?></h3>
                    <p class="mt-1 text-lg font-medium text-gray-900 self-end">
                        RM <?= number_format($food['foodPrice'], 2) ?></p>
                    <span class="mt-2 inline-flex rounded-md shadow-sm">
            <button type="button"
                    class="inline-flex items-center px-4 py-2 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-500 focus:outline-none focus:border-indigo-700 focus:shadow-outline-indigo active:bg-indigo-700 transition ease-in-out duration-150">
                Add to Cart
            </button>
        </span>
                </a>
            <?php endforeach; ?>
        </div>
        <?php include '../partials/openCart.php'; ?>
        <?php include '../partials/pagination.php'; ?>
    </div>
</main>

<?php include '../partials/extensions.php'; ?>
<?php include '../partials/footer.php'; ?>
