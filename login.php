<?php 
include_once('navbar.php');
include_once('config/config.php');
function test_input($data) {
    $data = trim($data);
   return $data;
   }
   
   $pre = "avgcd";
   $post = "fdrgv";

if(isset($_POST['lemail'], $_POST['lpass']))
{
    $lemail = test_input($_POST['lemail']);
    $lpass = test_input($_POST['lpass']);
    $lpass_salt = $pre.$lpass.$post;
    $lpassword = md5($lpass_salt);
    // echo "Data received ".$lemail.$lpass;

    $match_query = "SELECT * FROM user WHERE email_Id = '$lemail'";
    $match_result = mysqli_query($conn, $match_query);
    if(!$match_result)
    {
        echo  mysqli_error($conn);
    }
    else{
        if(mysqli_num_rows($match_result) > 0)
        {
            $row=mysqli_fetch_assoc($match_result);
                // echo "<br>===========ID MATCHED DETAIL ARE AS FOLLOW=============<br>";
                // echo "email : ".$row["email_Id"]. "<br>";
                // echo "pass : ".$row["Password"]. "<br>";
                $db_pass = $row["Password"];
                $pref = $row["user_type_id"];
                // $lpassword = password_verify($lpass_salt, $db_pass);
                // echo "<br> db pass : ". $db_pass;
                // echo "<br> login pass : ". $lpassword. "<br>";
                if($lpassword == $db_pass)
                {
                    session_start();
                    $_SESSION['id'] = $row['user_Id'];
                    $_SESSION['typeid'] = $row['user_type_id'];
                    $_SESSION['fname'] = $row['first_name'];
                    $_SESSION['lname'] = $row['last_name'] ;
                    $_SESSION['email'] = $row['email_Id'];
                    if($pref == 2)
                    {
                        header("location: http://localhost/Programming_Blog/Admin/Stellar-master/admin.php");
                    }
                    else{
                        header("location: http://localhost/Programming_Blog/index.php");
                    }
                 }
                else{
                    $error1 = 'Incorrect password';
                }
        }
        else{
            $error = 'E-Mail Not Found!';
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">
    <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous">
    <!-- Main css -->
    <link rel="stylesheet" href="login.css">
</head>
<body>
    <div class="main">
        <!-- Sing in  Form -->
        <section class="sign-in">
            <div class="container">
                <div class="signin-content">
                    <div class="signin-image">
                        <figure><img src="signin-image.jpg" alt="sing up image"></figure>
                        <a href="SignUp.php" class="signup-image-link">Create an account</a>
                    </div>
                    <div class="signin-form">
                        <h2 class="form-title">Login</h2>
                        <form method="POST" action="login.php" class="register-form" id="login-form">
                            <div class="form-group">
                                <label for="your_name"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="email" name="lemail" id="your_name" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" placeholder="Your E-Mail" oninvalid="alert('Please fill the Valid E-mail')" required />
                            </div>
                            <?php if (isset($error)): ?>
                            <p class="error"><?php echo $error; ?></p>
                            <?php endif; ?>
                            <div class="form-group">
                                <label for="your_pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password" name="lpass" id="your_pass" placeholder="Password" required/>
                            </div>
                            <?php if (isset($error1)): ?>
                            <p class="error"><?php echo $error1; ?></p>
                            <?php endif; ?>
                            <div class="form-group">
                                <input type="checkbox" name="remember-me" id="remember-me" class="agree-term"/>
                                <label for="remember-me" class="label-agree-term"><span><span></span></span>Remember me</label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signin" id="signin" class="form-submit" value="Log in"/>
                            </div>
                        </form>
                        <div class="social-login">
                            <span class="social-label">Or login with</span>
                            <ul class="socials">
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-facebook"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-twitter"></i></a></li>
                                <li><a href="#"><i class="display-flex-center zmdi zmdi-google"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>