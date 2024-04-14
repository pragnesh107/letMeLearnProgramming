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
                    $s_id = $_GET['id'];
                    $sql = "SELECT * FROM c WHERE Subtitle_Id ='{$s_id}'";
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
                                                            while ($row = mysqli_fetch_assoc($result)) {  ?>
                                                               <form action="" method="post">
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Select Language Title</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>
                                                                <td colspan="4">
                          <select class="form-select" name="utitle" id="lan_box" required>
                            <option value="">Select Title</option>
                            <?php
                                                                                include_once('./config.php');
                                                                                $q = "select * from language_title";
                                                                                $res = mysqli_query($conn, $q);
                                                   while ($row1 = mysqli_fetch_assoc($res)) {
                                                                                
if($row['Title_Id'] == $row1['Title_Id']){
    $select = "selected";
}else{
    $select = "";
}
?>
<option value="<?php echo $row1['Title_Name'];?>" <?php echo $select;?> ><?php echo $row1['Title_Name'] ?></option>
                                                                            <?php } ?>
                          </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Enter Sub title Name </h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>
                                                                    <td><input class="form-control fs-6" type="text" name="usubtitle" placeholder="Enter Subtitle" value="<?php echo $row['Subtitle']; ?>"></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Enter Description</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <td>
                                                                <textarea class="form-control fs-6" type="text" name="udescription" placeholder="Enter title Description" rows="20" cols="50"><?php echo $row['Description']; ?></textarea> </td>
                                                                <tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Enter Example</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>
                                                            <td>
                                                                <textarea class="form-control fs-6" type="text" name="uexample" placeholder="Enter title Example" rows="10" cols="50"><?php echo $row['Example']; ?></textarea> </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Select Source code of Example</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>

                                                                    <td colspan="2"><input class="form-control" type="file" name="myfile"
                                                                    required /></td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="8"><button type="submit" class="btn btn-dark w-100">Update Sub-title</button>
                                                                    </td>
                                                                </tr>
                                                            </tbody>

                                                            <form>
                                                                <?php }
                                                        } ?>
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
                } else { ?>
                    <div class="page-header">
                        <h3 class="page-title"> Add Language title</h3>
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
                                                                        <h4 class="p-0 m-0">Select Language Title</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>
                                                                <td colspan="4">
                          <select class="form-select" name="title" id="lan_box" required>
                            <option value="">Select Title</option>
                            <?php
                                                                                include_once('./config.php');
                                                                                if(isset($_GET['lanid'],$_GET['lname']))
                                                                                {
                                                                                    $lanid = $_GET['lanid'];
                                                                                    $lnm = $_GET['lname'];
                                                                                }
                                                                                $q = "select Title_Name from language_title where Language_Id= $lanid";
                                                                                $res = mysqli_query($conn, $q);
                                                                                while ($row = mysqli_fetch_assoc($res)) {
                                                                                ?>
                                                                            <option
                                                                                value="<?php echo $row['Title_Name'] ?>">
                                                                                <?php echo $row['Title_Name'] ?>
                                                                            </option>
                                                                            <?php } ?>
                          </select>
                                                                    </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Enter Sub title Name </h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>
                                                                    <td><input class="form-control fs-6" type="text" name="subtitle" placeholder="Enter Subtitle"></td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Enter Description</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <td>
                                                                <textarea class="form-control fs-6" type="text" name="description" placeholder="Enter title Description" rows="20" cols="50"></textarea> </td>
                                                                <tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Enter Example</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>
                                                            <td>
                                                                <textarea class="form-control fs-6" type="text" name="example" placeholder="Enter title Example" rows="10" cols="50"></textarea> </td>
                                                                </tr>
                                                            </tbody>
                                                            <tbody>
                                                                <tr>
                                                                    <td>
                                                                        <h4 class="p-0 m-0">Select Source code of Example</h4>
                                                                    </td>
                                                                </tr>
                                                            </tbody> 
                                                            <tbody>
                                                                <tr>

                                                                    <td colspan="2"><input class="form-control" type="file" name="myfile"
                                                                    required /></td>
                                                                </tr>
                                                            </tbody>
                                                            
                                                            <tbody>
                                                                <tr>
                                                                    <td colspan="8"><button type="submit" class="btn btn-dark w-100">Add Entry</button>
                                                                    </td>
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
//this is for add new subtitle
if (isset($_POST["title"],$_POST["subtitle"],$_POST["description"],$_POST["example"],$_POST["myfile"])) {
    $title = $_POST['title'];
    $subtitle = mysqli_real_escape_string($conn, $_POST['subtitle']);
    $description = mysqli_real_escape_string($conn, $_POST['description']);
    $example = mysqli_real_escape_string($conn, $_POST['example']);
    echo $title;
        $q1 = "INSERT INTO $lnm (Title_Id,Subtitle,Description,Example,Output) VALUES ((SELECT Title_Id FROM language_title WHERE Title_Name = '$title' and Language_Id = $lanid), '$subtitle', '$description', '$example', '123')";
        $result = mysqli_query($conn, $q1);
        if(!$result){
            echo mysqli_error($conn);
        }
        else{

            echo "<script>
            window.location.href = 'http://localhost/Programming_Blog/Admin/Stellar-master/managelan.php?lanname=C&lanid=1';
            </script>";
        }
}
else{
    echo mysqli_error($conn);
}
if (isset($_POST["utitle"],$_POST["usubtitle"],$_POST["udescription"],$_POST["uexample"])) {
    $title = mysqli_real_escape_string($conn, $_POST['utitle']);
    $subtitle = mysqli_real_escape_string($conn, $_POST['usubtitle']);
    $description = mysqli_real_escape_string($conn, $_POST['udescription']);
    $example = mysqli_real_escape_string($conn, $_POST['uexample']);

        $q1 = "UPDATE c SET Title_Id = (SELECT Title_Id from language_title WHERE Title_Name = '$title') , Subtitle = '$subtitle' , Description = '$description' , Example = '$example' WHERE Subtitle_Id = $s_id ";
        $result = mysqli_query($conn, $q1);
        if(!$result){
            echo mysqli_error($conn);
        }
        else{

            echo "<script>
            window.location.href = 'http://localhost/Programming_Blog/Admin/Stellar-master/managelan.php?lanname=C&lanid=1';
            </script>";
        }
}
?>