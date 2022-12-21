<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <?php include 'links/links.php' ?>
    <?php include 'connection.php' ?>
</head>

    <?php
    if(isset($_POST['submit'])){
        $username = mysqli_real_escape_string($con,$_POST['s_name']);
        $email = mysqli_real_escape_string($con,$_POST['s_email']);
        $phone = mysqli_real_escape_string($con,$_POST['s_phone']);
        $password = mysqli_real_escape_string($con,$_POST['s_password']);
        $cpassword = mysqli_real_escape_string($con,$_POST['s_cpassword']);
        
        
        $pass = password_hash($password , PASSWORD_BCRYPT);
        $cpass = password_hash($cpassword , PASSWORD_BCRYPT);

       


        $emailquery = "select * from s_registration where s_email = '$email' ";
        $query = mysqli_query($con , $emailquery);

        $emailcount = mysqli_num_rows($query);
        
      

        if($emailcount>0){
            ?>
                     <script>
                        alert("Email Already Exist");
                     </script>
                    <?php
        }
        else{
            
            if($password === $cpassword){
                $insertquery = "insert into s_registration (s_name,s_email,s_phone,s_password,s_cpassword) values ('$username','$email','$phone','$pass','$cpass')";
                $iquery = mysqli_query($con,$insertquery);

                if($iquery){
                    ?>
                     <script>
                        alert("Data Inserted Successfully");
                     </script>
                    <?php
                }else{
                    ?>
                    <script>
                       alert("Data Not Inserted ");
                    </script>
                   <?php
                }

            }else{
                    ?>
                    <script>
                       alert("Passwords Not Matched ");
                    </script>
                   <?php
                }
        
    }
    
   
}
    ?>
<body>
    <div class="bg-img">
        <div class="content">
            <header>Sign Up Form</header>
            <form name="data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
           

                <div class="field">
                    <span class="fa-solid fa-user"></span>
                    <input type="text" required placeholder="Name" name="s_name">
                </div>

                <div class="field space">
                    <span class="fa-solid fa-envelope"></span>
                    <input type="email" required name="s_email" placeholder="Email Address" >
                </div>

                <div class="field space">
                    <span class="fa fa-phone"></span>
                    <input type="text" required placeholder="Phone Number" name="s_phone">
                </div>

                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="password" required placeholder="Password" name="s_password">
                </div>

                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="password" required placeholder="Repeat Password" name="s_cpassword">
                </div>

                <div class="pass">
                    <a href="#">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit"  name="submit">
                    <!-- <button type="submit" name="submit" class="btn btn-primary btn-block">Create Account</button> -->
                </div>


                <!-- <div class="login">Or login with</div>
                <div class="link">
                    <div class="facebook">
                        <i class="fab fa-facebook-f"><span>Facebook</span></i>
                    </div>
                    <div class="instagram">
                        <i class="fab fa-instagram"><span>Instagram</span></i>
                    </div>
                </div> -->
                <div class="signup">Have an account?
                    <a href="login.php">Login Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>