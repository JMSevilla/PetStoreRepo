<?php


class __constructDelete_Controller{
    public function DeleteProduct(){
        $this->ProductDestroy();
    }
}

class __constructBarrier_Delete extends __constructDelete_Controller{
    protected function ProductDestroy(){
       if($_SERVER["REQUEST_METHOD"] == "POST"){
        require_once "../adminconnection/adconnect.php";
        $QUERY = "
            DELETE FROM products WHERE id = :id
        ";
        if($stmt = $pdo->prepare($QUERY)){
            $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
            $param_id = $_POST['id'];
            if($stmt->execute()){
                echo json_encode(array("deleteStatus" => 200));
            }
        }
        unset($stmt);
        unset($pdo);
       }
    }
}