<?php
session_start();
require_once 'dbh.inc.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['login'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Check if username exists in the database
    $query = "SELECT * FROM users WHERE username = :username";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(':username', $username);
    $stmt->execute();

    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($user && password_verify($password, $user['password'])) {
        // Password matches, set session and redirect to dashboard
        $_SESSION['username'] = $user['username'];
        header("Location: user_dashboard.php");
        exit();
    } else {
        // Invalid credentials
        $_SESSION['login_error'] = "Invalid username or password.";
        header("Location: user-login.php");
        exit();
    }
} else {
    header("Location: user-login.php");
    exit();
}
?>
