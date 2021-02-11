<?php 

require_once "../Controllers/cartsummaryController.php";

if(isset($_POST['action']) == 'onsum'){
    $CartSummaryController = new CartSummaryController();
    $resp = $CartSummaryController->cartsummary();
}