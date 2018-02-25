<div class="row">   
    <div class="col-md-6">
	
	
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                        <h6>Registration</h6>
                </div>
                <form id="reg" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="row">
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="fname" placeholder="Name"/>
							<?php echo @$errMessage;?>

                        </div>
                        <div class="col-md-6">
                            <input class="form-control" type="text" name="sname" placeholder="Surame"/>
						<?php echo @$errMessage;?>
                        </div>  
                    </div>
                    <input class="form-control" type="text" name="cellNumber" placeholder="Phone Number"/>
					<?php echo @$errMessage;?>
                    <input class="form-control" type="text" name="cellNumber2" placeholder="Confirm Phone Number"/>
					<?php echo @$errMessage;?>
                    <input class="form-control" type="password" name="password" placeholder="Password"/>
                     <?php echo @$errMessage;?>
                    <input class="form-control" type="password" name="password2" placeholder="Confirm Password"/>
					<?php echo @$errMessage;?>
<<<<<<< HEAD
                    <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Register" id="hideReg"/>

=======
                    <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Register"/>
					<?php echo @$errMessage;?>
>>>>>>> 86cac67f50a8dd9d8e88f94eceb30fc3111a3474
                </form>

							
        </div>
    </div>
	<?php include("server/register.php");?> 

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
