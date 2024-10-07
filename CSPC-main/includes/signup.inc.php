<?php
session_start(); // Start the session

require_once 'includes/config_session.inc.php'; 
require_once 'includes/user_functions.inc.php'; 

// Initialize an array for errors
$errors = [];

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Get form data
    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    try {
        // Ensure the path to 'dbh.inc.php', 'signup_model.inc.php', and 'signup_contr.inc.php' is correct
        require_once 'includes/dbh.inc.php';
        require_once 'includes/signup_model.inc.php';
        require_once 'includes/signup_contr.inc.php';

    } catch (PDOException $e) {
        // Handle the PDO exception
        die("Database connection failed: " . $e->getMessage());
    }

    // Validate inputs
    if (is_input_empty($username, $password, $email)) {
        $errors[] = 'Please fill in all fields.';
    }

    if (is_email_invalid($email)) {
        $errors[] = 'Invalid email format.';
    }

    if (is_username_taken($pdo, $username)) {
        $errors[] = 'Username is already taken.';
    }

    if (is_email_registered($pdo, $email)) {
        $errors[] = 'Email is already registered.';
    }

    if ($password !== $confirm_password) {
        $errors[] = 'Passwords do not match.';
    }

    // If no errors, proceed to create the user
    if (empty($errors)) {
        if (create_user($pdo, $password, $username, $email, $fullname)) {
            $_SESSION['signup_success'] = true;
            header("Location: signup_success.php"); // Redirect to a success page
            exit();
        } else {
            $errors[] = "Failed to create user.";
        }
    }

    // Store errors in the session to display on the form
    $_SESSION['errors_signup'] = $errors;
    header("Location: user-register.php"); // Redirect back to the signup page
    exit();
}
?>
