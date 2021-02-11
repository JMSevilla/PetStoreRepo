<?php

    class Order_Controller{
            function isorder(){
                require_once "connectioncartlist.php";
                if($_SERVER["REQUEST_METHOD"] == "POST"){
                    $qlquery = "
                    CALL sproc_isorder(:isaccount)
                    ";
                    if($stmt = $pdo->prepare($qlquery)){
                        $stmt->bindParam(":isaccount", $param_isaccount, PDO::PARAM_STR);
                        $param_isaccount = $_POST['isaccount'];
                        if($stmt->execute()){
                            echo json_encode(array("statusCode" => "OK"));
                        }
                    }
                    unset($stmt);
                    unset($pdo);
                }
            }
    }