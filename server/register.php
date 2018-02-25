<?php

require "conn.php";

if($_SERVER["REQUEST_METHOD"]=="POST")
    {
		
        if(isset($_POST["submit"]))
        {
			     
			if (empty($_POST["sname"])) {

				$errSurname="Enter your surname *";

			  }
			  if(empty($_POST["fname"])){

				$errName="Enter your Name *";
			  }
			  if(empty($_POST["cellNumber"])){

				  $errCellNumber="Enter your cell Number *";  

			  }
			  if(empty($_POST["cellNumber2"])){

				 $errCnumber="Re-Enter your cell Number *";  

			  }
			  if(empty($_POST["password"])){

				  $errPassword="Enter your password *";  

			  }
			  if(empty($_POST["password2"])){
				  
				$errCpassword="Re-Enter your password *";  
			  }
			 
			  if(empty($_POST["sname"]) || empty($_POST["fname"]) && empty($_POST["cellNumber"]) && empty($_POST["cellNumber2"]) && empty($_POST["password"]) && empty($_POST["password2"])){

				$errMessage = "Please make sure there are no empty feilds";

			  }else{
				$rCode=$vCode=$status=$bank_name=$uniCode=$account_holder=$accNum="";
					@$surname=$_POST["sname"];
					@$firstname=$_POST["fname"];    
					//$vCode=$_POST["vCode"];
					@$cellNo=$_POST["cellNumber"];
					@$cellNo2=$_POST["cellNumber2"];
					@$password=$_POST["password"];
					@$password2=$_POST["password2"];
		
					if($cellNo!=$cellNo2)
					{
						$errMessage="Phone Number does not metch"; 
					}
				   if($password!=$password2)
				   {
					$errMessage="Passwords does not match";
				   }
				   if($password==$password2 && $cellNo==$cellNo2 ){
					$sql="select p_number from users where  p_number=\"$cellNo\";";
		
					$result=$conn->query($sql);
					if($result->num_rows>0)
					{
						$errCellNumber = $errCnumber = $errCpassword = $errMessage = $errName = $errPassword = $errSurname = "";
						$errMessage="user already have an account.Please <a href='login.php'> Login </a> or change number";
					}else{
						$vCode = mt_rand(100000, 999999);
						$sql="insert into users values('',\"$firstname\",\"$surname\",\"$cellNo\",\"$password\",\"$rCode\",\"$vCode\",\"$status\",\"$bank_name\",\"$uniCode\",\"$account_holder\",\"$accNum\");";
						if($conn->query($sql)){
							$succMessage="Next step come"; 

							$message = "Your verification code is ".$vCode;
							$to = $_REQUEST['cellNumber'];
							$result = @mail( $to, '', $message );
							print 'Message was sent to ' . $to;					
							header("location:vCode.php");
							}else{
							echo" Not Inserted".$conn->error; 
							}

					}
				}
			  }

        }
    }

$conn->close();	
?>