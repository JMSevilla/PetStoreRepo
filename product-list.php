<?php 


// require_once "database/config.php";
// $testsearchvalue = $_POST['searching'];

// $results_per_page = 10;
// $page = isset($_GET['page']) ? $_GET['page'] : 1;
// $start = ($page - 1) * $results_per_page;

// if($testsearchvalue == ""){
    
    
// }else{
//     $QUERYSEARCHLIST = "SELECT * FROM products WHERE product_name ='". $testsearchvalue. "'";

//     $result = $pdo->query($QUERYSEARCHLIST);
    
    
// }



// $result1 = $pdo->query("
// SELECT count(id) AS id FROM products
// ");
// $prodCount = $result1->fetchAll(PDO::FETCH_ASSOC);
// $total = $prodCount[0]['id'];
// $pages = ceil($total / $results_per_page);

// if(isset($_GET['page']) && $_GET['page'] == 1){
//     $Next = $page + 1;
// }else{
//     if(!isset($_GET['page'])){
//         $Next = $page;
//     }else{
//         $Next = $page + 1;
//         $Previous = $page -1;
//     }
// }

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pet Store Philippines</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href= "https://scontent.fmnl16-1.fna.fbcdn.net/v/t1.15752-9/cp0/147175497_416213223019412_439456465210234735_n.png?_nc_cat=108&ccb=2&_nc_sid=ae9488&_nc_ohc=yuqx97fu88sAX-zVnhc&_nc_ht=scontent.fmnl16-1.fna&_nc_tp=30&oh=e33738b0b080072781956abfc6680742&oe=60486179" rel="shortcut icon" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="stylesheet">

        <!-- CSS Libraries -->
        <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet">
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
        <link href="lib/slick/slick.css" rel="stylesheet">
        <link href="lib/slick/slick-theme.css" rel="stylesheet">

        <!-- Template Stylesheet -->
        <link href="css/style.css" rel="stylesheet">
    </head>

    <body>
        <!-- Top bar Start -->
        <div class="top-bar">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-sm-6">
                        <i class="fa fa-envelope"></i>
                        petstorephil@email.com
                    </div>
                    <div class="col-sm-6">
                        <i class="fa fa-phone-alt"></i>
                        +012-345-6789
                    </div>
                </div>
            </div>
        </div>
        <!-- Top bar End -->
        
        <!-- Nav Bar Start -->
        <?php include("components/navbar/navbar.php"); ?>
        <!-- Nav Bar End -->      
        
        <!-- Bottom Bar Start -->
        <?php include("components/bottombar/bottombar.php"); ?>
        <!-- Bottom Bar End -->  
        
        <!-- Breadcrumb Start -->
        <div class="breadcrumb-wrap">
            <div class="container-fluid">
                <ul class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item"><a href="pro">Products</a></li>
                    <li class="breadcrumb-item active">Product List</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product List Start -->
        <div class="product-view">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-view-top">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <div class="product-search">
                                           Product List
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-short">
                                                <div class="dropdown">
                                                    <!-- <div class="dropdown-toggle" data-toggle="dropdown">Product short by</div> -->
                                                    <!-- <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">Newest</a>
                                                        <a href="#" class="dropdown-item">Popular</a>
                                                        <a href="#" class="dropdown-item">Most sale</a>
                                                    </div> -->
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-4">
                                            <div class="product-price-range">
                                                <!-- <div class="dropdown">
                                                    <div class="dropdown-toggle" data-toggle="dropdown">Product price range</div>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <a href="#" class="dropdown-item">$0 to $50</a>
                                                        <a href="#" class="dropdown-item">$51 to $100</a>
                                                        <a href="#" class="dropdown-item">$101 to $150</a>
                                                        <a href="#" class="dropdown-item">$151 to $200</a>
                                                        <a href="#" class="dropdown-item">$201 to $250</a>
                                                        <a href="#" class="dropdown-item">$251 to $300</a>
                                                        <a href="#" class="dropdown-item">$301 to $350</a>
                                                        <a href="#" class="dropdown-item">$351 to $400</a>
                                                        <a href="#" class="dropdown-item">$401 to $450</a>
                                                        <a href="#" class="dropdown-item">$451 to $500</a>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php 
                            require_once "database/dbproductlist.php";
                            $QUERYLIST = "
    SELECT * FROM products
    ";
                            $result = $pdo->query($QUERYLIST);
                                    while($row = $result->fetch()) {
                            ?>
                            
                            <div class="col-md-4">
                                <div class="product-item">
                                    <div class="product-title">
                                        <a href="#"><?php echo $row['product_name']; ?></a>
                                       
                                    </div>
                                    <div class="product-image">
                                        <a href="product-detail.html">
                                        <img src="admin/server/upload/<?php echo $row['product_image']; ?>" alt="Product Image"/>
                                        </a>
                                        <div class="product-action">
                                            <a href="#"><i class="fa fa-cart-plus"></i></a>
                                            <a href="#"><i class="fa fa-search"></i></a>
                                        </div>
                                    </div>
                                    <div class="product-price">
                                        <h3><span>&#8369;</span><?php echo $row['product_price']; ?></h3>
                                        <button class='btn' onclick="onaddtocart(<?php echo $row['id']; ?>)"><i class='fa fa-shopping-cart'></i>Add to cart</button>
                                    </div>
                                </div>
                            </div>
                           
                            <?php 
                            
                                    
                                    }
                                    
                                

                            
                            
                                  
                                    
                            ?>
                            
                        </div>
                        
                        <!-- Pagination Start -->
                        <!-- <div class="col-md-12">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination justify-content-center">
                                <li class="page-item"><a href="product-list.php?page=<?php echo $Previous; ?>" class="page-link">&laquo; Previous</a></li>
                                <?php 
                              
                                for($i = 1; $i <= $pages; $i++){
                                    
                                ?>
                                    
                                   
                                    <li class="page-item"><a class="page-link" href="product-list.php?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                                    
                                   
                                    <?php 
                                }
                                    ?>
                                    <li class="page-item"><a href="product-list.php?page=<?php echo $Next; ?>" class="page-link">Next &raquo;</a></li>
                                </ul>
                            </nav>
                        </div> -->
                        <!-- Pagination Start -->
                    </div>           
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Product List</h2>
                            <p>This is our product list</p>
                        </div>
                        
                       
                        
                        
                        
                        
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product List End -->  
        
        <!-- Brand Start -->
       
        <!-- Brand End -->
        
        <!-- Footer Start -->
        <?php include("components/footer/footer.php"); ?>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <!-- JavaScript Libraries -->
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <script src="js/cartcounter.js"></script>
        <script src="js/signout.js"></script>
        <script src="js/validateaccountdetails.js"></script>
        <script src="js/onreceived.js"></script>
        <script src="js/address.js"></script>
        <script src="js/addtocart.js"></script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
