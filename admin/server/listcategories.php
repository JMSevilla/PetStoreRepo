<?php
 require_once "../database/config.php";
 $sql = "
 CALL get_categories
 ";
 if($result = $pdo->query($sql)){
     if($result->rowCount() > 0){
         echo "<table class='table'>";
         echo "<thead>";
         echo "<tr>";
         echo "<th scope='col'>#</th>";
         echo "<th scope='col'>Category Name</th>";
         echo "<th scope='col'>Created</th>";
         echo "<th scope='col'>Actions</th>";
         echo "</tr>";
         echo "</thead>";
         echo "<tbody>";
         while($row = $result->fetch()){
             echo "<tr>";
             echo "<th scope='row'>" . $row['id'] . "</th>";
             echo "<td>" . $row['category_name'] . "</td>";
             echo "<td>" . $row['created_at'] . "</td>";
             echo "<td>";
             echo "<button type='button' onclick='onedit(".$row['id'].")' class='btn btn-info'><i class='fas fa-pen'></i> Edit</button>&nbsp;";
             echo "<button type='button' onclick='ondelete(".$row['id'].")' class='btn btn-danger'><i class='fas fa-file-excel'> </i> Remove</button>";
             echo "</td>";
             echo "</tr>";

         }
         echo "</tbody>";
         echo "</table>";
         unset($result);
     } else{
         echo "<p class='lead'><em>No records were found.</em></p>";
     }
 } else{
     echo "ERROR: Could not able to execute $sql. " . $mysqli->error;
 }
 unset($pdo);
 ?>
