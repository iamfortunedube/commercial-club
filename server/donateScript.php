<?php

include("conn.php");


        $ready = true;
        $sql = "Select * from donation where cellDonator = '".@$_SESSION['u_username']."' and status = 0";

        $results = $conn->query($sql);
        $donateDetails = $results->fetch_assoc();
        $expDate = $donateDetails['expDate'];
        $currDate = $countD = date('Y-m-d H:i:s');
        
        $countDown = $donateDetails['donDate'];
        if($expDate == $currDate || $donateDetails['status'] == 1){
            unset($_SESSION["don"]);
        }
        else{
            $_SESSION['don'] = $donateDetails['amount'];
            echo "<span id='dateDon' hidden>".$countDown."</span>";
        }

        if(isset($_POST["submit"]) == "Donate") 
        { 
                    
                @$errDonation = ""; 

                @$dAmount = @$_POST["donateAmount"]; 
                $str1 = @$dAmount; 
                $lengthh = strlen($str1);  
                echo "<br>"; 
                    
                $lastDigit = substr($str1, $lengthh-1,$lengthh); 
                $newNumber = substr($str1, 0,$lengthh-1); 
               

                $int = (int)@$dAmount; 
                $lastDigitInt = (int)$lastDigit; 

                
                $sqlCheck = "select * from donation where cellDonator = '".$_SESSION['u_username']."' AND amount = '".$dAmount."' AND status = 0";
                $resultsCheck = $conn->query($sqlCheck);

                if($int > 10000 || $int < 500){ 
                    @$errDonation = "The required donation is between R500 - R10000"; 
                    $ready = false; 
                }else 
                if($lastDigitInt > 0){ 
                    @$errDonation = "Kindly round off the amount to the nearest 10s e.g (R". @$newNumber."0)"; 
                    $ready = false; 
                } else if($resultsCheck->num_rows > 0){
                    echo "<script>alert('your order is already placed. Please wait for it to be allocated');</script>";
                    $ready = false; 
                }
                
                if($ready) 
                { 
                    @$_SESSION['don'] = @$_POST["donateAmount"]; 
                   
                    $newDate=Date('Y-m-d', strtotime("+1 days")) ." ". date('h:m:s');
                    $countD = date('Y-m-d H:i:s');
                    $countDown = $countD;
                    
                    $sql = "insert into donation values('','".$_SESSION['u_username']."','".$dAmount."','".$countD."','".$newDate."',0)";
                    echo "<span id='dateDon' hidden>".$countDown."</span>";
                    $results = $conn->query($sql);
                    
                }       

        } 

        
        
?> 