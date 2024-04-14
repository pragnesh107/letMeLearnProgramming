<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Programming Blog Admin</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./vendors/simple-line-icons/css/simple-line-icons.css">
  <link rel="stylesheet" href="./vendors/flag-icon-css/css/flag-icon.min.css">
  <link rel="stylesheet" href="./vendors/css/vendor.bundle.base.css">
  <link rel="stylesheet" href="./css/style.css">
  <!-- <link rel="shortcut icon" href="./images/favicon.png" /> -->
</head>

<body>
  <div class="container-scroller">

    <?php include_once('header.php'); ?>
    <div class="main-panel">
      <div class="content-wrapper">
        <!-- <div class="page-header">
          <h3 class="page-title"> Tables </h3>
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="#">Tables</a></li>
              <li class="breadcrumb-item active" aria-current="page">Quiz table</li>
            </ol>
          </nav>
        </div> -->

        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
  <?php
  if(isset($_GET['addque']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Question Added Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['upque']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Question Updated Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  elseif(isset($_GET['delque']))
  {
    echo '<div class="alert alert-success alert-dismissible fade show" role="alert">
    Question Deleted Successfully.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
    </div>';
  }
  ?>
                <table class="w-75 container">
                  <tbody>
                    <tr>
                      <td colspan="4">
                        <form  method="post" action="">
                        <select class="form-select w-100" onchange="javascript: submit()" name="language" id="lan_box">
                            <option value="">Select Language</option>
                            <?php
                            include_once('./config.php');
                            $q = "select Language_Name, Language_Id from language";
                            $res = mysqli_query($conn, $q);
                            while ($row = mysqli_fetch_assoc($res)) {
                            ?>
                              <option value="<?php echo $row['Language_Id'] ?>"><?php echo $row['Language_Name'] ?></option>
                            <?php } 
                            ?>
                          </select>
                        </form>
                          <?php 
                          if(isset($_POST['language']))
                          {
                            $lanid = $_POST['language'];
                            $qy1 = "SELECT Language_Name from language where Language_Id = $lanid";
                            $res1 = mysqli_query($conn, $qy1);
                            if($res1){
                              $row = mysqli_fetch_assoc($res1);
                              $lanname = $row['Language_Name'];
                            }
                          }
                          else{
                            $lanid = 1;
                            $lanname = "C";
                          } ?>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>



        <div class="row">
          <div class="col-lg-12 grid-margin stretch-card">
            <div class="card">
              <div class="card-body">
                <div class="card-title">
                  <h4>Quiz Table</h4>
                  <a href="Add-question.php?lanid=<?php echo $lanid ?>" class="btn btn-dark text-white text-decoration-none">Add Question</a>
                </div>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th> Qustion Id</th>
                      <th> Language_Name</th>
                      <th> Question</th>
                      <th> Answer </th>
                      <th>Edit Question</th>
                      <th>Remove Question</th>
                    </tr>
                  </thead>
                  <?php
                  include "./config.php";
                  $quiz_query = "SELECT quiz_option.Question_Id,quiz_question.Question ,quiz_question.Language_Id, quiz_option.Options, quiz_option.Answer from quiz_option INNER JOIN quiz_question ON quiz_question.Question_Id = quiz_option.Question_Id
                  where Answer = 1 AND quiz_question.Language_Id = $lanid";
                  $quiz_result = mysqli_query($conn, $quiz_query);
                  if (!$quiz_result) {
                    echo  mysqli_error($conn);
                  } else {
                    if (mysqli_num_rows($quiz_result) > 0) {
                      while ($row = mysqli_fetch_assoc($quiz_result)) {
                        $qid = $row["Question_Id"];
                        $que = $row["Question"];
                        $opt = $row["Options"];
                        // $lanname = $row['Language_Name'];
                        $question = substr($que, 0, 40);
                        $option = substr($opt, 0, 40);
                        echo '<tbody>
            <tr>
                <td style="width:5vw;">' . $qid . '</td>
                <td style="width:5vw;">'.$lanname.'</td>
                <td>' . $question . "..."  . '</td>
                <td>' . $option . '</td>
                <td class="text-center"><a href="Add-question.php?id=' . $row['Question_Id'] . '"> <i class="fs-5 bi bi-pencil-square text-dark"></i></a></td>
                <td class="text-center"><a href="Delete_question.php?id=' . $row['Question_Id'] . '"> <i class="fs-5 bi bi-trash3-fill text-dark"></i></a></td>
            </tr>
            </tbody>';
                      }
                    }
                  }
                  ?>
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
  // if (isset($_POST["question"], $_POST["option1"], $_POST["option2"], $_POST["option3"], $_POST["option4"], $_POST["answer"],)) {
  //   $question = $_POST["question"];
  //   $op1 = $_POST["option1"];
  //   $op2 = $_POST["option2"];
  //   $op3 = $_POST["option3"];
  //   $op4 = $_POST["option4"];
  //   $answer = $_POST["answer"];
  //   $addque = "INSERT INTO quiz_question (Question) VALUES ('$question')";
  //   $addque_result = mysqli_query($conn, $addque);
  //   if ($addque_result) {
  //     echo "<meta http-equiv='refresh' content='0'>";
  //   }
  // }
  // ?>
  <!-- $query = "SELECT Question_Id FROM quiz_question";
        $query_res = mysqli_query($conn, $query);
        if(mysqli_num_rows($quiz_result) > 0)
        {
            while($row=mysqli_fetch_assoc($quiz_result))
            {
                $queid = $row["Question_Id"];
            }
        } -->
  <script src="./vendors/js/vendor.bundle.base.js"></script>
  <script src="./js/off-canvas.js"></script>
  <script src="./js/misc.js"></script>
</body>

</html>