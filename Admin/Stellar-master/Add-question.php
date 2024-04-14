<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Programming Blog Admin</title>
  <!-- plugins:css -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="shortcut icon" href="./images/favicon.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:../../partials/_navbar.html -->
    <?php include_once('header.php');
    include_once('./config.php');
     ?>
    <!-- partial -->
    <div class="main-panel">
      <div class="content-wrapper">
      <?php             
                if (isset($_GET['id'])) {
                    $Ques_id = $_GET['id'];
                    $sql = "SELECT * FROM quiz_question WHERE Question_Id ='{$Ques_id}'";
                    $result = mysqli_query($conn, $sql);
                
                ?>
        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Update Question</h4>
                <table class="table table-striped">
                  <form action="" method="post">
                    <tbody>
                      <tr>
                      <?php  
                        if(mysqli_num_rows($result) > 0){
                            $row = mysqli_fetch_assoc($result);
                            $question = $row['Question'];
                        }
                      ?>

                        <td colspan="4">
                          <input class="form-control fs-6" type="text" value=" <?php echo $question; ?>" name="u_question" placeholder="update your Question" required>
                        </td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                      <?php
                          $q2 = "SELECT * FROM quiz_option WHERE Question_Id ='{$Ques_id}'";
                          $result2 = mysqli_query($conn, $q2);
                          if(mysqli_num_rows($result2) > 0){
                            while($row = mysqli_fetch_assoc($result2)){
                              
                              $option[] = $row['Options'];
                              $ans[] = $row['Answer'];
                            }
                                                
                            // echo '<pre>';
                            // print_r($option);
                            // print_r($ans);
                            // echo '</pre>';
                            // die();
                        }

                        ?>
                         <tbody>
                      <tr>
                        <td> Option 1</td>
                        <td> Option 2</td>
                      </tr>
                    </tbody>
                        <td><input class="form-control fs-6" type="text" value="<?php echo $option[0] ?>" name="u_option1" placeholder="Option 1"  required></td>
                        <td><input class="form-control fs-6" type="text"  value="<?php echo $option[1] ?>" name="u_option2" placeholder="Option 2" required></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td> Option 3</td>
                        <td> Option 4</td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td><input class="form-control fs-6" value="<?php echo $option[2] ?>" type="text" name="u_option3" placeholder="Option 3" required></td>
                        <td><input class="form-control fs-6" value="<?php echo $option[3] ?>" type="text" name="u_option4" placeholder="Option 4" required></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td colspan="4">
                          <?php  
                          
                          ?>
                          <select class="form-select" name="u_correct_answer" id="lan_box" required>
                            <option value="">Select Option of Correct Answer</option>
                              <option value="1"<?php echo ($ans[0] == 1 ?' selected' :'') ?>>Option 1</option>
                              <option value="2"<?php echo ($ans[1] == 1 ?' selected' :'')  ?>>Option 2</option>
                              <option value="3"<?php echo ($ans[2] == 1 ?' selected' :'')  ?>>Option 3</option>
                              <option value="4"<?php echo ($ans[3] == 1 ?' selected' :'')  ?>>Option 4</option>
                         
                          </select>
                      


                          <!-- <div class="btn-group w-100">
                              <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Answer
                              </button>
                              <div class="dropdown-menu w-100">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                                <a class="dropdown-item" href="#">Option 4</a>
                              </div>
                            </div> -->
                        </td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td colspan="4"><button type="submit" class="btn btn-dark w-100">update Question</button></td>
                      </tr>
                    </tbody>
                    <form>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
      </div>
<?php }else {
                  ?>
<div class="page-header">
          <h3 class="page-title"> Quiz Table </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Quiz table</li>
            </ol>
          </nav>
        </div>

        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Add Question</h4>
                <table class="table table-striped">
                  <form action="" method="post">
                    <tbody>
                      <tr>
                        <td colspan="4">
                          <input class="form-control fs-6" type="text" name="question" placeholder="Write your Question" required>
                        </td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td><input class="form-control fs-6" type="text" name="option1" placeholder="Option 1" required></td>
                        <td><input class="form-control fs-6" type="text" name="option2" placeholder="Option 2" required></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td><input class="form-control fs-6" type="text" name="option3" placeholder="Option 3" required></td>
                        <td><input class="form-control fs-6" type="text" name="option4" placeholder="Option 4" required></td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td colspan="4">
                          <select class="form-select" name="correct_answer" id="lan_box" required>
                            <option value="">Select Option of Correct Answer</option>
                              <option value="1">Option 1</option>
                              <option value="2">Option 2</option>
                              <option value="3">Option 3</option>
                              <option value="4">Option 4</option>
                         
                          </select>
                      


                          <!-- <div class="btn-group w-100">
                              <button type="button" class="btn btn-dark dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Select Answer
                              </button>
                              <div class="dropdown-menu w-100">
                                <a class="dropdown-item" href="#">Option 1</a>
                                <a class="dropdown-item" href="#">Option 2</a>
                                <a class="dropdown-item" href="#">Option 3</a>
                                <a class="dropdown-item" href="#">Option 4</a>
                              </div>
                            </div> -->
                        </td>
                      </tr>
                    </tbody>
                    <tbody>
                      <tr>
                        <td colspan="4"><button type="submit" class="btn btn-dark w-100">Add Question</button></td>
                      </tr>
                    </tbody>
                    <form>
                </table>
              </div>
            </div>
          </div>
        </div>

        <!-- content-wrapper ends -->
        <!-- partial:../../partials/_footer.html -->
        <!-- partial -->
      </div>

 <?php  } ?>
 

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
 include_once('./config.php');
if(isset($_GET['lanid'], $_POST["question"] , $_POST["option1"] , $_POST["option2"], $_POST["option3"] , $_POST["option4"] ,$_POST["correct_answer"] )) {
   $lanid = $_GET['lanid'];
   $question = mysqli_real_escape_string($conn, $_POST['question']);
   $option1 = mysqli_real_escape_string($conn, $_POST['option1']);
   $option2 = mysqli_real_escape_string($conn, $_POST['option2']);
   $option3 = mysqli_real_escape_string($conn, $_POST['option3']);
   $option4 = mysqli_real_escape_string($conn, $_POST['option4']);
   $correct_answer = mysqli_real_escape_string($conn, $_POST['correct_answer']);

      $q1 = "INSERT INTO `quiz_question` (`Language_Id`, `Question`) VALUES ($lanid, '$question')";
      if(mysqli_query($conn, $q1)){

      $q2 = "SELECT Question_Id from quiz_question where Question = '$question'";
      $result2 = mysqli_query($conn, $q2) or die("Query2 unnseccessfull");
        if(mysqli_num_rows($result2) > 0){
         while($row = mysqli_fetch_assoc($result2))
          $Que_id =  $row['Question_Id'];
        }else{
          echo 'question is not saved';
        }

       $q3 = "INSERT INTO `quiz_option` (`Question_Id`,`Answer`,`Options`) 
       VALUES ($Que_id , ". ($correct_answer == 1 ? 1: 0) . " ,'$option1'),
        ($Que_id , ". ($correct_answer == 2 ? 1 : 0) . " ,'$option2'),
        ($Que_id , ". ($correct_answer == 3 ? 1 : 0) . " ,'$option3'),
        ($Que_id , ". ($correct_answer == 4 ? 1 : 0) . " ,'$option4')";
      $result3 = mysqli_query($conn, $q3) or die("Query3 unnseccessfull");
    echo  "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/quiz.php?addque=1';</script>";

      }else
      {
      //   $q4 = "ROLLBACK";
      //  $res =  mysqli_query($conn , $q4);
      }
      // header("location: http://localhost/programming_blog/Admin/Stellar-master/language.php");
}




if (isset($_POST["u_question"] , $_POST["u_option1"] , $_POST["u_option2"], $_POST["u_option3"] , $_POST["u_option4"] ,$_POST["u_correct_answer"] )) {

    $question = mysqli_real_escape_string($conn, $_POST['u_question']);
    $option1 = mysqli_real_escape_string($conn, $_POST['u_option1']);
    $option2 = mysqli_real_escape_string($conn, $_POST['u_option2']);
    $option3 = mysqli_real_escape_string($conn, $_POST['u_option3']);
    $option4 = mysqli_real_escape_string($conn, $_POST['u_option4']);
   $correct_answer = mysqli_real_escape_string($conn, $_POST['u_correct_answer']);

    $q = "SELECT Option_Id FROM quiz_option WHERE Question_Id = $Ques_id";
    $result = mysqli_query($conn, $q) or die("Query1 updation unnseccessfull");
    if(mysqli_num_rows($result) > 0 ){
      while($row = mysqli_fetch_assoc($result)){
        $option_id[] = $row['Option_Id'];
      }
                         
    }
    
$q1 = "UPDATE quiz_question SET Question = '$question' WHERE Question_Id = $Ques_id ;";
$q1 .= "UPDATE quiz_option SET Options = '$option1', Answer = ". ($correct_answer == 1 ? 1 : 0) ."  WHERE Option_Id = $option_id[0] ;";
$q1 .= "UPDATE quiz_option SET Options = '$option2', Answer = ". ($correct_answer == 2 ? 1 : 0) ."  WHERE Option_Id = $option_id[1] ;";
$q1 .= "UPDATE quiz_option SET Options = '$option3', Answer = ". ($correct_answer == 3 ? 1 : 0) ."  WHERE Option_Id = $option_id[2] ;";
$q1 .= "UPDATE quiz_option SET Options = '$option4', Answer = ". ($correct_answer == 4 ? 1 : 0) ."  WHERE Option_Id = $option_id[3]";
$result1 = mysqli_multi_query($conn, $q1) or die("Query3 unnseccessfull");

     echo  "<script> window.location.href = 'http://localhost/programming_blog/Admin/Stellar-master/quiz.php?upque=1';</script>";
       }

?>
