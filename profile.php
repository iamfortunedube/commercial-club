
<?php 
      include("inc/overallHeader.php");
      if(isset($_SESSION["u_id"])){   
        
        include("inc/profileEdit.php");
        include("inc/overallFooter.php");
      }else{
          die('<center><div style="text-align:center;font-size:70pt;color:gold;font-weight:bolder;"> 404</div> <p>Oppps, We are havnig some technical problems. Please try again <a href="index.php">Home</a>.</p><img width="300" src="assets/logoCC.png" alt="logo"></center>');
      }  
?>

<script>
      $(document).ready(function(){
        $('.sidebar-menu ul li a').removeClass('active');
        $('.sidebar-menu ul li #profile-edit').addClass('active');
      });
</script>  