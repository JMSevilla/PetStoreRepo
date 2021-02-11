<?php
define('DB_SERVER_PMC', 'localhost');
define('DB_USERNAME_PMC', 'root');
define('DB_PASSWORD_PMC', '');
define('DB_NAME_PMC', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_PMC . ";dbname=" . DB_NAME_PMC,
    DB_USERNAME_PMC, DB_PASSWORD_PMC);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>