<?php
require 'db_connect.php'; // Include your database connection file

// Get the token from the URL parameter
$token = $_GET['token'];

// Verify the token against the database
$statement = $db->prepare("SELECT * FROM password_reset_requests WHERE token = :token");
$statement->bindParam(':token', $token);
$statement->execute();
$request = $statement->fetch(PDO::FETCH_ASSOC);

// Check if a valid request is found
if ($request) {
    // Check if the token has expired
    $expirationPeriod = 3600; // 1 hour in seconds
    $timestamp = strtotime($request['timestamp']);
    $currentTimestamp = time();

    if (($currentTimestamp - $timestamp) > $expirationPeriod) {
        // Token has expired
        echo "The password reset link has expired. Please request a new one.";
        exit;
    }

    // Token is valid and not expired, allow password reset
    // Display the password reset form or perform any necessary actions

    // Handle form submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Retrieve form data
        $newPassword = $_POST['new_password'];

        // Hash the new password
        $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);

        // Update the password in the database
        $email = $request['email'];
        $updateStatement = $db->prepare("UPDATE admin SET password = :password WHERE email = :email");
        $updateStatement->bindParam(':password', $hashedPassword);
        $updateStatement->bindParam(':email', $email);
        $updateStatement->execute();

        // Delete the password reset request from the table
        $deleteStatement = $db->prepare("DELETE FROM password_reset_requests WHERE token = :token");
        $deleteStatement->bindParam(':token', $token);
        $deleteStatement->execute();

        // Redirect to a success page or login page
        header('Location: reset_password_success.php');
        exit;
    }

    // Display the password reset form
    ?>
    <!DOCTYPE html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>Reset Password</title>
    </head>
    <body>
    <h2>Reset Your Password</h2>
    <form action="" method="POST">
        <label for="new_password">New Password:</label>
        <input type="password" id="new_password" name="new_password" required>
        <br>
        <button type="submit">Reset Password</button>
    </form>
    </body>
    </html>
    <?php

} else {
    // Invalid or expired token
    echo "Invalid password reset link. Please try again.";
}
?>
