<?php 
    require_once "database/category_config.php";
    $sql = "
    SELECT category_name FROM categories
    ";
    if($result = $pdo->query($sql)){
        if($result->rowCount() > 0){
            echo "<nav class='navbar bg-light'>";
            echo "<ul class='navbar-nav'>";
            while($row = $result->fetch()){
                echo "<li class='nav-item'>";
                echo "<a class='nav-link' href='#'><i class='fa fa-microchip'></i>".$row['category_name']."</a>";
                echo "</li>";
            }
            echo "</ul>";
            echo "</nav>";
        }
        unset($result);
    }
    unset($pdo);
?>