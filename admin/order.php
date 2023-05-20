<?php
require 'controllers/OrderController.php';

$pageTitle = "Orders";
$date = isset($_POST['date']) ? $_POST['date'] : '';

?>

<?php include './partials/head.php'; ?>
<?php include './partials/nav.php'; ?>
<?php include './partials/header.php'; ?>

<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <div class="flex flex-col">
            <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
                <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">

                    <div class="overflow-hidden">
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


                        <div class="overflow-x-auto rounded-xl">
                            <table class="min-w-full divide-y-2 divide-gray-200 bg-white text-sm">
                                <thead class="ltr:text-left rtl:text-right">
                                <tr>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">
                                        No
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">
                                        Name
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">
                                        Food
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">
                                        Quantity
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">
                                        Date
                                    </th>
                                    <th class="whitespace-nowrap px-4 py-3 font-medium text-gray-900">
                                        Done
                                    </th>
                                </tr>
                                </thead>

                                <tbody class="divide-y divide-gray-200">

                                <?php

                                $orderController = new OrderController();
                                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['date'])) {
                                    $selectedDate = $_POST['date'];
                                    $orders = $orderController->getOrdersByDate($selectedDate);
                                } else {
                                    $orders = $orderController->getOrders();
                                }

                                //                                die(var_dump($orders));


                                foreach ($orders as $order) {
                                    ?>
                                    <tr>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            <?php echo $order['id']; ?>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 font-medium text-gray-900">
                                            <?php echo $order['name']; ?>
                                        </td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $order['food']; ?></td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $order['quantity']; ?></td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $order['order_date']; ?></td>
                                        <td class="whitespace-nowrap px-4 py-2 text-gray-700"><?php echo $order['done']; ?></td>
                                    </tr>
                                    <?php
                                }
                                ?>
                                </tbody>
                            </table>
                        </div>


                    </div>
                </div>
            </div>
        </div>
    </div>
</main>

<?php include './partials/footer.php'; ?>
