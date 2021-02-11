<?php

require_once "connectioncartlist.php";

$bigQuery = "
    select * from products where isaccount = :isaccount and isorder = 1
";
if($result = $pdo->prepare($bigQuery)){
    $result->bindParam(":isaccount", $param_isaccount, PDO::PARAM_STR);
    $param_isaccount = $_SESSION['email'];
    $result->execute();
    if($result->rowCount() > 0){
        echo "<table class='table table-bordered'>";
        echo "<thead class='thead-dark'>";
        echo "<tr>
                <th>No</th>
                <th>Product</th>
                <th>Price</th>
                <th>Status</th>
                <th>Action</th>
                </tr>
        ";
        echo "</thead>";
        echo "<tbody>";
        while($row = $result->fetch()){
            echo "<tr>";
            echo "<td>".$row['id']."</td>
                    <td>".$row['product_name']."</td>
                    <td>".$row['product_price']."</td>
                    <td>Approved</td>
                    <td><button class='btn' onclick='onreceived(".$row['id'].")'>Received</button></td>
            ";
            echo "</tr>";
            
        }
        echo "</tbody>";
            echo "</table>";
        unset($result);
    }
}
unset($pdo);
?>
