<?php
include_once('config/config.php');
include_once('navbar2.php');
$id = $_GET['query'];
if(isset($_POST['answer']))
{
  if(isset($_SESSION['id']))
  {
    $uid = $_SESSION['id'];
    if (isset($_POST['answer']) && isset($_POST['submit1'])) {
      $ans = $_POST['answer'];
      $username = $_SESSION['fname'];
      $q2 = "INSERT INTO query_answer(`Query_Id`, `User_Id`, `Answer_desc`) VALUES ($id ,$uid ,'$ans')";
      $res2 = mysqli_query($conn, $q2);
    }
  }
  else{
    $hasuid = 0;
  }
}
?>

<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Query Answer</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
  <link rel="stylesheet" href="Query_ans.css">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
    integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.3.min.js"
    integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
  <script src="./Js/jquery.scrollUp.min.js"></script>
</head>

<body>

  <div class="sidenav">
    <div class="side-image">
      <img src="./images/sidenav.jpg">
    </div>

    <!-- <h1>Pure CSS Accordion Menu</h1> -->
    <h3>View Query</h3>
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
        </div></select>
      </div>
    </div>
  </div>

  <div class="main">
    <?php
    if(isset($hasuid))
    {
    echo '<div class="alert alert-danger m-2" role="alert">
    Please <a href="http://localhost/Programming_Blog/login.php" class="alert-link"> login </a> for answer the Query!
    </div>';
    }
    ?>
    <div class="detail p-3 fs-5">
      <div class="post-heading h-100 p-3 text-white rounded-3">
        <h2 class="text-center">Answer of the Query</h2>
        <h5>In this section, any user can post their queries answer
          related to
          any particular language and another user's posted query are also visible for everyone and solve their question
          with us.</h5>
      </div>
    </div>

    <!--$q = "select * from query_tbl where Query_Id = $id"; -->
    <?php
    $q = "select language.Language_Name ,query.Query_Id , query.Description from query INNER JOIN language ON query.Language_Id = language.Language_Id WHERE Query_Id = $id";
      $result = mysqli_query($conn, $q);
      $row = mysqli_fetch_assoc($result);
    ?>
    <div class="container w-75 mx-auto ">
      <div class="col-md-6 mt-2 container w-100">
        <div class="h-100 p-3 rounded-3 text-white " style="background-color:#0a837f ;">
          <h2 class="text-center">Query is related with
            <?php echo $row['Language_Name'] ?>
          </h2>
          <h4 class="mt-4">Question :
            <?php echo $row['Description'] ?>
          </h4>
        </div>
      </div>

      <div class="container w-100 mx-auto border border-success rounded border-5 p-3 m-4 q-ans overflow-y-hidden overflow-y-scroll">
      <?php
      $q = "select user.first_name,user.last_name , query_answer.User_Id, query_answer.Answer_desc , query_answer.Date_Time from query_answer 
      INNER JOIN user
      on user.User_Id = query_answer.User_Id 
      where Query_Id = '$id'";
      $res = mysqli_query($conn, $q);
      if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
          echo 
          '<div class="media my-3 d-flex">
            <img src="images/user.png" width="54px" class="mr-3" alt="...">
            <div class="media-body mx-3">
              <div class="font-weight-bold my-0"> Answered by: <b>' . $row['first_name'] . " " . $row['last_name']  . '</b> at <b>' . $row['Date_Time'] . '</b>
              </div>
              <h5 class="mt-0"> <b>' . $row['Answer_desc'] . '</b></h5>
            </div>
          </div>';

          }
      } else 
        echo "<h3>No Answer Found</h3>";
      ?>
      </div>
        <!-- <div class="queries container w-75"> -->
        <form method="POST" action="">
          <div class="input-group mb-1 container w-100">
            <input type="text" class="form-control" placeholder="Answer the Query" aria-label="Username"
              aria-describedby="basic-addon1" name="answer">
            <button type="submit" class="form-button post-button" name="submit1">Submit</button>
          </div>
        </form>
      
    </div>
  </div>
  <!-- </div> -->
  <!-- </div> -->


  <!-- 
            <div class="h-50 container  mx-auto " style="overflow-y: hidden;">

                <div class="media my-3 d-flex">
                    <img src="images/user.png" width="54px"
                        class="mr-3" alt="...">
                    <div class="media-body mx-3">
                        <div class="font-weight-bold my-0"> Asked
                            by:<b>Akshay
                                Mayani</b> at<b>10-2023</b> </div>
                        <h5 class="mt-0"> <a class="text-dark"
                                href="">How to
                                define an array ?</a></h5>
                    </div>
                </div>
            </div> -->



  <script>
    function show(anything) {
      document.querySelector('.textBox').value = anything;
      var language = anything;

      var lan = $(this).val();
      if (language == "") {
        $("Query.php#lan_data").html("");
        // window.location = "http://localhost/PHP_Practical/project_sem_6/Programming_Blog/Query.php";
      } else {
        // window.location = "http://localhost/PHP_Practical/project_sem_6/Programming_Blog/Query.php";
        $.ajax({
          url: "load_language.php",
          type: "POST",
          data: {
            language_name: language
          },
          success: function (data) {
            $("Query.php#lan_data").html(data);
          }
        })
      }
    }

    let dropdown = document.querySelector('.dropdown');
    dropdown.onclick = function () {
      dropdown.classList.toggle('active');
    }

    // load data of languages 
  </script>
  <!-- <script
        src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script>
        function show(anything) {
            document.querySelector('.textBox').value = anything;
            var language = anything;
        }

        let dropdown = document.querySelector('.dropdown');
        dropdown.onclick = function () {
            dropdown.classList.toggle('active');
        }
    </script> -->
</body>

</html>