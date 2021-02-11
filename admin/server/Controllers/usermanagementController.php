<?php 

class user_management_Controller_Wall{
    public function usermanagement(){
        $this->_main_usermanagement();
    }
}

class _main extends user_management_Controller_Wall{
    protected function _main_usermanagement(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
            UPDATE users SET usertype = 1 WHERE id = :id
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $_POST['id'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => "OK"));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}

class user_management_supervisor_Controller_Wall{
    public function supervisorusermanagement(){
        $this->_super_main_usermanagement();
    }
}

class super_main extends user_management_supervisor_Controller_Wall {
    protected function _super_main_usermanagement(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
            UPDATE users SET usertype = 2 WHERE id = :id
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $_POST['id'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => "OK"));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}

class user_management_customer_Controller_Wall{
    public function customerusermanagement(){
        $this->_customer_main_usermanagement();
    }
}

class customer_main extends user_management_customer_Controller_Wall{
    protected function _customer_main_usermanagement(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
            UPDATE users SET usertype = 0 WHERE id = :id
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $_POST['id'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => "OK"));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}

class remove_user_Controller_Wall{
    public function removeuserdata(){
        $this->remove_main_data();
    }
}

class remove_main extends remove_user_Controller_Wall{
    protected function remove_main_data(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
            DELETE FROM users WHERE id = :id
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $_POST['id'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => "OK"));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}