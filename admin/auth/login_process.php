<?php
require '../../db_connect.php';
session_start();

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Retrieve the user from the database based on the email
    $statement = $GLOBALS['db']->prepare("SELECT * FROM admin WHERE email = :email");
    $statement->bindParam(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // Check if the user exists and verify the password
    if ($user && password_verify($password, $user['password'])) {
        // Authentication successful, set session variables
        $_SESSION['email'] = $email;
        $_SESSION['loggedIn'] = true;

        // Redirect to the dashboard or any other page you want
        header('Location: login_success.php');
    } else {
        // Invalid credentials, redirect back to the login page with an error message
        header('Location: login.php?error=invalid_credentials');
    }
    exit();
} else {
    // If someone tries to access this page directly without submitting the form, redirect back to the login page
    header('Location: ../views/login.php');
    exit();
}
