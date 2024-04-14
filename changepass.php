<?php include_once('config/config.php'); 
include_once('navbar.php');
function test_input($data) {
  $data = trim($data);
 return $data;
 }
 $pre = "avgcd";
 $post = "fdrgv";
//  echo $email;
// echo $uid;
if(isset($_POST["cpassword"], $_POST["npassword"],$_POST["confirmpassword"]))
{
    $n1pass = $_POST["npassword"];
    $n2pass = $_POST["confirmpassword"];
    $cpass = test_input($_POST["cpassword"]);
    $cpass_salt = $pre.$cpass.$post;
    $cpassword = md5($cpass_salt);
    // echo "Data received ".$cpassword;
    $match_query = "SELECT * FROM user WHERE email_Id = '$email'";
    $match_result = mysqli_query($conn, $match_query);
       if(mysqli_num_rows($match_result) > 0)
        {
            $row=mysqli_fetch_assoc($match_result);
                $db_pass = $row["Password"];
                // echo $db_pass;
                if($cpassword == $db_pass)
                {
                  // echo "password Matched with db";
                  if($n1pass == $n2pass)
                  {
                    $npass_salt = $pre.$n1pass.$post;
                    $npassword = md5($npass_salt);
                    // echo "both are same";
                    $chpass = "UPDATE `user` SET `Password` = '$npassword' WHERE `user_Id` = '$uid'";
                    $chpass_res = mysqli_query($conn, $chpass);
                    if(!$chpass_res)
                    {
                      echo  mysqli_error($conn);  
                    }
                    else{
                      $correct = 1;
                    }
                  }
                  else{
                    $notsame2 = 1;
                  }
                }
                else{
                  $incorrect = 1;
                }
        } 
      else
      {
        echo  mysqli_error($conn);  
      }
}
// echo $match;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="changepass.css">
</head>
<body>
  <?php
  if(isset($correct))
  {
  echo '<div class="alert alert-success m-2" role="alert">
  Password Changed Successfully!
  </div>';
  }
  if(isset($notsame2))
  {
  echo '<div class="alert alert-danger m-2" role="alert">
  Please enter same passwords!
  </div>';
  }
  elseif(isset($incorrect))
  {
    echo '<div class="alert alert-danger m-2" role="alert">
    Incorrect Password!
    </div>'; 
  }
  ?>
    <div class="mainDiv">
        <div class="cardStyle">
          <form action="changepass.php" method="post">
            
            <img src="./images/user.png" id="signupLogo"/>
            
            <h2 class="formTitle">
              Login to your account
            </h2>
            
          <div class="inputDiv">
            <label class="inputLabel" for="cpassword">Current Password</label>
            <input class="inp" type="password" id="cpassword" name="cpassword" required>
          </div>
          <div class="inputDiv">
            <label class="inputLabel" for="password">New Password</label>
            <input class="inp" type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,12}" title="Must contain at least one  number and one uppercase and lowercase letter, and at least 6 upto 12 characters" maxlength="12" minlength="6" id="password" name="npassword" required>
          </div>
            
          <div class="inputDiv">
            <label class="inputLabel" for="confirmPassword">Confirm Password</label>
            <input class="inp" type="password" id="confirmPassword" name="confirmpassword" title="Password not matched"  required>
          </div>
          
          <div class="buttonWrapper">
            <button type="submit" id="submitButton" class="submitButton pure-button pure-button-primary">
              <span>Submit</span>
              <!-- <span id="loader"></span> -->
            </button>
          </div>
            
        </form>
        </div>
      </div>
</body>
</html>
