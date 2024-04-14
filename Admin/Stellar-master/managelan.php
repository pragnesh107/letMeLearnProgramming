<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Programming Blog Admin</title>
  <!-- plugins:css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <!-- endinject -->
  <!-- Layout styles -->
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include_once('./header.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- <div class="page-header">
            <h3 class="page-title"> User Table </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">User table</li>
              </ol>
            </nav>
          </div> -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <div class="card-title">
                  <?php 
                  if(isset($_GET['lanid'],$_GET['lanname']))
                  {
                  $lanid = $_GET['lanid'];
                  $lnm = $_GET['lanname'];
                  
                  echo '<h4>'.$lnm.'</h4>';
                  echo '<a href="Add_title.php?lanid='.$lanid.'&lname='.$lnm.'" class="btn btn-dark text-white text-decoration-none">Add Language Title</a>';
                }
                  ?>  
                 </div>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> Title name </th>
                        <th> Subtitle name </th>
                        <th> Description </th>
                        <th> Example </th>
                        <th> Quick Action</th>
                        <th> Quick Action</th>
                      </tr>
                    </thead>
                    <?php
                    include_once('../Stellar-master/config.php');
                    if (isset($_GET["lanid"],$_GET["lanname"])) {
                      $lanid = $_GET["lanid"];
                      $lnm = $_GET["lanname"];
                      $mnglan = "SELECT $lnm.Subtitle_Id, $lnm.Subtitle , $lnm.Description , $lnm.Example , $lnm.Output , language_title.Language_Id, language_title.Title_Name FROM $lnm INNER JOIN language_title ON $lnm.Title_Id = language_title.Title_Id WHERE Language_Id = $lanid";
                      $mnglan_res = mysqli_query($conn, $mnglan);
                      if (!$mnglan_res) {
                        echo  mysqli_error($conn);
                      } else {
                        if (mysqli_num_rows($mnglan_res) > 0) {
                          while ($row = mysqli_fetch_assoc($mnglan_res)) {
                           $subtid = $row['Subtitle_Id'];
                            $tname = $row["Title_Name"];
                            $sname = $row["Subtitle"];
                            $lid = $row["Language_Id"];
                            $des = $row["Description"];
                            $op = $row["Example"];
                            $str = substr($des, 0, 30);
                            $str2 = substr($op, 0, 30);

                            // echo "$tid $lname $lid";
                            echo '<tbody>
                                                    <tr>
                                                    <td>' . $tname . '</td>
                                                    <td>' . $sname . '</td>
                                                    <td>' . $str . "..." . '</td>
                                                    <td>' . $str2 . "..." . '</td>
                                                    <td><a href = "Add_title.php?id='. $subtid .'" ><i class="bi bi-pencil-square text-dark"></i></a></td>
                                                    <td><a href = "Delete_title.php?id='. $subtid .'&lanid='.$lanid.'&lanname1='.$lnm.'" ><i class="bi bi-trash3-fill text-dark"></i></a></td>
                                                    </tr>
                                                    ';
                          }
                        }
                      }
                    }
                    ?>
                   </table>
                </div>
              </div>
            </div>
          </div>
        </div>

        <?php
        if (isset($_POST["tname"], $_POST["sname"], $_POST["des"], $_POST["exp"], $_POST["out"])) {
          $tname = $_POST["tname"];
          $sname = $_POST["sname"];
          $description = $_POST["des"];
          $example = $_POST["exp"];
          $output = $_POST["out"];
          $addentry = "INSERT INTO c (`Title_Id`,`Subtitle`, `Description`, `Example`, `Output`) VALUES (1,'$sname','$description','$example','$output')";
          $addentry_result = mysqli_query($conn, $addentry);
          if ($addentry_result) {
            echo "<meta http-equiv='refresh' content='0'>";
          }
        }
        ?>
      </div>
    </div>
  </div>
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <script src="./js/off-canvas.js"></script>
  <script src="./js/misc.js"></script>
</body>

</html>