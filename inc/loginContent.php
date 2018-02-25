<div class="row">   
                    <div class="col-md-6">
                        <div class="welcomeWrapper">
                                <div class="welcomeTitle">
                                        <h6>Login</h6>
                                </div>

                                <?php include("server/loginScript.php");?>
                            <form id="login" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                <input class="form-control" type="text" name="cellNumber" placeholder="Phone Number" value="<?php echo @$cellNo;?>"/>
                                 <?php echo "<span style='color:red'>".@$errCellNumber."</span>";?>
                                <input class="form-control" type="password" name="password" placeholder="Password" />
                                 <?php echo "<span style='color:red'>".@$errPassword."</span>";?>
                                <a href="forgotP.php" style="color: black; font-size:18px;" class="float-right">forgot password?</a>
                                <input style="width:100%;" class="btn button-gold" type="submit" name="submit" value="Login"/>
                                <?php echo "<span style='color:red'>".@$errMessage."</span>";?>
                                 <?php echo "<span style='color:green'>".@$succMessage."</span>";?>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="welcomeWrapper">
                                <div class="welcomeTitle">
                                        <h6>Password Reset</h6>
                                </div>
                                <p class="welcomeContent">
                                    <ul class="list">
                                        <li>Lorem Ipsum is siummy text of the printing</li>
                                        <li>Lorem Ipsuof the printing</li>
                                        <li>Lorem Ipsum is simply dummy te dut of the printing</li>
                                        <li>Lorem Ipsum is printing</li>
                                        <li>Lorem Ipsum is simply dummy the printing</li>
                                        <li>Lorem Ipsum is simply dummy te dut of the printing</li>
                                        <li>Lorem Ipsum is printing</li>
                                        <li>Lorem Ipsum is simply dummy the printing</li>
                                    </ul>  
                                </p>
                        </div>
                    </div>
                </div>
                <!--second row ends-->
