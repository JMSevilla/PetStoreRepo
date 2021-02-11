<?php
define('DB_SERVER_ACCOUNT', 'localhost');
define('DB_USERNAME_ACCOUNT', 'root');
define('DB_PASSWORD_ACCOUNT', '');
define('DB_NAME_ACCOUNT', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_ACCOUNT . ";dbname=" . DB_NAME_ACCOUNT,
    DB_USERNAME_ACCOUNT, DB_PASSWORD_ACCOUNT);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>