<?php
define('DB_SERVER_DBPD', 'localhost');
define('DB_USERNAME_DBPD', 'root');
define('DB_PASSWORD_DBPD', '');
define('DB_NAME_DBPD', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVER_DBPD . ";dbname=" . DB_NAME_DBPD,
    DB_USERNAME_DBPD, DB_PASSWORD_DBPD);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} 
catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>