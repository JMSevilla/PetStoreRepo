<?php

class request_received_Controller{
    function request(){
        require_once "connectioncartlist.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $GRAPHQL = "
            update products set isorder = 0 WHERE id = :id
            ";
            if($stmt = $pdo->prepare($GRAPHQL)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $_POST['id'];
                if($stmt->execute()){
                    echo json_encode(array("removeStatusCode" => "OK"));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}