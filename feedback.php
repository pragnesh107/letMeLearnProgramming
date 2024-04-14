<?php
include_once('navbar.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Feedback Page</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="feedback1.css">
</head>

<body>

  <!-- <small>Enter message (optional) and click button "Send"</small> -->
  <form method="POST" action="">
    <div class="wrapper centered">
      <article class="letter">
        <div class="side">
          <h1>Feedback </h1>
          <p>
            <textarea placeholder="Your message" maxlength="235" name="Description" required></textarea>
          </p>
        </div>
        <div class="side">
          <p>
            <input type="text" placeholder="Your name" name="Name" required>
          </p>
          <p>
            <input type="email" placeholder="Your email" name="Email" required oninvalid="alert('Please Enter valid Email Id');">
          </p>
          <p>
            <button id="sendLetter" name="submit">Send</button>
          </p>
        </div>
  </form>
  </article>
  <div class="envelope front"></div>
  <div class="envelope back"></div>
  </div>
  <p class="result-message centered">Thank you for your message</p>
</body>
<script>
  function addClass() {
    document.body.classList.add("sent");
  }

  sendLetter.addEventListener("click", addClass);
</script>

</html>


<?php
include_once('config/config.php');


if (isset($_POST['Description'], $_POST['Name'], $_POST['Email'], $_POST['submit'])) {
  $Description = trim($_POST['Description']);
  $Name = trim($_POST['Name']);
  $Email = trim($_POST['Email']);
  // $password = password_hash($pass_salt,PASSWORD_BCRYPT);
  $entry_query = "INSERT INTO feedback(`Name`,`Email`, `Message`)
    VALUES('$Name', '$Email', '$Description')";
  $entry_result = mysqli_query($conn, $entry_query);
  if (!$entry_result) {
    echo  mysqli_error($conn);
  } else {
    echo "Data inserted successfully <br>";
    // echo '<script>window.location.href("location: http://localhost/programming_Blog/main.html");</script>';
    header("location: http://localhost/programming_blog/index.php");
  }
}
?>