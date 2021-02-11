<?php
define('DB_SERVER_CATEGORY', 'localhost');
define('DB_USERNAME_CATEGORY', 'root');
define('DB_PASSWORD_CATEGORY', '');
define('DB_NAME_CATEGORY', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_CATEGORY . ";dbname=" . DB_NAME_CATEGORY,
    DB_USERNAME_CATEGORY, DB_PASSWORD_CATEGORY);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>