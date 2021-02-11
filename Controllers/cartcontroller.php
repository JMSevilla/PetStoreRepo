<?php

class cartController {
    function OAuthCart(){
        require_once "../JSCON/ControllersConnection.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $id = $_POST["id"];
            $isaccount = $_POST["isaccount"];
            $query = "
            CALL sproc_iscart_updater(:id, :isaccount)
            ";
            if($stmt = $pdo->prepare($query)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $stmt->bindParam(":isaccount", $param_isaccount, PDO::PARAM_STR);
                $param_isaccount = $isaccount;
                $param_id = $id;
                if($stmt->execute()){
                    echo json_encode(array("updateStatusCode" => 200));
                }else {
                    echo json_encode(array("updateStatusCode" => 201));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}