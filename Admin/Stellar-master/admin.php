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
   <?php include_once('header.php'); ?>
      <!-- partial -->
      <div class="main-panel">
        <div class="content-wrapper">
          <!-- <div class="page-header">
            <h3 class="page-title"> Programming Blog </h3>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                <li class="breadcrumb-item active" aria-current="page">Basic tables</li>
              </ol>
            </nav>
          </div> -->
          <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Users</h4>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th> User type</th>
                        <th> User id </th>
                        <th> First name </th>
                        <th> Last name </th>
                        <th> Email-id </th>
                        <th> Quick Action </th>
                      </tr>
                    </thead>
                    <?php
                    include "config.php";
                    $match_query = "SELECT `user_id`,`user_type_id`,`first_name`,`last_name`,`email_id` FROM user";
                    $match_result = mysqli_query($conn, $match_query);
                    if (!$match_result) {
                      echo  mysqli_error($conn);
                    } else {
                      if (mysqli_num_rows($match_result) > 0) {
                        while ($row = mysqli_fetch_assoc($match_result)) {
                          $uid = $row["user_id"];
                          $utid = $row["user_type_id"];
                          $fname = $row["first_name"];
                          $lname = $row["last_name"];
                          $uemail = $row["email_id"];
                          echo '<tbody>
<tr>
  <td class="py-1">
      <img src="./images/faces-clipart/pic-3.png" alt="image" />
  </td>
  <td>' . $uid . '</td>
  <td>' . $fname . '</td>
  <td>' . $lname . '</td>
  <td>' . $uemail . '</td>
  <td><form action="users.php" method="post"><button type="submit" name="uid" value="' . $uid . '" class="btn btn-dark">Remove User</button></form></td>
  </tr>
</tbody>';
                        }
                      }
                    }
                    if (isset($_POST["uid"])) {
                      $id = $_POST["uid"];
                      $remuser = "DELETE FROM user WHERE user_Id = '$id'";
                      $remuser_result = mysqli_query($conn, $remuser);
                      if (!$remuser_result) {
                        echo mysqli_error($conn);
                      } else {
                        echo "<meta http-equiv='refresh' content='0'>";
                      }
                    }
                    ?>

                  </table>
                </div>
              </div>
            </div>


          </div>
        </div>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="./js/off-canvas.js"></script>
  <script src="./js/misc.js"></script>
  <!-- endinject -->
  <!-- Custom js for this page -->
  <!-- End custom js for this page -->
</body>

</html>