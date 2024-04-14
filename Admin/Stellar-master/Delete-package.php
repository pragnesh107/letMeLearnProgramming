<?php
    include_once('./config.php');
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/Admin/Stellar-master/language.php");
    // }
    $p_id = $_GET["pid"];

    /*sql to delete a record*/
    $sql = "DELETE FROM package WHERE Package_id ='{$p_id}'";

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}/Admin/Stellar-master/package.php?delpkg=1");
    }
    mysqli_close($conn);
?>
