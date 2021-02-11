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
        <meta content="widthe-width, initial-scale=1.0" name="viewport">
        <meta content="eCommerce HTML Template Free Download" name="keywords">
        <meta content="eCommerce HTML Template Free Download" name="description">

        <!-- Favicon -->
        <link href="https://scontent.fmnl16-1.fna.fbcdn.net/v/t1.15752-9/cp0/147175497_416213223019412_439456465210234735_n.png?_nc_cat=108&ccb=2&_nc_sid=ae9488&_nc_ohc=yuqx97fu88sAX-zVnhc&_nc_ht=scontent.fmnl16-1.fna&_nc_tp=30&oh=e33738b0b080072781956abfc6680742&oe=60486179" rel="shortcut icon" type="image/x-icon">

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400|Source+Code+Pro:700,900&display=swap" rel="shortcut icon" >

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
                    <li class="breadcrumb-item active">My Account</li>
                </ul>
            </div>
        </div>
        <!-- Breadcrumb End -->
        
        <!-- My Account Start -->
        <div class="my-account">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-3">
                        <div class="nav flex-column nav-pills" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="dashboard-nav" data-toggle="pill" href="#dashboard-tab" role="tab"><i class="fa fa-tachometer-alt"></i>Dashboard</a>
                            <a class="nav-link" id="orders-nav" data-toggle="pill" href="#orders-tab" role="tab"><i class="fa fa-shopping-bag"></i>Orders</a>
                            <a class="nav-link" id="payment-nav" data-toggle="pill" href="#payment-tab" role="tab"><i class="fa fa-credit-card"></i>Payment Method</a>
                            <a class="nav-link" id="address-nav" data-toggle="pill" href="#address-tab" role="tab"><i class="fa fa-map-marker-alt"></i>Address</a>
                            <a class="nav-link" id="account-nav" data-toggle="pill" href="#account-tab" role="tab"><i class="fa fa-user"></i>Account Details</a>
                            <a class="nav-link" onclick="onsignout()"><i class="fa fa-sign-out-alt"></i>Logout</a>
                        </div>
                    </div>
                    <div class="col-md-9">
                        <div class="tab-content">
                            <div class="tab-pane fade show active" id="dashboard-tab" role="tabpanel" aria-labelledby="dashboard-nav">
                                <h4>Dashboard</h4>
                                <?php 
                                require_once "database/clientdashboardconfig.php";
                                $QUERY = "
                                    SELECT * FROM clientdashboard
                                ";
                                if($result = $pdo->query($QUERY)){
                                    if($result->rowCount()){
                                        if($row = $result->fetch()){
                                            echo "<p>".$row['description']."</p>";
                                        }
                                        unset($result);
                                    }
                                }
                                unset($pdo);
                                ?>
                                
                            </div>
                            <div class="tab-pane fade" id="orders-tab" role="tabpanel" aria-labelledby="orders-nav">
                                <div class="table-responsive">
                                    <!-- table -->
                                    <?php include("Controllers/orderlistController.php"); ?>
                                </div>
                            </div>
                    <!-- PAYMENT METHOD PART -->
                            <div class="tab-pane fade" id="payment-tab" role="tabpanel" aria-labelledby="payment-nav">
                            <h4>Payment Method</h4>
                                <?php 
                                require_once "database/paymentmethodclientdashboard.php";
                                $QUERYSTR = "
                                SELECT * FROM paymentmethodclientdashboard
                                ";
                                if($result = $pdo->query($QUERYSTR)){
                                    if($result->rowCount() > 0){
                                        if($row = $result->fetch()){
                                            echo "<p>".$row['paymentmethod']."</p>";
                                        }
                                        unset($result);
                                    }
                                }
                                unset($pdo);
                                ?>
                                
                            </div>
                    <!-- END -->

                            <div class="tab-pane fade" id="address-tab" role="tabpanel" aria-labelledby="address-nav">
                                <h4>Address</h4>
                                <div class="row">
                                    <div class="col-md-6">
                                    <?php 
                                    require_once "database/category_config.php";
                                    $query = "
                                    select * from checkoutaddress where email = :email and created_date = created_date < CURRENT_TIMESTAMP or created_date = CURRENT_TIMESTAMP
                                    ";
                                    if($result = $pdo->prepare($query)){
                                        $result->bindParam(":email", $param_email, PDO::PARAM_STR);
                                        $param_email = $_SESSION['email'];
                                        $result->execute();
                                        if($result->rowCount() > 0){
                                            if($row = $result->fetch()){
                                                echo "
                                                <h5>Payment Address</h5>
                                                <p>".$row['address']."</p>
                                                <p>Mobile : ".$row['mobileno']."</p>

                                                ";
                                            }
                                            unset($result);
                                        } else{
                                            echo "<p>No address - Address will appear after checkout.</p>";
                                        }
                                    }
                                    unset($pdo);
                                    ?>
                                        <!-- <h5>Payment Address</h5>
                                        <p>123 Payment Street, Los Angeles, CA</p>
                                        <p>Mobile: 012-345-6789</p>
                                        <button class="btn">Edit Address</button> -->
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="tab-pane fade" id="account-tab" role="tabpanel" aria-labelledby="account-nav">
                                <h4>Account Details</h4>
                                <?php include("components/AccountDetails/AccountDetails.php"); ?>
                                

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- My Account End -->
      
        <!-- Footer Start -->
        <?php include("components/footer/footer.php"); ?>
        <!-- Footer Bottom End -->       
        <div
  class="modal fade"
  id="exampleModal"
  tabindex="-1"
  aria-labelledby="exampleModalLabel"
  aria-hidden="true"
>
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Address</h5>
       
      </div>
      <div class="modal-body">
      <div class="card">
       <div class="card-body">
        <h6>Payment Address</h6>
      <div class="form-outline" style="margin-bottom: 20px;">
      <textarea class="form-control" id="paymentaddress" rows="2"></textarea>
        </div> 
        <h6>Shipping Address</h6>
      <div class="form-outline" style="margin-bottom: 20px;">
      <textarea class="form-control" id="shippingaddress" rows="2"></textarea>
        </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="onsave" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
       
      </div>
    </div>
  </div>
</div>
        <!-- Back to Top -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- JavaScript Libraries -->
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="js/passer.js"></script>


        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
        
        <script src="lib/easing/easing.min.js"></script>
        <script src="lib/slick/slick.min.js"></script>
        <script src="js/cartcounter.js"></script>
        <script src="js/signout.js"></script>
        <script src="js/validateaccountdetails.js"></script>
        <script src="js/onreceived.js"></script>
        <script src="js/address.js"></script>
        <!-- Template Javascript -->
        <script>
function onShowModal(){
    $('#exampleModal').modal('show');
}
function onclose(){
    $('#exampleModal').modal('hide');
}
        </script>
        <script src="js/main.js"></script>
    </body>
</html>
