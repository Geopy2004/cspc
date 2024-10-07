<?php
session_start();

// Redirect user to login page if not logged in
if (!isset($_SESSION['username'])) {
    header("Location: user-login.php");
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
</head>
<body>

<h1>Welcome, <?php echo htmlspecialchars($_SESSION['username']); ?>!</h1>

<p>This is your dashboard. You are now logged in.</p>

<a href="logout.php">Logout</a>

</body>
</html>
