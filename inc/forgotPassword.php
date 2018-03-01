<div class="row">   
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                        <h6>Reset Password</h6>
                </div>

                <?php include("server/forgotPasswordScript.php");?>
            <form class="welcomeContent" action="" method="post">
                <div class="row">
                    <div class="col-md-9">
                         <input id="forgotPField" class="form-control" type="text" name="cellNumber" placeholder="Phone Number" value="<?php echo @$cellNo;?>"/>
                         <span style="color:red"><?php echo @$errMessage;?></span>
                    </div>
                    <div class="col-md-3">
                        <input style="width:100%;" class="btn button-gold" type="submit" name="submit" value="Request"/>
                    </div>  
                </div>
                <span style="color:green"><?php echo @$successMessage;?></span>
            </form>
        </div>
    </div>
    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
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
