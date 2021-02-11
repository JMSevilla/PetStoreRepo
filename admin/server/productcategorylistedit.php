<?php
require_once "../database/config.php";
$QL = "
SELECT category_name FROM categories
";
if($result = $pdo->query($QL)){
    if($result->rowCount() > 0){
        echo "<select class='browser-default custom-select'>";
        echo "<option selected>Please select categories</option>";
        while($row = $result->fetch()){
            echo "<option id='editselectedcategory' value='".$row['category_name']."'>" .$row['category_name']. "</option>";
        }
        echo "</select>";
        unset($result);
    }
    else{

    }
    unset($pdo);
}
