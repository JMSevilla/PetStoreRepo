<?php

require_once "../Controllers/cartcounterController.php";

if(isset($_POST["action"]) == "count"){
    $CountCartController = new CountCartController();
    $resp = $CountCartController->counter();
}