<?php

require_once "../Controllers/AccountDetailsController.php";

if(isset($_POST['acountupdateaction']) == 'update'){
    $_main = new _main();
    $resp = $_main->accountdetails();
   
}