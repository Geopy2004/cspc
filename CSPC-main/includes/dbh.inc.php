<?php
declare(strict_types=1);

$host = 'localhost';
$dbname = 'streethustlerdb';
$dbusername = 'root'; // Your database username
$dbpassword = ''; // Your database password

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $dbusername, $dbpassword);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Connection failed: " . $e->getMessage());
}
?>
