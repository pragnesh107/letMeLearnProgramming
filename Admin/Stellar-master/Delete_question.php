<?php
    include_once('./config.php');
    // if($_SESSION["user_role"] == '0'){
    //   header("Location: {$hostname}/Admin/Stellar-master/language.php");
    // }
    $question_id = $_GET["id"];
    echo $question_id;
    /*sql to delete a record*/
    $q = "DELETE FROM quiz_question WHERE Question_Id = $question_id ;";
    $q .= "DELETE FROM quiz_option WHERE Question_Id = $question_id ";
   $result = mysqli_multi_query($conn, $q) or die("Query");
        echo 'sssss';
        header("location: {$hostname}/Admin/Stellar-master/quiz.php?delque=1");
    
    mysqli_close($conn);
?>