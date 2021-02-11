<?php

require_once "connectioncartlist.php";

if(isset($_GET['id']) && !empty(trim($_GET['id']))){
    $GRAPHQL = "
select * from products where id = :id and product_category = :category
";
if($result = $pdo->prepare($GRAPHQL)){
    $result->bindParam(":id", $param_id, PDO::PARAM_STR);
    $result->bindParam(":category", $param_category, PDO::PARAM_STR);
    $param_category = $_GET["category"];
    $param_id = trim($_GET["id"]);
    $result->execute();
    if($result->rowCount() > 0){
        if($row = $result->fetch()){
            echo "
            <div class='product-detail-top'>
            <div class='row align-items-center'>
            <div class='col-md-5'>
            <div class='product-slider-single normal-slider'>
            <img src='admin/server/upload/".$row['product_image']."' alt='Product Image'>
            </div>
            </div>
            <div class='col-md-7'>
            <div class='product-content'>
            <div class='title'><h2>".$row['product_name']."</h2></div>
            <div class='price'>
            <h4>Price:</h4>
            <p>&#8369;".$row["product_price"]."</p>
            
            </div>
            <p>Product Quantity : ".$row['product_quantity']."</p>
            <div class='action'>
            <a class='btn' onclick='onaddtocart(".$row['id'].")'><i class='fa fa-shopping-cart'></i>Add to Cart</a>
            </div>
            </div>
            </div>
            </div>
            </div>
           

            <div class='row product-detail-bottom'>
            <div class='col-lg-12'>
            <ul class='nav nav-pills nav-justified'>
                <li class='nav-item'>
                    <a class='nav-link active' data-toggle='pill' href='#description'>Description</a>
                </li>
               
            </ul>

            <div class='tab-content'>
                <div id='description' class='container tab-pane active'>
                    <h4>Product description</h4>
                    <p>
                        ".$row['product_description']."
                    </p>
                </div>
                
               
            </div>
        </div>
                        </div>

            ";
        }
        unset($result);
    }
}
unset($pdo);
}
?>
