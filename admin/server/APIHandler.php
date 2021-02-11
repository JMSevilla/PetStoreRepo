<?php

require_once "apicaller.php";

if(isset($_POST['action']) == 'linegraph'){
    $BARRIER_LINE_API = new BARRIER_LINE_API();
    $resp = $BARRIER_LINE_API->WallLineGraph();

    

}
if(isset($_POST['action2']) == 'bargraph'){
    $BARRIER_API = new BARRIER_API();
    $resp = $BARRIER_API->WallBarGraph();
}

