<?php
define('DB_SERVER_BAR', 'localhost');
define('DB_USERNAME_BAR', 'root');
define('DB_PASSWORD_BAR', '');
define('DB_NAME_BAR', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_BAR . ";dbname=" . DB_NAME_BAR,
    DB_USERNAME_BAR, DB_PASSWORD_BAR);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>