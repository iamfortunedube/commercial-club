             
              <div class="welcomeWrapper">
                    <div class="welcomeTitle" id="headerWelcome">
                            <h6>Weclome to <span class="">Commercial<span style="color:rgb(218,165,32);font-size:15pt;"> Club</span></span></h6>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                                <p class="welcomeContent">
                                Welcome to the Commercial Club (CC) an online peer to peer community club. CC is a community platform designed to dispense wealth equally among all members. Commercial Clubs offers 50% after 10 Days to its members each time they are assisting or exchanging donations to others.

                                <b>“Justice cannot be for one side alone BUT must be for both”</b>, CC encourages its members to work together and meet each other halfway by inviting new members to the community and be rewarded with 10% in return.  It’s amazing what we can accomplish when are in it together. 
                                </p>
                                <p>
                                <strong>NB: Commercial Club request to be managers or representatives must be submitted to team support</strong>
                                </p>
                        </div>
                    </div>
                     
                </div>
                <!-- first row ends-->

                <!-- second row starts-->
                <div class="row">   
                    <div class="col-md-6">
                        <div class="welcomeWrapper">
                                <div class="welcomeTitle border-shape">
                                        <h6>Registration Process </h6>
                                </div>
                                <p class="welcomeContent">
                                    <ul class="list">
                                    <li>Click on "Register".</li>
                                    <li>Fill in all required fields on the registration form.</li>
                                        <li> Verify Cell Number using varification code.</li>
                                        <li>Fill in your banking details.</li>
                                        <li>Your login details will be sent by sms.</li>
                                        <li>Login using member username and password.</li>
                                    
                                    </ul>
                                </p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="welcomeWrapper">
                                <div class="welcomeTitle border-shape">
                                        <h6>Forgot Password?</h6>
                                </div>
                                <p class="welcomeContent">
                                    <ol class="list">
                                    <li>Click on Login.</li>
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

                <!--thrid row starts-->
                <div class="row">
                    <div class="col-md-12">
                            <div class="welcomeWrapper">
                                    <div class="welcomeTitle">
                                            <h6><span style="color:rgb(218,165,32);font-size:15pt;">Table of interest</span></h6>
                                    </div>
                                    <p class="welcomeContent">
                                            <table class="table table-hover table-dark">
                                                    <thead>
                                                      <tr>
                                                        <th scope="col">PERIOD</th>
                                                        <th scope="col">R 500</th>
                                                        <th scope="col">R 1,000</th>
                                                        <th scope="col">R 3,000</th>
                                                        <th scope="col">R 5,000</th>
                                                        <th scope="col">R 8,000</th>
                                                        <th scope="col">R 10,000</th>
                                                      </tr>
                                                    </thead>
                                                    <tbody>
                                                      <tr>
                                                        <th scope="row">10 DAYS</th>
                                                        <td>R 750</td>
                                                        <td>R 1,500</td>
                                                        <td>R 4,500</td>
                                                        <td>R7,500</td>
                                                        <td>R 12,000</td>
                                                        <td>R 15,000</td>
                                                        					
                                                      </tr>
                                                      <tr>
                                                        <th scope="row">20 DAYS</th>
                                                        <td>R 1,125</td>
                                                        <td>R 2,250</td>
                                                        <td>R 6,750</td>
                                                        <td>R 11,250</td>
                                                        <td>R 18,000</td>
                                                        <td>R 22,500</td>						
                                                      </tr>

                                                       <tr>
                                                        <th scope="row">30 DAYS</th>
                                                        <td>R 1,688</td>
                                                        <td>R 3,375</td>
                                                        <td>R 10,125</td>
                                                        <td>R 16,875</td>
                                                        <td>R 27,000</td>
                                                        <td>R 33,750</td>						
                                                      </tr>
                                                      						
                                                      <tr>
                                                        <th scope="row">40 DAYS</th>
                                                        <td>R 2,531</td>
                                                        <td>R 5,063</td>
                                                        <td>R 15,188</td>
                                                        <td>R 25,313</td>
                                                        <td>R 40,500</td>
                                                        <td>R 50,625</td>						
                                                      </tr>
                                                      						
                                                        <tr>
                                                        <th scope="row">50 DAYS</th>
                                                        <td>R 3,797</td>
                                                        <td>R 7,594</td>
                                                        <td>R 22,781</td>
                                                        <td>R 37,969</td>
                                                        <td>R 60,750</td>
                                                        <td>R 75,938</td>						
                                                      </tr>
                                                      						
                                                        <tr>
                                                        <th scope="row">60 DAYS</th>
                                                        <td>R 5,695</td>
                                                        <td>R 11,391</td>
                                                        <td>R 34,172</td>
                                                        <td>R 56,953</td>
                                                        <td>R 91,125</td>
                                                        <td>R 113,906</td>						
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                    </p>
                            </div>
                    </div>
                </div>
                <!--third row ends-->
            </div>
        </div>
         <!--Delete in-active users--> 
        <?php
        include("server/conn.php");

        $sql="select id, regDate from users";
        $results= $conn->query($sql);
        // print_r($results);
        $details= $results->fetch_assoc();
        $currDate  = date('Y-m-d H:i:s');
        // $currDate = $currDate*60*60*1000;
    
        ?>    