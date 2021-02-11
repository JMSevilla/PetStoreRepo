<?php

class productEdit_Wall_Controller{
    public function productedit(){
        $this->_main_function();
    }
}

class __construct extends productEdit_Wall_Controller{
    protected function _main_function(){
        require_once "adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $productname = $productprice = $productquantity = $productdescription = $productcategory = $product_image = "";
           $data =  array(
            'productname' => $productname,
            'productprice' => $productprice,
            'productquantity' => $productquantity,
            'productdescription' => $productdescription,
            'productcategory' => $productcategory,
            'imagefile' => $product_image
           ); 
            $QUERY = "
            SELECT * FROM products WHERE id= :id
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":id", $param_id, PDO::PARAM_STR);
                $param_id = $_POST['id'];
                if($stmt->execute()){
                    if($stmt->rowCount() > 0){
                        $row = $stmt->fetch(PDO::FETCH_ASSOC);
                        $data['productname'] = $row['product_name'];
                        $data['productprice'] = $row['product_price'];
                        $data['productquantity'] = $row['product_quantity'];
                        $data['productdescription'] = $row['product_description'];
                        $data['productcategory'] = $row['product_category'];
                        $data['imagefile'] = $row['product_image'];
                        echo json_encode($data);
                    }
                    unset($stmt);
                    unset($pdo);
                }
            }
        }
    }
}