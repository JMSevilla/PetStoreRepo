<?php
define('DB_SERVER_DB1', 'localhost');
define('DB_USERNAME_DB1', 'root');
define('DB_PASSWORD_DB1', '');
define('DB_NAME_DB1', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_DB1 . ";dbname=" . DB_NAME_DB1,
    DB_USERNAME_DB1, DB_PASSWORD_DB1);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>