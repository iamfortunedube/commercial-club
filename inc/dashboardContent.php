<div class="row">
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                    <h6>Make Donation</h6>
                </div>
                <div>  
                
                
                <?php include("server/donateScript.php");?>
                    <form class="form-control" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                       <center>
                    <?php if(!isset($_SESSION['don'])){ echo '
                        <p>Make your donation here:</p>
                        <div class="row">
                            <div class="col-md-9">
                                <input class="form-control" maxlength="5" id="donate" type="text" name="donateAmount" placeholder="Enter amount to donate" value="'.@$str1.'"/>
                            </div>
                            <div class="col-md-3">
                                <input type="submit" name="submit" class="btn button-gold" value="Donate">
                            </div>
                            <p style="padding:5px;margin:5px;color:red">'.@$errDonation.'</p>
                        </div>';}
                        else{
                            echo'
                        <p style="padding:5px;margin:5px;">
                          Your order will be allocated within 24 hours - <b>R  '.@$_SESSION['don'].'<br><center> '.@$newDates.'</b><center>
                          <div id="countdown"></div>

                          <p id="note"></p>
                          </p>';}
                        ?>
                        </center>
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
                        <tr>
                        <td scope="row">1</td>
                        <td>R1500</td>
                        <td>23mins</td>
                        <td>Pending</td>
                        </tr>
                        <tr>
                        <td scope="row">2</td>
                        <td>R1000</td>
                        <td>1mins</td>
                        <td><input type="button" class="btn button-sm-gold" value="Send"></td>
                        </tr>
                        <tr>
                        <td scope="row">3</td>
                        <td>R10 000</td>
                        <td>10mins</td>
                        <td><input type="button" class="btn button-sm-gold" value="Claim"></td>
                        </tr>
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
                <div class="welcomeTitle">
                    <h6><span style="color:rgb(218,165,32);font-size:15pt;">Transactions</span></h6>
                </div>
                <p class="welcomeContent">
                    <table class="table table-hover table-dark">
                        <thead>
                            <tr>
                                <th scope="col">Account Holder</th>
                                <th scope="col">Bank & Branch Code</th>
                                <th scope="col">Account Number</th>
                                <th scope="col">Amount</th>
                                <th scope="col">CellNo</th>
                                <th scope="col">Timer</th>
                                <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <td scope="row">Jacob</td>
                            <td>FNB 456879</td>
                            <td>65161645</td>
                            <td>R10 000</td>
                            <td>0123456789</td>
                            <td>24 hours</td>
                            <td><input type="button" class="btn button-sm-gold" value="Claim"></td>
                            </tr>
                            <tr>
                            <td scope="row">Cyrill</td>
                            <td>CAPITEC BANK 470010</td>
                            <td>1896189</td>
                            <td>R5000</td>
                            <td>0896849841</td>
                            <td>10 hours</td>
                            <td><input type="button" class="btn button-sm-gold" value="Claim"></td>
                            </tr>
                            <tr>
                            <td scope="row">Bheki</td>
                            <td>ABSA 465874</td>
                            <td>1468164891</td>
                            <td>R500</td>
                            <td>071546115</td>
                            <td>5 hours</td>
                            <td>Pending</td>
                            </tr>
                        </tbody>
                    </table>
                </p>
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
                                 <td scope="row" colspan="5">You have no referals at the moment. Invite people with your number as a referal number to get your comission</td>
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
                                         Total referral amount due to you is not available in the moment until you have referals and they are active users!
                                    </p>
                                 ';
                        }else{

                            if(@$totCom < 500){
                                echo '
                                        <p style="padding:5px;margin:5px;">
                                                Total referral amount due to you is <b>R '.@$totCom.' 
                                        </b>

                                        <hr/>
                                        You will be able to claim this amount once it is <span style="color:green;font-weight:bolder;">R 500</span>
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