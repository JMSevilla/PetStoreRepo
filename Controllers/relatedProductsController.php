<?php

require_once "onconnect.php";

$QLGraph = "
SELECT * FROM products WHERE product_category = :category
";

if($result = $pdo->prepare($QLGraph)){
    $result->bindParam(":category", $param_category, PDO::PARAM_STR);
    $param_category = $_GET['category'];
    $result->execute();
    if($result->rowCount() > 0){
        while($row = $result->fetch()){
            echo 
            "
            <div class='col-lg-3'>
            <div class='product-item'>
            <div class='product-title'>
                <a href='#'>".$row['product_name']."</a>
               
            </div>
            <div class='product-image'>
                <a href='#'>
                    <img src='admin/server/upload/".$row['product_image']."' alt='Product Image'>
                </a>
                <div class='product-action'>
                    <a href='#'><i class='fa fa-cart-plus'></i></a>
                    <a href='#'><i class='fa fa-heart'></i></a>
                </div>
            </div>
            <div class='product-price'>
                <h3><span>&#8369;</span>".$row['product_price']."</h3>
                <a class='btn' href=''><i class='fa fa-shopping-cart'></i>Buy Now</a>
            </div>
        </div>
        </div>
            ";
        }
        unset($result);
    }

}
unset($pdo);
?>

