<div class="row">
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                    <h6>Make Donation</h6>
                </div>
                <div>
                    <?php
                        @$dAmount = "XXX";
                        if($_SERVER["REQUEST_METHOD"]=="POST")
                        {
                            
                            if(isset($_POST["submit"]))
                            {   @$errDonation = "";

                                @$dAmount = @$_POST["donateAmount"];
                                    @$date1= date("Y-m-d");
                                    @$date2=date("Y-m-d", time() + 24 * 60 * 60);
                                    @$diff= @$date1 - @$date2;
                                    @$newDates = $diff;

                                    $str1 = @$dAmount;
                                    $lengthh = strlen($str1); 
                                    echo "<br>";
                                    $lastDigit = substr($str1, $lengthh-1,$lengthh);
                                    $newNumber = substr($str1, 0,$lengthh-1);

                                    $int = (int)@$dAmount;
                                    $lastDigitInt = (int)$lastDigit;

                                    $ready = true;

                                    if($int > 10000 || $int < 500){
                                        @$errDonation = "The required donation is between R500 - R10000";
                                        $ready = false;
                                    }else
                                    if($lastDigitInt > 0){
                                        @$errDonation = "Kindly round off the amount to the nearest 10s e.g (R". @$newNumber."0)";
                                        $ready = false;
                                    }
                                    
                                    if($ready)
                                    {
                                        @$_SESSION['don'] = @$_POST["donateAmount"];
                                    }        

                            }
                        }

                           // "insert into donation values('','".$_SESSION['u_username']."','".$dAmount."','".$cDate."',	xDate	status)";
                               
                    ?>
                    <form class="form-control" method="post" action="<?php echo $_SERVER["PHP_SELF"]?>">
                       
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
                        </p>';}
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
                    
                    
                    
                    ?>
                        <tr>
                        <th scope="row">1</th>
                        <td>R1500</td>
                        <td>23mins</td>
                        <td>Pending</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td>R1000</td>
                        <td>1mins</td>
                        <td><input type="button" class="btn button-sm-gold" value="Claim"></td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
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
                            <th scope="col">#</th>
                            <th scope="col">Expected Amount</th>
                            <th scope="col">Timer</th>
                            <th scope="col">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                            <th scope="row">1</th>
                            <td>Mark</td>
                            <td>Otto</td>
                            <td>@mdo</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td>Jacob</td>
                            <td>Thornton</td>
                            <td>@fat</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td colspan="2">Larry the Bird</td>
                            <td>@twitter</td>
                            </tr>
                        </tbody>
                    </table>
                </p>
        </div>
    </div>
</div>