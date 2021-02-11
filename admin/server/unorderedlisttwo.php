
<?php 
require_once "../database/config.php";
$QUERYLIST = "
SELECT category_name FROM categories
";
if($resultt = $pdo->query($QUERYLIST)){
    if($resultt->rowCount() > 0){
        
        echo "<option selected>Please select categories</option>";
        while($row = $resultt->fetch()){
            echo "<option value='".$row['category_name']."'>" .$row['category_name']. "</option>";
        }
        
        unset($resultt);
    }
    
}
unset($pdo);
?>
