<?php
    include_once('./config.php');
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/Admin/Stellar-master/language.php");
    // }
    $pro_id = $_GET["id"];
    $pro_name = $_GET["pname"];
    /*sql to delete a record*/
    $sql = "DELETE FROM project WHERE Project_id ='{$pro_id}'";
    if (mysqli_query($conn, $sql)) {  
        unlink("Uploaded_Projects/".$pro_name);
        header("location: {$hostname}/Admin/Stellar-master/adminproject.php?delpro=1");
    }
    mysqli_close($conn);
?>