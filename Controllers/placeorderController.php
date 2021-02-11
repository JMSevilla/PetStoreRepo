

<?php
require_once "vendor/phpmailer/phpmailer/src/PHPMailer.php";
require_once "vendor/phpmailer/phpmailer/src/SMTP.php";
require_once "vendor/phpmailer/phpmailer/src/Exception.php";

class place_order_Controller {
    public function placingorder(){
        $this->place_order_data_bridge();
    }
}


class barrier_place_order extends place_order_Controller{
    protected function place_order_data_bridge(){
      require_once "onconnect.php";
      if($_SERVER["REQUEST_METHOD"] == "POST"){
          $bigdata = "
          CALL sproc_placeorder(:address, :country, :city, :state, :zipcode, :firstname, :lastname, :email, :mobile, :paymentmethod)
          ";
          if($stmt = $pdo->prepare($bigdata)){
              $stmt->bindParam(":address", $param_address, PDO::PARAM_STR);
              $stmt->bindParam(":country", $param_country, PDO::PARAM_STR);
              $stmt->bindParam(":city", $param_city, PDO::PARAM_STR);
              $stmt->bindParam(":state", $param_state, PDO::PARAM_STR);
              $stmt->bindParam(":zipcode", $param_zipcode, PDO::PARAM_STR);
              $stmt->bindParam(":firstname", $param_firstname, PDO::PARAM_STR);
              $stmt->bindParam(":lastname", $param_lastname, PDO::PARAM_STR);
              $stmt->bindParam(":email", $param_email, PDO::PARAM_STR);
              $stmt->bindParam(":mobile", $param_mobile, PDO::PARAM_STR);
              $stmt->bindParam(":paymentmethod", $param_payment, PDO::PARAM_STR);

                $param_address = $_POST['address'];
                $param_country = $_POST['selectedcountry'];
                $param_city = $_POST['city'];
                $param_state = $_POST['state'];
                $param_zipcode = $_POST['zipcode'];
                $param_firstname = $_POST['firstname'];
                $param_lastname = $_POST['lastname'];
                $param_email = $_POST['email'];
                $param_mobile = $_POST['mobile'];
                $param_payment = $_POST['payment'];
                if($stmt->execute()){
                    sendEmail($param_email, $param_firstname);
                    echo json_encode(array("statusCode" => "OK"));
                    
                }
          }
          unset($stmt);
          unset($pdo);
      }
    }
}


   function sendEmail($email, $firstname){
    


       $mail = new PHPMailer\PHPMailer\PHPMailer();
       $mail->IsSMTP();
        $mail->Mailer = 'smtp';
        $mail->SMTPAuth = true;
        $mail->Host = 'smtp.gmail.com'; 
        $mail->Port = 465;
        $mail->SMTPSecure = 'ssl';

        $mail->Username = "petstorephil@gmail.com";
        $mail->Password = "pstore2020";

        $mail->IsHTML(true); // if you are going to send HTML formatted emails

        $mail->From = "petstorephil@gmail.com";
        $mail->FromName = "Pet Store Philippines";

        $mail->addAddress($email,$firstname);

        $mail->Subject = "Thank you for Buying Our Products!";
        $mail->Body = file_get_contents("http://localhost/ecommerce-html-template/petshoptemplate.html");
        try {
            $mail->send();
            echo "Message has been sent successfully";
        } catch (Exception $e) {
            echo "Mailer Error: " . $mail->ErrorInfo;
        }
    }




