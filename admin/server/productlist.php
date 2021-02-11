<?php 
require_once "adminconnection/adconnect.php";
$sql = "
SELECT * FROM products ORDER BY id DESC 
";
$val = array();
if($result = $pdo->query($sql)){
    if($result->rowCount() > 0){
        
        echo "<div class='table-wrapper-scroll-y my-custom-scrollbar'>";
        echo "<table class='table table-bordered table-striped mb-0'>";
        echo "<thead>";
        echo "<tr>";
       
        echo "<th scope='col'>Product Name</th>";
        echo "<th scope='col'>Product Price</th>";
        echo "<th scope='col'>Quantity</th>";
        echo "<th scope='col'>Category</th>";
        echo "<th scope='col'>Image</th>";
        echo "<th scope='col'>Action</th>";
        echo "</thead>";
        echo "<tbody>";
        while($row = $result->fetch()){
            echo "<tr>";
           
           
            echo "<td>".$row['product_name']."</td>";
            echo "<td>".$row['product_price']."</td>";
            echo "<td>".$row['product_quantity']."</td>";
            echo "<td>".$row['product_category']."</td>";
            echo "<td>";
            echo "<img src='server/upload/".$row['product_image']."' style='width: 100%; height: auto;'/>";
            echo "</td>";
            echo "<td>";
            echo "<button class='btn btn-primary' style='margin-bottom: 10px; width: 100%;' onclick='productEdit(".$row['id'].")'>Edit</button>";
            echo "
                <button class='btn btn-danger' onclick='productDelete(".$row['id'].")'>Delete</button>";
            echo "</td>";
            echo "</tr>";
        }
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
        
        unset($result);
    }
}
unset($pdo);
?>
    