<?php 
session_start();
if(!isset($_SESSION["access"]) || $_SESSION["access"] !== true && !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 0)
{
    header("location: login.php");
    exit;
}
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
                    <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                    <li class="breadcrumb-item active">Product Detail</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- Product Detail Start -->
        <div class="product-detail">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8">
                        
                          <!-- product main -->
                          <?php include("Controllers/productDetailsController.php"); ?>
                        
                        
                        
                        
                        <div class="product">
                            <div class="section-header">
                                <h1>Related Products</h1>
                            </div>

                            <div class="row align-items-center product-slider product-slider-3">
                               
                                    <?php include("Controllers/relatedProductsController.php"); ?>
                                
                                <div class="col-lg-3">
                                    
                                </div>
                                <div class="col-lg-3">
                                    
                                </div>
                                
                                
                            </div>
                        </div>
                    </div>
                    
                    <!-- Side Bar Start -->
                    <div class="col-lg-4 sidebar">
                        <div class="sidebar-widget category">
                            <h2 class="title">Category</h2>
                            <?php include('category_list/category_list.php'); ?>
                        </div>
                        
                        
                        
                        
                        
                       
                    </div>
                    <!-- Side Bar End -->
                </div>
            </div>
        </div>
        <!-- Product Detail End -->
        
        <!-- Brand Start -->
        
        <!-- Brand End -->
        
        <!-- Footer Start -->
        <?php include("components/footer/footer.php"); ?>
        <!-- Footer End -->
        
        <!-- Footer Bottom Start -->
        
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
