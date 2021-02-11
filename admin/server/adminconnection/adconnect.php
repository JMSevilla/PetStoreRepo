<?php
define('DB_SERVER2', 'localhost');
define('DB_USERNAME2', 'root');
define('DB_PASSWORD2', '');
define('DB_NAME2', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER2 . ";dbname=" . DB_NAME2,
    DB_USERNAME2, DB_PASSWORD2);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>