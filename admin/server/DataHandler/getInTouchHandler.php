<?php

require_once "../Controllers/getInTouchController.php";

if(isset($_POST['acc']) == 'getintouch'){
    $_main = new _main();
    $res = $_main->getintouch();
}