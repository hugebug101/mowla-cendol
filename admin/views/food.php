<?php
$pageTitle = "Team";
include "./controllers/FoodController.php";
?>

<?php include './partials/head.php'; ?>
<?php include './partials/nav.php'; ?>
<?php include './partials/header.php'; ?>
<?php include '.'; ?>


<main>
    <div class="mx-auto max-w-7xl py-6 sm:px-6 lg:px-8">
        <h1>Hello This is food list</h1>
        <?php

        $foodController = new FoodController();
        $foods = $foodController->sortByName();


        $rowNumber = 1;

        foreach ($foods as $food) {
            echo '<li>' . $rowNumber . ' ' . $food['name'] . ' ' . $food['price'] . '</li>';
            $rowNumber++;
        }


        ?>
    </div>
</main>

<?php include './partials/footer.php'; ?>
