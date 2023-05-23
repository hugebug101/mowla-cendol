<?php
$pageTitle = "Dashboard";

require '../controllers/OrderController.php';
require '../controllers/FoodController.php';

require '../partials/head.php';
require '../partials/nav.php';
require '../partials/header.php';

$date = isset($_POST['date']) ? $_POST['date'] : '';
?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <?php
        $foodController = new FoodController();
        $foods = $foodController->getFoodByUserID(15);

        var_dump($foods);


        ?>


    </div>
</main>

<?php include '../partials/footer.php'; ?>
