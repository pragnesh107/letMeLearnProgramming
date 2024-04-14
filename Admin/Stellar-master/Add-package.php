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
    include_once('./config.php');
    ?>
    <?php 
    if(isset($_GET['pid']))
    {
        $id = $_GET['pid'];
        $q = "SELECT * FROM package WHERE Package_Id = $id";
        $result = mysqli_query($conn , $q);
        if(mysqli_num_rows($result) == 1)
            $row = mysqli_fetch_assoc($result);
        
     ?>
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title"> Package </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Update Package</h4>
                                    <table class="table table-striped">
                                    <form action=" " method="post">
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control fs-6" type="text" name="title" placeholder="Package Title" value="<?php echo $row['Title']; ?>"></td>


                                            <td> <input class="form-control fs-6" type="text" name="Duration" placeholder="Package Duration" value="<?php echo $row['Duration']; ?>"></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"> <textarea class="form-control fs-6" type="text" name="description" placeholder="Package Description" rows="10" cols="50"><?php echo $row['Package_Desc'] ; ?></textarea> </td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><input class="form-control fs-6" type="text" name="price" placeholder="Package Price" value="<?php echo $row['Price']; ?>"></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="4"><button type="submit" class="btn btn-dark w-100">Update Package</button></td>
                                        </tr>
                                    </tbody>
                                    <form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php  } 
else 
{ ?>

 <div class="main-panel">
                <div class="content-wrapper">
                    <div class="page-header">
                        <h3 class="page-title">Package </h3>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">Add Package</h4>
                                    <table class="table table-striped">
                                    <form action=" " method="post">
                                    <tbody>
                                        <tr>
                                            <td><input class="form-control fs-6" type="text" name="p_title" placeholder="Package Title" required></td>
                                             <td> <input class="form-control fs-6" type="text" name="p_duration" placeholder="Package Duration" required></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><textarea class="form-control fs-6" type="text" name="p_description" placeholder="Package Description" rows="10" cols="50" required></textarea></td>
                                        </tr>
                                    </tbody>
                                    <tbody>
                                        <tr>
                                            <td colspan="2"><input class="form-control fs-6" type="number" name="p_price" placeholder="Package Price" required></td>
                                        </tr>
                                    </tbody>
                                    
                                    <tbody>
                                        <tr>
                                            <td colspan="4"><button type="submit" class="btn btn-dark w-100">Add Package</button></td>
                                        </tr>
                                    </tbody>
                                    <form>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
<?php } ?>
    </div>
</div>
    <script src="./vendors/js/vendor.bundle.base.js"></script>
    <script src="./js/off-canvas.js"></script>
    <script src="./js/misc.js"></script>
</body>
</html>




<?php
//this is for Add package 
if(isset($_POST['p_title'] ,$_POST['p_duration'] ,$_POST['p_description'] ,$_POST['p_price'] ))
{
    $title = $_POST['p_title'];
    $duration = $_POST['p_duration'];
    $description = $_POST['p_description'];
    $price = $_POST['p_price'];
    $q = "INSERT INTO package(`Title`, `Package_Desc`, `Duration`, `Price`)
    VALUES('$title','$description','$duration',$price) ";
    if(mysqli_query($conn , $q)){
        echo "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/package.php?addpkg=1';</script>";
    }else{
        echo mysqli_error($conn);
    }

}


//this is for package update
if(isset($_POST['title'] ,$_POST['Duration'] ,$_POST['description'] ,$_POST['price'] ))
{
    $duration = $_POST['Duration'];
    $title = $_POST['title'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $q = "UPDATE package SET Duration='$duration', Title='$title',Package_Desc='$description',Price='$price' WHERE Package_Id = $id ";
    if(mysqli_query($conn , $q)){
        echo "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/package.php?uppkg=1';</script>";
    }else{
        echo mysqli_error($conn);
    }
}
?>