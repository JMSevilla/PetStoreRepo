<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Pet Store Philippines</title>
        <meta content="width=device-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="https://scontent.fmnl16-1.fna.fbcdn.net/v/t1.15752-9/cp0/147175497_416213223019412_439456465210234735_n.png?_nc_cat=108&ccb=2&_nc_sid=ae9488&_nc_ohc=yuqx97fu88sAX-zVnhc&_nc_ht=scontent.fmnl16-1.fna&_nc_tp=30&oh=e33738b0b080072781956abfc6680742&oe=60486179" rel="shortcut icon" type="image/x-icon">

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
        
        <!-- Main Slider Start -->
        <div class="header">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                       
                    </div>
                    
                    <div class="col-md-6">
                        <div class="header-img" >
                            <div class="img-item">
                                <img src="https://cdn.fstoppers.com/styles/large-16-9/s3/lead/2018/03/puppy-dog-photography-tips-pet-photoshoot.jpg" style="width: 100%;"/>
                                <a class="img-text" >
                                    <p>We have available products for your pet dogs!</p>
                                </a>
                            </div>
                            <div class="img-item">
                                <img src="https://dotty4paws.co.uk/wp-content/uploads/2019/08/5547a8edd274a6a60213a6781d3fd6c6-1024x683.jpg" />
                                <a class="img-text" >
                                    <p>Lowest price guaranteed!!</p>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Main Slider End -->      
        
        <!-- Brand Start -->
        <!-- <div class="brand">
            <div class="container-fluid">
                <div class="brand-slider">
                    <div class="brand-item"><img src="img/brand-1.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-2.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-3.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-4.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-5.png" alt=""></div>
                    <div class="brand-item"><img src="img/brand-6.png" alt=""></div>
                </div>
            </div>
        </div> -->
        <!-- Brand End -->      
        
        <!-- Feature Start-->
        <div class="feature">
            <div class="container-fluid">
                <div class="row align-items-center">
                <?php 
                require_once "database/config.php";
                $QUERY = "
                SELECT * FROM services
                ";
                if($result = $pdo->query($QUERY)){
                    if($result->rowCount() > 0){
                        if($row = $result->fetch()){

                ?>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fab fa-cc-mastercard"></i>
                            <h2>Secure Payment</h2>
                            <p>
                            <?php echo $row['secure_payment']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-truck"></i>
                            <h2>Worldwide Delivery</h2>
                            <p>
                            <?php echo $row['word_delivery']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-sync-alt"></i>
                            <h2>90 Days Return</h2>
                            <p>
                            <?php echo $row['days_return']; ?>
                            </p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 feature-col">
                        <div class="feature-content">
                            <i class="fa fa-comments"></i>
                            <h2>24/7 Support</h2>
                            <p>
                            <?php echo $row['support']; ?>
                            </p>
                        </div>
                    </div>
                    <?php 
                }
                unset($result);
            }
        }
       


                    ?>
                </div>
            </div>
        </div>
        <!-- Feature End-->      
        
        <!-- Category Start-->
        <!--  -->
        <!-- Category End-->       
        
        <!-- Call to Action Start -->
        
        <!-- Call to Action End -->       
        
        <!-- Featured Product Start -->
        <div class="featured-product product">
            <div class="container-fluid">
                <div class="section-header">
                    <h1>Featured Product</h1>
                </div>
                <div class="row align-items-center product-slider product-slider-4">
                   <?php include('Featured_Products/featuredlist.php'); ?>
                   <div class="col-lg-3">
                   </div>
                   <div class="col-lg-3">
                   </div>
                   <div class="col-lg-3">
                   </div>
                   <div class="col-lg-3">
                   </div>
                   <div class="col-lg-3">
                   </div>
                </div>
            </div>
        </div>
        <!-- Featured Product End -->       
        
        <!-- Newsletter Start -->
        
        <!-- Newsletter End -->        
        
        <!-- Recent Product Start -->
        
        <!-- Recent Product End -->
        
        <!-- Review Start -->
        
        <!-- Review End -->        
        
        <!-- Footer Start -->
        <?php include("components/footer/footer.php"); ?>
        <!-- Footer Bottom End -->       
        
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <script src="js/passer.js"></script>
        <script src="js/addtocart.js"></script>
        <script src="js/cartcounter.js"></script>
        <script src="js/signout.js"></script>
        <!-- Template Javascript -->
        <script src="js/main.js"></script>
    </body>
</html>
