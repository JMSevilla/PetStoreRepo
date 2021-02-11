<?php

require_once "../Controllers/addressController.php";

if(isset($_POST['action']) == 'create'){
    $address_Controller = new address_Controller();
    $resp = $address_Controller->address();
}