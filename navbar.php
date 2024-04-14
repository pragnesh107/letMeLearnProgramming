<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Programming Blog</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous">
    <link rel="stylesheet" href="navbar.css">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <!-- <link rel="stylesheet" href="main.css"> -->
  <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
</head>
<style>
  body{
    font-family: monospace;
  }
</style>

<body>
  <nav class="navbar p-2 fs-5 navbg h-resp nv1">
    <div
      class="d-flex w-100 flex-wrap align-items-center justify-content-center justify-content-lg-start navcontent">
      <a class="navbar-brand text-white me-10 mx-2">Programming Blog</a>
      <ul
        class="nav nav-list col-12 col-lg-auto mx-auto me-lg-auto mb-2 justify-content-center mb-md-0 v-class">
        <li><a href="index.php" class="nav-link px-2 text-white hv">Home</a></li>
        <li><a href="index.php#about" class="nav-link px-2 text-white hv">About Us</a>
        </li>
        <li><a href="index.php#features" class="nav-link px-2 text-white hv">Features</a>
        </li>
        <li><a href="course.php?sid=1&lanid=1&lanname=C" class="nav-link px-2 text-white hv">Courses</a>
        </li>
        <li><a href="index.php#package" class="nav-link px-2 text-white hv">Premium
            Package<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
              class="bi bi-mortarboard-fill text-white" viewBox="0 0 16 16">
              <path
                d="M8.211 2.047a.5.5 0 0 0-.422 0l-7.5 3.5a.5.5 0 0 0 .025.917l7.5 3a.5.5 0 0 0 .372 0L14 7.14V13a1 1 0 0 0-1 1v2h3v-2a1 1 0 0 0-1-1V6.739l.686-.275a.5.5 0 0 0 .025-.917l-7.5-3.5Z" />
              <path
                d="M4.176 9.032a.5.5 0 0 0-.656.327l-.5 1.7a.5.5 0 0 0 .294.605l4.5 1.8a.5.5 0 0 0 .372 0l4.5-1.8a.5.5 0 0 0 .294-.605l-.5-1.7a.5.5 0 0 0-.656-.327L8 10.466 4.176 9.032Z" />
            </svg></a></li>
        <li><a href="index.php#contact" class="nav-link px-2 text-white hv">Contact
            Us</a></li>
      </ul>

      <!-- <form class="col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3" role="search">
                    <input type="search" class="form-control form-control-light text-bg-light" placeholder="Search..."
                        aria-label="Search">
                </form> -->

      
      <?php
      session_start();
      if(isset($_SESSION['id'], $_SESSION['typeid'], $_SESSION['fname'], $_SESSION['lname'], $_SESSION['email']))
      {
        $uid = $_SESSION['id'];
        $utype = $_SESSION['typeid'];
        $fname = $_SESSION['fname'];
        $lname = $_SESSION['lname'];
        $email = $_SESSION['email'];
        include_once('profile.php');
      }
      else{
        echo '<div class=" text-end mx-4 v-class right-nav">
        <a href="login.php"><button type="button"
            class="btn btn-outline-light me-2">Login</button></a>
        <a href="SignUp.php"><button type="button"
            class="btn btn-warning">Sign-up</button></a>
      </div>';
      }
      ?>
    </div>
    <div class="burger">
      <div class="line"></div>
      <div class="line"></div>
      <div class="line"></div>
    </div>
    </div>
  </nav>


</body>
</html>