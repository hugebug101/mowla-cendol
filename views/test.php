<?php
$pageTitle = 'Main Page';
session_start();
var_dump($_SESSION['cart']);
?>
<?php include '../partials/head.php'; ?>
<?php include '../partials/nav.php'; ?>
<?php include '../partials/header.php'; ?>

<?php

$message = isset($_GET['message']) ? $_GET['message'] : '';
if (!empty($message)) {
    echo "<script>alert('$message');</script>";
}
?>

<main class="flex-grow min-h-screen">
    <div class="mx-auto max-w-2xl px-4 py-16 sm:px-6 sm:py-24 lg:max-w-7xl lg:px-8">
        <!-- Your page content here -->
        <h1>Hello World</h1>
    </div>
</main>

<?php include '../partials/extensions.php'; ?>
<?php include '../partials/footer.php'; ?>
