<?php
require "conn.php";
$name=$surname=$cellNo=$password=$password2=$cellNo2=$errMessage=$vCode=$bank_name=$account_holder="";
$rCode=$status=$uniCode=$accNum=0;
if($_SERVER["REQUEST_METHOD"]=="POST")
	{
		$surname=$_POST["sname"];
	   	$firstname=$_POST["fname"];	
		//$vCode=$_POST["vCode"];
		$cellNo=$_POST["cellNumber"];
		$cellNo2=$_POST["cellNumber2"];
		$password=$_POST["password"];
		$password2=$_POST["password2"];
	     if(isset($_POST["submit"]))
    {
	$sql="select p_number from users where  p_number=\"$cellNo\";";
		
		
		$result=$conn->query($sql);
		if($result->num_rows>0)
		{
			$errMessage="user already have an account";
		}
	
		 if($result->num_rows<=0) {
		 if (empty($_POST["surname"])) 
		      { 
		       $errMessage="Enter your surname *"; 
			  }else if(empty($_POST["firstname"]))
			  {
                $errMessage="Enter your Name *";
                echo $errMessage;				
			  }else if(empty($_POST["cellNo"]))
			  {
				  $errMessage="Enter your cell Number *";   
			  }else if(empty($_POST["cellNo2"]))
			  {
				 $errMessage="Re-Enter your cell Number *";  
			  }else if(empty($_POST["password"]))
			  {
				  $errMessage="Enter your password *";  
			  }else if(empty($_POST["password2"]))
			  {
				$errMessage="Re-Enter your password *";  
			  }

			 if($cellNo==$cellNo2)
			     {
			 if($password==$password2)
				{
			$sql="insert into users (fname,lname,p_number,password,ref_code,vCode,status,bank_name,universal_code,account_holder,account_number)values(\"$firstname\",\"$surname\",\"$cellNo\",\"$password\",\"$rCode\",\"$vCode\",\"$status\",\"$bank_name\",\"$uniCode\",\"$account_holder\",\"$accNum\");";
					 if($conn->query($sql))
	                  {
		             //  echo" Inserted"; 
						header("location:vCode.php");
	                   }else{
		            //  echo" Not Inserted".$conn->error; 
	                  }
				}else{
					 $errMessage="Passwords does not metch";
				}
				 }else{
					 $errMessage="Phone Number does not metch"; 
				 }
			  }

	}
	}
	
	  function test_input($data)
   {
	$data=trim($data);
	$data=stripslashes($data);
	$data=htmlspecialchars($data);
	return $data;
}
$conn->close();	
?>