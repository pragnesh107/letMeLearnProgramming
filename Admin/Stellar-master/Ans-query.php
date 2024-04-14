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
                    $query_id = $_GET['id'];
                    $sql = "SELECT  query.Description , language.Language_Name FROM query INNER JOIN language ON language.Language_Id = query.Language_id WHERE Query_Id = $query_id";
                    $result = mysqli_query($conn, $sql);
                    if(!mysqli_num_rows($result) > 0)
                    {
                        die("Query Failed");
                    }else
                    $row = mysqli_fetch_assoc($result);
                ?>
                   
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
                            <div class="card-title">
                              <h4> Answer the Posted Query</h4>
                            </div>
                                <div class="row">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped">
                                                    <form action="" method="post">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Language Name : <b></b> <?php echo $row['Language_Name'] ?></h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Question : <?php echo $row['Description'] ?></h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <!-- <tbody>
                                                            <tr>
                                                                <td colspan="4"></td>
                                                            </tr>
                                                        </tbody> -->
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                <h4 class="p-0 m-0"> Enter the query Answer </h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <input class="form-control fs-6" type="text" name="query_ans" placeholder="Enter query Answer " required>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4"><button type="submit" class="btn btn-dark w-100">Post Answer</button></td>
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
if (isset($_POST["query_ans"])) {
    $query_ans = $_POST["query_ans"];
    // $lan_name = mysqli_real_escape_string($conn, $_POST['query_ans']);
    $q1 = "INSERT INTO query_answer (Query_Id,User_Id,Answer_desc) VALUES ('$query_id',1,'$query_ans');";
    $result = mysqli_query($conn, $q1); 
    if(!$result)
    {
       echo mysqli_error($conn);
    }
    else{
        echo "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/query.php?ansadd=1';</script>";
    }?> 

<?php } ?>
