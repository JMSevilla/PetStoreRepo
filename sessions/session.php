<?php
session_start();
try {
    if(isset($_POST['type']) == 'check'){
        if(!isset($_SESSION['access']) && $_SESSION['access'] !== true){
            echo json_encode(array("accessCode"=>"NOACCESS"));
            exit();
        } else{
            echo json_encode(array("accessCode"=>"ACCESS"));
            exit();
        }
    }
} catch (\Throwable $th) {
    echo json_encode(array("accessCode"=>"ERROR"));
}