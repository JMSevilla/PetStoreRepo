<?php

require_once "productController.php";

if(isset($_POST['prodtype']) == 'create')
{
    $productcontroller = new ProductController();
    $resultResponse = $productcontroller->createproduct();
}