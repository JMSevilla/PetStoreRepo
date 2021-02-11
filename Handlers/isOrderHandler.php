<?php

require_once "../Controllers/isorderController.php";

if(isset($_POST['action']) == 'isorder'){
    $Order_Controller = new Order_Controller();
    $resp = $Order_Controller->isorder();
}