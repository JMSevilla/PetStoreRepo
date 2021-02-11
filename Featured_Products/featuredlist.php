<?php 
    require_once "database/config.php";
    $sql = "
    SELECT id,product_name, product_price, product_image, product_category FROM products
    ";
    if($result = $pdo->query($sql)){
        if($result->rowCount() > 0){
            
            while($row = $result->fetch()){
                
               echo "<div class='col-lg-3'>";
               echo "<div class='product-item'>";
               echo "<div class='product-title'>";
               echo "<a href='product-detail.php?id=".$row['id']."&category=".$row['product_category']."'>".$row['product_name']."</a>";
                echo "</div>";
                echo "
                <div class='product-image' style='width: 100%; height: auto;'>
                <a href='product-detail.php?id=".$row['id']."'>
                <img src='admin/server/upload/".$row['product_image']."' alt='Product Image' style='width: 100%; height: auto;'>
                </a>
                <div class='product-action'>
                <a onclick='onaddtocart(".$row['id'].")'><i class='fa fa-cart-plus'></i></a>
                <a href='#'><i class='fa fa-heart'></i></a>
                </div>
                </div>
                ";
                echo "
                <div class='product-price'>
                <h3><span>&#8369;</span>".$row['product_price']."</h3>
                <button class='btn' onclick='onaddtocart(".$row['id'].")'><i class='fa fa-shopping-cart'></i>Add to cart</button>
                </div>
                </div>
                </div>
                ";
            }
            
            
        }
        unset($result);
    }
    unset($pdo);
?>
