<?php

require_once "../Controllers/productDeleteController.php";

if(isset($_POST['deleteaction']) == 'delete'){
    $__constructBarrier_Delete = new __constructBarrier_Delete();
    $responseObj = $__constructBarrier_Delete->DeleteProduct();
}