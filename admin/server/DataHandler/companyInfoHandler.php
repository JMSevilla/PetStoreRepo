<?php

require_once "../Controllers/companyInfoController.php";

if(isset($_POST['companyacc']) == 'updatecompanyinfo'){
    $_main = new _main();
    $resp = $_main->companyinfo();
}