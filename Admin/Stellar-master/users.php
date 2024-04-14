<?php 
include "./config.php";   

if(isset($_GET["ruid"]))
{
    $id = $_GET["ruid"];
    $remuser = "DELETE FROM user WHERE user_Id = '$id'";
    $remuser_result = mysqli_query($conn, $remuser);
    if(!$remuser_result)
    {
        echo mysqli_error($conn);
    }
    else{
        $deluser = 1;
        // echo "<meta http-equiv='refresh' content='0'>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Programming Blog Admin</title>
  <!-- plugins:css -->
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
  <!-- <link rel="shortcut icon" href="./images/favicon.png" /> -->
</head>

<body>
  <div class="container-scroller">
  <?php  include_once('header.php') ?>
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
<?php
  if(isset($deluser))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
     User Removed Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
}?>
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
$match_query = "SELECT `user_id`,`user_type_id`,`first_name`,`last_name`,`email_id` FROM user";
$match_result = mysqli_query($conn, $match_query);
if(!$match_result)
{
    echo  mysqli_error($conn);
}
else{
    if(mysqli_num_rows($match_result) > 0)
    {
        while($row=mysqli_fetch_assoc($match_result))
        {
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
                <td>' .$uid. '</td>
                <td>'.$fname.'</td>
                <td>'.$lname.'</td>
                <td>'.$uemail.'</td>
                <td><a href="users.php?ruid='.$uid.'"class="btn btn-dark text-white text-decoration-none">Remove</a></td>
                </tr>
            </tbody>';
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
                <!-- content-wrapper ends -->
                <!-- partial:../../partials/_footer.html -->
             
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
