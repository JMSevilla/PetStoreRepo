<?php

class client_dashboard_Controller_Wall{
    public function clientdashboard(){
        $this->_maindata();
    }
}

class _main extends client_dashboard_Controller_Wall{
    protected function _maindata(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
                UPDATE clientdashboard SET description = :description WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":description", $param_description, PDO::PARAM_STR);
                $param_description = $_POST['description'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}