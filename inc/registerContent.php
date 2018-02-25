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
<<<<<<< HEAD
                            <input class="form-control" type="text" name="fname" placeholder="Name" require/>
							<?php echo @$errMessage;?>

                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="sname" placeholder="Surname" require/>
						<?php echo @$errMessage;?>
                        </div>  
                    </div>
                    <input class="form-control" type="text" name="cellNumber" placeholder="Phone Number" require/>
					<?php echo @$errMessage;?>
                    <input class="form-control" type="text" name="cellNumber2" placeholder="Confirm Phone Number" require/>
					<?php echo @$errMessage;?>
                    <input class="form-control" type="password" name="password" placeholder="Password" require/>
                     <?php echo @$errMessage;?>
                    <input class="form-control" type="password" name="password2" placeholder="Confirm Password" require/>
					<?php echo @$errMessage;?>
                    <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Register"/>
					<?php echo @$errMessage;?>
=======
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
>>>>>>> 1700b52c04f4eec6b69592cdbcabdeb7f9bc866e
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

