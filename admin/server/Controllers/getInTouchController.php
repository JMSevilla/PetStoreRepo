<?php

class get_in_touch_Controller_Wall{
    public function getintouch(){
        $this->_main_getintouch();
    }
}

class _main extends get_in_touch_Controller_Wall{
    protected function _main_getintouch(){
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            require_once "../adminconnection/adconnect.php";
            $QUERY = "
                UPDATE getintouch SET address= :address, email = :email, phone = :phone WHERE id = 1 
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
                $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                $stmt->bindParam(":phone", $param_phone, PDO::PARAM_STR);
                $param_address = $_POST['address'];
                $param_email = $_POST['email'];
                $param_phone = $_POST['phone'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}