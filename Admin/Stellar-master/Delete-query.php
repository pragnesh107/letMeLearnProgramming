<?php
    include_once('./config.php');
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/Admin/Stellar-master/language.php");
    // }
    $query_id = $_GET["id"];
    // echo $query_id;
    /*sql to delete a record*/
    $sql = "DELETE FROM query WHERE Query_Id ='{$query_id}'";
    if (mysqli_query($conn, $sql)) {
        $sql1 = "DELETE FROM query_answer WHERE Query_Id ='{$query_id}'";
        if (mysqli_query($conn, $sql1)) {
            header("location: {$hostname}/Admin/Stellar-master/query.php?dque=1");
        }
    }
    else{
        echo mysqli_error($conn);
    }
    mysqli_close($conn);
?>