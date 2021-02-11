<?php 
session_start();
if(!isset($_SESSION["access"]) || $_SESSION["access"] !== true && !isset($_SESSION["usertype"]) || $_SESSION["usertype"] !== 1){
  header("location: ../login.php");
  exit;
}
?>
<?php include("includes/navbar.php"); ?>

<div class="container-fluid">
<?php include("clientdashboard/clientdashboard.php"); ?>
</div>

<?php include("includes/scripts.php"); ?>
