<?php
    include_once('./config.php');
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/Admin/Stellar-master/language.php");
    // }
    $Lan_id = $_GET["id"];

    /*sql to delete a record*/
    $sql = "DELETE FROM language WHERE Language_Id ='{$Lan_id}'";

    if (mysqli_query($conn, $sql)) {
        echo  "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/language.php?dellan=1';</script>";
    }
    mysqli_close($conn);
?>
