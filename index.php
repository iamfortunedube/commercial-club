<?php 
  include("inc/overallHeader.php");
  
  if(isset($_SESSION["u_id"])){ header("location:dashboard.php"); } ?>
  <?php include("inc/home.php");?>
<?php include("inc/overallFooter.php");?>