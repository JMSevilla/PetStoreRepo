<div class="row">
<!-- image / input file. -->
<!-- PHP Opening -->
<?php 
    require_once "admin/server/adminconnection/adconnect.php";
    $QUERYSTR = "
    SELECT * FROM users WHERE email ='" . $_SESSION['email'] . "'";
    if($result = $pdo->query($QUERYSTR)){
        if($result->rowCount() > 0){
            if($row = $result->fetch()){

?>
    <div class="col-md-12">
    <center><img src="Controllers/customer_profiles/<?php echo $row['profileimage']; ?>" id="preview" alt="Avatar" data="" style="width: 20%; border-radius: 50%; height: auto; margin-bottom: 30px;" /></center>
        
        <label for="formFileLg" class="form-label">Upload your profile picture</label>
        <input style="margin-bottom: 20px;" class="btn btn-primary" id="file" type="file" onchange="previewFile(this);" />
    </div> 
    <br><br> 
    <div class="col-md-6"> 
        <input class="form-control" id="txtfirstname" type="text" value="<?php echo $row['firstname']; ?>" placeholder="First Name">
    </div>
    <div class="col-md-6"> 
        <input class="form-control" id="txtlastname" type="text" value="<?php echo $row['lastname']; ?>" placeholder="Last Name">
    </div>
    <div class="col-md-6">
        <input class="form-control" id="txtmob" type="text" value="<?php echo $row['mobileno']; ?>" placeholder="Mobile Number">
    </div>
    <div class="col-md-6">
        <input class="form-control" id="txtemail" disabled type="text" value="<?php echo $row['email']; ?>" placeholder="Email">
    </div>
    <?php 
            }
            unset($result);

        }

    }
    unset($pdo);
    ?>
    <!-- PHP Closing -->
    <div class="col-md-12">
    <?php 
    require_once "database/accountdetailscon.php";
    $querystring = "
    SELECT address FROM checkoutaddress WHERE email='" . $_SESSION['email'] . "'";
        if($result = $pdo->query($querystring)){
           $result->execute();
                if($row = $result->fetch()){

    ?>
        <input class="form-control" id="txtadd" value="<?php echo $row['address'] ?>" type="text" placeholder="Address">
        <?php
        }
        unset($result);
}
unset($pdo);
        
        ?>
    </div>
    <div class="col-md-12">
        <button class="btn" onclick="btnupdate()">Update Account</button>
        <br><br>
    </div>
</div>
<h4>Change Password</h4>                         
<div class="row">
    <div class="col-md-12">
        <input class="form-control" id="txtcurrentpw" type="password" placeholder="Current Password">
    </div>
    <div class="col-md-6">
        <input class="form-control" id="txtnp" type="password" placeholder="New Password"> 
    </div>
    <div class="col-md-6">
        <input class="form-control" id="txtcp" type="password" placeholder="Confirm Password">
    </div>
    <div class="col-md-12">
        <button class="btn" id="btnsavechanges">Save Changes</button>
    </div>
</div> 