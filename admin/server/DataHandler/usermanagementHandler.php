<?php

require_once "../Controllers/usermanagementController.php";

if(isset($_POST['usermngment']) == 'user'){
    $_main = new _main();
    $resp = $_main->usermanagement();
}

if(isset($_POST['supervisor']) == 'supervisordata'){
    $super_main = new super_main();
    $resp = $super_main->supervisorusermanagement();
}

if(isset($_POST['customer']) == 'customer'){
    $customer_main = new customer_main();
    $resp = $customer_main->customerusermanagement();
}

if(isset($_POST['remover']) == 'remover'){
    $remove_main = new remove_main();
    $resp = $remove_main->removeuserdata();
}