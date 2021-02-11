<?php
echo json_encode(array("signoutCode" => 200));
session_start();
$_SESSION = array();
session_destroy();

header("location: ../login.php");
exit;