<?php
define('DB_SERVER_CLIENTDASH', 'localhost');
define('DB_USERNAME_CLIENTDASH', 'root');
define('DB_PASSWORD_CLIENTDASH', '');
define('DB_NAME_CLIENTDASH', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_CLIENTDASH . ";dbname=" . DB_NAME_CLIENTDASH,
    DB_USERNAME_CLIENTDASH, DB_PASSWORD_CLIENTDASH);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>