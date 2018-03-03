<?php

include("conn.php");

        $ready = true;
        $sql = "Select * from donation where cellDonator = '".@$_SESSION['u_username']."' AND NOT status = 4 order by donDate LIMIT 1";
        @$currDate = $countD = date('Y-m-d H:i:s');
        $results = $conn->query($sql);
 /*
        @$sqlCheckPendingClaim = "Select * from claims where cellClaim = '".@$_SESSION['u_username']."' AND NOT states = 4";
        @$sqlCheckPendingDonation = "Select * from donation where cellDonator = '".@$_SESSION['u_username']."' AND NOT status = 4;";
        
        $resultsCheckClaim = $conn->query($sqlCheckPendingClaim);
        $resultsCheckDonation = $conn->query($sqlCheckPendingDonation);

        if(@$resultsCheckClaim->num_rows > 0 || @$resultsCheckDonation->num_rows > 0){
            $_SESSION['found'] = true;
            $resultss = $resultsCheckClaim->fetch_assoc();
            $countDown = $resultss["donDate"];
            $_SESSION['don']=$resultss["amount"];
            echo "<span id='dateDon' hidden>".$countDown."</span>";
        }else{
            $_SESSION['found'] = false;
        }
        
       
        $sqlClaim = "Select * from claims where cellClaim = '".@$_SESSION['u_username']."' AND NOT states = 4 order by donDate LIMIT 1";
        
        $resultss = $conn->query($sqlClaim);
       


        if($resultss->num_rows > 0){
            while($getDetails = $resultss->fetch_assoc()){
                switch($getDetails['states']){
                    case 0:
                        $currDate = $countD = date('Y-m-d H:i:s');
                        $countDown = $getDetails['donDate'];
                        $_SESSION['claim'] = $getDetails['amount'];
                        echo "<span id='dateDon' hidden>".$countDown."</span>";
                        unset($_SESSION['pending']);
                        break;
                    case 2:
                        $_SESSION['pending'] = "You donator has not yet sent your requested claim";
                        $_SESSION['don'] = $donateDetails['amount'];
                        break;
                    case 3:
                        $_SESSION['pending'] = "You have not yet confirmed the payment";
                        $_SESSION['don'] = $donateDetails['amount'];
                        break;
                    case 4:
                        unset($_SESSION["claim"]);
                        unset($_SESSION['pending']);
                        break;
                }    
            }
        }
        */
        
        if($results->num_rows > 0){
            while($donateDetails = $results->fetch_assoc()){
                $expDate = $donateDetails['expDate'];
                switch($donateDetails['status']){
                    case 0:
                        $currDate = $countD = date('Y-m-d H:i:s');
                        $countDown = $donateDetails['donDate'];
                        $_SESSION['don'] = $donateDetails['amount'];
                        echo "<span id='dateDon' hidden>".$countDown."</span>";
                        break;
                    case 1:
                        $_SESSION['pending'] = "You must donate in less then 48 hours";
                        $_SESSION['don'] = $donateDetails['amount'];
                        break;
                    case 2:
                        $_SESSION['pending'] = "The reciever has not yet confirmed your payment";
                        $_SESSION['don'] = $donateDetails['amount'];
                        break;
                    case 4:
                        unset($_SESSION["don"]);
                        unset($_SESSION['pending']);
                        break;
                }
            }
        }else{
            unset($_SESSION["don"]);
            unset($_SESSION['pending']);
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
                    
                    $sql = "insert into donation values('','".$_SESSION['u_username']."','".$dAmount."','".$countD."','".$newDate."',0,'".$dAmount."')";
                    echo "<span id='dateDon' hidden>".$countDown."</span>";
                    $results = $conn->query($sql);
                    
                }       

        }

        if($_SERVER['REQUEST_METHOD'] == "GET"){
            if(isset($_GET['submit']) == "Claim"){

                if($_GET['key'] == "UVonNbionUVJNIUB6846811yySVYGbniunySVYgvuYTVvuvtvSVYvbubSTYVBubtybuyvbuyvmk59jbb616YBIK734VUBg64DC653dHVBYTUBliubruv67r3d6uivytvu75v438HGFdd76f7tg56f64d67jk5151JH7689ubHwvhjN65151vh"){
                    
                    $dAmount = @$_GET["claimAmount"];
                    $dDate = @$_GET["donDatee"];
                    $expDate = @$_GET["expDatee"];

                    $sqlCheck = "select * from claims where cellClaim = '".$_SESSION['u_username']."' AND amount = '".$dAmount."' AND states = 0;";
                    $resultsCheck = $conn->query($sqlCheck);

                    if($resultsCheck->num_rows > 0){
                        echo "<script>alert('your order is already placed. Please wait for it to be allocated');</script>";
                        $ready = false; 
                    }
                        
                    if($ready){
                        $newDate=Date('Y-m-d', strtotime("+2 days")) ." ". date('h:m:s');
                        $countD = date('Y-m-d H:i:s');
                        $countDown = $countD;
                        @$username=$_SESSION['u_username'];
                        $sql = "update claims set states = 0,expDate='".$newDate."',donDate='".$countD."' where cellClaim = '".$username."' AND amount='".$dAmount."' AND donDate = '".$dDate."' AND expDate='".$expDate."';";
                        $results = $conn->query($sql);
                        echo "<span id='dateDon' hidden>".$countDown."</span>";
                        @$_SESSION['don'] = $dAmount;
                    }
                }
                
            }
        }  
?> 