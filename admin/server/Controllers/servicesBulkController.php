<?php 

class services_Controller_Wall{
    public function services(){
        $this->data_services();
    }
    public function worlddelivery(){
        $this->world_delivery_data();
    }
    public function daysreturn(){
        $this->days_return_data();
    }
    public function support(){
        $this->support_data();
    }
    public function paymentmethod(){
        $this->_payment_clientdashboard();
    }
}

class _main extends services_Controller_Wall{
    protected function data_services(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
                UPDATE services SET secure_payment = :secure WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":secure", $param_secure, PDO::PARAM_STR);
                $param_secure = $_POST['payment'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}


class _main_world_delivery extends services_Controller_Wall{
    protected function world_delivery_data(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
                UPDATE services SET word_delivery = :world WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":world", $param_world, PDO::PARAM_STR);
                $param_world = $_POST['world'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }   
}

class _main_days_return extends services_Controller_Wall{
    protected function days_return_data(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
                UPDATE services SET days_return = :daysreturn WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":daysreturn", $param_daysreturn, PDO::PARAM_STR);
                $param_daysreturn = $_POST['daysreturn'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}

class _main_support extends services_Controller_Wall{
    protected function support_data(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
                UPDATE services SET support = :support WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":support", $param_support, PDO::PARAM_STR);
                $param_support = $_POST['support'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}

// Payment method dashboard
class _main_payment_client_dashboard extends services_Controller_Wall{
    protected function _payment_clientdashboard(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
                UPDATE paymentmethodclientdashboard SET paymentmethod = :payment WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":payment", $param_payment, PDO::PARAM_STR);
                $param_payment = $_POST['payment'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}