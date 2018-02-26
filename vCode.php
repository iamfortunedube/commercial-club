
<?php 
 include("inc/overallHeader.php");
      if(isset($_SESSION["u_id"])){   
       
        include("inc/vCodePage.php");
      
      }else{
          die('<center><div style="text-align:center;font-size:70pt;color:gold;font-weight:bolder;"> 404</div> <p>Oppps, We are havnig some technical problems. Please try again <a href="index.php">Home</a>.</p><img width="300" src="assets/logoCC.png" alt="logo"></center>');
      }  
      include("inc/overallFooter.php");
?>