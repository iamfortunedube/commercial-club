<div class="row">   
    <div class="col-md-6">
	
	
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                    <h6>Registration</h6>
                </div>
				<form id="vCode" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="row">
                        <div class="col-md-9">
                            <input class="form-control" type="text" name="vCode" placeholder="Verification Code"/>
							<?php echo @$errMessage;?>
                        </div>
                        <div class="col-md-3">
                          <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Confirm" id="hideVer"/>

						<?php echo @$errMessage;?>
                        </div>  
                    </div>
                   
                    
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
