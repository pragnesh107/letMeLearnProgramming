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
  ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <!-- <div class="page-header">
                        <h3 class="page-title"> Tables </h3>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#">Tables</a></li>
                                <li class="breadcrumb-item active" aria-current="page">Query table</li>
                            </ol>
                        </nav>
                    </div> -->
<?php
    include_once('../Stellar-master/config.php');
    $q = "SELECT language.Language_Name, user.first_name,query.Query_Id ,query.Description , query.Date_Time FROM query inner join language ON language.Language_Id = query.Language_id inner join user ON user.user_Id = query.User_Id";
    $result = mysqli_query($conn,$q);
    ?>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
<?php
  if(isset($_GET['dque']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Query Deleted Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['uplan']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Language Updated Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['ansadd']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Query Answer Added Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  ?>
                                    <h4 class="card-title">Query Table</h4>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th class="text-center"> Query Id </th>
                                                <th class="text-center"> User Name </th>
                                                <th class="text-center"> Language Name </th>
                                                <th class="text-center"> Description </th>
                                                <th class="text-center"> Date/Time </th>
                                                <th class="text-center"> Action </th>
                                                <th class="text-center"> Answer Query</th>
                                            </tr>
                                        </thead>
                                    <?php 
                                      if(mysqli_num_rows($result) > 0)
                                      {
                                          while($row=mysqli_fetch_assoc($result))
                                          {
                                    ?>
                                        <tbody>
                                            <tr>
                                                <td class="text-center"><?php echo $row['Query_Id']  ?></td>
                                                <td class="text-center"><?php echo $row['first_name']  ?></td>
                                                <td class="text-center"><?php echo $row['Language_Name']  ?></td>
                                                <td class="text-center"><?php echo $row['Description']  ?></td>
                                                <td class="text-center"><?php echo $row['Date_Time']  ?></td>
                                                <td class="text-center"><a href="Delete-query.php?id=<?php echo $row['Query_Id'];?>" class="btn btn-dark text-white text-decoration-none">Remove Query</a></td>
                                                <td class="text-center"><a href="Ans-query.php?id=<?php echo $row['Query_Id']  ?>"><i class="bi bi-clipboard2-check fs-4 text-dark "></i></a></td>
                                            </tr>
                                        </tbody>
                                        <?php }} ?>
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
