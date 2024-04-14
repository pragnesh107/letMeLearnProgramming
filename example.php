<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<?php
$a = "Hello ";
echo $a; 

    echo '<script> alert("Hello"); </script>';  ?>

</body>
</html>

<div class="dropdown" id="mytextbox">
      <form method="POST" action="Query_data.php">
        <!-- <select name="" onchange="show1()"> -->
          <input type="text" id="" class="textBox" placeholder="Dropdown Menu" readonly onchange="lan_show()">
      </form>
      <div class="option" id="Lan_Name">
        <div onclick="show('C')">
          <option> <i class="devicon-c-line-wordmark"> C</i></option>
        </div>
        <div onclick="show('C++')">
          <option> <i class="devicon-cplusplus-line-wordmark"> C++</i></option>
        </div>

        <div onclick="show('Html')">
          <option><i class="devicon-html5-plain-wordmark"> html</i></option>
        </div>
        <div onclick="show('css')">
          <option> <i class="devicon-css3-plain-wordmark"> css</i></option>
        </div>
        <div onclick="show('Javascript')">
          <option> <i class="devicon-javascript-plain"> Javascript</i></option>

        </div>

        <div onclick="show('Java')">
          <option> <i class="devicon-java-plain-wordmark"> Java</i></option>
        </div>


        <div onclick="show('php')">
          <option> <i class="devicon-php-plain"> php</i></option>
        </div>

        <div onclick="show('python')">
          <option> <i class="devicon-python-plain-wordmark"> python</i></option>
        </div>

        <div onclick="show('Linux')">
          <option> <i class="devicon-linux-plain"> Linux</i></option>
        </div></select>
      </div>
    </div>






    
<?php
include_once('config/config.php');


if(isset($_POST['Description'], $_POST['Name'], $_POST['Email'], $_POST['submit']))
{
    $Description = trim($_POST['Description']);
    $Name = trim($_POST['Name']);
    $Email = trim($_POST['Email']);
    // $password = password_hash($pass_salt,PASSWORD_BCRYPT);
    $entry_query = "INSERT INTO feedback(`Name`,`Email`, `Message`)
    VALUES('$Name', '$Email', '$Description')";
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