<div class="row">
    <div class="col-md-6">
        <?php include("server/register.php");?>
        
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                    <h6>Registration</h6>
                </div>
                <form id="reg" class="welcomeContent" method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <div class="row" id="row2">
                        <div class="col-md-6">
                            <input class="form-control" required type="text" name="fname" placeholder="Name" value="<?php echo @$firstname;?>" />
                            <?php echo "<span style='color:red'>".@$errName."</span>";?>

                        </div>
                        <div class="col-md-6">
                            <input class="form-control" required type="text" name="sname" placeholder="Surname" value="<?php echo @$surname;?>"/>
                      
                            <?php echo "<span style='color:red'>".@$errSurname."</span>";?>
                        </div>  
                    </div>
                    <input id="pNumber" size="10" class="form-control" required type="text"  maxlength="10" name="cellNumber" value="<?php echo @$cellNo;?>" placeholder="Phone Number"/>
                    <?php echo "<span style='color:red'>".@$errCellNumber."</span>";?>
                    <input class="form-control" required type="password" name="password" min="8" maxlength="15"  placeholder="Password"/>
                     <?php echo "<span style='color:red'>".@$errPassword."</span>";?>
                    <input id="rNumber" class="form-control" required type="text" name="refferalNo" placeholder="Refferal Number" value="<?php echo @$refferalNo;?>"/>
					<?php echo "<span style='color:red'>".@$errRefferal."</span>";?></br>
                    
                    <span class="form-group">
                        <input class="styled-checkbox" id="styled-checkbox-1" type="checkbox" required value="value1">
                        <label for="styled-checkbox-1">I Agree to Commercial Club Terms & Conditions </label>
                       
                    </span>
            	<?php echo "<span style='color:red'>".@$errAgree."</span>";?></br>
                    <input style="width:100%;" class="btn button-gold" type="submit" name="submit"value="Register"/>
                    <?php echo "<span style='color:red'>".@$errMessage."</span>";?>
                    <?php echo "<span style='color:green'>".@$succMessage."</span>";?>
                </form>				
        </div>
    </div>
	
 

    <div class="col-md-6">
        <div class="welcomeWrapper">
                <div class="welcomeTitle border-shape">
                        <h6>Registration Process</h6>
                </div>
                <p class="welcomeContent">
                    <ol class="list">
<<<<<<< HEAD
                        <li>Fill in all required fields on the registration form.</li>
                        <li> Verify Cell Number using varification code.</li>
                        <li>Fill in your banking details.</li>
                        <li>Your login details will be sent by sms.</li>
                        <li>Login using member username and password.</li>
                     </ol>          
=======
                                        <li>Fill in all required fields on the registration form.</li>
                                        <li> Verify Cell Number using varification code.</li>
                                        <li>Fill in your banking details.</li>
                                        <li>Your login details will be sent by sms.</li>
                                        <li>Login using member username and password.</li>
                                     </ol>
                                <div class="row">   
                                        <div >
                                            <div class="welcomeWrapper">
                                                    <div class="welcomeTitle border-shape">
                                                            <h6>COMMERCIAL CLUB TERMS AND CONDITIONS </h6>
                                                    </div>
                                                    <p class="welcomeContent">
                                                        <ol class="list">
                    
                                                         <li>Donation amount start from minimum of R 500 and Maximum R10 000.</li>
                                                          <li>Do not Provide a Donation if you don’t not have money on hand, failure to make donation your account will be blocked.
                                                          <ul>
                                                          <b><li>NOTE: if your account is not active within 72 hours will be automatically removed from the system</li></b>
                                                          </ul>
                                                          </li> 
                                                             <li>Blocked accounts will be inactive for 10 days due to the following:
                                                             <ul>
                                                             <li>Failure to make payment within allocated time.</li> 
                                                             <li>Failure to confirm payments within given time.</li>
                                                             </ul>
                                                             </li> 
                                                             <li>Each Member may register with one username.</li> 
                                                             <li>Allocation takes place within 48 hrs.</li>
                                                              <li>Please Note queries are to be resolved within 48 hrs such as: 
                    
                                                             <ul>
                                                            <li>Order reallocation. </li> 
                                                              <li>Referrals reassigning.</li> 
                                                             <li>Other queries related to Commercial Club.</li> 
                                                             </ul>
                                                                 </li>
                                                              <li>Referral commission is 10% on direct members. </li> 
                                                              <li>All withdrawal request will be proceed within 48 hrs.</li> 
                                                              <li>Members can top up their account not more than three times. </li> 
                                                              <li>Referral bonus can be withdrawn once user has the minimum of R500. </li>    
                                                        </ol>
                                                    </p>
                                            </div>
                                        </div>
                            </div>
>>>>>>> bf736bab8f3ff36a3386e4212ca480e2017104eb
                </p>
          </div> 
          <div class="welcomeWrapper">
                  <div class="welcomeTitle border-shape">
                          <h6>COMMERCIAL CLUB TERMS AND CONDITIONS </h6>
                  </div>
                  <p class="welcomeContent">
                      <ol class="list">

                       <li>Donation amount start from minimum of R 500 and Maximum R10 000.</li>
                        <li>Do not Provide a Donation if you don’t not have money on hand, failure to make donation your account will be blocked.</li> 
                           <li>Blocked accounts will be inactive for 10 days due to the following:
                           <ul>
                           <li>Failure to make payment within allocated time.</li> 
                           <li>Failure to confirm payments within given time.</li>
                           </ul>
                           </li> 
                           <li>Each Member may register with one username.</li> 
                           <li>Allocation takes place within 48 hrs.</li>
                            <li>Please Note queries are to be resolved within 48 hrs such as: 

                           <ul>
                          <li>Order reallocation. </li> 
                            <li>Referrals reassigning.</li> 
                           <li>Other queries related to Commercial Club.</li> 
                           </ul>
                               </li>
                            <li>Referral commission is 10% on direct members. </li> 
                            <li>All withdrawal request will be proceed within 48 hrs.</li> 
                            <li>Members can top up their account not more than three times. </li> 
                            <li>Referral bonus can be withdrawn once user has the minimum of R500. </li>    
                      </ol>
                  </p>
          </div>                  
    </div>  
</div>
