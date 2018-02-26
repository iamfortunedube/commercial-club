<div class="row">
    <div class="col-md-6">
        
        <div class="welcomeWrapper">
                <div class="welcomeTitle">
                    <h6>Profile</h6>
                </div>
                <form id="reg" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="row">
                        <div class="col-md-6">
                            <label>Firstname</label>
                            <input class="form-control" require type="text" name="fname" placeholder="Name" value="<?php echo @$_SESSION['u_fname'];?>" disabled/>
                        </div>
                        <div class="col-md-6">
                            <label>Lastname</label>
                            <input class="form-control" require type="text" name="sname" placeholder="Surname" value="<?php echo @$_SESSION['u_lname'];?>" disabled/>
                        </div>  
                    </div>
                    <div class="form-group">
                        <input class="form-control" require type="text" name="cellNumber" value="<?php echo @$_SESSION['u_username'];?>" disabled/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" require type="text" name="backName" value="<?php echo @$_SESSION['u_bankName'];?>" disabled/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" require type="text" name="uniCode" value="<?php echo @$_SESSION['u_uniCode'];?>" disabled/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" require type="text" name="accHolder" value="<?php echo @$_SESSION['u_accHolder'];?>" disabled/>
                    </div>
                    <div class="form-group">
                        <input class="form-control" require type="text" name="accNumber" value="<?php echo @$_SESSION['u_accNumber'];?>" disabled/>
					</div>
                    
                </form>				
        </div>
    </div>
</div>