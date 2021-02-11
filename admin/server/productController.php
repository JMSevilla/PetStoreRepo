<?php

class ProductController{
    function createproduct(){
        require_once "../../database/config.php";
        $prodname = $prodprice = $prodquantity = $proddescription = $categoryselected = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if($_FILES["file"]["name"] != ''){
                $OAuthImage = explode(".", $_FILES["file"]["name"]);
                $extension = end($OAuthImage);
                $imagename = rand(100, 999) . '.' . $extension;
                $location = './upload/'.$imagename;
                move_uploaded_file($_FILES["file"]["tmp_name"], $location);

                $prodname = trim($_POST["prodname"]);
            $prodprice = $_POST["prodprice"];
            $prodquantity = $_POST["prodquantity"];
            $proddescription = $_POST["proddescription"];
            $categoryselected = $_POST["category_selected"];

            $grapQL = "
            CALL sproc_product(:prodname, :prodprice, :prodquantity, :proddescription, :category_selected, :prodimage, :iscart, :iswish)
            ";
            if($stmt = $pdo->prepare($grapQL))
            {
                $stmt->bindParam(":prodname", $param_prodname, PDO::PARAM_STR);
                $stmt->bindParam(":prodprice", $param_prodprice, PDO::PARAM_STR);
                $stmt->bindParam(":prodquantity", $param_prodquantity, PDO::PARAM_STR);
                $stmt->bindParam(":proddescription", $param_proddescription, PDO::PARAM_STR);
                $stmt->bindParam(":category_selected", $param_categoryselected, PDO::PARAM_STR);
                $stmt->bindParam(":prodimage", $param_prodimage, PDO::PARAM_STR);
                $stmt->bindParam(":iscart", $param_iscart, PDO::PARAM_STR);
                $stmt->bindParam(":iswish", $param_iswish, PDO::PARAM_STR);
                
                $param_iscart = "0";
                $param_iswish = "0";
                $param_prodimage = $imagename;
                $param_prodname = $prodname;
                $param_prodprice = $prodprice;
                $param_prodquantity = $prodquantity;
                $param_proddescription = $proddescription;
                $param_categoryselected = $categoryselected;
                if($stmt->execute()){
                    echo json_encode(array("statusCode"=>200));
                }else{
                    echo json_encode(array("statusCode"=>201));
                }
            }
            unset($stmt);
            unset($pdo);
            }
        }
    }
}