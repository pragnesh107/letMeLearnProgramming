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
  <?php include_once('header.php'); ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- <div class="page-header">
                        <h3 class="page-title"> Tables </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Project table</li>
                            </ol>
                        </nav>
                    </div> -->

                    <?php  
                    include_once('./config.php');
                    $q = "SELECT language.Language_Name , project.Project_id , project.Project_Title,project.Description , project.Source_Code from project INNER JOIN language ON language.Language_Id = Project.Language_Id";
                    $result = mysqli_query($conn , $q);

                    ?>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
    <?php
if(isset($_GET['succ']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Project Added Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['succ1']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Project Updated Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['delpro']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Project deleted Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  ?>
                                <div class="card-title">
                                      <h4>Project Table</h4> 
                                      <a href="Add-project.php" class="btn btn-dark text-white text-decoration-none">Add Project</a>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th> Project Id </th>
                                                <th> Language Name </th>
                                                <th> Project Title </th>
                                                <th> Description </th>
                                                <th> Source Code </th>
                                                <th> Edit </th>
                                                <th> Remove </th>
                                            </tr>
                                        </thead>
                                        <?php  if(mysqli_num_rows($result) > 0){
                                            while($row = mysqli_fetch_assoc($result)){
                                       ?> <tbody>
                                            <tr>
                                                <td><?php echo $row['Project_id']; ?></td>
                                                <td><?php echo $row['Language_Name']; ?></td>
                                                <td><?php echo $row['Project_Title']; ?></td>
                                                <td><?php echo substr($row['Description'], 0, 20)."..."; ?></td>
                                                <td><?php echo substr($row['Source_Code'], 0, 30)."..."; ?></td>
            <td class="text-center"><a href="Add-project.php?id=<?php echo $row['Project_id']; ?>"> <i class="fs-5 bi bi-pencil-square text-dark"></i></a></td>
                                                <td><a href="Delete-project.php?id=<?php echo $row['Project_id'];?>&pname=<?php echo $row['Source_Code'];?>" class="btn btn-dark text-white text-decoration-none">Remove</a></td>
                                               
                                            </tr>
                                        </tbody>
                                        <?php }}
                                        else
                                            echo "<tr><td class='w-100' colspan='7'><h3>No Record found</td></tr></h3>";
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
