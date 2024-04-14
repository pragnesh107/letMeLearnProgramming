<?php
    include_once('./config.php');
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/Admin/Stellar-master/language.php");
    // }
    $s_id = $_GET["id"];
    $lanname = $_GET["lanname1"];

    /*sql to delete a record*/
    $sql = "DELETE FROM $lanname WHERE Subtitle_id = $s_id";

    if (mysqli_query($conn, $sql)) {
        header("location: {$hostname}/Admin/Stellar-master/managelan.php?lanname=C&lanid=1");
    }
    mysqli_close($conn);
?>
