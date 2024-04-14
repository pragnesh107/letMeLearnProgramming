<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Programming Blog</title>
  <!-- <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <script src="script.js"></script> -->
  <!-- <link rel="stylesheet" href="main.css"> -->
  <!-- <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script> -->
</head>
<body>  
  <?php include_once('navbar.php');?>
  <nav class="navbar navbar-expand-lg bg-body-tertiary position-sticky nv2">
    <div class="container-fluid">
      <a class="navbar-brand" href="#"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Html</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Css</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Js</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Jquery</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="course.php?lanid=1&sid=1&lanname=C">C</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">C++</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="course.php?lanid=3&sid=1&lanname=Java">Java</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="course.php?lanid=4&sid=1&lanname=Php">Php</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Python</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold" href="#">Linux</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold unique-f" href="Query.php">Queries</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold unique-f" href="quiz.php">Quiz</a>
          </li>
          <li class="nav-item">
            <a class="nav-link fw-bold unique-f" href="Project.php">Projects</a>
          </li>
        </ul>
        <form class="d-flex" role="search">
          <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
          <button class="btn btn-outline-success" type="submit">Search</button>
        </form>
      </div>
    </div>
  </nav>
</body>
</html>