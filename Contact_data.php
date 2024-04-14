<?php

 include_once('config/config.php'); 



if(isset($_POST['fname'], $_POST['lname'], $_POST['email'], $_POST['message']))
{
    $fname = trim($_POST['fname']);
    $lname = trim($_POST['lname']);
    $email = trim($_POST['email']);
    $message = trim($_POST['message']);
    // $password = password_hash($pass_salt,PASSWORD_BCRYPT);
    $entry_query = "INSERT INTO contact(`First_Name`, `Last_Name`, `Email`, `Message`)
    VALUES('$fname', '$lname', '$email', '$message')";
    $entry_result = mysqli_query($conn, $entry_query);
    if(!$entry_result)
    {
        echo  mysqli_error($conn);
    }
    else{
        echo "Data inserted successfully <br>";
        // echo '<script>window.location.href("location: http://localhost/programming_Blog/main.html");</script>';
        header("location: http://localhost/programming_blog/index.html");
    }
}


?>