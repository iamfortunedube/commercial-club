<div class="row">
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                    <h6>Make Donation</h6>
                </div>
                <div>  
                
                
                <?php include("server/donateScript.php");?>
                    <form class="form-control" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                       
                    <?php if(!isset($_SESSION['don'])){ 
                        echo '
                        <p style="padding:5px;margin:5px;">Make your donation here:</p>
                        <div class="row">
                            <div class="col-md-9">
                                <input class="form-control" maxlength="5" id="donate" type="text" name="donateAmount" placeholder="Enter amount to donate" value="'.@$str1.'"/>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="submit" class="btn button-gold" value="Donate">
                            </div>
                            <p style="padding:5px;margin:5px;color:red">'.@$errDonation.'</p>
                        </div>';}
                        else if(isset($_SESSION['pending'])){
                            echo'
                              <p style="padding:5px;margin:5px;">
                                <center> '.@$_SESSION['pending'].'</center>
                              </p> ';
                            
                        } else{
                            echo'
                            <p style="padding:5px;margin:5px;">
                            <center>Your order will be allocated within 24 hours - <b>R  '.@$_SESSION['don'].'<br> '.@$newDates.'</b></center>
                            <div id="countdown"></div>

                            <p id="note"></p>
                            </p> ';
                        }
                        ?>
                    </form>
                </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="welcomeTitle">
            <h6>Claims</h6>
        </div>
        <form>
            <p class="welcomeContent">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Expected Amount</th>
                            <th scope="col">Timer</th>
                            <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $sqlClaim = "Select DATEDIFF(expDate, donDate) AS days,amount,donDate,expDate,states from claims where cellClaim = '".$_SESSION['u_username']."';";
                            
                            $resultsClaim = $conn->query($sqlClaim);
                            if($resultsClaim->num_rows > 0){
                                $countt = 0;
                                while($row = $resultsClaim->fetch_assoc()){
                                    $countt++;
                                    echo '  <form action="'.$_SERVER["PHP_SELF"].'">
                                                <tr>
                                            
                                                    <td scope="row"><input type="text" name="key" value="UVonNbionUVJNIUB6846811yySVYGbniunySVYgvuYTVvuvtvSVYvbubSTYVBubtybuyvbuyvmk59jbb616YBIK734VUBg64DC653dHVBYTUBliubruv67r3d6uivytvu75v438HGFdd76f7tg56f64d67jk5151JH7689ubHwvhjN65151vh"  hidden />'.$countt.'</td>
                                                    <td><input type="text" name="claimAmount" value="'.$row['amount'].'"  hidden />R '.$row['amount'].'</td>
                                                    <td><input type="text" name="donDatee" value="'.$row['donDate'].'"  hidden />'; if($row['days'] <= 0){echo "--------";}else{echo $row["days"].' day(s)';} echo '</td>
                                                    <td><input type="text" name="expDatee" value="'.$row['expDate'].'"  hidden />
                                                    '; 
                                                    $time = strtotime($row['expDate']);

                                                    $curtime = time();

                                                    $timeCheck = $time - $curtime;

                                                    switch($row['states']){
                                                        case 10:
                                                            if($timeCheck <= 0){
                                                                echo '<input type="submit" name="submit" class="btn button-sm-gold" value="Claim" />';
                                                                break;
                                                            }else{
                                                                echo "Time left : ".date("H:i:s",$timeCheck);
                                                                break;
                                                            }
                                                            break;
                                                        case 1:
                                                            echo 'Pending...';
                                                            break;
                                                        case 0:
                                                            echo 'Waiting for allocation';
                                                            break;
                                                        case 2:
                                                            echo 'Waiting for Sender';
                                                            break;
                                                        case 3:
                                                            echo 'Please confirm';
                                                            break;
                                                        case 4:
                                                            echo '<span style="color:green">Complete</span>';
                                                            break;
                                                        default:
                                                            echo 'Testing';
                                                    }  
                                                    echo '
                                                </tr> 
                                            </form>
                                        ';
                                }
                            }else{
                                echo '
                                            <tr>
                                                <td scope="row" colspan="4"><center>You have no claims available at the moment at the momemnt.</center></td>
                                             </tr>
                                        ';
                            }
                        ?>
                    </tbody>
                </table>
            </p>
        </form>
    </div>
</div>
<div class="row">
    <!--row starts-->
    <div class="col-md-12">
            <div class="welcomeWrapper">
               
                    <?php
                    
                    $sqlDonator = "select d.id AS 'd_idd',c.id AS 'c_idd',
                    account_holder,bank_name,bank_branch,account_number,c.amount AS 'claimAmountt',d.amount AS 'donAmount',p_number,d.status AS 'donStatus',c.states AS 'claimStatuss',d.donDate AS 'donDate'
                    from allocation a,users u,claims c,donation d 
                    where a.cellReciever = c.cellClaim
                        AND d.cellDonator = '".$_SESSION['u_username']."'
                         AND   a.cellDonator = '".$_SESSION['u_username']."'
                             AND   a.cellReciever = u.p_number;";
                    
                     // if($resultDonator){

                    // }
                    // else{
                    //     echo '<p class="welcomeContent">We are currently having some technical issues. Please contact us to continue with you request. Thank you for understaing!</p>';
                    // }
                    $resultDonator = $conn->query($sqlDonator);
                   
                    if($resultDonator->num_rows > 0){
                         echo ' <div class="welcomeTitle">
                                <h6><span style="color:rgb(218,165,32);font-size:15pt;">Transactions <span style="position:absolute;right:30px;">(for donations)</span></span></h6>
                                </div>
                                <p class="welcomeContent">
                                <table class="table table-hover table-dark">
                                <thead>
                                    <tr>
                                        <th scope="col">Account Holder</th>
                                        <th scope="col">Bank (Branch Code)</th>
                                        <th scope="col">Account Number</th>
                                        <th scope="col">Amount</th>
                                        <th scope="col">CellNo</th>
                                        <th scope="col">Timer</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                              ';

                              if(@$_POST['submit']=="Send"){

                                @$don_id = $_POST['d_id'];
                                @$claim_id = $_POST['c_id'];

                                $sqlDon = "update donation set status = 2 where id=".$don_id.";";
                                $sqlClaim = "update claims set states = 3 where id=".$claim_id.";";

                                $getInfo = $resultDonator->fetch_assoc();
                            /*-------------------------SMS------------------*/
                                $sqlDoon = "select * from users where p_number = '".$getInfo['cellDonator']."';";
                                $donResults = mysqli_query($conn,$sqlDoon);
                                $getDonDetails = mysqli_fetch_assoc($donResults);
                            /*-------------------------SMS ends------------------*/

                            /*-------------------------SMS------------------*/
                                $sqlClaimc = "select * from users where p_number = '".$getInfo['cellReciever']."';";
                                $claimResults = mysqli_query($conn,$sqlClaimc);
                                $getClaimDetails = mysqli_fetch_assoc($claimResults);
                            /*-------------------------SMS ends------------------*/

                                if($conn->query($sqlClaim)){
                                    /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getClaimDetails['fname']." ".$getClaimDetails['lname']."\n\nKindly confirm the payment which has been sent to you.\n\n Thank you for your co-operation. Hope will hear from you soon. Enjoy the rest of our day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $getClaimDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/
                                }
                                if($conn->query($sqlDon)){
                                    /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getDonDetails['fname']." ".$getDonDetails['lname']."\n\nPlease waiting for confirmation of your payment from the Reciever you have just send the amount too.\n\nThank you for your co-operation. Hope will hear from you soon. Enjoy the rest of our day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $getDonDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/
                                }

                                echo "<script>window.location.href = 'dashboard.php';</script>";
                              }


                        while($row = $resultDonator->fetch_assoc()){
                            echo '
                                    <tbody>
                                     <form action="" method="POST">
                                     <input type="hidden" name="d_id" value="'.$row['d_idd'].'" />
                                     <input type="hidden" name="c_id" value="'.$row['c_idd'].'" />
                                        <tr>
                                        <td scope="row">'.$row['account_holder'].'</td>
                                        <td>'.$row['bank_name'].' ('.$row['bank_branch'].')</td>
                                        <td>'.$row['account_number'].'</td>
                                        <td>';
                                       if($row['claimAmountt'] < $row['donAmount']){
                                        echo '<input type="hidden" name="" value="'.$row['claimAmountt'].'" />'.$row['claimAmountt'];
                                       }else if($row['claimAmountt'] > $row['donAmount']){
                                        echo '<input type="hidden" name="donAmount" value="'.$row['donAmount'].'" />'.$row['donAmount'];
                                       }else{
                                        echo '<input type="hidden" name="donAmount" value="'.$row['donAmount'].'" />'.$row['donAmount'];
                                       }

                                       echo'</td>
                                        <td>'.$row['p_number'].'</td>
                                        <td>48 hours</td>
                                        <td>';
                                       
                                        switch($row['donStatus']){
                                            case 0:
                                                if($row['claimStatuss'] == 2){
                                                    echo '<input type="submit" name="submit" class="btn button-sm-gold" value="Send" />';
                                                    break;
                                                }else if($row['claimStatuss'] == 4){
                                                    echo '<span style="color:green;font-weight:bolder;">Process Completed</span>';
                                                    break;
                                                }else{
                                                    $currDate = $countD = date('Y-m-d H:i:s');
                                                    $countDown = $donateDetails['donDate'];
                                                    $_SESSION['don'] = $donateDetails['amount'];
                                                    echo "<span id='dateDon' hidden>".$countDown."</span>";
                                                    break;                                    
                                                }
                                                break;
                                            case 2:
											if(($row['claimStatuss'] == 3)){
                                                echo 'Waiting for confirmation from Reciever...';
                                                break;
											}if(($row['claimStatuss'] == 4)){
												 echo '<span style="color:green;font-weight:bolder;">Process Completed</span>';
											}else{
												 echo '<input type="submit" name="submit" class="btn button-sm-gold" value="Send" />';
												break;
											}
											break;
                                            case 4:
                                              echo '<span style="color:green;font-weight:bolder;">Process Completed</span>';
                                                    break;
                                        }
                                        echo '
                                        
                                        </td>
                                        </tr>
                                        </form>
                                    </tbody>
                                ';
                        }
                        echo'
                                 </table>
                          </p>
                           ';
                       
                    }else{
                        echo ' <div class="welcomeTitle">
                                <h6><span style="color:rgb(218,165,32);font-size:15pt;">Transactions <span style="position:absolute;right:30px;">(for donations)</span></span></h6>
                                </div>
                                <p class="welcomeContent">
                                    <table class="table table-hover table-dark">
                                        <thead>
                                            <tr>
                                                <th scope="col">Account Holder</th>
                                                <th scope="col">Bank (Branch Code)</th>
                                                <th scope="col">Account Number</th>
                                                <th scope="col">Amount</th>
                                                <th scope="col">CellNo</th>
                                                <th scope="col">Timer</th>
                                                <th scope="col">Status</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td scope="row" colspan="7"><center>Your have no allocated Donations  at the moment.</center></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </p>
                            ';
                       } 
     
                    $sqlReciever = "select a.id AS 'a_iddd',d.id AS 'd_iddd',c.id AS 'c_iddd',fname,lname,p_number,d.amount AS 'amount',c.amount AS 'amount_claim',remaining_claim,remaining_don,c.states AS 'claimStatus' from allocation a,users u,claims c, donation d where a.cellReciever = '".$_SESSION['u_username']."'
                              AND d.cellDonator = a.cellDonator
                              AND a.cellReciever = c.cellClaim
                               AND a.cellDonator = u.p_number";
                    
                    $resultReciever = $conn->query($sqlReciever);
                    if($resultReciever->num_rows > 0){
                        echo ' <div class="welcomeTitle">
                               <h6><span style="color:rgb(218,165,32);font-size:15pt;">Transactions <span style="position:absolute;right:30px;">(for Claims)</span></span></h6>
                               </div>
                               <p class="welcomeContent">
                               <table class="table table-hover table-dark">
                               <thead>
                                   <tr>
                                       <th scope="col">Name & Surname</th>
                                       <th scope="col">Cell Number</th>
                                       <th scope="col">Timer</th>
                                       <th scope="col">Amount</th>
                                       <th scope="col">Status</th>
                                   </tr>
                               </thead>
                             ';
                               if(@$_POST['submit']=="Confirm"){

                                @$donn_id = (int)$_POST['d_iddd'];
                                @$claimm_id = (int)$_POST['c_iddd'];
                                @$allo_id = (int)$_POST['a_iddd'];
                                @$intAmount=(int)$_POST['amount']; 
                                @$cellDonerr=$_POST['p_number'];
                                @$don_remain=$_POST['d_remaining_don'];
                                @$clain_remain=$_POST['c_remaining_claim'];
                               
                                   
                                $newDateTen=Date('Y-m-d', strtotime("+10 days")) ." ". date('H:i:s');
                                $curtime = $countD = date('Y-m-d H:i:s');


                                $sqlClaimmInComplete = "update claims set states = 0 where id=".$claimm_id.";";
                                $sqlDonnInComplete = "update donation set status = 0 where id=".$donn_id.";";
                                $sqlClaimm = "update claims set states = 4,donDate = '------' where id=".$claimm_id.";";
                                $sqlDonn = "update donation set status = 4,donDate = '------' where id=".$donn_id.";";
                                $sqlAlloc = "update allocation set status = 1 where id=".$allo_id.";";
                                $sqlUsers = "update users set status = 1 where p_number='".$cellDonerr."';";

                               $sqlGetDon = "Select * from donation where id=".$donn_id.";";
                               $resultsDon = $conn->query($sqlGetDon);
                               $sqlGetClaim = "Select * from claims where id=".$claimm_id.";";
                               $resultsClaim = $conn->query($sqlGetClaim);

                               $donDetails = $resultsDon->fetch_assoc();
                               $claimDetails = $resultsClaim->fetch_assoc();
                                @$newAmount = @$intAmount*1.5;
                               
                               @$cellClaimerr=$claimDetails['cellClaim'];
                                $sqlClaimInsert="insert into claims values('',\"$cellDonerr\",\"$newAmount\",\"$curtime\",\"$newDateTen\",\"10\",\"$newAmount\")";
                                
                                
                                @$sqlCommission="insert into commission values('',\"$cellClaimerr\",\"$cellDonerr\",0); ";
                        /*-------------------------SMS------------------*/
                            $sqlDoon = "select * from users where p_number = '".$cellDonerr."';";
                            $donResults = mysqli_query($conn,$sqlDoon);
                            $getDonDetails = mysqli_fetch_assoc($donResults);
                        /*-------------------------SMS ends------------------*/

                        /*-------------------------SMS------------------*/
                            $sqlClaim = "select * from users where p_number = '".$cellClaimerr."';";
                            $claimResults = mysqli_query($conn,$sqlClaim);
                            $getClaimDetails = mysqli_fetch_assoc($claimResults);



                               $remaing_don_amount = (int)$donDetails['remaining_don']; 
                               $remaining_claim_amount = (int)$claimDetails['remaining_claim'];

                               
                                /*-------------referals-------------

                                $sqlGetReferal = "select * from users u,referals r where redered = '".$_SESSION['u_username']."' AND refere = u.p_number AND r.status = 0;";
                                $sqlGetDetals = $conn->query($sqlGetReferal);
                                $getDetails = $sqlGetDetals->fetch_assoc();
                                $referallNo =   $getDetails['ref_code'];
                                $comm_amount = (int)$getDetails['commission_amount'];
                                @$comInterest = @$intAmount*0.1;
                                $newCommAmt = $comInterest + $$comm_amount;

                                $sqlAddCom = "update users set commission_amount='".$newCommAmt."' where redered = '".$_SESSION['u_username']."' AND refere = '".."'"


                                /*-------------referals ends-------------*/
                              
                                if(($remaing_don_amount == 0) && ($remaining_claim_amount > 0)){
                                    $conn->query($sqlClaimInsert);
                                    $conn->query($sqlUsers);
                                    unset($_SESSION['pending']);
                                      $conn->query($sqlAlloc);

                                      if($conn->query($sqlDonn)){
                                        /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getDonDetails['fname']." ".$getDonDetails['lname']."\n\nYour donation has been confirmed.\n\nKindly wait for a period of 10 days then you will be able to claim your initial amount. You are now an Active Member. You may start refering people using your phone number as the *Referal Number* and get your commission.\n\nNB: You can claim your commission once it is +R500.\n\nThank you for your co-operation. Hope will hear from you soon. Enjoy the rest of our day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $getDonDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/
                                      }

                                      if($conn->query($sqlClaimmInComplete)){
                                        /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getClaimDetails['fname']." ".$getClaimDetails['lname']."\n\nAs you have confirmed the Transaction and you still waiting for your remaining balance. Kindly wait as we will allocate you and you will receive the remaining balance from other members.\n\nThank you for your co-operation. Hope to hear from you soon. Enjoy the rest of your day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $getClaimDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/
                                      }
                                      
                                }else if(($remaing_don_amount > 0) &&  ($remaining_claim_amount == 0)){
                                    
                                    if($conn->query($sqlDonnInComplete)){
                                         /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getDonDetails['fname']." ".$getDonDetails['lname']."\n\nAs you have sent the required amount and you still have a remaining balance.\n\nKindly wait as we will allocate you and you will pay the remaining amount to another Receiver.\n\nThank you for your co-operation. Hope to hear from you soon. Enjoy the rest of your day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $$getDonDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/

                                    }

                                    if($conn->query($sqlClaimm)){
                                              /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getClaimDetails['fname']." ".$getClaimDetails['lname']."\n\nAs you have confirmed the payment of the Transaction complete.\n\nYou may now start donating again.\n\nNB: You can claim your commission once it is +R500.\n\n Thank you for your co-operation. Hope will hear from you soon. Enjoy the rest of our day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $getClaimDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/
                                        }

                                     unset($_SESSION['pending']);
                                   
                                     $conn->query($sqlAlloc);
                                }else{
                                    
                                     if($conn->query($sqlClaimm)){
                                        /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getClaimDetails['fname']." ".$getClaimDetails['lname']."\n\nAs you have confirmed the payment.\n\nYou may now start donating again.\n\nNB: You can claim your commission once it is +R500.\n\n Thank you for your co-operation. Hope will hear from you soon. Enjoy the rest of our day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $getClaimDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/
                                      }
                                     $conn->query($sqlAlloc);
                                     if($conn->query($sqlDonn)){
                                        /*-------------------------SMS ends------------------*/
                                                $url = "https://www.winsms.co.za/api/batchmessage.asp?";
                          
                                                $userp = "user=";
                                            
                                                $passwordp = "&password=";
                                            
                                                $messagep = "&message=";
                                            
                                                $numbersp = "&Numbers=";
                                            
                                                $username = "cyalongo@gmail.com";
                                                $password = "Asekhona*911121";
                                                $message = "Hi,".$getDonDetails['fname']." ".$getDonDetails['lname']."\n\nYour donation has been confirmed.Kindly wait for a period of 10 days then you will be about to claim your amount with interest. You are now an Active Member. You may start refering people using your phone number as the *Referal Number* and get your commission their first donation.\n\nNB: You can claim your commission once it is +R500.\n\n Thank you for your co-operation. Hope will hear from you soon. Enjoy the rest of our day!!!\n-----------------------------\nFrom Commercial Club.";
                                                $numbers = $getDonDetails['p_number'];
                                            
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
                                                 /*-------------------------SMS ends------------------*/
                                      }
                                     unset($_SESSION['pending']);
                                   
                                }
                                echo "<script>window.location.href = 'dashboard.php';</script>";
                              }

                       while($row = $resultReciever->fetch_assoc()){
                           echo '
                                   <tbody>
                                     <form action="" method="POST">
                                     <input type="hidden" name="d_iddd" value="'.$row['d_iddd'].'" />
                                     <input type="hidden" name="c_iddd" value="'.$row['c_iddd'].'" />
                                     <input type="hidden" name="a_iddd" value="'.$row['a_iddd'].'" />
                                     <input type="hidden" name="c_remaining_claim" value="'.$row['remaining_claim'].'" />
                                     <input type="hidden" name="d_remaining_don" value="'.$row['remaining_don'].'" />
                                     <input type="hidden" name="amount_claim" value="'.$row['amount_claim'].'" />
                                       <tr>
                                       <td scope="row">'.$row['fname'].' '.$row['lname'].'</td>
                                       <td><input type="hidden" name="p_number" value="'.$row['p_number'].'" />'.$row['p_number'].'</td>
                                       <td>48 hours</td>
                                       <td>';
                                       if($row['amount_claim'] < $row['amount']){
                                        echo '<input type="hidden" name="" value="'.$row['amount_claim'].'" />'.$row['amount_claim'];
                                       }else if($row['amount_claim'] > $row['amount']){
                                        echo '<input type="hidden" name="amount" value="'.$row['amount'].'" />'.$row['amount'];
                                       }else{
                                        echo '<input type="hidden" name="amount" value="'.$row['amount'].'" />'.$row['amount'];
                                       }

                                       echo'</td>
                                       <td>';
                                       
                                       switch($row['claimStatus']){
                                           case 2:
                                               echo 'Waiting for confirmation from sender...';
                                               break;
                                           case 3:
                                                echo '<input type="submit" name="submit" class="btn button-sm-gold" value="Confirm" />';
                                               break;
                                           case 4:
                                               echo '<span style="color:green;font-weight:bolder;">Process Completed</span>';
                                               break;
                                       }
                                       echo '
                                       
                                       </td>
                                       </tr>
                                       </form>
                                   </tbody>
                               ';
                       }
                       echo'
                                </table>
                         </p>
                          ';
                      
                   }else{
                    echo ' <div class="welcomeTitle">
                            <h6><span style="color:rgb(218,165,32);font-size:15pt;">Transactions <span style="position:absolute;right:30px;">(for Claims)</span></span></h6>
                            </div>
                            <p class="welcomeContent">
                                <table class="table table-hover table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name & Surname</th>
                                            <th scope="col">Cell Number</th>
                                            <th scope="col">Timer</th>
                                            <th scope="col">Amount</th>
                                            <th scope="col">Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td scope="row" colspan="5"> <center>Your have no allocated Claims  at the moment.</center></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </p>
                        ';
                   } 
                        ?>
                       
                        
        </div>
    </div>
</div>
<div class="row">
<div class="col-md-6">
        <div class="welcomeTitle">
            <h6>List of Referals</h6>
        </div>
        <form>
            <p class="welcomeContent">
                <table class="table table-hover table-dark">
                    <thead>
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Surname</th>
                        <th scope="col">Cell Number</th>
                        <th scope="col">Status</th>
                        <th scope="col">Commsion amount</th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php

                        $sql = "select * from referals r, users u,donation d where r.refere = '".$_SESSION['u_username']."' 
                                                                               AND r.redered = u.p_number 
                                                                               AND r.redered = d.cellDonator LIMIT 3;";
                        $result = $conn->query($sql);
                        @$numRef = $result->num_rows;
                        @$totCom = 0; 
                        if($result->num_rows > 0){
                            $count = 0;
                            while($row = $result ->fetch_assoc()){
                                $count++;
                                echo '

                                <tr>
                                <td scope="row">'.$count.'</td>
                                <td>'.$row['fname'].'</td>
                                <td>'.$row['lname'].'</td>
                                <td>'.$row['p_number'].'</td>
                                <td>'; if($row['status'] == 0 ){ echo "Innactive"; @$com = 0;}else{ echo "Active"; @$amount = (int)$row['amount']; $com = @$amount * 0.1;  } echo ' </td>
                                <td>'.@$com.'</td>
                                </tr>
                                
                                ';
                                @$totCom = $totCom + $com;
                            }
                        }
                        else{
                            echo '
                            <tr>
                                 <td scope="row" colspan="6"><center>You have no referals at the moment. Invite people with your number as a referal number to get your comission</center></td>
                            </tr>
                            ';
                        }
                    ?>
                        
                    </tbody>
                </table>
            </p>
        </form>
    </div>
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                    <h6>Referal Commission</h6>
                </div>
                <div>
                 <?php ?>
                    <form class="form-control" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                       <?php 
                        if(!(@$numRef > 0)){
                            echo '
                                    <p style="padding:5px;margin:5px;">
                                    <center> Total referral amount due to you is not available in the moment until you have referals and they are active users!</center>
                                    </p>
                                 ';
                        }else{

                            if(@$totCom < 500){
                                echo '
                                        <p style="padding:5px;margin:5px;">
                                        <center>Total referral amount due to you is <b>R '.@$totCom.'</center> 
                                        </b>

                                        <hr/>
                                        <center>You will be able to claim this amount once it is <span style="color:green;font-weight:bolder;">R 500</span></center>
                                        </p>
                                     ';
                            }else{
                                echo '
                                        <p style="padding:5px;margin:5px;">
                                                Total referral amount due to you is R '.@$totCom.' <input type="button" class="btn button-sm-gold" value="Claim">
                                        </p>
                                     ';
                            }
                           
                        }
                        
                       ?>
                        
                    </form>
                </div>     
        </div>
    </div>
</div>
<!--Start of Tawk.to Script-->
<script type="text/javascript">
var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
(function(){
var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
s1.async=true;
s1.src='https://embed.tawk.to/5a9d7d434b401e45400d6b7e/default';
s1.charset='UTF-8';
s1.setAttribute('crossorigin','*');
s0.parentNode.insertBefore(s1,s0);
})();
</script>
<!--End of Tawk.to Script-->
