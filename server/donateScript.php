<?php

include("conn.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
		
        if(isset($_POST["submit"]))
        {
            $sql ="Select * from donation where cellDonator ='".@$_SESSION['username']."'";

            
        }
    }

?>