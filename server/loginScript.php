<?php

require "conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
		
        if(isset($_POST["submit"]))
        {
			     
			
			  if(empty($_POST["cellNumber"])){

				  $errCellNumber="Enter your cell Number *";  

			  }
			  if(empty($_POST["password"])){

				  $errPassword="Enter your password *";  

			  }
			 
			  if(empty($_POST["cellNumber"]) || empty($_POST["password"])){

				$errMessage = "Please make sure there are no empty feilds";

			  }else{
				
					@$cellNo=$_POST["cellNumber"];
					@$password=$_POST["password"];
		
					$sql="select * from users where  p_number=\"$cellNo\";";
		
                    $result=$conn->query($sql);
                    
					if(!($result->num_rows > 0))
					{
						$errCellNumber = $errCnumber = $errCpassword = $errMessage = $errName = $errPassword = $errSurname = "";
						$errMessage="Phone number was not found.Please <a href='register.php'> Register </a> to create account";
                    
                    }else{

                        @$userDetails = $result->fetch_assoc();

                        $_SESSION["u_id"] = $userDetails["id"];
                        $_SESSION[""] = $userDetails["fname"];
                        $_SESSION[] = $userDetails["lname"];
                        $_SESSION[] = $userDetails["id"];
					
				    }
			  }

        }
    }

$conn->close();	
?>