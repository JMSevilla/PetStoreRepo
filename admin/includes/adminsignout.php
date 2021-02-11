<?php
session_start();
$_SESSION = array();
session_destroy();

header("location: http://localhost/ecommerce-html-template/login.php");
exit;