
<div class="bottom-bar">
            <div class="container-fluid">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="logo">
                            <a href="index.php">
                            <img src="https://scontent.xx.fbcdn.net/v/t1.15752-9/146369857_118778090143461_3222904013286669828_n.png?_nc_cat=108&ccb=2&_nc_sid=58c789&_nc_ohc=yNs1mFrxvvYAX8chzNT&_nc_ad=z-m&_nc_cid=0&_nc_ht=scontent.xx&oh=3fdc7ae232942f52b5cf280a584c3498&oe=604354F2" alt="Logo">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-6">
                        
                    </div>
                    <div class="col-md-3">
                        <div class="user">
                        <?php 
    require_once "conbottombar.php";
    $QUERYSTR = "
    SELECT profileimage FROM users WHERE email ='" . $_SESSION['email'] . "'";
    if($result = $pdo->query($QUERYSTR)){
        if($result->rowCount() > 0){
            if($row = $result->fetch()){

?>
                      <a href="my-account.php">
                      <img src="Controllers/customer_profiles/<?php echo $row['profileimage']; ?>" alt="Profile Image" style="border-radius: 50%;width: 12%; height: auto; margin-right: 10px;" />
                      </a>
                        <?php 
            }
            unset($result);

        }

    }
    unset($pdo);
    ?>
                            <a onclick="navigatecart()" class="btn cart">
                                <i class="fa fa-shopping-cart"></i>
                                <span id="totalcounts"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- img/logo.png -->