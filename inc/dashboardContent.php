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
                            </p>
                            <div id="countdown"></div>

                            <p id="note"></p>
                            
                            ';}
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
                        <td><input type="button" class="btn button-sm-gold" value="Claim"></td>
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
                            <td><input type="button" class="btn button-sm-gold" value="Send"></td>
                            </tr>
                            <tr>
                            <td scope="row">Cyrill</td>
                            <td>CAPITEC BANK 470010</td>
                            <td>1896189</td>
                            <td>R5000</td>
                            <td>0896849841</td>
                            <td>10 hours</td>
                            <td><input type="button" class="btn button-sm-gold" value="Confirm"></td>
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
                        <th scope="col">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                        <td scope="row">1</td>
                        <td>Lionel</td>
                        <td>Messi</td>
                        <td>Inactive</td>
                        </tr>
                        <tr>
                        <td scope="row">2</td>
                        <td>Paul</td>
                        <td>Pogba</td>
                        <td>Active</td>
                        </tr>
                        <tr>
                        <td scope="row">3</td>
                        <td>Eden</td>
                        <td>Hazard</td>
                        <td>Active</td>
                        </tr>
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
                        <p style="padding:5px;margin:5px;">
                             Total referral amount due to you is R XXX <input type="button" class="btn button-sm-gold" value="Claim">
                        </p>
                    </form>
                </div>
                
        </div>
    </div>

</div>