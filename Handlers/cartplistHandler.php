<?php

require_once "../Controllers/cartplist.php";

if(isset($_POST['action']) == 'check'){
    $cart_p_list_Controller = new cart_p_list_Controller();
    $resp = $cart_p_list_Controller->cartlist();
}