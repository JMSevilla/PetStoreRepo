
<div class="nav" >
            <div class="container-fluid">
                <nav class="navbar navbar-expand-md bg-dark navbar-dark">
                    <a href="#" class="navbar-brand">MENU</a>
                    <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                        <div class="navbar-nav mr-auto">
                            <a href="index.php" class="nav-item nav-link">Home</a>
                            <a href="product-list.php" class="nav-item nav-link">Product List</a>
                            <!-- <a href="product-list.html" class="nav-item nav-link">Products</a>
                            <a href="product-detail.html" class="nav-item nav-link">Product Detail</a>
                            <a href="cart.html" class="nav-item nav-link">Cart</a>
                            <a href="checkout.html" class="nav-item nav-link">Checkout</a>
                            <a href="my-account.html" class="nav-item nav-link">My Account</a>
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle active" data-toggle="dropdown">More Pages</a>
                                <div class="dropdown-menu">
                                    <a href="wishlist.html" class="dropdown-item">Wishlist</a>
                                    <a href="login.html" class="dropdown-item active">Login & Register</a>
                                    <a href="contact.html" class="dropdown-item">Contact Us</a>
                                </div>
                            </div> -->
                        </div>
                        <?php 
                        try {
                            if(!isset($_SESSION["access"]) || $_SESSION["access"] !== true && !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 0)
                            {

                           ?>
                           
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">User Account</a>
                                <div class="dropdown-menu">
                                    <a href="login.php" class="dropdown-item">Login</a>
                                    <a href="login.php" class="dropdown-item">Register</a>
                                </div>
                            </div>
                        </div>
                        <?php 
                         }
                         else{

                         
                        ?>
                        <div class="navbar-nav ml-auto">
                            <div class="nav-item dropdown">
                               
                                <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"><?php echo $_SESSION["fname"]; ?></a>
                                <div class="dropdown-menu">
                                <a class="dropdown-item" href="my-account.php">My Account</a>
                                    <a class="dropdown-item" onclick="onsignout()">Sign out</a>
                                </div>
                            </div>
                        </div>
                            <?php 
                            }
                        } catch (\Throwable $th) {
                            echo "<script>console.log('something')</script>";
                        }
                            ?>
                    </div>
                </nav>
            </div>
        </div>


       