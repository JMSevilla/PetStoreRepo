<?php 

require_once "../Controllers/onreceivedController.php";

if(isset($_POST['action']) == 'onreceived'){
    $request_received_Controller = new request_received_Controller();
    $resp = $request_received_Controller->request();
}