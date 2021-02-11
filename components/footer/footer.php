<div class="footer" style="height: 365px;">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Get in Touch</h2>
                            <div class="contact-info">
                            <?php 
                            require_once "components/cons.php";
                            $QUERY = "
                            SELECT * FROM getintouch
                            ";
                            if($result = $pdo->query($QUERY)){
                                if($result->rowCount() > 0){
                                    if($row = $result->fetch()){
                                        echo "
                                            <p><i class='fa fa-map-marker'></i>".$row['address']."</p>
                                            <p><i class='fa fa-envelope'></i>".$row['email']."</p>
                                            <p><i class='fa fa-phone'></i>".$row['phone']."</p>
                                        ";
                                    }
                                    unset($result);
                                }
                            }
                            unset($pdo);
                            ?>
                                
                            </div>
                        </div>
                    </div>
                    
                    

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Company Info</h2>
                            <ul>
                            <?php 
                                require_once "database/db2.php";
                                $QUERY2 = "
                                    SELECT * FROM companyinfo
                                ";
                                if($result = $pdo->query($QUERY2)){
                                    if($result->rowCount() > 0){
                                        if($row = $result->fetch()){
                                            echo "
                                                <li>".$row['about_us']."</li>
                                                <li>".$row['privacypolicy']."</li>
                                                <li>".$row['termsandcondition']."</li>
                                            ";
                                        }
                                        unset($result);
                                    }
                                }
                                unset($pdo);
                            ?>
                                
                            </ul>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6">
                        <div class="footer-widget">
                            <h2>Purchase Info</h2>
                            <ul>
                            <?php 
                            require_once "database/db1.php";
                            $QUERY2 = "
                                    SELECT * FROM purchaseinfo
                                ";
                                if($result = $pdo->query($QUERY2)){
                                    if($result->rowCount() > 0){
                                        if($row = $result->fetch()){
                                            echo "
                                                <li>".$row['paymentpolicy']."</li>
                                                <li>".$row['shippingpolicy']."</li>
                                                <li>".$row['returnpolicy']."</li>
                                            ";
                                        }
                                        unset($result);
                                    }
                                }
                                unset($pdo);
                            ?>
                                
                            </ul>
                        </div>
                    </div>
                </div>
                
                
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 copyright">
                        <p>Copyright &copy; <a href="https://htmlcodex.com">Pet Store Philippines</a>. All Rights Reserved <script>document.write(new Date().getFullYear())</script>
</p>
                    </div>

                    
                </div>
            </div>
        </div>