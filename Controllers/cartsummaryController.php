<?php

class CartSummaryController{
    function cartsummary(){
        require_once "../database/config.php";

        $sql = "
        SELECT SUM(product_price) * isquantitycart AS pricing FROM products WHERE iscart=1 and isaccount=:isaccount
        ";
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(":isaccount", $param_isaccount, PDO::PARAM_STR);
            $param_isaccount = $_POST['isaccount'];
            if($stmt->execute()){
                echo json_encode(array("statusCode" => $stmt->fetch(PDO::FETCH_ASSOC)));
            } else{
                echo json_encode(array("statusCode" => 201));
            }
        }
        unset($stmt);
        unset($pdo);
    }
}