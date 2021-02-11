<?php

require_once "../Controllers/cartcontroller.php";

if(isset($_POST["action"]) == "update"){
    $cartController = new cartController();
    $resp = $cartController->OAuthCart();
}