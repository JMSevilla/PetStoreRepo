<?php 
error_reporting(0);
session_start();
class account_details_Controller_Wall{
    public function accountdetails(){
        $this->_main_accountdetails();
    }
}

class _main extends account_details_Controller_Wall{
    protected function _main_accountdetails(){
         $imagesaved = "";
        // $dataimagesaved = "";
        require_once "onconnect.php";
        $GETQUERY = "
            SELECT profileimage FROM users WHERE email=:email
        ";
        if($result = $pdo->prepare($GETQUERY)){
            $result->bindParam(":email" , $param_get_email, PDO::PARAM_STR);
            $param_get_email = $_POST['email'];
            $result->execute();
            if($result->rowCount() > 0){
                if($row = $result->fetch()){
                    $imagesaved = $row['profileimage'];
                }
                unset($result);
            }
        }
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(empty($_FILES['file']['name'])){
                echo json_encode(array("yesempty" => 200));
               
                $QUERY_STORED = "
                CALL sproc_account_details_first_update(:email, :firstname, :lastname, :mobile, :address, :image)
                ";
                if($stmt = $pdo->prepare($QUERY_STORED)){
                    $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                    $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
                    $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
                    $stmt->bindParam(":mobile", $param_mobile, PDO::PARAM_STR);
                    $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
                    $stmt->bindParam(":image", $param_image, PDO::PARAM_STR);
                    if(empty($_POST['address'])){
                        $param_address = "None";
                    }
                    else {
                        $param_address = $_POST['address'];
                    }
                    $param_email = $_POST['email'];
                    $param_firstname = $_POST['firstname'];
                    $param_lastname = $_POST['lastname'];
                    $param_mobile = $_POST['mobile'];
                    
                    $param_image = $imagesaved;
                    if($stmt->execute()){
                       $_SESSION['fname'] = $param_firstname;
                        echo json_encode(array("statusCode" => 200));
                    }
                }
               
            }else if(!empty($_FILES['file']['name'])){
                
                $OAuthImage = explode(".", $_FILES["file"]["name"]);
                $extension = end($OAuthImage);
                $imagename = rand(100, 999) . '.' . $extension;
                $location = 'C:\\xampp\\htdocs\\ecommerce-html-template\\Controllers\\customer_profiles\\'.$imagename;
                move_uploaded_file($_FILES["file"]["tmp_name"], $location);

                $QUERY_STORED = "
                CALL sproc_account_details_first_update(:email, :firstname, :lastname, :mobile, :address, :image)
                ";
                if($stmt = $pdo->prepare($QUERY_STORED)){
                    $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                    $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
                    $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
                    $stmt->bindParam(":mobile", $param_mobile, PDO::PARAM_STR);
                    $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
                    $stmt->bindParam(":image", $param_image, PDO::PARAM_STR);
                    if(empty($_POST['address'])){
                        $param_address = "None";
                    }
                    else {
                        $param_address = $_POST['address'];
                    }
                    $param_email = $_POST['email'];
                    $param_firstname = $_POST['firstname'];
                    $param_lastname = $_POST['lastname'];
                    $param_mobile = $_POST['mobile'];
                    $param_image = $imagename; 
                    $imagesaved = $imagename;
                    if($stmt->execute()){
                        $_SESSION['fname'] = $param_firstname;
                        echo json_encode(array("statusCode" => 201));
                    }
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
}