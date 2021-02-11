<?php

require_once "../Controllers/isremoveController.php";

if(isset($_POST['action']) == 'removing'){
    $Remove_Cart_Controller = new Remove_Cart_Controller();
    $resp = $Remove_Cart_Controller->removingoncart();
}