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
    <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
    <?php include_once('header.php');
    include_once('../Stellar-master/config.php');
    ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <?php
                
                if (isset($_GET['id'])) {
                    $lan_id = $_GET['id'];
                    $sql = "SELECT * FROM language WHERE Language_Id ='{$lan_id}'";
                    $result = mysqli_query($conn, $sql);
                ?>
                   <div class="page-header">
                    <h3 class="page-title"> Update Language</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped">
                                            <?php
                                                if (mysqli_num_rows($result) > 0) {
                                                    while($row = mysqli_fetch_assoc($result)) {  ?>
                                                   <form action="" method="post">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Update Language Name</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <input class="form-control fs-6" value="<?php echo $row['Language_Name']; ?>" type="text" name="lan_name" placeholder="update Language Name" required>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4"><button type="submit" class="btn btn-dark w-100" name="update">update Language</button></td>
                                                            </tr>
                                                        </tbody>
                                                        <form>
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
                <?php
                }
                else{ ?>
                   <div class="page-header">
                    <h3 class="page-title"> Add Language</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped">
                                                    <form action="" method="post">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Enter Language Name</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <input class="form-control fs-6" type="text" name="lanname" placeholder="Enter Language Name" required>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4"><button type="submit" class="btn btn-dark w-100">Add Language</button></td>
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
                    </div>

                </div>
                <?php
                }
                ?>
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
<?php
//this is for add new language
if (isset($_POST["lanname"])) {
    $lan_name = mysqli_real_escape_string($conn, $_POST['lanname']);
    $q = "select * from language where Language_Name = '$lan_name'";
    $res = mysqli_query($conn, $q);
    if (mysqli_num_rows($res) == 0) {
        $q1 = "INSERT INTO `language` (`Language_Name`) VALUES ('$lan_name');";
        $result = mysqli_query($conn, $q1) or die("Query unnseccessfull 2");
        echo  "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/language.php?addlan=1';</script>";
    }
}
if (isset($_POST["lan_name"], $_POST['update'])) {
    $lan_name = mysqli_real_escape_string($conn, $_POST['lan_name']);
    $q = "UPDATE language SET Language_Name='{$_POST['lan_name']}'  WHERE  Language_Id={$_GET['id']}";
    $res = mysqli_query($conn, $q);
    if($res){
        echo  "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/language.php?uplanname=1';</script>";
       }
    }
?>