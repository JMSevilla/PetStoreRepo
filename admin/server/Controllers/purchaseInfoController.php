<?php

class purchase_info_Controller_Wall{
    public function purchaseinfo(){
        $this->_main_purchase_info();
    }
}

class _main extends purchase_info_Controller_Wall{
    protected function _main_purchase_info(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
            $QUERY = "
                UPDATE purchaseinfo SET paymentpolicy=:payment, shippingpolicy=:shipping, returnpolicy=:returnpolicy WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":payment", $param_payment, PDO::PARAM_STR);
                $stmt->bindParam(":shipping", $param_shipping, PDO::PARAM_STR);
                $stmt->bindParam(":returnpolicy", $param_return_policy, PDO::PARAM_STR);
                $param_payment = $_POST['payment'];
                $param_shipping = $_POST['shipping'];
                $param_return_policy = $_POST['policy'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
        }
    }
}