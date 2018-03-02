<div class="sidebar-menu">

    <ul>
    <li>
            <div class="userProfile">
                <div class="imageLeft">
                <?php
                if(isset($_SESSION['u_id'])){
                    echo '
                        <a style="padding:0;" href="profile.php"><img src="'.@$_SESSION['u_profile_pic'].'" width="70" height="70" alt="image" /></a>
                    ';
                }else{
                    echo '
                             <img src="assets/avatar.png" width="70" height="70" alt="image" />
                        ';
                }
                    
                
                ?>
              

</p>
                </div>
                <div class="userWelcome">
                    <p class="welcomeM"><?php if(isset($_SESSION['u_id'])){echo "Hi <b>".@$_SESSION['u_fname'];}else{echo "Welcome <b>Guest";}?></b></p>
                    <p class="messageTrans"><?php if(isset($_SESSION['u_id'])){echo "<b>Username </b>  ".@$_SESSION['u_username'];}else{echo "Kindly login to start Transacting";}?></p>
                </div>
            </div>
        </li> 
       <b>
        
        <?php
         if(isset($_SESSION['u_id']))
           { echo '
            <li><a id="dashboard" href="dashboard.php"><i class="fas fa-credit-card"></i> Dashboard</a></li>
            <li><a id="profile-edit" href="profile.php"><i class="fas fa-user"></i> Profile</a></li>
            <li><a id="sign-out" href="server/logOut.php"><i class="fas fa-sign-out-alt"></i> Sign out</a></li>
            ';
         }else{
             echo '
            <li><a id="home" class="active" href="index.php"> <i class="fas fa-home"></i> Home</a></li>
            <li><a id="login" href="login.php"><i class="fas fa-sign-in-alt"></i> Login</a></li>
            <li><a id="register" href="register.php"><i class="fas fa-edit"></i> Register</a></li>
        ';
        }
        ?>
         </b>
        <li style="position:fixed;bottom:0;left:0;"><img src="assets/logoCC.png" width="200" height="200" alt="logo"/></li>
        
    </ul>    
</div>