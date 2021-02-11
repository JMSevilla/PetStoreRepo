<?php 

class Remove_Cart_Controller {
    function removingoncart(){
        require_once "connectioncartlist.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $GRAPHQL = "
            update products set iscart = 0, isquantitycart = 0, isaccount=null where id = :id
            ";
            if($stmt = $pdo->prepare($GRAPHQL)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $_POST['id'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }else{
                    echo json_encode(array("statusCode" => 201));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}