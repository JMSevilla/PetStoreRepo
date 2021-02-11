<?php 
    require_once "connectioncartlist.php";
    
        $QL = "
        SELECT id,product_name,product_price,isaccount,product_image,isquantitycart FROM products WHERE iscart=1 and isaccount = :isaccount
        ";
        if($result = $pdo->prepare($QL)){
            
            $result->bindParam(":isaccount", $param_isaccount, PDO::PARAM_STR);
            $param_isaccount = $_SESSION['email'];
            $result->execute();
            if($result->rowCount() > 0){
                echo "<table class='table table-bordered'>";
                echo "<thead class='thead-dark'>";
                echo "<tr>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Remove</th>
                        </tr>
                ";
                echo "</thead>";
                echo "<tbody class='align-middle'>";
                while($row = $result->fetch()){
                    echo "<tr>";
                    echo "<td>
                            <div class='img'>
                                <img src='admin/server/upload/".$row['product_image']."' alt='Image'>
                                <p>".$row['product_name']."</p>
                            </div>
                            </td>
                    ";
                    echo "<td>&#8369;".$row['product_price']."</td>";
                    echo "<td>".$row['isquantitycart']."</td>";
                    echo "<td><button onclick='onremove(".$row['id'].")'><i class='fa fa-trash'></i></button></td>";
                    echo "</tr>";
                }
                echo "</tbody>";
                echo "</table>";
               
                unset($result);
            }
            else{
                echo "<p>No items</p>";
            }
            
        }
        else{
            echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
        }
        unset($pdo);
    
?>
