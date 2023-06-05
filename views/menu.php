<?php
$pageTitle = 'Menu List';
require_once '../admin/controllers/FoodController.php';
require_once '../admin/controllers/CartController.php';

$foodController = new FoodController();

$currentPage = isset($_GET['page']) ? $_GET['page'] : 1;
$itemsPerPage = 8;

$foods = $foodController->getPaginatedFoods($currentPage, $itemsPerPage);
$totalFoods = $foodController->getTotalFoodCount();
$totalPages = ceil($totalFoods / $itemsPerPage);

if (!isset($_SESSION['cart'])) {
	$_SESSION['cart'] = array();
}

$cartController = new CartController();

if (isset($_GET['clear_cart'])) {
	$cartController->clearCart();
	echo '<script>alert("Cart cleared successfully!");</script>';
	header('Location: ' . $_SERVER['PHP_SELF']);
}

if (isset($_GET['add_to_cart'])) {
	$itemId = $_POST['item_id'];
	$itemName = $_POST['item_name'];
	$itemPrice = $_POST['item_price'];
	$quantity = $_POST['quantity'];

	$cartController->addToCart($itemId, $itemName, $itemPrice, $quantity);
	echo '<script>alert("Item added to cart successfully!");</script>';

	// Store the current scroll position in sessionStorage
	echo '<script>sessionStorage.setItem("scrollPosition", window.scrollY);</script>';

	header('Location: ' . $_SERVER['PHP_SELF']);
}

var_dump($_SESSION['cart']);

// Get message from URL
$message = isset($_GET['message']) ? $_GET['message'] : '';
?>

<?php include '../partials/head.php'; ?>
<?php include '../partials/nav.php'; ?>
<?php include '../partials/header.php'; ?>

<script>
    // Restore the scroll position if it exists in sessionStorage
    window.onload = function () {
        const scrollPosition = sessionStorage.getItem("scrollPosition");
        if (scrollPosition) {
            window.scrollTo(0, scrollPosition);
            sessionStorage.removeItem("scrollPosition");
        }
    };

    function addToCart(itemId) {
        // Store the current scroll position in sessionStorage
        window.scrollY = window.pageYOffset;

        // Add item to cart
        const form = document.getElementById("add-to-cart-form-" + itemId);
        const formData = new FormData(form);
        const quantityInput = form.querySelector('input[name="quantity"]');
        const quantity = parseInt(quantityInput.value);

        if (quantity === 0) {
            alert("Please enter a quantity greater than zero.");
            return;
        }

        fetch("../admin/controllers/CartController.php?action=addToCart", {
            method: "POST",
            body: formData,
        })
            .then((response) => response.json())
            .then((data) => {
                // Display feedback message
                const feedbackElement = document.getElementById("feedback-" + itemId);
                feedbackElement.textContent = data.message;
                feedbackElement.classList.remove("hidden");

                // Update the cart count in the UI
                document.getElementById("cart-count").textContent = data.cartCount;
            })
            .catch((error) => {
                console.error("Error:", error);
            });

        // Refresh the page after feedback timeout
        setTimeout(function () {
            window.location.reload();
        }, 1500); // 1.5 seconds timeout
    }

</script>

<main>
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <form action="?clear_cart" method="post" class="mb-8">
            <button type="submit" class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium rounded-md
                    text-white bg-red-600 hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-red-500">
                Clear Cart
            </button>
        </form>

        <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">

			<?php foreach ($foods as $food) : ?>
                <div class="group flex flex-col items-center p-4 bg-white rounded-lg hover:shadow-md transition duration-300 ease-in-out">
                    <div class="aspect-w-3 aspect-h-2 mb-4 overflow-hidden rounded-lg">
                        <img src="https://picsum.photos/400/300/?random&category=food&id=<?= $food['id'] ?>"
                             alt="Food Image"
                             class="object-cover w-full h-full transform group-hover:scale-105 transition duration-300 ease-in-out">
                    </div>
                    <h3 class="text-lg font-semibold text-gray-900 mb-2"><?= ucwords($food['foodName']) ?></h3>
                    <p class="text-gray-700 mb-4">RM <?= number_format($food['foodPrice'], 2) ?></p>
                    <form id="add-to-cart-form-<?= $food['id'] ?>" class="w-full relative">
                        <div class="flex items-center justify-between">
                            <div class="flex">
                                <button type="button" onclick="decreaseQuantity(this)"
                                        class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-700
                                    rounded-l focus:outline-none">
                                    <span class="text-lg font-bold">-</span>
                                </button>
                                <input type="number" name="quantity" min="1" value="1"
                                       class="w-16 h-8 text-center bg-gray-200 text-gray-700 outline-none">
                                <button type="button" onclick="increaseQuantity(this)"
                                        class="flex items-center justify-center w-8 h-8 bg-gray-200 text-gray-700
                                    rounded-r focus:outline-none">
                                    <span class="text-lg font-bold">+</span>
                                </button>
                            </div>
                            <div class="flex items-center justify-between">
                                <button type="button" onclick="addToCart(<?= $food['id'] ?>)"
                                        class="inline-flex items-center px-4 py-2 border border-transparent text-sm font-medium
                                    rounded-md text-white bg-blue-800 hover:bg-indigo-700 focus:outline-none focus:ring-2
                                    focus:ring-offset-2 focus:ring-indigo-500">
                                    Add to Cart
                                </button>
                                <span id="feedback-<?= $food['id'] ?>"
                                      class="absolute top-full left-1/2 -translate-x-1/2 hidden flex items-center justify-center
                                    w-48 h-12 bg-green-500 text-white font-bold text-lg uppercase mt-2">
                                    Item added to cart!
                                </span>

                                <script>
                                    setTimeout(function () {
                                        // Hide the feedback element
                                        document.getElementById("feedback-<?= $food['id'] ?>").classList.add("hidden");
                                    }, 1800); // 1.5 seconds timeout
                                </script>
                            </div>
                        </div>
                        <input type="hidden" name="item_id" value="<?= $food['id'] ?>">
                        <input type="hidden" name="item_name" value="<?= $food['foodName'] ?>">
                        <input type="hidden" name="item_price" value="<?= $food['foodPrice'] ?>">
                    </form>
                </div>
			<?php endforeach; ?>


        </div>

		<?php include '../partials/pagination.php'; ?>
		<?php include '../partials/openCart.php'; ?>
    </div>
</main>

<?php include '../partials/extensions.php'; ?>
<?php include '../partials/footer.php'; ?>

