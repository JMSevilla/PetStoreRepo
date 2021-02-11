<?php
define('DB_SERVER_DB2', 'localhost');
define('DB_USERNAME_DB2', 'root');
define('DB_PASSWORD_DB2', '');
define('DB_NAME_DB2', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_DB2 . ";dbname=" . DB_NAME_DB2,
    DB_USERNAME_DB2, DB_PASSWORD_DB2);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>