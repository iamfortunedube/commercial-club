<div class="row">   
                    <div class="col-md-6">
                        <div class="welcomeWrapper ">
                                <div class="welcomeTitle border-shape">
                                        <h6>Login</h6>
                                </div>

                                <?php include("server/loginScript.php");?>
                            <form id="login" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                                <input id="username" class="form-control" type="text" maxlength="10" name="cellNumber" placeholder="Phone Number" value="<?php echo @$cellNo;?>" required />
                                 <?php echo "<span style='color:red'>".@$errCellNumber."</span>";?>
                                <input class="form-control" type="password" min="8" maxlength="15" name="password" placeholder="Password" required  />
                                 <?php echo "<span style='color:red'>".@$errPassword."</span>";?>
                                <a href="forgotP.php" style="color: black; font-size:18px;padding:10px;" class="float-right">forgot password?</a>
                                <input style="width:100%;" class="btn button-gold" type="submit" name="submit" value="Login"/>
                                <?php echo "<span style='color:red'>".@$errMessage."</span>";?>
                                 <?php echo "<span style='color:green'>".@$succMessage."</span>";?>
                            </form>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="welcomeWrapper">
                                <div class="welcomeTitle border-shape">
                                        <h6>Password Reset</h6>
                                </div>
                                <p class="welcomeContent">
                                <ol class="list">
                                        <li>Click on "forgot password?" link.</li>
                                        <li>Enter your Phone Number. </li>
                                        <li>Click on "Request" button.</li>
                                        <li>Your old password will be sent to you by sms.</li>
                                        <li>Then Login.</li>
                                        <li>Click on "Profile" and change your password</li>
                                  </ol>   
                                </p>
                        </div>
                    </div>
                </div>
                <!--second row ends-->
