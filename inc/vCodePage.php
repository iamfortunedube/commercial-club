<div class="row">   
    <div class="col-md-6">
            
    <?php include("server/vCodeConform.php");?>
	
        <div class="welcomeWrapper">
                

                <?php
                    if(@$show && isset($_SESSION['r_vCode'])){
                        echo'
                        <div class="welcomeTitle border-shape">
                            <h6>Verification</h6>
                        </div>
                        <form id="vCode" class="welcomeContent" method="post" action="">
                            <div class="row">
                                <div class="col-md-9">
                                    <input class="form-control" type="text" name="vCode" placeholder="Verification Code"/>
                                    <span style="color:red;">'.@$errMessage.'</span>
                                </div>
                                <div class="col-md-3">
                                <input style="width:100%;" class="btn button-gold" type="submit" name="submit" value="Confirm" />
                                </div>  
                            </div>
                        </form>
                        
                        ';
                    } else{
                        echo '
                  
                        <div class="welcomeTitle border-shape">
                            <h6>Bank Details</h6>
                        </div>
                            <form id="vCode" class="welcomeContent" method="post" action="">
                                <div class="row">
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Bank Name</label>
                                        <select id="select" name="bankName" class="form-control" value="'.@$bank_name.'">
                                        <option value="none">--SELECT YOUR BANK--</option>
                                        '; 
                                            $sql = "Select * from bankss;";
                                            $result = $conn->query($sql);
                                            if($result->num_rows > 0){
                                                while($row = $result->fetch_assoc()){
                                                    echo '
                                                        <option value="'.$row["bank_name"].'">'.$row["bank_name"].'</option>
                                                    ';
                                                }
                                            }
                                        echo'
                                        </select>
                                        <span style="color:red;">'.@$errbankName.'</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Branch</label>
                                        <input id="branch" class="form-control" require type="text" name="accBranch" placeholder="e.g 147010" value="'.@$bank_branch.'" />
                                        <span style="color:red;">'.@$errBranch.'</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Holder</label>
                                        <input class="form-control" require type="text" name="accHolder" placeholder="MR J ZUNGU" value="'.@$account_holder.'" />
                                        <span style="color:red;">'.@$errAccHolder.'</span>
                                    </div>
                                  </div>
                                  <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Account Number</label>
                                        <input id="accNumber" class="form-control" require type="text" name="accNumber" placeholder="e.g 14706518122" value="'.@$accNum.'" />
                                        <span style="color:red;">'.@$errAccNumber.'</span>
                                    </div>
                                  </div>
                                    <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Finish" id="hideVer"/>

                                    <span style="color:red;">'.@$errMessageBankDetails.'</span>
                                    
                                </div>
                            </form>
                            ';
                    }
                ?>
    </div>
							
        </div>

    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                        <h6>Varification code</h6>
                </div>
                <p class="welcomeContent">
                    <ul class="list">
                        <li>Enter a varification code that is sent to you by SMS with 6 numbers and proceed with your registration process</li>
                    </ul>  
                </p>
        </div>
    </div>
</div>

