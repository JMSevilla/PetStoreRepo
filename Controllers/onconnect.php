<?php
define('DB_SERVERONE', 'localhost');
define('DB_USERNAMEONE', 'root');
define('DB_PASSWORDONE', '');
define('DB_NAMEONE', 'dbprojectzero');

try {
    $pdo = new PDO("mysql:host=" . DB_SERVERONE . ";dbname=" . DB_NAMEONE,
    DB_USERNAMEONE, DB_PASSWORDONE);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("ERROR: Could not connect. " . $e->getMessage());
}

?>