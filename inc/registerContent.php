<div class="row">
    <div class="col-md-6">
        <?php include("server/register.php");?>
        
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                    <h6>Registration</h6>
                </div>
                <form id="reg" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" require type="text" name="fname" placeholder="Name" value="<?php echo @$surname;?>" />
                            <?php echo "<span style='color:red'>".@$errName."</span>";?>

                        </div>
                        <div class="col-md-6">
                            <input class="form-control" require type="text" name="sname" placeholder="Surame" value="<?php echo @$firstname;?>"/>
                      
                            <?php echo "<span style='color:red'>".@$errSurname."</span>";?>
                        </div>  
                    </div>
                    <input class="form-control" require type="text" name="cellNumber" value="<?php echo @$cellNo;?>" placeholder="Phone Number"/>
                    <?php echo "<span style='color:red'>".@$errCellNumber."</span>";?>
                    <input class="form-control" require type="text" name="cellNumber2" value="<?php echo @$cellNo2;?>" placeholder="Confirm Phone Number"/>
                    <?php echo "<span style='color:red'>".@$errCnumber."</span>";?>
                    

                    <input class="form-control" require type="password" name="password" value="<?php echo @$password;?>" placeholder="Password"/>
                     <?php echo "<span style='color:red'>".@$errPassword."</span>";?>
                    <input class="form-control" require type="password" name="password2" value="<?php echo @$password2;?>" placeholder="Confirm Password"/>
					<?php echo "<span style='color:red'>".@$errCpassword."</span>";?>
                    <input style="width:100%;" class="btn button-gold" require type="submit" name="submit"value="Register"/>
					<?php echo "<span style='color:red'>".@$errMessage."</span>";?>
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

