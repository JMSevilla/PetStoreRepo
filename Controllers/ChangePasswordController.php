<?php
session_start();
class change_password_Controller{
    public function changepassword(){
        $this->changepass_data();
    }
    public function newpasswordchanger(){
        $this->changefinalpassword();
    }
}

class _main extends change_password_Controller{
    protected function changepass_data(){
        require_once "onconnect.php";
        $password = $_POST['current_password'];
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
            SELECT password FROM users WHERE email=:email";
            if($result = $pdo->prepare($QUERY)){
                $result->bindParam(":email", $param_email, PDO::PARAM_STR);
                $param_email = $_SESSION['email'];
                $result->execute();
                if($result->rowCount() > 0){
                    if($row = $result->fetch()){
                        $hashed = $row['password'];
                        if(password_verify($password, $hashed)){
                            echo json_encode(array("match" => "OK"));
                        }
                        else{
                            echo json_encode(array("mismatch" => 404));
                        }
                    }
                }
            }
        }
    }
}

class _main_newpassword extends change_password_Controller{
   protected function changefinalpassword(){
        require_once "onconnect.php";
        $newpassword = $_POST['newpassword'];
        $querychanger = "
        UPDATE users SET password=:password WHERE email='" . $_SESSION['email'] . "'";
        if($stmt = $pdo->prepare($querychanger)){
            $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
            $param_password = password_hash($newpassword, PASSWORD_DEFAULT);
            if($stmt->execute()){
                echo json_encode(array("statusCode" => "OK"));
            }
        }
    }
}