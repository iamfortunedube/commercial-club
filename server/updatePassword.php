<?php
include("conn.php");

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
        if(@$_POST["submit"] =="Update Password")
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
            
             if($conn->query($sql)){
                    @$errMessage="";
                    @$succMessage="Password updated";
                    $_SESSION["u_pswd"] = $newPassword;
                    }else{
                        @$errMessage="Password NOT updated";
                       
                    }
            }
          
        }

        if($_POST['submit'] == "Update Picture")
       { 
            $target_parth="assets/images/";
           $target_parth=$target_parth.basename($_FILES['uploadFile']['name']);
           
           if (move_uploaded_file($_FILES['uploadFile']['tmp_name'],$target_parth)) {
               
              @$username=$_SESSION["u_username"];
               $sql = "update users set profile_pic= \"$target_parth\" where p_number=\"$username\";";
      
               if($conn->query($sql)==TRUE)
               {
                   echo"File uploaded ".$target_parth;
                   
               }
              
               $sql1="select profile_pic from users order by id asc limit 1";
               $results=$conn->query($sql1);
               if($results->num_rows>0)
               {
                   $row=$results->fetch_assoc();
                   $_SESSION['u_profile_pic']=$row['profile_pic'];
                   echo "<script>window.location.href = 'profile.php';</script>";
               }
           }
      }
    }
?>