<?php

$bulk = array(
            'id' => $_GET['id'],
            'productname' => $_GET['pn'],
            'productprice' => $_GET['pp'],
            'action' => $_GET['OAuthAction'],
            'productquantity' => $_GET['pq'],
            'productdescription' => $_GET['pd']
);

echo json_encode($bulk);
// header("location: http://localhost/ecommerce-html-template/admin/productviews.php");