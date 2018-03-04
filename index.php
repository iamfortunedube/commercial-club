<?php 
  include("inc/overallHeader.php");
  
  if(isset($_SESSION["u_id"])){ header("location:dashboard.php"); } ?>
  <?php include("inc/home.php");?>
<?php include("inc/overallFooter.php");?>
<script>
      $(document).ready(function(){
        $('.sidebar-menu ul li a').removeClass('active');
        $('.sidebar-menu ul li #home').addClass('active');
      });
</script>  