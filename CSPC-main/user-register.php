<?php

require_once  'C:\xamp\htdocs\CSPC-main\includes\config_session.inc.php'; 
require_once  'C:\xamp\htdocs\CSPC-main\includes\signup_view.php'; 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/user-register.css">
    <title>Street Hustler - Sign Up</title>
    <link rel="icon" href="Pictures/logo-white.jpg">
</head>
<body>
    <header class="header">
        <img class="logo-header" src="Pictures/logo.jpg" alt="Picture Logo">
        <h1 class="business-name"><i>Street Hustler</i></h1>
    </header>

    <div class="main-div">      
        <h2 class="sign-up-header">Sign Up</h2>
        <form method="POST" action="user-register.php"> <!-- Specify the correct action URL -->
            <input class="fullname" type="text" name="fullname" placeholder="Fullname" required>
            <input class="email" type="email" name="email" placeholder="Email" required>
            <input class="username" type="text" name="username" placeholder="Username" required>
            <input class="password" type="password" name="password" placeholder="Password" required>
            <input class="confirm-password" type="password" name="confirm_password" placeholder="Confirm Password" required>
            <button type="submit" class="submit-button">Submit</button>
        </form>
        <a href="user-login.php"><button class="go-to-login-button">Go to Login</button></a>
    </div>

    <?php
    check_signup_errors(); // Ensure this function handles error display properly.
    ?>
</body>
</html>
