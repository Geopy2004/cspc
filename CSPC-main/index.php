<?php
require_once 'C:\xamp\htdocs\CSPC-main\includes\signup_view.php';
require_once 'C:\xamp\htdocs\CSPC-main\includes\config_session.inc.php';

?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="CSS/index.css">
        <title>Street Hustler</title>
        <link rel="icon" href="Pictures/logo-white.jpg">
    </head>
    <body>
        <div class="content">
             <img class="logo" src="Pictures/logo-black.jpg" alt="Logo Picture">
            <a href="user-login.php"><button class="login-button">Login</button></a>
        </div>
        <div class="admin-create-account-div">
            <a href="user-register.php"><button class="create-account-button">Create Account</button></a>
            <a href="admin-login.php"><button class="admin">Admin</button></a>
        </div>
    </body>
</html>

<?php
check_signup_errors();

?>