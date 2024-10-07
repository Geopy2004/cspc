<?php
ini_set('session.use_only_cookies', 1); // Corrected session setting name
ini_set('session.use_strict_mode', 1);

// Fixed session_set_cookie_params function
session_set_cookie_params([
    'lifetime' => 1800, 
    'domain' => 'localhost',
    'path' => '/', 
    'secure' => true, 
    'httponly' => true
]);

session_start();

// Check if the session should be regenerated
if (!isset($_SESSION["last_regeneration"])) {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time(); // Set regeneration time
} else {
    $interval = 60 * 30; // 30 minutes
    if (time() - $_SESSION["last_regeneration"] >= $interval) {
        session_regenerate_id();
        $_SESSION["last_regeneration"] = time(); // Update regeneration time
    }
}

// Function to regenerate session ID
function regenerate_session_id() {
    session_regenerate_id();
    $_SESSION["last_regeneration"] = time();
}
