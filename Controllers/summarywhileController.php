<?php 
error_reporting(0);
require_once "onconnect.php";
$value = 0.0;

$SQL = "
    SELECT id,product_name,product_price * isquantitycart as pprice FROM products WHERE isaccount = :isaccount and iscart = 1
";
    if($result = $pdo->prepare($SQL)){
        $result->bindParam(":isaccount", $param_isaccount, PDO::PARAM_STR);
        $param_isaccount = $_SESSION['email'];
        $result->execute();
        if($result->rowCount() > 0){
            echo "
            <div class='cart-summary'>
            <div class='cart-content'>
            <h1>Cart Summary</h1>
            ";
            while($row = $result->fetch()){
                echo "
                <p>".$row['product_name']."<span>".$row['pprice']."</span></p>
                <p style='display: none;'>".$value += $row['pprice']."</p>
                ";
               
            }
           
            echo "
                <h2>Grand Total<span>".$value."</span></h2>
                </div>
                <div class='cart-btn'>
                <a class='btn btn-primary' style='margin-top: 10px;' href='checkout.php?totalvalue=".$value."'>Checkout</a>
                </div>
                    </div>
                ";
                
            unset($result);
        }

    }
    unset($pdo);
?>
