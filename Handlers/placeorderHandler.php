<?php

require_once "../Controllers/placeorderController.php";

if(isset($_POST['action']) == 'isplaceorder'){
    $barrier_place_order = new barrier_place_order();
    $resp = $barrier_place_order->placingorder();
}