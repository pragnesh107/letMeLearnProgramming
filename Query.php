<?php
include_once('config/config.php');
include_once('navbar2.php');
// query submission 
if (isset($_POST['language']) && isset($_POST['description'])) {

    if (isset($_SESSION['id'])) {
        $u_id = $_SESSION['id'];
        $user = $_SESSION['fname'];
        $lan = $_POST['language'];
        $desc = $_POST['description'];
    
        $q1 = "SELECT Language_Id FROM language WHERE Language_Name = '$lan' ";
        $a1 = mysqli_query($conn, $q1);
        $row1 = mysqli_fetch_assoc($a1);
        $lan_id = $row1['Language_Id'];
    
        $q = "INSERT INTO query(`User_Id`,`Language_Id`,`Description`)
        VALUES ('$u_id','$lan_id','$desc')";
        $result = mysqli_query($conn, $q);
        // header("location: http://localhost/PHP_Practical/project_sem_6/Programming_Blog/Query.php");
    } 
    else {
      $hasuid = 0;
    }
}
?>


<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>course management</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
  <link rel="stylesheet" href="Query.css">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="./Js/jquery.scrollUp.min.js"></script>

</head>

<body>

  <div class="sidenav">
    <div class="side-image">
      <img src="./images/sidenav.jpg">
    </div>

    <!-- <h1>Pure CSS Accordion Menu</h1> -->
    <h3> View Query</h3>
    <h5>Search by Languages</h5>
    <div class="dropdown" id="mytextbox">
      <form method="POST" action="Query_data.php">
        <!-- <select name="" onchange="show1()"> -->
        <input type="text" id="" class="textBox" placeholder="Dropdown Menu" readonly onchange="lan_show()">
      </form>
      <div class="option" id="Lan_Name">
        <div onclick="show('C')">
          <i class="devicon-c-line-wordmark"> C</i>
        </div>
        <div onclick="show('C++')">
          <i class="devicon-cplusplus-line-wordmark"> C++</i>
        </div>

        <div onclick="show('Html')">
          <i class="devicon-html5-plain-wordmark"> html</i>
        </div>
        <div onclick="show('css')">
          <i class="devicon-css3-plain-wordmark"> css</i>
        </div>
        <div onclick="show('Javascript')">
          <i class="devicon-javascript-plain"> Javascript</i>

        </div>

        <div onclick="show('Java')">
          <i class="devicon-java-plain-wordmark"> Java</i>
        </div>


        <div onclick="show('Php')">
          <i class="devicon-php-plain"> php</i>
        </div>

        <div onclick="show('Python')">
          <i class="devicon-python-plain-wordmark"> python</i>
        </div>

        <div onclick="show('Linux')">
          <i class="devicon-linux-plain"> Linux</i>
        </div> 
      </select>
      </div>
    </div>

  </div>

  <div class="main">
  <?php
  if(isset($hasuid))
  {
  echo '<div class="alert alert-danger m-2" role="alert">
  Please <a href="http://localhost/Programming_Blog/login.php" class="alert-link"> login </a> for post your Queries!
  </div>';
  }
  ?>
    <div class="detail p-3 fs-5">
      <div class="post-heading w-75 mx-auto h-100 p-3 text-white rounded-3">
        <h2 class="text-center">Post your Query</h2>
        <h5>In this section, any user can post their query related to
          any particular language so that is the reason to start this
          type of work in daily terms of life lab alb a Lorem ipsum
          dolor, sit amet consectetur adipisicing elit. Laboriosam
          explicabo aut facere!</h5>
      </div>
    </div>
    <form action="Query.php" method="post" class="container w-100 mx-auto m-5">
      <div class=" w-75 mx-auto h-100">
        <label for="exampleInputPassword1" class="form-label">select
          language</label>
        <select class="form-select" aria-label="Default select example" name="language" required >
          <option>Open this select menu</option>
          <option>C</option>
          <option>C++</option>
          <option>Java</option>
          <option>Php</option>
          <option>Javascript</option>
          <option>Jquery</option>
          <option>Html</option>
          <option>Css</option>
          <option>Python</option>
          <option>Linux</option>
        </select>


        <div class="mb-3">
          <label for="exampleInputEmail1" class="form-label">Enter
            your query</label>
          <textarea name="description" class="form-control" placeholder="Leave a Query here" id="floatingTextarea" style="height: 150px" required></textarea>
        </div>
        <!-- <button type="submit" class="btn btn-primary"
          name="submit">Submit</button> -->
        <input type="submit" class="submit form-button" value="submit">
    </form>

        <div id="lan_data"></div>
        <!-- <div class="media my-3 d-flex">
          <img src="images/user.png" width="54px" class="mr-3"
            alt="...">
          <div class="media-body mx-3">
            <div class="font-weight-bold my-0"> Asked by:<b>Akshay
                Mayani</b> at<b>10-2023</b> </div>
            <h5 class="mt-0"> <a class="text-dark" href="">How to
                define an array ?</a></h5>
          </div>
        </div> -->


    <div class="queries2">

      <!-- <div class="container">

        <div class="media my-3 d-flex">
          <img src="images/user.png" width="54px" class="mr-3"
            alt="...">
          <div class="media-body mx-3">
            <div class="font-weight-bold my-0"> Asked by:<b>Akshay
                Mayani</b> at<b>10-2023</b> </div>
            <h5 class="mt-0"> <a class="text-dark" href="">How to
                define an array ?</a></h5>
          </div>
        </div>
        <div class="media my-3 d-flex">
          <img src="images/user.png" width="54px" class="mr-3"
            alt="...">
          <div class="media-body mx-3">
            <div class="font-weight-bold my-0"> Asked by:<b>Akshay
                Mayani</b> at<b>10-2023</b> </div>
            <h5 class="mt-0"> <a class="text-dark" href="">How to
                define an array ?</a></h5>
          </div>
        </div>
        <div class="media my-3 d-flex">
          <img src="images/user.png" width="54px" class="mr-3"
            alt="...">
          <div class="media-body mx-3">
            <div class="font-weight-bold my-0"> Asked by:<b>Akshay
                Mayani</b> at<b>10-2023</b> </div>
            <h5 class="mt-0"> <a class="text-dark" href="">How to
                define an array ?</a></h5>
          </div>
        </div>
        <div class="media my-3 d-flex">
          <img src="images/user.png" width="54px" class="mr-3"
            alt="...">
          <div class="media-body mx-3">
            <div class="font-weight-bold my-0"> Asked by:<b>Akshay
                Mayani</b> at<b>10-2023</b> </div>
            <h5 class="mt-0"> <a class="text-dark" href="">How to
                define an array ?</a></h5>
          </div>
        </div>
      </div> -->
      <?php
      //  SELECT a.id, a.name, a.num, b.date, b.roll
      //  FROM a
      //  INNER JOIN b ON a.id=b.id;
      echo '<h3 class="text-center m-0 p-0">All languages query</h3><hr>';
      $q = "select user.first_name,user.last_name ,query.Query_Id ,query.Date_Time , query.Description from query INNER JOIN user ON user.User_Id = query.User_Id";
      // session_start();
      // $user = $_SESSION['id'];
      $res = mysqli_query($conn, $q);
      if (mysqli_num_rows($res) > 0) {

        while ($row = mysqli_fetch_assoc($res)) {

          echo '<div class="media my-3 d-flex">
            <img src="images/user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body mx-3">
            <div class="font-weight-bold my-0"> Asked by: <b>' . $row['first_name'] . " " . $row['last_name']  . '</b> at <b>' . $row['Date_Time'] . '</b> </div>
            <h5 class="mt-0"> <a class="text-dark" href="Query_ans.php?query=' . $row['Query_Id'] . '">' . $row['Description'] . '</a></h5></div>
            </div>';
        }
      } else {
        echo "Errorrrrrrrrrrrrrrrrrr";
      }
      ?>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  <script>
    function show(anything) {
      document.querySelector('.textBox').value = anything;
      var language = anything;
          // var lan = $(this).val();
          if (language == "") {
            $("#lan_data").html("");
          } else {
            $.ajax({
              url: "load_language.php",
              type: "POST",
              data: {
                language_name: language
              },
              success: function(data) {
                $("#lan_data").html(data);
              }
            })
          }
    }

    let dropdown = document.querySelector('.dropdown');
    dropdown.onclick = function() {
      dropdown.classList.toggle('active');
    }

    // load data of languages 
  </script>
</body>

</html>