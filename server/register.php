<?php

include("conn.php");

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
			  if(empty($_POST["password"])){

				  $errPassword="Enter your password *";  
			  }

			  if(empty($_POST["refferalNo"])){
				  
				$errRefferal="Enter your Refferal Number *";  
				}

			//	if(empty($_POST["agreeCheckb"])){
				  
				//	$errAgree="You must agree terms and conditonsa first *";  
				//	}
			 
			  if(empty($_POST["sname"]) || empty($_POST["fname"]) && empty($_POST["cellNumber"]) || empty($_POST["password"]) || empty($_POST["refferalNo"])){

					$errMessage = "Please make sure there are no empty feilds";

			  }else{
					$rCode=$vCode=$status=$bank_name=$uniCode=$account_holder=$accNum="";
					@$surname=$_POST["sname"];
					@$firstname=$_POST["fname"];    
					//$vCode=$_POST["vCode"];
					@$cellNo=$_POST["cellNumber"];
					@$cellNo2=$cellNo;
					@$password=$_POST["password"];
					@$password2=$password;
					@$refferalNo = $_POST["refferalNo"];
		
					if($cellNo!=$cellNo2)
					{
						$errMessage="Phone Number does not match"; 
					}
				   if($password!=$password2)
				   {
					$errMessage="Passwords does not match";
				   }
				   if($password==$password2 && $cellNo==$cellNo2 ){

						$sql="select p_number from users where p_number=\"$cellNo\";";
						$sqlCheck="select p_number from users where p_number=\"$refferalNo\" AND status = 1;";
			
                       $sqlCheckStatus="select p_number from users where p_number=\"$refferalNo\";";
 
						$result=$conn->query($sql);
						$resultCheck = $conn->query($sqlCheck);

						$resultCheckStatus=$conn->query($sqlCheckStatus);
						@$userDetails = $result->fetch_assoc();

						if($userDetails["status"] == 0){
							@$errMessage="The refferal is not active";
						}else if($resultCheck->num_rows<=0){
							$errMessage = "Referal number doesn't exist";
						}else if($result->num_rows>0){
							$errCellNumber = $errCnumber = $errCpassword = $errMessage = $errName = $errPassword = $errSurname = "";
							$errMessage="user already have an account.Please <a href='login.php'> Login </a> or change number";
						}else{
							$errMessage="next";
						$vCode = mt_rand(100000, 999999);
						$sql="insert into users values('',\"$firstname\",\"$surname\",\"$cellNo\",\"$password\",\"$cellNo\",\"$vCode\",\"$status\",\"$bank_name\",\"$uniCode\",\"$account_holder\",\"$accNum\");";
						$_SESSION['pswd'] = $password;
						if($conn->query($sql)){
						include("sendMsg.php");
								header("location:vCode.php");
							
							}else{
							echo" Not Inserted".$conn->error; 
							}
	
					}
				   }
			  }

        }
    }
?>