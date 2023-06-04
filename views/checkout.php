<?php
$pageTitle = 'Order Summary';
require_once '../admin/controllers/FoodController.php';
require_once '../admin/controllers/CartController.php';

$cartController = new CartController();
$items = $cartController->getCart();
var_dump($items);

//if session is not set redirect the menu page with error message
if (!isset($_SESSION['cart'])) {
    header('Location: http://localhost:8888/views/menu.php?message=You dont have any items in your cart.');
    exit();
}
?>
<?php include '../partials/head.php'; ?>
<?php include '../partials/nav.php'; ?>
<?php include '../partials/header.php'; ?>

<main class="flex-grow min-h-screen">
    <div class="grid sm:px-10 lg:grid-cols-2 lg:px-20 xl:px-32">
        <div class="px-4 pt-8">

            <!-- Order Summary -->
            <p class="text-xl font-medium">Order Summary</p>
            <p class="text-gray-400">Check your items.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-2 py-4 sm:px-6">
                <?php foreach ($items as $item) : ?>
                    <div class="flex flex-col rounded-lg bg-white sm:flex-row">
                        <img class="m-2 h-24 w-28 rounded-md border object-cover object-center"
                             src="https://images.unsplash.com/flagged/photo-1556637640-2c80d3201be8?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxzZWFyY2h8M3x8c25lYWtlcnxlbnwwfHwwfHw%3D&auto=format&fit=crop&w=500&q=60"
                             alt="">
                        <div class="flex w-full flex-col px-4 py-4">
                            <span class="font-semibold"><?= $item['name'] ?></span>
                            <p class="text-lg font-semibold">RM <?= $item['price'] ?></p>
                            <span class="float-right text-sm text-gray-400">Qty <?= $item['quantity'] ?></span>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <br>

            <!-- Service Options -->
            <p class="text-xl font-medium">Service Options</p>
            <p class="text-gray-400">Choose your preferred service option.</p>
            <div class="mt-5 space-y-6">
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="relative flex items-center space-x-4">
                        <img class="w-14 object-contain" src="../resources/images/dine-in.png" alt="Dine-in">
                        <div>
                            <span class="font-semibold">Dine-in</span>
                            <p class="text-slate-500 text-sm leading-6">Enjoy your meal at our court</p>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="relative flex items-center space-x-4">
                        <img class="w-14 object-contain" src="../resources/images/takeaway.png" alt="Takeaway">
                        <div>
                            <span class="font-semibold">Takeaway</span>
                            <p class="text-slate-500 text-sm leading-6">Pick up your order to go</p>
                        </div>
                    </div>
                </div>
            </div>

            <br>

            <!-- Payment Methods -->
            <p class="mt-8 text-lg font-medium">Payment Options Available at Counter</p>
            <p class="text-gray-400">Choose your preferred payment method.</p>
            <div class="mt-5 space-y-6">
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="relative flex items-center space-x-4">
                        <img class="w-14 object-contain" src="../resources/images/tng-logo-ewallet.png"
                             alt="TNG payment">
                        <div>
                            <span class="font-semibold">Touch 'n Go eWallet</span>
                            <p class="text-green-600 text-sm leading-6">Recommended</p>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="relative flex items-center space-x-4">
                        <img class="w-14 object-contain" src="../resources/images/duitnow-qr.png" alt="TNG payment">
                        <div>
                            <span class="font-semibold">DuitNow QR</span>
                            <p class="text-green-600 text-sm leading-6">Recommended</p>
                        </div>
                    </div>
                </div>
                <div class="border border-gray-300 rounded-lg p-4">
                    <div class="relative flex items-center space-x-4">
                        <img class="w-14 object-contain" src="../resources/images/cash-hand.png" alt="TNG payment">
                        <div>
                            <span class="font-semibold">Pay at Counter</span>
                            <p class="text-slate-500 text-sm leading-6">Cash payment upon pickup</p>
                            <p class="text-slate-500 text-sm leading-6">Ready for pickup in 15-20 minutes</p></div>
                    </div>
                </div>
            </div>

        </div>

        <?php
        $totalPrice = 0;
        foreach ($items as $item) {
            $totalPrice += $item['price'] * $item['quantity'];
        }
        ?>

        <!-- Payment Details -->
        <div class="mt-10 bg-gray-50 px-4 pt-8 lg:mt-0">
            <p class="text-xl font-medium">Payment Details</p>
            <p class="text-gray-400">Complete your order by providing your payment details.</p>
            <div class="mt-8 space-y-3 rounded-lg border bg-white px-6 py-4">
                <div class="flex items-center justify-between border-b py-2">
                    <span class="font-semibold">Subtotal</span>
                    <span class="text-gray-600">RM <?= $totalPrice ?></span>
                </div>
                <div class="flex items-center justify-between border-b py-2">
                    <span class="font-semibold">Total</span>
                    <span class="text-lg font-semibold">RM <?= $totalPrice ?></span>
                </div>
            </div>

            <form action="place_order.php" method="POST" class="mt-8">
                <div class="mb-4">
                    <label for="custName" class="block text-lg font-medium text-gray-800">Your Name</label>
                    <input type="text" id="custName" name="custName" placeholder="Enter your name"
                           class="mt-1 px-4 py-2 w-full border border-gray-300 rounded-md focus:outline-none focus:ring-blue-500 focus:border-blue-500"
                           autocomplete="off" required>
                </div>
                <button type="submit"
                        class="mt-4 w-full py-3 px-6 font-medium text-white bg-gray-900 rounded-md hover:bg-gray-800 transition-colors duration-300">
                    Place Order
                </button>
            </form>

        </div>
    </div>
</main>
<?php include '../partials/footer.php'; ?>
