<?php
session_start();

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="./css/style.css">
    <?php include 'links/links.php' ?>
    <?php include 'connection.php' ?> 
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<div class="bg-img">
        <div class="content">
            <header>Login Here</header>
            <form name="data" action="<?php echo htmlentities($_SERVER['PHP_SELF']); ?>" method="post">
           

             

                <div class="field space">
                    <span class="fa-solid fa-envelope"></span>
                    <input type="text" required name="s_email" placeholder="Email Address" value="<?php if(isset($_COOKIE['emailcookie'])) {echo $_COOKIE['emailcookie'] ;}  ?>">
                </div>

               
                <div class="field space">
                    <span class="fa fa-lock"></span>
                    <input type="password" class="password" required placeholder="Password" name="s_password" value="<?php if(isset($_COOKIE['passwordcookie'])) {echo $_COOKIE['passwordcookie'] ;} ?>">
                </div>
                <br>
                <div class="form-group signup ">
                 <input type="checkbox" name="rememberme">  Remember Me
                </div>

                <?php
                 if(isset($_POST['submit'])){
                    $email = $_POST['s_email'];
                    $password = $_POST['s_password'];

                    $email_search = "select * from s_registration where s_email = '$email' ";
                    $email_query = mysqli_query($con, $email_search);

                    $email_count = mysqli_num_rows($email_query);
                    if ($email_count){
                        $email_pass = mysqli_fetch_assoc($email_query);
                        $db_pass = $email_pass['s_password'];

                        // to fetch username with the help of session it will display username
                        // to the other page
                        $_SESSION ['s_name'] = $email_pass['s_name'];

                        $pass_decode = password_verify($password, $db_pass);

                        if($pass_decode){
                            if (isset($_POST['rememberme']))  {

                                setcookie('emailcookie',$email,time()+86400);
                                setcookie('passwordcookie',$password,time()+86400);
                                header('location:insert.php');

                             }else{
                                header('location:insert.php');
                             }  

                        }else{
                            ?>
                                 <script>
                                    alert("Password Incorrect");
                                 </script>
                            <?php
                        
                         
                        }
                    }else{

                        ?>
                        <script>
                           alert("Email Not Registered");
                        </script>
                   <?php
                    }
                 }
                
                
                ?>

                <div class="pass">
                    <a href="recover_email.php">Forgot Password?</a>
                </div>
                <div class="field">
                    <input type="submit"  name="submit" value="Login">

                    

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
                <div class="signup">Don't Have an account?
                    <a href="registration.php">SignUp Now</a>
                </div>
            </form>
        </div>
    </div>
</body>
</body>
</html>






<!-- ?> -->
                            <!-- <script>
                                location.replace('insert.php');
                            </script> -->

                            <!-- <?php 