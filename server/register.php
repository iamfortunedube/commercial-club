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

			 
			  if(empty($_POST["sname"]) || empty($_POST["fname"]) && empty($_POST["cellNumber"]) || empty($_POST["password"]) || empty($_POST["refferalNo"])){

					$errMessage = "Please make sure there are no empty feilds";

			  }else{
					$rCode=$vCode=$status=$bank_name=$uniCode=$account_holder=$accNum="";
					@$surname=$_POST["sname"];
					@$firstname=$_POST["fname"];   
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
			
                       $sqlCheckReferals="select p_number from users where p_number=\"$refferalNo\";";
                        $result=$conn->query($sql);
						
						$resultCheck = $conn->query($sqlCheck);

						$resultCheckStatus=$conn->query($sqlCheckReferals);
						@$userDetails = $result->fetch_assoc();

						if($resultCheck->num_rows <= 0){
							$errMessage = "Referal number is not active";
						}else if($resultCheckStatus->num_rows <= 0){
							$errMessage = "Referal number does not exits";
						}else if($result->num_rows>0){
							$errCellNumber = $errCnumber = $errCpassword = $errMessage = $errName = $errPassword = $errSurname = "";
							$errMessage="user already have an account.Please <a href='login.php'> Login </a> or change number";
						}else{
						
					  	$vCode = mt_rand(100000, 999999);
								
							$_SESSION['r_fname'] = $firstname;
							$_SESSION['r_lname'] = $surname;
							$_SESSION['r_cell'] = $cellNo;
							$_SESSION['pswd'] = $password;
							$_SESSION['r_ref'] = $refferalNo;
							$_SESSION['r_vCode'] = $vCode;
							$username = $password = $message = $numbers = "";

							$url = "https://www.winsms.co.za/api/batchmessage.asp?";
					
							$userp = "user=";
					
							$passwordp = "&password=";
					
							$messagep = "&message=";
					
							$numbersp = "&Numbers=";
					
							$username = "cyalongo@gmail.com";
							$password = "Asekhona*911121";
							$message = "Activation code : ".$vCode."\n-----------------------------\nFrom Commercial Club.";
							$numbers = $cellNo;
					
							$encmessage = urlencode(utf8_encode($message));
					
							$all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;
					
							$fp = fopen($all, 'r');

							while(!feof($fp)){
								$line = fgets($fp, 4000);
								echo "<br>";
								echo "Responce";
								echo "<br>";
								print($line);
								echo "<br>";
							}
							
							fclose($fp);
						   //header("location:vCode.php");
						   echo "<script>window.location.href = 'vCode.php';</script>";
	
					}
				   }
			  }

        }
    }



//23-03-2018 01:34:59


//23-03-2018 01:34:54  

    //str = date['currntTime'];

    //date = substr(0,10);

    //if(date == date(d-m-yy))



?>