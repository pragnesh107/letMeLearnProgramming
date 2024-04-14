<?php
include_once('../Stellar-master/config.php');
//this is for add new language
if (isset($_POST["pname"], $_POST["planguage"], $_POST["pdescription"], $_FILES['myfile'])) {
    $p_name = mysqli_real_escape_string($conn, $_POST['pname']);
    $p_language = mysqli_real_escape_string($conn, $_POST['planguage']);
    $p_description = mysqli_real_escape_string($conn, $_POST['pdescription']);
    $f_name = $_FILES['myfile']['name'];
    $f_size = $_FILES['myfile']['size'];
    $f_tname = $_FILES['myfile']['tmp_name'];
    $f_type = $_FILES['myfile']['type'];
    // print_r($_FILES['myfile']);

    if(file_exists("Uploaded_Projects/".$f_name))
   {
    $haserror1 = 1;
    //    echo $f_name. "Already exist";
   }
   else if($f_type == "zip/zipx/" or $f_type == "application/x-zip-compressed"){
        $q1 = "INSERT INTO `project` (`Language_Id` ,`Project_Title` ,`Description` , `Source_Code`) VALUES ((SELECT Language_Id FROM language WHERE language_name = '$p_language'), '$p_name' ,'$p_description' ,'$f_name')";
        $result = mysqli_query($conn, $q1) or die("Query unnseccessfull");
        // echo "<script>window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/adminproject.php';</script>";
        if(move_uploaded_file($f_tname,"Uploaded_Projects/".$f_name))
        {
            echo "<script>
                window.location.href = 'http://localhost/Programming_Blog/Admin/Stellar-master/adminproject.php?succ=1';
            </script>";
        }
        else{
            // echo "file Not uploaded to folder...!";
        }
    }
    else{
        $haserror = 1;
        // echo "File format is not valid , it must be zip or zipx ";
    }
}
else{
    // echo "Data not received...!";
}

//update project

//     $q = "UPDATE language SET Language_Name='{$_POST['lan_name']}'  WHERE  Language_Id={$_GET['id']}";
//     $res = mysqli_query($conn, $q);
//     if ($res) {
//     window.location.href = 'http://localhost/Programming_Blog/Admin/Stellar-master/language.php';
//     }
// }
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
    <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
    <div class="container-scroller">
        <?php include_once('header.php');
        ?>
        <!-- partial -->
        <div class="main-panel">
            <div class="content-wrapper">
                <?php
                if (isset($_GET['id'])) 
                {
                    $project_id = $_GET['id'];
                    $sql = "SELECT * FROM project WHERE Project_id ='{$project_id}'";
                    $result = mysqli_query($conn, $sql);
                    ?>
                <div class="page-header">
                    <h3 class="page-title"> Update Project</h3>
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
                                                <form method="post" action="" enctype="multipart/form-data">
                                                    <?php
                                                        if (mysqli_num_rows($result) > 0) {
                                                            while ($row = mysqli_fetch_assoc($result)) {  ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="p-0 m-0">Enter Project Name</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4">
                                                                <input class="form-control fs-6" type="text"
                                                                    name="upname" placeholder="Enter Project Name"
                                                                    value="<?php echo $row['Project_Title']; ?>"
                                                                    required>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="p-0 m-0">Select Language</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4">
                                                                <div class="btn-group w-100">
                                                                    <select class="form-select w-100" name="uplanguage"
                                                                        id="lan_box">
                                                                        <?php
                                                                                    include_once('./config.php');
                                                                                    $q = "select Language_Id ,Language_Name from language";
                                                                                    $res = mysqli_query($conn, $q);
                                                                                    while ($row1 = mysqli_fetch_assoc($res)) {    
                                                                                        if($row1['Language_Id'] == $row['Language_Id']) {
                                                                                            $select = "selected";
                                                                                        }else
                                                                                            $select = "";
                                                                                         ?>
                                                                        <option
                                                                            value="<?php echo $row1['Language_Name'];?>"
                                                                            <?php echo $select; ?> >
                                                                            <?php echo $row1['Language_Name'] ?>
                                                                        </option>
                                                                        <?php } ?>
                                                                    </select>
                                                                </div>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="p-0 m-0">Enter Project Description</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4">
                                                                <textarea class="form-control fs-6" rows="10"
                                                                    type="text" name="updescription"
                                                                    placeholder="Enter Project Description"
                                                                    required><?php echo $row['Description']; ?> </textarea>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td>
                                                                <h4 class="p-0 m-0">Select Source Code file</h4>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4">
                                                                <input class="form-control" type="file" name="upmyfile"
                                                                    required
                                                                    value="<?php echo $row['Source_Code']; ?>" />
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                    <tbody>
                                                        <tr>
                                                            <td colspan="4"><button type="submit"
                                                                    class="btn btn-dark w-100">Update Project</button>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                <form>

                                                        <?php }
                                                        }   ?>
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
                    <h3 class="page-title"> Add Project</h3>
                </div>
                <div class="row">
                    <div class="col-lg-12 grid-margin stretch-card">
                        <div class="card">
                            <div class="card-body">
 <?php
  if(isset($haserror))
  {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    '.$f_type.' File format is not valid , it must be zip or zipx!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($haserror1))
  {
    echo '<div class="alert alert-danger alert-dismissible fade show" role="alert">
    Project Already exist!
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  ?>
                                <div class="row">
                                    <div class="col-lg-12 grid-margin stretch-card">
                                        <div class="card">
                                            <div class="card-body">
                                                <table class="table table-striped">
                                                    <form method="post" action="" enctype="multipart/form-data">
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Enter Project Name</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <input class="form-control fs-6" type="text"
                                                                        name="pname" placeholder="Enter Project Name"
                                                                        required>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Select Language</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <div class="btn-group w-100">
                                                                        <select class="form-select w-100"
                                                                            name="planguage" id="lan_box">
                                                                            <option value="">First Select language
                                                                            </option>
                                                                            <?php
                                                                                include_once('./config.php');
                                                                                $q = "select Language_Name from language";
                                                                                $res = mysqli_query($conn, $q);
                                                                                while ($row = mysqli_fetch_assoc($res)) {
                                                                                ?>
                                                                            <option
                                                                                value="<?php echo $row['Language_Name'] ?>">
                                                                                <?php echo $row['Language_Name'] ?>
                                                                            </option>
                                                                            <?php } ?>
                                                                        </select>
                                                                    </div>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Enter Project Description</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <textarea class="form-control fs-6" rows="10"
                                                                        type="text" name="pdescription"
                                                                        placeholder="Enter Project Description"
                                                                        required></textarea>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td>
                                                                    <h4 class="p-0 m-0">Select Source Code file</h4>
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4">
                                                                    <input class="form-control" type="file"
                                                                        name="myfile" required />
                                                                </td>
                                                            </tr>
                                                        </tbody>
                                                        <tbody>
                                                            <tr>
                                                                <td colspan="4"><button type="submit"
                                                                        class="btn btn-dark w-100">Add Project</button>
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
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    <!-- plugins:js -->
    <script src="./vendors/js/vendor.bundle.base.js"></script>
    <!-- endinject -->
    <script src="./js/off-canvas.js"></script>
    <script src="./js/misc.js"></script>
    <!-- endinject -->
</body>

</html>
<?php
if (isset($_POST["upname"], $_POST["uplanguage"], $_POST["updescription"], $_FILES['upmyfile']))
{
    $up_name = mysqli_real_escape_string($conn, $_POST['upname']);
    $up_language = mysqli_real_escape_string($conn, $_POST['uplanguage']);
    $up_description = mysqli_real_escape_string($conn, $_POST['updescription']);
    $uf_name = $_FILES['upmyfile']['name'];
    $uf_size = $_FILES['upmyfile']['size'];
    $uf_tname = $_FILES['upmyfile']['tmp_name'];
    $uf_type = $_FILES['upmyfile']['type'];

    $lan = "SELECT Language_Id FROM language WHERE Language_Name = '$up_language'";
    $res_lan = mysqli_query($conn, $lan);
    if(mysqli_num_rows($res_lan) > 0 ){
        while($row = mysqli_fetch_assoc($res_lan)){
          $up_language1 = $row['Language_Id'];
        }
    }
    else{
        echo "not result";
    }
    $q1 = "UPDATE project SET Language_Id = '$up_language1' WHERE Project_id = '{$project_id}' ;";
    $q1 .= "UPDATE project SET Project_Title = '$up_name' WHERE Project_id = '{$project_id}' ;";
    $q1 .= "UPDATE project SET `Description` = '$up_description' WHERE Project_id = '{$project_id}' ;";
    $q1 .= "UPDATE project SET Souce_Code = '$uf_name' WHERE Project_id = '{$project_id}' ;";
    $result1 = mysqli_multi_query($conn, $q1);
    if($result1)
    {
        echo  "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/adminproject.php?succ1=1';</script>";
    }
    else{
        echo "query failed!";
        echo mysqli_error($conn);
    }
}
else{
    // echo $_POST["upname"];
    // echo $_POST["uplanguage"];
    // echo $_POST["updescription"];
    // echo $_FILES['upmyfile']['name'];
    // echo "update data not received";
}
?>