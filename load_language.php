<?php 
session_start();
$page="load-data";

include_once('config/config.php'); 

  $lan = $_POST['language_name']; 
  $output = "";


  //  SELECT a.id, a.name, a.num, b.date, b.roll
  //  FROM a
  //  INNER JOIN b ON a.id=b.id;
  $output = '<div class="container  mx-auto w-90 m-5 px-5 border border-success rounded border-3" id="searchres"><h3 class="text-center m-0 p-2">'. $lan .' Language query</h3>';
  $q = "select language.Language_Name ,user.first_name,user.last_name ,query.Query_Id ,query.Date_Time , query.Description from query INNER JOIN user ON user.User_Id = query.User_Id INNER JOIN language ON language.Language_Id = query.Language_Id WHERE Language_Name = '$lan'";
  
  // $user = $_SESSION['id'];
  $res = mysqli_query($conn, $q);
  if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
      $output.= '
      <div class="media my-3 d-flex">
        <img src="images/user.png" width="54px" class="mr-3" alt="...">
        <div class="media-body mx-3">
          <div class="font-weight-bold my-0"> Asked by: <b>' . $row['first_name'] . " " . $row['last_name']  . '</b> at <b>' . $row['Date_Time'] . '</b> </div>
          <h5 class="mt-0"> <a class="text-dark" href="Query_ans.php?query=' . $row['Query_Id'] . '">' . $row['Description'] . '</a></h5>
        </div>
      </div>';
    }
    echo $output.'</div>';
  } else {
    echo '
    <div class="container mx-auto w-90 m-5 px-5 border border-success rounded border-3" id="searchres"><h3 class="text-center m-0 p-3">'.$lan.'   languages query</h3>
    <p class="mt-3 fs-3 text-danger">No Record Found</p>';
  }

?>



























  <!-- $output.= '<div class="container mx-auto w-90 m-5 px-5 border border-success rounded border-5" id="searchres">';
  $q = "select * from query where Q_language = '$lan'";
  $res = mysqli_query($conn,$q);
  $output.= '<h3 class="text-center m-0 p-0">List of '. $lan.' languages query</h3><hr>';
  if(mysqli_num_rows($res) >= 1)
  {
     while($row = mysqli_fetch_assoc($res)){
        $output.= '<div class="media my-3 d-flex">
             <img src="images/user.png" width="54px" class="mr-3" alt="...">
             <div class="media-body mx-3">
             <div class="font-weight-bold my-0"> Asked by:<b>'. $row['Q_User'] .'</b> at<b>'.$row['Time'] .'</b> </div>
             <h5 class="mt-0"> <a class="text-dark" href="Query_ans.php?query='. $row['Q_id'] .'">'. $row['Q_desc'].'</a></h5></div>
             </div> 
          ';
         }
         echo "</div>";
         echo $output;
        }else
          echo "<script> alert('No Query Found '); </script>";
 -->


