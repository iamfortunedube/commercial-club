<div class="row">   
    <div class="col-md-6">
        <?

             @$firstname = $_SESSION['r_fname']; 
             @$surname = $_SESSION['r_lname']; 
             @$cellNo =  $_SESSION['r_cell']; 
             @$password =  $_SESSION['pswd']; 
             @$refferalNo =  $_SESSION['r_ref']; 
             @$vCode = $_SESSION['r_vCode']; 
             $_SESSION['btn'] = @$_POST['submit'];
             $_SESSION["userVCode"] = @$_POST['vCode'];
             
            
            
            if(@$_SESSION['btn'] == "Confirm" && $_SESSION["userVCode"] == $_SESSION['r_vCode']){
                $show = false;
            }else if($_SESSION["userVCode"] == $_SESSION['r_vCode'] && $_SESSION['btn'] == "Finish"){
                
                $_POST[''];
                $_POST[''];
                $_POST[''];
                $_POST[''];

                $sql="insert into users values('',\"$firstname\",\"$surname\",\"$cellNo\",\"$password\",\"$cellNo\",\"$vCode\",\"$status\",\"$bank_name\",\"$uniCode\",\"$account_holder\",\"$accNum\");"; 
             
            }else{
                $show= true;
             
            }

            echo "entered"
        ?>
	
        <div class="welcomeWrapper">
                

                <?php
                    if($show && isset($_SESSION['r_vCode'])){
                        echo'
                        <div class="welcomeTitle">
                            <h6>Verification</h6>
                        </div>
                        <form id="vCode" class="welcomeContent" method="post" action="">
                            <div class="row">
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="vCode" placeholder="Verification Code"/>
                                    <?php echo @$errMessage;?>
                                </div>
                                <div class="col-md-3">
                                <input style="width:100%;" class="btn button-gold" type="submit" name="submit" value="Confirm" />
        
                                <?php echo @$errMessage;?>
                                </div>  
                            </div>
                        </form>
                        
                        ';
                    } else{
                        echo '
                  
                        <div class="welcomeTitle">
                            <h6>Bank Details</h6>
                        </div>
                            <form id="vCode" class="welcomeContent" method="post" action="">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <select id="select" name="bankName" class="form-control">
                                        '; 
                                            $stmnt = "Select * From bank";
                                            $result = mysqli_query($conn,$stmnt);
                                            if($result){
                                                echo 'works';
                                            }
                                            echo '<option value="">Moto</option>
                                                  <option value="">Car</option>
                                            ';
                                            // $getBankSql = "SELECT * FROM bank";
                                            
                                            // $bankResults = $conn->query($getBankSql);

                                            // $bankResults = mysql_query($conn,$getBankSql);

                                            // while($row = mysql_fetch_array($bankResults))
                                            // { 
                                            // echo "Found";
                                            // }
                                        
                                        echo'
                                        </select>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <input id="branch" class="form-control" require type="text" name="accBranch" placeholder="e.g 147010" value="" />
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Holder</label>
                                        <input class="form-control" require type="text" name="accHolder" placeholder="MR J ZUNGU" value="" />
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input id="accNumber" class="form-control" require type="text" name="accNumber" placeholder="e.g 14706518122" value="" />
                                    </div>
                                  </div>
                                    <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Finish" id="hideVer"/>

                                    <?php echo @$errMessage;?>
                                    
                                </div>
                            </form>
                            ';
                    }
                ?>
				

                
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

