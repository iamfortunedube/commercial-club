<?php
include("conn.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(isset($_POST["submit"]))
        {
          @$oldPassword=$_POST["oldPassword"];
          @$newPassword=$_POST["newPassword"];
          @$varnewPassword=$_POST["varNewPassword"];
                @$username=$_SESSION["u_username"];
               
          if($_SESSION["u_pswd"] != @$oldPassword)
          {
                @$errMessage="Old password is wrong";
              
          }else if(@$newPassword != @$varnewPassword)
              {
                @$errMessage="New passwords does not match";  
               
            }else if($_SESSION["u_pswd"] == @$newPassword)
            {
                @$errMessage="Enter different password from the old password";
                
            }else{
             $sql="update users set password= \"$newPassword\" where p_number=\"$username\";"; 
             $result=$conn->query($sql);
             if($conn->query($sql)){
                    @$errMessage="Password updated";
                        
                    }else{
                        @$errMessage="Password NOT updated";
                       
                    }
            }
          
        }
    }
?>