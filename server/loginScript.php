<?php

include("conn.php");

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
						$errMessage="Phone number was not found.Please check your number or <a href='register.php'> Register </a> to create account";
                    
                    }else{

                        @$userDetails = $result->fetch_assoc();
                        $errMessage=$errCellNumber = $errCnumber = $errCpassword = $errMessage = $errName = $errPassword = $errSurname = "";
                        $succMessage="SuccessFul";
                    
                        $_SESSION["u_id"] = $userDetails["id"];
                        $_SESSION["u_fname"] = $userDetails["fname"];
                        $_SESSION["u_lname"] = $userDetails["lname"];
                        $_SESSION["u_pnumber"] = $userDetails["p_number"];
                        $_SESSION["u_bankName"] = $userDetails["bank_name"];
                        $_SESSION["u_uniCode"] = $userDetails["universal_code"];
                        $_SESSION["u_accHolder"] = $userDetails["account_holder"];
                        $_SESSION["u_accNumber"] = $userDetails["account_number"];

                        echo "<script>window.location.href = './claims.php';</script>";
				    }
			  }

        }
    }

?>
