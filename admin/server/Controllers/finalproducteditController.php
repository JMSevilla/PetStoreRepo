<?php

class _final_productEdit_Controller{
    public function DataController(){
        $this->_main();
    }
}

class _Contain extends _final_productEdit_Controller{
    protected function _main(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
                //DEPRECATED IMAGE UPDATE
                // $OAuthImage = explode(".", $_FILES["filefile"]["name"]);
                // $extension = end($OAuthImage);
                // $imagename = rand(100, 999) . '.' . $extension;
                // $location = '../upload/'.$imagename;
                // move_uploaded_file($_FILES["filefile"]["tmp_name"], $location);
                $QUERY = "
                UPDATE products SET product_name= :pname, product_price = :pprice , product_quantity = :pquantity , product_description = :pdesc, product_category = :category WHERE id= :id
                ";
                if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":pname", $pname, PDO::PARAM_STR);
                $stmt->bindParam(":pprice", $pprice, PDO::PARAM_STR);
                $stmt->bindParam(":pquantity", $pquantity, PDO::PARAM_STR);
                $stmt->bindParam(":pdesc", $pdesc, PDO::PARAM_STR);
                $stmt->bindParam(":id", $id, PDO::PARAM_STR);
                $stmt->bindParam(":category", $pcategory, PDO::PARAM_STR);
                $pname = $_POST['pname'];
                $pprice = $_POST['pprice'];
                $pquantity = $_POST['pquantity'];
                $pdesc = $_POST['pdesc'];
                $id = $_POST['pid'];
                $pcategory = $_POST['category'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => "OK"));
                }
                }
                unset($stmt);
                unset($pdo);
            
        }
    }
}




