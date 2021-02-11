<?php

require_once "../Controllers/clientDashboardController.php";

if(isset($_POST['action']) == 'onclientaction'){
   
    $_main = new _main();
    $resp = $_main->clientdashboard();
}