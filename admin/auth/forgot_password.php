<?php
require '../db_connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Retrieve the submitted email address
    $email = $_POST['email'];

    // Validate the email format
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Invalid email format
        header('Location: forgot_password.php?error=invalid_email');
        exit;
    }

    // Check if the email exists in the database
    $statement = $db->prepare("SELECT * FROM admin WHERE email = :email");
    $statement->bindParam(':email', $email);
    $statement->execute();
    $admin = $statement->fetch(PDO::FETCH_ASSOC);

    // If email is associated with an admin account
    if ($admin) {
        // Generate a unique token for the password reset request
        $token = generateToken();

        // Store the token in the database along with the email and timestamp
        $timestamp = time();
        $statement = $db->prepare("INSERT INTO password_reset_requests (email, token, timestamp) VALUES (:email, :token, :timestamp)");
        $statement->bindParam(':email', $email);
        $statement->bindParam(':token', $token);
        $statement->bindParam(':timestamp', $timestamp);
        $statement->execute();

        // Send the password reset email to the admin's email address
        sendPasswordResetEmail($email, $token);

        // Redirect to a success page or display a success message
        header('Location: password_reset_link_sent.php');
        exit;
    }

    // If email is not associated with an admin account
    header('Location: forgot_password.php?error=email_not_found');
    exit;
}

// Function to generate a random token
function generateToken()
{
    $length = 32;
    $token = bin2hex(random_bytes($length));
    return $token;
}

// Function to send the password reset email
function sendPasswordResetEmail($email, $token)
{


    // Set the email subject
    $subject = "Password Reset";

    // Compose the email body
    $message = "Hello,\n\n";
    $message .= "You have requested to reset your password. Please click the link below to proceed:\n\n";
    $message .= "http://localhost:8888/reset_password.php?token=" . urlencode($token) . "\n\n";
    $message .= "If you did not request a password reset, please ignore this email.\n\n";
    $message .= "Best regards,\n";
    $message .= "Your Website Team";

    // Set the email headers
    $headers = "From: Your Website <noreply@example.com>\r\n";
    $headers .= "Reply-To: noreply@example.com\r\n";
    $headers .= "Content-Type: text/plain; charset=UTF-8\r\n";

    // Send the email
    $success = mail($email, $subject, $message, $headers);

    // Check if the email was sent successfully
    if ($success) {
        echo "Password reset email sent successfully.";
    } else {
        echo "Failed to send password reset email.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Forgot Password</title>
</head>
<body>
<h2>Forgot Password</h2>
<?php if (isset($_GET['error']) && $_GET['error'] === 'invalid_email'): ?>
    <p>Error: Invalid email address.</p>
<?php elseif (isset($_GET['error']) && $_GET['error'] === 'email_not_found'): ?>
    <p>Error: Email address not found.</p>
<?php endif; ?>
<form method="POST" action="forgot_password.php">
    <label for="email">Email:</label>
    <input type="email" id="email" name="email" required>
    <button type="submit">Reset Password</button>
</form>
</body>
</html>


