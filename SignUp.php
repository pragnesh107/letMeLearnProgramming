<?php
include_once('config/config.php');
include_once('navbar.php');
function test_input($data) {
    $data = trim($data);
    return $data;
}
   $pre = "avgcd";
   $post = "fdrgv";
if(isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['pass']))
{    
    $fname = test_input($_POST['fname']);
    $lname = test_input($_POST['lname']);
    $email = test_input($_POST['email']);
    $pass = test_input($_POST['pass']);
    $pass_salt = $pre.$pass.$post;
    // $password = password_hash($pass_salt,PASSWORD_BCRYPT);
    $password = md5($pass_salt);
    // echo "Data received";
    
    $entry_query = "INSERT INTO user(`user_type_id`, `first_name`, `last_name`, `email_Id`, `Password`)
    VALUES(0, '$fname', '$lname', '$email', '$password')";
    $entry_result = mysqli_query($conn, $entry_query);
    if(!$entry_result)
    {
        echo  mysqli_error($conn);
    }
    else{
        $match_query = "SELECT * FROM user WHERE email_Id = '$email'";
        $match_result = mysqli_query($conn, $match_query);
        if(!$match_result)
        {
            echo  mysqli_error($conn);
        }
        else{
            if(mysqli_num_rows($match_result) > 0)
            {
                $row=mysqli_fetch_assoc($match_result);
                // session_start();
                $_SESSION['id'] = $row['user_Id'];
                $_SESSION['typeid'] = $row['user_type_id'];
                $_SESSION['fname'] = $row['first_name'];
                $_SESSION['lname'] = $row['last_name'] ;
                $_SESSION['email'] = $row['email_Id'];
                header("location: http://localhost/Programming_Blog/index.php");
            }
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
        <!-- Sign up form -->
        <section class="signup">
            <div class="container">
                <div class="signup-content">
                    <div class="signup-form">
                        <h2 class="form-title">Sign up</h2>
                        <form method="POST" action="SignUp.php" class="register-form" id="register-form">
                            <div class="form-group">
                                <label for="fname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" pattern="[a-zA-Z]{1,15}" maxlength="15" name="fname" required placeholder="Your First Name" oninvalid="alert('Please fill Valid First Name')"/>
                            </div>
                            <div class="form-group">
                                <label for="lname"><i class="zmdi zmdi-account material-icons-name"></i></label>
                                <input type="text" pattern="[a-zA-Z]{1,15}" maxlength="15" name="lname" required placeholder="Your Last Name" oninvalid="alert('Please fill the Valid Last Name')" />
                            </div>
                            <div class="form-group">
                                <label for="email"><i class="zmdi zmdi-email"></i></label>
                                <input type="email"  pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" required name="email" id="email" placeholder="Your Email" oninvalid="alert('Please fill the valid Email ')" />
                            </div>
                            <div class="form-group">
                                <label for="pass"><i class="zmdi zmdi-lock"></i></label>
                                <input type="password"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 upto 12 characters" maxlength="12" minlength="6" required name="pass" id="pass" placeholder="Password"/>
                            </div>
                            <div class="form-group">
                                <input type="checkbox" required name="agree-term" id="agree-term" class="agree-term" />
                                <label for="agree-term" class="label-agree-term"><span><span></span></span>I agree all statements in  <a href="#" class="term-service">Terms of service</a></label>
                            </div>
                            <div class="form-group form-button">
                                <input type="submit" name="signup" id="signup" class="form-submit" value="Register"/>
                            </div>
                        </form>
                    </div>
                    <div class="signup-image">
                        <figure><img src="signup-image.jpg" alt="sing up image"></figure>
                        <a href="login.php" class="signup-image-link">I am already member</a>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>