<?php 


class category_creation{
    function categories_create(){
        require_once "../../database/config.php";
        if($_SERVER["REQUEST_METHOD"] == "POST") {

            $categoryname = $_POST["category"];
            $sql = "
            CALL sproc_categories(:category)
            ";
            if($stmt = $pdo->prepare($sql)){
                $stmt->bindParam(":category", $param_category, PDO::PARAM_STR);
                $param_category = $_POST["category"];
                if($stmt->execute()){
                    echo json_encode(array("statusCode"=>"category success"));
                }
                else{
                    echo json_encode(array("statusCode"=>"fail to execute"));
                }
                unset($stmt);
            }
            unset($pdo);
        
        }
    }
    
}

class category_updating{
    function categories_updater(){
        require_once "../../database/config.php";
        $category_name = "";
        
            if($_SERVER["REQUEST_METHOD"] == "GET"){
                if(isset($_GET['id']) && !empty(trim($_GET['id']))){
                    $id = trim($_GET['id']);
                    $sql = "
                    SELECT * FROM categories WHERE id = :id
                    ";
                    if($stmt = $pdo->prepare($sql)){
                        $stmt->bindParam(":id", $param_id);
                        $param_id = $id;
                        if($stmt->execute()){
                            if($stmt->rowCount() == 1){
                                $row = $stmt->fetch(PDO::FETCH_ASSOC);
                                $category_name = $row['category_name'];
                                echo json_encode(array("statusCode"=>$category_name));
                            } else{
                                echo json_encode(array("statusCode"=>"error in fetching"));
                                exit;
                            }
                        } else{
                            echo json_encode(array("statusCode" => "error in executing"));
    
                        }
                    }
                    unset($stmt);
                    unset($pdo);
                }
            }
        
    }
}

class categoryupdate_finalmove{
    function OAuthUpdate(){
        require_once "../../database/config.php";
        $final_id = $final_category_name = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["id"]) && !empty($_POST["id"])){
                $final_id = $_POST["id"];
                $final_category_name = $_POST["category_name"];
                $QL = "
                CALL sproc_categories_updater(:id, :category_name)
                ";
                if($stmt=$pdo->prepare($QL)){
                    $stmt->bindParam(":id", $param_id);
                    $stmt->bindParam(":category_name", $param_category);
                    $param_id = $final_id;
                    $param_category = $final_category_name;
                    if($stmt->execute()){
                        echo json_encode(array("updateStatus"=>"OK"));
                        exit();
                    } else{
                        echo json_encode(array("updateStatus"=>"ERROR"));
                        exit();
                    }
                }
                unset($stmt);
                unset($pdo);
            }

        }
    }
}

class category_delete{
    function OAuthDelete(){
        require_once "../../database/config.php";
        $del_id = "";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            if(isset($_POST["id"]) && !empty($_POST["id"])){
                $del_id = $_POST["id"];
                $GraphQL = "
                DELETE FROM categories WHERE id = :id
                ";
                if($stmt=$pdo->prepare($GraphQL)){
                    $stmt->bindParam(":id", $param_id);
                    $param_id = $del_id;
                    if($stmt->execute()){
                        echo json_encode(array("deleteStatus"=>"OK"));
                        exit();
                    }else{
                        echo json_encode(array("deleteStatus"=>"ERROR"));
                        exit();
                    }
                }
                unset($stmt);
                unset($pdo);
            }
        }
    }
}