<?php 

class company_info_Controller_Wall{
    public function companyinfo(){
        $this->_main_company_info_data();
    }
}

class _main extends company_info_Controller_Wall{
    protected function _main_company_info_data(){
        require_once "../adminconnection/adconnect.php";
        if($_SERVER["REQUEST_METHOD"] == "POST"){
            $QUERY = "
                UPDATE companyinfo SET about_us=:about, privacypolicy=:privacy, termsandcondition=:terms WHERE id = 1
            ";
            if($stmt = $pdo->prepare($QUERY)){
                $stmt->bindParam(":about", $param_about, PDO::PARAM_STR);
                $stmt->bindParam(":privacy", $param_privacy, PDO::PARAM_STR);
                $stmt->bindParam(":terms", $param_terms, PDO::PARAM_STR);
                $param_about = $_POST['about'];
                $param_privacy = $_POST['privacy'];
                $param_terms = $_POST['terms'];
                if($stmt->execute()){
                    echo json_encode(array("statusCode" => 200));
                }
            }
            unset($stmt);
            unset($pdo);
        }
    }
}