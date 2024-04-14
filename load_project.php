<?php 
session_start();
$page="load-data";
include_once('config/config.php'); 
if(isset($_SESSION['id']))
{
    $uid = $_SESSION['id'];
    $precheck= "SELECT user_type_id from user where user_Id = $uid";
    $precheck_res = mysqli_query($conn, $precheck);
    if($precheck_res)
    {
        if (mysqli_num_rows($precheck_res) > 0) {
            while ($row = mysqli_fetch_assoc($precheck_res)) {
                $usrtype = $row['user_type_id'];
            }
        }
    }
    else{
        echo mysqli_error($conn);
    }
}
else{
    $hasuid = 0;
}
    $lan = $_POST['language_name']; 
    $q = "SELECT language.Language_Name,project.Language_Id,project.Project_Title,project.Description,project.Source_Code from project INNER JOIN language ON language.Language_Id = project.Language_Id WHERE Language_Name = '$lan'";
    $res = mysqli_query($conn, $q);
    if (mysqli_num_rows($res) > 0) {
        while ($row = mysqli_fetch_assoc($res)) {
            $lan_id = $row['Language_Id'];
            $title = $row['Project_Title'];
            $desc = $row['Description'];
            $src = $row['Source_Code'];

            echo '<div id="container">
            <div class="product-details">
                <h1>'.$title.'</h1>
                <span class="hint-star star">
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star" aria-hidden="true"></i>
                    <i class="fa fa-star-o" aria-hidden="true"></i>
                </span>
                <p class="information">'.$desc.'</p>
                <div class="control">
                    <button class="btn2">
                        <span class="price">₹0</span>
                        <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>';
                        if(isset($usrtype))
                        {
    
                            if($usrtype == 1)
                            {
                                echo '<span class="buy"><a href="downloader.php?file=' . urlencode($src) . '">Download</a></span>';
                            }
                            else{
                                echo '<span class="buy"><a href="Project.php?notpreusr='. 0 .'">Download</a></span>';
                            }
                        }
                        else{
                            echo '<span class="buy"><a href="Project.php?notpreusr='. 0 .'">Download</a></span>';
                        }
                      
            echo  '</button>
                </div>
            </div>
            <div class="product-image">
                <img src="./images/project1.jpg" alt="" style="object-fit: cover;">
                <div class="info">
                    <h2> Description</h2>
                    <ul class="d-flex flex-nowrap flex-column">
                        <li><strong>Height : </strong>5 Ft </li>
                        <li><strong>Shade : </strong>Olive green</li>
                        <li><strong>Decoration: </strong>balls and bells</li>
                        <li><strong>Material: </strong>Eco-Friendly</li>
                    </ul>
                </div>
            </div>
        </div>';
        }
    }
   else {
    echo '
    <p class="mt-3 fs-3 text-danger">No Record Found</p>';
  }
  // $user = $_SESSION['id'];
//   $res = mysqli_query($conn, $q);
//   if (mysqli_num_rows($res) > 0) {
//     while ($row = mysqli_fetch_assoc($res)) {
//       $output.= '
//       <div class="media my-3 d-flex">
//         <img src="images/user.png" width="54px" class="mr-3" alt="...">
//         <div class="media-body mx-3">
//           <div class="font-weight-bold my-0"> Asked by: <b>' . $row['first_name'] . " " . $row['last_name']  . '</b> at <b>' . $row['Date_Time'] . '</b> </div>
//           <h5 class="mt-0"> <a class="text-dark" href="Query_ans.php?query=' . $row['Query_Id'] . '">' . $row['Description'] . '</a></h5>
//         </div>
//       </div>';
//     }
//     echo $output.'</div>';
//   } else {
//     echo '
//     <div class="container mx-auto w-90 m-5 px-5 border border-success rounded border-3" id="searchres"><h3 class="text-center m-0 p-3">'.$lan.'   languages query</h3>
//     <p class="mt-3 fs-3 text-danger">No Record Found</p>';
//   }

?>

