<?php
require '../../db_connect.php';

//die('This page is not yet implemented');

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve form data
    $email = $_POST['email'];
    $password = $_POST['password'];

    // bcrypt the password
    $password = password_hash($password, PASSWORD_DEFAULT);

    // check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        header('Location: register.php?error=invalid_email');
        exit;
    }

    // check if email already exists
    $statement = $db->prepare("SELECT * FROM admin WHERE email = :email");
    $statement->bindParam(':email', $email);
    $statement->execute();
    $user = $statement->fetch(PDO::FETCH_ASSOC);

    // if already exists, alert user that email is already taken
    if ($user) {
        header('Location: register.php?error=email_taken');
        exit;
    }


    // Store the data in the database
    $statement = $db->prepare("INSERT INTO admin (email, password) VALUES (:email, :password)");
    $statement->bindParam(':email', $email);
    $statement->bindParam(':password', $password);
    $statement->execute();

    // Redirect to success page
    header('Location: register_success.php');
}
