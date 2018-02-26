<?php 
 include("inc/overallHeader.php");
 if(isset($_SESSION["u_id"])){ header("location:claims.php"); } 
 ?>    
  <?php include("inc/registerContent.php");?>  
<?php include("inc/overallFooter.php");?>
<script>
      $(document).ready(function(){
        $('.sidebar-menu ul li a').removeClass('active');
        $('.sidebar-menu ul li #register').addClass('active');
      });
</script>  