<?php

require_once "../database/config.php";

$email = $password = "";

$received_data = json_decode(file_get_contents("php://input"));

if($_POST["type"] == 2){
    $email = $_POST["email"];
    $password = $_POST["password"];

    $query = "select id,email,firstname,lastname,mobileno,password,usertype from users where email=:email";
    if($stmt = $pdo->prepare($query)){
        $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
        $param_email = trim($_POST["email"]);
        if($stmt->execute()){
            if($stmt->rowCount() == 1){
                if($row = $stmt->fetch()){
                    $id = $row["id"];
                        $email = $row["email"];
                        $hashed_password = $row["password"];
                        $usrtype = $row["usertype"];
                        $fname = $row["firstname"];
                        $lname = $row["lastname"];
                        $mobile = $row["mobileno"];
                        if(password_verify($password, $hashed_password)){
                            session_start();
                            if($usrtype == 1){
                                $_SESSION["id"] = $id;
                            $_SESSION["email"] = $email;
                                $_SESSION["fname"] = $fname;
                                $_SESSION["access"] = true;
                                $_SESSION["usertype"] = 1;
                                $_SESSION["usertypesupervisor"] = 1;
                                echo json_encode(array("statusCode"=>200));
                            }
                            else if($usrtype == 2){
                                $_SESSION["id"] = $id;
                                $_SESSION["email"] = $email;
                                    $_SESSION["fname"] = $fname;
                                $_SESSION["access"] = true;
                                $_SESSION["usertype"] = 1;
                                $_SESSION["usertypesupervisor"] = 2;
                                echo json_encode(array("statusCode"=>204));
                            }
                             else if($usrtype == 0){
                                $_SESSION["id"] = $id;
                                $_SESSION["email"] = $email;
                                    $_SESSION["fname"] = $fname;
                                $_SESSION["access"] = true;
                                $_SESSION["usertype"] = 0;
                                $_SESSION["lname"] = $lname;
                                $_SESSION["mobileno"] = $mobile;
                                echo json_encode(array("statusCode" => 201));
                            }
                            
                        }
                        else{
                            // Display an error message if password is not valid
                            echo json_encode(array("statusCode"=>202));
                        }
                }
            }
            else{
                // Display an error message if username doesn't exist
                echo json_encode(array("statusCode" => 203));
            }
        }else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        unset($stmt);
    }
    unset($pdo);
}