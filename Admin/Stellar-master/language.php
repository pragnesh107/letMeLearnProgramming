<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Programming Blog Admin</title>
  <!-- plugins:css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
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
                    <div class="page-header">
                        <!-- <h3 class="page-title"> language Table </h3> -->
                        <!-- <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">language table</li>
                            </ol>
                        </nav> -->
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                <?php
  if(isset($_GET['addlan']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Language Added Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['uplanname']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Language Name Updated Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['dellan']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Language Deleted Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  ?>
                                <div class="card-title">
                                      <h4>Languages</h4> 
                                      <a href="Add_lan.php" class="btn btn-dark text-white text-decoration-none">Add Language</a>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> Language id </th>
                                                <th class="text-center"> Language name </th>
                                                <th class="text-center"> Quick Action </th>
                                                <th class="text-center"> Edit</th>
                                                <th class="text-center">Remove Language</th>
                                            </tr>
                                        </thead>
<?php 
//this is for display all languages
include_once('config.php');    
$match_query = "SELECT * FROM language";
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
            $lid = $row["Language_Id"];
            $lname = $row["Language_Name"];
            echo '<tbody>
            <tr>
                <td class="text-center">' .$lid. '</td>
                <td class="text-center">'.$lname.'</td>
                <td class="text-center"><a class="btn btn-dark w-50" href="managelan.php?lanname='.$lname.'&lanid='.$lid.'">Manage</a></td>
                <td class="text-center"><a href="Add_lan.php?id='.$row['Language_Id'].'"> <i class="bi bi-pencil-square text-dark"></i></a></td>
                <td class="text-center"><a href="delete_lan.php?id='.$row['Language_Id'].'"> <i class="bi bi-trash3-fill text-dark"></i></a></td>
            </tr>
            </tbody>';
        }

    }
}
?>      
</tbody>
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
