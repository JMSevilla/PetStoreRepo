<?php
session_start();
require_once "../database/config.php";
$firstname = $lastname = $email = $mobileno = $password = "";

if($_SERVER["REQUEST_METHOD"] == "POST")
{
   $sql = "
   SELECT id FROM users WHERE email = :email
   ";
   if($stmt = $pdo->prepare($sql))
   {
       $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
       $param_email = trim($_POST["email"]);
       if($stmt->execute()){
           if($stmt->rowCount() > 0)
           {
               echo json_encode(array("existCode" => "UserExist"));
           } else {
            $firstname = $_POST["firstname"];
            $lastname = $_POST["lastname"];
            $email = $_POST["email"];
            $mobileno = $_POST["mobileno"];
            $password = $_POST["password"];
            $sqlQuery = "
            INSERT INTO users VALUES(DEFAULT,:firstname, :lastname, :email, :mobileno, :password, CURRENT_TIMESTAMP, '0', 'NONE')
            ";
            if($stmt = $pdo->prepare($sqlQuery))
            {
                 $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
                 $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
                 $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
                 $stmt->bindParam(":mobileno", $param_mobileno, PDO::PARAM_STR);
                 $stmt->bindParam(":password", $param_password, PDO::PARAM_STR);
                 $param_firstname = $firstname;
                 $param_lastname = $lastname;
                 $param_email = $email;
                 $param_mobileno = $mobileno;
                 $param_password = password_hash($password, PASSWORD_DEFAULT);
                 $_SESSION["usertype"] = 0;
                 $_SESSION["access"] = true;
                 $_SESSION["fname"] = $firstname;
                 $_SESSION['email'] = $email;
                 $_SESSION["lname"] = $lastname;
                  $_SESSION["mobileno"] = $mobileno;
                 if($stmt->execute()){
                     echo json_encode(array("statusCode" => "OK"));
                 }
                 else{
                     echo "<script>alert('Something went wrong adding data')</script>";
                 }
                 unset($stmt);
            }
            unset($pdo);
           }
       } 
       
   }
  
}
