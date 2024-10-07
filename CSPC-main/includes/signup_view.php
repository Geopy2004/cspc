<?php

declare(strict_types=1);

function check_signup_errors(): void {
    if (isset($_SESSION['errors_signup'])) {
        $errors = $_SESSION['errors_signup']; // Correct spelling to match the session key

        echo "<br>";

        // Loop through all errors and display them
        foreach ($errors as $error) {
            echo '<p class="form-error">' .$error . '</p>';
        }

        // Clear the errors from the session after displaying them
        unset($_SESSION['errors_signup']);
    } else if (isset($_GET['signup']) && $_GET["signup"] === "success") {
        echo '<br>'; 
        echo '<p class="form-success">Signup successful!</p>';
    }
}
