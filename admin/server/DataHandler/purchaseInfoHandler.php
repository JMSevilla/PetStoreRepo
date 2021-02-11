<?php

require_once "../Controllers/purchaseInfoController.php";

if(isset($_POST['purchaseacc']) == 'purchaseinfo'){
    $_main = new _main();
    $resp = $_main->purchaseinfo();
}