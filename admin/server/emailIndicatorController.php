<?php 


require_once "adminconnection/adconnect.php";

if(isset($_POST["action"]) == "onupdateindicator"){
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Query = "
    CALL sproc_updateindicator(:email)
    ";
    if($stmt = $pdo->prepare($Query)){
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $param_email = $_POST["email"];
        if($stmt->execute()){
            echo json_encode(array("statusCode" => 200));
        }
        else{
            echo json_encode(array("statusCode" => 201));
        }
    }
    unset($stmt);
    unset($pdo);
    }
}