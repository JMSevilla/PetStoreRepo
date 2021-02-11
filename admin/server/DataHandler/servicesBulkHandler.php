

<?php

require_once "../Controllers/servicesBulkController.php";

if(isset($_POST['services_payment_action']) == 'payment_action'){
    $_main = new _main();
    $resp = $_main->services();
}

if(isset($_POST['world_action']) == 'world_action_delivery'){
    $_main_world_delivery = new _main_world_delivery();
    $resp_delivery = $_main_world_delivery->worlddelivery();
}

if(isset($_POST['days_action']) == 'daysaction'){
    $_main_days_return = new _main_days_return();
    $resp_days = $_main_days_return->daysreturn();
}

if(isset($_POST['support_action']) == 'supportaction'){
    $_main_support = new _main_support();
    $resp = $_main_support->support();
}

if(isset($_POST['payment_dashobard_action']) == 'paymentdashboardaction'){
    $_main_payment_client_dashboard = new _main_payment_client_dashboard();
    $resp_payment = $_main_payment_client_dashboard->paymentmethod();
}