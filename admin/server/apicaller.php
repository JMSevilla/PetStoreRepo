<?php 

class API_BARGRAPH_AUTH{
    public function WallBarGraph(){
        $this->ProductAndQuantities();
    }
}

class BARRIER_API extends API_BARGRAPH_AUTH{
    protected function ProductAndQuantities(){
        require_once "adminconnection/adconnect.php";

            if($_SERVER["REQUEST_METHOD"] == "POST"){
                $QUERY = "
                SELECT * FROM products 
            ";
            if($result = $pdo->query($QUERY)){
                $jsonarray = array();
                if($result->rowCount() > 0){
                    while($row = $result->fetch()){
                        $jsonItem = array();
                        $jsonItem['label'] = $row['product_name'];
                        $jsonItem['value'] = $row['product_quantity'];
                        array_push($jsonarray, $jsonItem);
                    }
                    unset($result);
                }
            }
            unset($pdo);
            header('Content-type: application/json');
            echo json_encode($jsonarray);

            }
    }
}
    
class API_LINEGRAPH_AUTH{
    public function WallLineGraph(){
        $this->OAuthProductOrder();
    }
    
}

class BARRIER_LINE_API extends API_LINEGRAPH_AUTH{
    protected function OAuthProductOrder(){
        require_once "adminconnection/adconnect.php";

        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERYSTRING = "
                CALL sproc_product_added()
            ";
            if($result = $pdo->query($QUERYSTRING)){
                $jsonlinearray = array();
                if($result->rowCount() > 0){
                    while($row = $result->fetch()){
                        $jsonlineItem = array();
                        $jsonlineItem['label'] = $row['product_name'];
                        $jsonlineItem['value'] = $row['product_quantity'];
                        array_push($jsonlinearray, $jsonlineItem);
                    }
                    unset($result);
                }
            }
            unset($pdo);
            header("Content-type: application/json");
            echo json_encode($jsonlinearray);
        }
    }
    
}

