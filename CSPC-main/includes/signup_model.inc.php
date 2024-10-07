<?php

declare(strict_types=1);

// Function to get a username from the database
function get_username(object $pdo, string $username): ?array {
    $query = "SELECT username FROM users WHERE username = :username;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":username", $username);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null; // Return null if no user found
}

// Function to get an email from the database
function get_email(object $pdo, string $email): ?array {
    $query = "SELECT email FROM users WHERE email = :email;";
    $stmt = $pdo->prepare($query);
    $stmt->bindParam(":email", $email);
    $stmt->execute();

    $result = $stmt->fetch(PDO::FETCH_ASSOC);
    return $result ?: null; // Return null if no email found
}

function create_user(object $pdo, string $password, string $username, string $email, string $fullname) {
    $query = "INSERT INTO users (fullname, username, email, password) VALUES (:fullname, :username, :email, :password)";
    $stmt = $pdo->prepare($query);
    
    // Hash the password before storing
    $options = [
        'cost' => 12,
    ];
    $hashedPassword = password_hash($password, PASSWORD_BCRYPT, $options);
    
    // Bind parameters
    $stmt->bindParam(":fullname", $fullname);
    $stmt->bindParam(":username", $username);
    $stmt->bindParam(":email", $email);
    $stmt->bindParam(":password", $hashedPassword);
    
    // Execute the statement
    if ($stmt->execute()) {
        return true; // User created successfully
    } else {
        return false; // Failed to create user
    }
}
