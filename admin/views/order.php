<?php
$pageTitle = "Orders";

require '../controllers/OrderController.php';
require '../controllers/FoodController.php';

require '../partials/head.php';
require '../partials/nav.php';
require '../partials/header.php';

$date = isset($_POST['date']) ? $_POST['date'] : '';

$orderController = new OrderController();
$foodController = new FoodController();

$orders = $orderController->getOrders();
//var_dump($orders);


if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
    $selectedDate = $_POST['date'];
    $orders = $orderController->getOrdersByDate($selectedDate);
} else {
    $orders = $orderController->getOrders();
}

?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="overflow-hidden px-5 ">
            <form action="" method="POST" class="mb-4">
                <label for="date" class="block mb-2 font-medium">Filter by Date:</label>
                <div class="flex items-center">
                    <input type="date" id="date" name="date"
                           class="w-48 px-4 py-2 border border-gray-300 rounded-md mr-4"
                           value="<?php echo isset($date) ? $date : ''; ?>" required>
                    <button type="submit"
                            class="px-4 py-2 bg-blue-500 text-white rounded-md hover:bg-blue-600">Filter
                    </button>
                    <button type="button"
                            onclick="document.getElementById('date').value = '<?php echo date('Y-m-d'); ?>';
                                    document.getElementById('date').form.submit();"
                            class="px-4 py-2 ml-2 bg-blue-500 text-white rounded-md hover:bg-gray-600">Today
                    </button>
                </div>
            </form>
        </div>
        <!-- component -->
        <div class="overflow-hidden rounded-lg border border-gray-200 shadow-md m-5">
            <table class="w-full border-collapse bg-white text-left text-sm text-gray-500">
                <thead class="bg-gray-50">
                <tr>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">No</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Name</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Food</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Quantity</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Date</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900">Done</th>
                    <th scope="col" class="px-6 py-4 font-medium text-gray-900"></th>
                </tr>
                </thead>
                <tbody class="divide-y divide-gray-100 border-t border-gray-100">
                <?php
                echo '<br>';
                $rowNumber = 1;
                foreach ($orders as $order) : ?>
                    <tr class="hover:bg-gray-50">
                        <th class="flex gap-3 px-6 py-4 font-normal text-gray-900">
                            <div class="text-sm">
                                <div class="font-medium text-gray-700"><?= $rowNumber ?></div>
                            </div>
                        </th>
                        <td class="px-6 py-4">
                            <?= $order['customerName'] ?>
                        </td>

                        <?php
                        $foods = $foodController->getFoodByUserID($order['id']);
                        ?>

                        <td class="px-6 py-4">
                            <div class="flex gap-2">
                                <?php
                                $foodNames = explode(', ', $order['foodName']);
                                foreach ($foodNames as $index => $food) : ?>
                                    <span class="inline-flex items-center gap-1 rounded-full bg-blue-100 px-2 py-1 text-xs font-semibold text-blue-800">
                                            <?= $food ?>
                                        </span>
                                    <?php if ($index !== count($foodNames) - 1) : ?>
                                        <span class="inline-flex items-center">,</span>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </div>
                        </td>
                        <td class="px-6 py-4">
                            <?= $order['foodName'] ?> x <?= $order['foodQuantity'] ?>
                        </td>

                        <td class="px-6 py-4">
                            <?= $order['orderDate'] ?>
                        </td>


                        <td class="px-6 py-4">
                            <form action="">
                                <button>
                                    <?php if ($order['doneStatus']): ?>
                                        <span class="text-green-500 font-semibold">Yes</span>
                                    <?php else: ?>
                                        <span class="text-red-500 font-semibold">No</span>
                                    <?php endif; ?>
                                </button>
                            </form>
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
