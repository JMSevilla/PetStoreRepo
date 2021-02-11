<?php

require_once "../Controllers/finalproducteditController.php";

if(isset($_POST['actionedittype']) == "editing"){
    $_Contain = new _Contain();
    $resp = $_Contain->DataController();
}