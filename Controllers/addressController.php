<?php

class address_Controller{
    function address(){
        require_once "connectioncartlist.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $paymentaddress = $shippingaddress = "";
            $GraphQL = "
            CALL sproc_address_dynamic(:payment_address, :shipping_address)
            ";
            if($stmt = $pdo->prepare($GraphQL)){
                $stmt->bindParam(":payment_address", $param_payment_address, PDO::PARAM_STR);
                $stmt->bindParam(":shipping_address", $param_shipping_address, PDO::PARAM_STR);
                $paymentaddress = $_POST['paymentaddress'];
                $shippingaddress = $_POST['shippingaddress'];
                $param_payment_address = $paymentaddress;
                $param_shipping_address = $shippingaddress;
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => "OK"));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}