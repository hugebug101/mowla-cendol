<?php
$pageTitle = "Dashboard";

require '../controllers/FoodController.php';
require '../partials/head.php';
require '../partials/nav.php';
require '../partials/header.php';

?>

<main class="flex-grow min-h-screen bg-gray-100">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <!-- Your page content here -->
        <div class="bg-white rounded-lg shadow-lg">
            <div class="p-6 ">
                <h3 class="text-lg font-medium">Welcome, Admin!</h3>
                <p class="mt-2 text-sm text-gray-600">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla
                    euismod tortor sit amet est lobortis, id condimentum ex malesuada. Aenean a nulla auctor, pulvinar
                    nulla sed, fringilla purus. Sed consectetur mi in metus rutrum, ac iaculis velit blandit.</p>
                <button class="px py-2 text-sm font-medium text-blue-600 bg-white rounded-full focus:outline-none focus:ring-2 focus:ring-blue-600">
                    View More
                </button>
            </div>
        </div>
        <div class="mt-8 grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3">
            <a href="order.php">
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition duration-300">
                    <h4 class="text-lg font-medium">Orders</h4>
                    <p class="mt-2 text-sm text-gray-600">You have <span class="font-semibold text-green-600">5</span>
                        pending orders.
                    </p>
                </div>
            </a>
            <a href="">
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition duration-300">
                    <h4 class="text-lg font-medium">Customers</h4>
                    <p class="mt-2 text-sm text-gray-600">You have <span class="font-semibold text-green-600">10</span>
                        new customers
                        this week.</p>
                </div>
            </a>
            <div class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition duration-300">
                <h4 class="text-lg font-medium">Revenue</h4>
                <p class="mt-2 text-sm text-gray-600">Your revenue for the month is <span
                            class="font-semibold text-green-600">RM5,000</span>.</p>
            </div>
            <a href="food.php">
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition duration-300">
                    <h4 class="text-lg font-medium">Products</h4>
                    <p class="mt-2 text-sm text-gray-600">You have <span class="font-semibold text-green-600">20</span>
                        products in
                        your inventory.</p>
                </div>
            </a>
            <a href="">
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition duration-300">
                    <h4 class="text-lg font-medium">Messages</h4>
                    <p class="mt-2 text-sm text-gray-600">You have <span class="font-semibold text-green-600">3</span>
                        new messages.
                    </p>
                </div>
            </a>
            <a href="">
                <div class="p-6 bg-white rounded-lg shadow hover:shadow-xl transition duration-300">
                    <h4 class="text-lg font-medium">Settings</h4>
                    <p class="mt-2 text-sm text-gray-600">Manage your account settings and preferences.</p>
                </div>
            </a>
        </div>
    </div>
</main>

<?php include '../partials/footer.php'; ?>
