<?php

include("conn.php");

if(@$_POST['submit'] == "Request"){
    @$cellNo = $_POST['cellNumber'];

    $sql = "select * from users where p_number = '".$cellNo."';";

    $results = $conn->query($sql);
    
    if($results->num_rows > 0){
        $row = $results->fetch_assoc();

        $firstname = $row['fname'];
        $surname = $row['lname'];
        $pwsd = $row['password'];
        $cellNo = $row['p_number'];


        $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                            
                $userp = "user=";
        
                $passwordp = "&password=";
        
                $messagep = "&message=";
        
                $numbersp = "&Numbers=";
        
                $username = "cyalongo@gmail.com";
                $password = "Asekhona*911121";
                $message = "Hi ".$firstname." ".$surname."\n\nWelcome Back to Commercial Club\nYour Login Details are as follows:\n\nUsername : ".$cellNo."\nPassword : ".$pwsd." \n\nThank you for joining us.\n-----------------------------\nFrom Commercial Club.";
                $numbers = $cellNo;
        
                $encmessage = urlencode(utf8_encode($message));
        
                $all = $url.$userp.$username.$passwordp.$password.$messagep.$encmessage.$numbersp.$numbers;

                $fp = fopen($all, 'r');
                while(!feof($fp)){
                $line = fgets($fp, 4000);
               
        }
    fclose($fp); 
        $successMessage = "You will recieve an SMS with your password on this<br/><b style='color:black;'> Number : ".$cellNo."</b><br/><a href='login.php'>Login</a> to continue.";
    }else{
        $errMessage = "Number was not found. Please check and request again";
    }
}
?>