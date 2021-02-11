<?php
define('DB_SERVER_CONS', 'localhost');
define('DB_USERNAME_CONS', 'root');
define('DB_PASSWORD_CONS', '');
define('DB_NAME_CONS', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_CONS . ";dbname=" . DB_NAME_CONS,
    DB_USERNAME_CONS, DB_PASSWORD_CONS);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>