<?php

require_once "../Controllers/ChangePasswordController.php";

if(isset($_POST['currentaction']) == 'curr'){
    $_main = new _main();
    $resp = $_main->changepassword();
}

if(isset($_POST['newpasswordaction']) == 'newpassword'){
    $_main_newpassword = new _main_newpassword();
    $resp = $_main_newpassword->newpasswordchanger();
}