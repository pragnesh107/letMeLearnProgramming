<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Programming Blog Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/style.css">
  <!-- <link rel="shortcut icon" href="./images/favicon.png" /> -->
</head>

<body>
  <div class="container-scroller">
    <?php include_once('header.php');  
    include_once('./config.php'); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Package</h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
  <?php
  if(isset($_GET['addpkg']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Package Added Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['uppkg']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Package Updated Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['delpkg']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Package Deleted Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  ?>
                                <div class="card-title">
                                      <h4>Package Table</h4> 
                                      <a href="Add-package.php" class="btn btn-dark text-white text-decoration-none">Add Package</a>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> Package Id </th>
                                                <th class="text-center"> Title </th>
                                                <th class="text-center"> Duration </th>
                                                <th class="text-center"> Description </th>
                                                <th class="text-center"> Price </th>
                                                <!-- <th class="text-center"> Date_Time </th> -->
                                                <th class="text-center"> Edit</th>
                                                <th class="text-center"> Remove </th>
                                            </tr>
                                        </thead>


                                        <?php 
                                        $q = "SELECT * FROM `package`";
                                        $result = mysqli_query($conn , $q);
                                        if(mysqli_num_rows($result) > 0)
                                        {
                                            while($row = mysqli_fetch_assoc($result))
                                             {
                                        ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $row['Package_Id']; ?></td>
                                                <td class="text-center"><?php echo $row['Title']; ?></td>
                                                <td class="text-center"><?php echo $row['Duration']; ?></td>
                                                <td class="text-center">
                                                    <?php $description =  $row['Package_Desc'];
                                                            $desc =substr($description ,0,30);
                                                            echo $desc . " ... ";
                                                    ?></td>
                                                <td class="text-center"><?php echo $row['Price']; ?></td>
                                                     
                <td class="text-center" style="width:100px;"><a class="text-white text-decoration-none" href="Add-package.php?pid=<?php echo $row['Package_Id']; ?>" > <i class="fs-5 bi bi-pencil-square text-dark"></i></a></td>
                                               
                
                <td class="text-center"><a class="btn btn-dark text-white text-decoration-none" href="Delete-package.php?pid=<?php echo $row['Package_Id']; ?>"> Remove Package</a></td>
                                            </tr>
                                        </tbody>
                                        <?php   
                                        }}
                                        ?>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
    </div>
</div>
    <script src="./vendors/js/vendor.bundle.base.js"></script>
    <script src="./js/off-canvas.js"></script>
    <script src="./js/misc.js"></script>
</body>
</html>
