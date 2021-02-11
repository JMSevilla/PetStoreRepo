<?php

class CountCartController{
    function counter(){
        require_once "../JSCON/ControllersConnection.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $email = $_POST["isaccount"];
            $QL = "
            SELECT COUNT(*) AS pdname FROM products WHERE iscart=1 and isaccount = :isaccount
            ";
            if($stmt = $pdo->prepare($QL)){
                $stmt->bindParam(":isaccount", $param_isaccount, PDO::PARAM_STR);
                $param_isaccount = $email;
                if($stmt->execute()){
                    echo json_encode(array("stateGetter" => $stmt->fetch(PDO::FETCH_ASSOC)));
                } else {
                    echo json_encode(array("stateGetter" => 201));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}