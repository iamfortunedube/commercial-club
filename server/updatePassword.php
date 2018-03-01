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
<<<<<<< HEAD
             $sql="update users set password= \"$newPassword\" where p_number=\"$username\";"; 
             $result=$conn->query($sql);
=======
             $sql="update users set password= \"$newPassword\" where p_number=\"$username\";"; //where p_number=\"$_SESSION["u_username"]\";";
            
>>>>>>> ad966e4e0c4224c1652d50e321f278945015bad3
             if($conn->query($sql)){
                    @$errMessage="";
                    @$succMessage="Password updated";
                    $_SESSION["u_pswd"] = $newPassword;
                    }else{
                        @$errMessage="Password NOT updated";
                       
                    }
            }
          
        }
    }
?>