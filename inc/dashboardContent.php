<div class="row">
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                    <h6>Make Donation</h6>
                </div>
                <div>  
                
                
                <?php include("server/donateScript.php");?>
                    <form class="form-control" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                       
                    <?php if(!isset($_SESSION['don']) && @$_SESSION['found'] == false){ 
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
                            <center>Your order will be allocated within 48 hours - <b>R  '.@$_SESSION['don'].'<br> '.@$newDates.'</b></center>
                            <div id="countdown"></div>

                            <p id="note"></p>
                            </p> ';}
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
                                                                echo "Time left : ".date("h:m:s",$timeCheck);
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
                    
                    $sqlDonator = "select 
                    account_holder,bank_name,bank_branch,account_number,c.amount,p_number,c.states AS 'donStatus' 
                    from allocation a,users u,claims c 
                    where a.cellReciever = c.cellClaim
                         AND   a.cellDonator = '".$_SESSION['u_username']."'
                             AND   a.cellReciever = u.p_number;";
                    
                    $resultDonator = $conn->query($sqlDonator);
                    if($resultDonator){

                    }
                    else{
                        echo '<p class="welcomeContent">We are currently having some technical issues. Please contact us to continue with you request. Thank you for understaing!</p>';
                    }
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
                        while($row = $resultDonator->fetch_assoc()){
                            echo '
                                    <tbody>
                                     <form action="" method="">
                                        <tr>
                                        <td scope="row">'.$row['account_holder'].'</td>
                                        <td>'.$row['bank_name'].' ('.$row['bank_branch'].')</td>
                                        <td>'.$row['account_number'].'</td>
                                        <td>'.$row['amount'].'</td>
                                        <td>'.$row['p_number'].'</td>
                                        <td>24 hours</td>
                                        <td>';
                                        
                                        switch($row['donStatus']){
                                            case 1:
                                            echo '<input type="button" class="btn button-sm-gold" value="Send" />';
                                                break;
                                            case 2:
                                                echo 'Waiting for confirmation from Reciever...';
                                                break;
                                            case 4:
                                                echo '<span style="color:green;font-weight:bolder;">Process Completed</span>';
                                                break;
                                            default:
                                                echo "Pending...";
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
     
                    $sqlReciever = "select fname,lname,p_number,c.amount,c.states AS 'claimStatus' from allocation a,users u,claims c where a.cellReciever = '".$_SESSION['u_username']."'
                                                                                                                                     AND   a.cellDonator = c.cellClaim
                                                                                                                                     AND   a.cellDonator = u.p_number ;";
                    
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
                       while($row = $resultDonator->fetch_assoc()){
                           echo '
                                   <tbody>
                                    <form action="" method="">
                                       <tr>
                                       <td scope="row">'.$row['fname'].' '.$row['lname'].'</td>
                                       <td>'.$row['p_number'].'</td>
                                       <td>24 hours</td>
                                       <td>'.$row['amount'].'</td>
                                       <td>';
                                       
                                       switch($row['claimStatus']){
                                           case 1:
                                           echo '<input type="button" class="btn button-sm-gold" value="Send" />';
                                               break;
                                           case 2:
                                               echo 'Waiting for confirmation from Reciever...';
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
                                                                               AND r.redered = d.cellDonator;";
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
                                 <td scope="row" colspan="5"><center>You have no referals at the moment. Invite people with your number as a referal number to get your comission</center></td>
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