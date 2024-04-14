<?php 
include_once('config/config.php'); 
include_once('navbar2.php');
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Programming Blog</title>
  <link
    href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css"
    rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD"
    crossorigin="anonymous">
  <!-- <link rel="stylesheet" href="cource.css"> -->
  <link rel="stylesheet" href="sidebar.css">
  <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js" integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
  <script src="script.js"></script>
  <script
  src="https://code.jquery.com/jquery-3.6.3.min.js"
  integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
  crossorigin="anonymous"></script>
  <script src="./Js/jquery.scrollUp.min.js"></script>
</head>

<body>
  <div class="sidenav">
    <div class="side-image">
      <img src="./images/sidenav.jpg">
    </div>
    <h3>Languages</h3>
    <div class="accordion">
    <?php 
    if(isset($_GET['lanid']))
    {
      $lanid = $_GET['lanid'];
    }
    $title_query = "SELECT language_title.Title_Id, language_title.Title_Name, language.Language_Name FROM language_title INNER JOIN language ON language_title.Language_Id=language.Language_Id WHERE language.Language_Id = $lanid";
    $title_result = mysqli_query($conn, $title_query);
    if(!$title_result)
    {
        echo  mysqli_error($conn);
    }
    else{
        if(mysqli_num_rows($title_result) > 0)
        {
          $toggleid = 1;

            while($row=mysqli_fetch_assoc($title_result))
            {
                $titid = $row["Title_Id"];
                $tname = $row["Title_Name"];
                $lanname = $row["Language_Name"];
                echo '<div class="accordion-tab">
                            <input id="'.$toggleid.'" type="checkbox" class="accordion-toggle" name="toggle" />
                            <label for="'.$toggleid.'">'.$tname.'</label>
                            <div class="accordion-content">
                            <ul>';

                $subtitle_query = "SELECT Subtitle_Id,Title_Id,Subtitle from $lanname WHERE Title_Id = $titid";
                $subtitle_result = mysqli_query($conn, $subtitle_query);
                if(!$subtitle_result)
                {
                    echo  mysqli_error($conn);
                }
                else{
                      if(mysqli_num_rows($subtitle_result) > 0)
                      {
                          while($row=mysqli_fetch_assoc($subtitle_result))
                          {
                              $stid = $row["Subtitle_Id"];
                              $stname = $row["Subtitle"];
                              echo '<li><a href=course.php?sid='.$stid.'&lanname='.$lanname.'&lanid='.$lanid.'>'.$stname.'</a></li>';
                          }
                      }
                      echo '</ul>
                            </div>
                          </div>';
                    }
                $toggleid++;
            }
        }
      }
       
?>
    </div>
  </div>
  
  <div class="main" id="main1">
    <?php 
    echo'<h2>'.$lanname.'</h2>';
    
    if(isset($_GET['sid'],$_GET['lanname']))
    {
     $sid = $_GET['sid'];
     $lanname = $_GET['lanname'];
    //  echo $sid;
    $match_query = "SELECT Subtitle_Id, Title_Id, Subtitle,Description, Example,Output FROM $lanname WHERE Subtitle_Id = $sid";
    $match_result = mysqli_query($conn, $match_query);
    if(!$match_result)
    {
      echo "errrrrrrror.....";
        echo  mysqli_error($conn);
    }
    else{
        if(mysqli_num_rows($match_result) > 0)
        {
            while($row=mysqli_fetch_assoc($match_result))
            {
                $stid = $row["Subtitle_Id"];
                $tid = $row["Title_Id"];
                $subtitle = $row["Subtitle"];
                $des = nl2br($row["Description"]);
                $ex = $row["Example"];
                $output = $row["Output"];
                // echo $stid .$tid. $subtitle .$des. $ex. $output;
            
                echo '<div>
                <div class="title">
      <span class="fs-2 fw-bold p-3">'.$subtitle.'</span>
    </div>
    <hr>
    <div class="detail fs-5 p-3">
      <p>'.$des.'</p>
    </div>
    <div class="example">
      <b class="fs-4">Example : <b><br>
      <span class="fs-5 p-3 fw-bold"><pre>'. $ex .'</pre></span>
    </div>';

            }
        }
    } 
  }
  // <div class="output pt-3">
  //     <span class="fs-5 p-3 fw-bold">Output :</span><br>
  //     <img src="'.$output.'">
  //   </div>
    ?>
  </div>
  </div>
  </body>
  </html>










<!-- 
  <div class="container_layout">
    <div id="section" class="item">Lorem ipsum sum numquam fugit delectus. Iusto quaerat quo qui accusantium asperiores?
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Asperiores, quas aspernatur dolor temporibus sint nulla eius sequi cupiditate incidunt a odit. Dolor, reprehenderit! Officia repudiandae quidem, optio odio dolore eligendi dolor nesciunt praesentium.
      Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas iusto quod eveniet ea laudantium fugiat ex aliquid, reiciendis velit dolores possimus quo autem temporibus, quos ducimus, facilis corrupti eum beatae inventore voluptatum deserunt quibusdam magnam modi alias. Architecto quibusdam, ducimus voluptatum cumque nam rem aperiam debitis, magnam vitae nobis illum soluta expedita porro dolores nesciunt, nisi eaque aliquam nulla sint facere sed praesentium explicabo quasi. Ipsa officiis libero quos dolores, qui molestias dolore rem doloremque illo nam. Mollitia libero unde harum itaque temporibus alias deleniti reprehenderit neque vero delectus, ipsum animi ducimus. Quos temporibus officiis obcaecati atque, asperiores quibusdam aperiam quisquam dolores ipsum quo cupiditate corporis ab aut commodi vel, possimus rem excepturi, adipisci tempora sequi doloremque reiciendis eum? Quibusdam ratione eum corrupti officia nostrum distinctio dolore itaque, velit enim reiciendis dolores provident, at veniam tenetur magnam fuga ut vitae iusto ducimus totam? Velit inventore autem corporis quis vero facilis mollitia repudiandae reiciendis asperiores blanditiis. Odit, quaerat repellendus. Facere, quasi dicta vero maiores quis, repellat ut tempore aut excepturi id error mollitia quae porro eveniet distinctio facilis, debitis sunt quisquam. Minima rerum neque sed ab hic totam doloremque recusandae, at quis et repellendus quas nam, nesciunt odio fuga libero error eaque aperiam impedit, beatae maxime mollitia doloribus sit earum. Provident, vel tempora reprehenderit eius velit ipsa perferendis at numquam laborum animi rem non suscipit ea, incidunt nulla commodi amet facilis quasi officiis sunt! Impedit, rerum iste voluptatum fuga suscipit facere culpa, nisi tempora quo esse tempore dolore dolores natus consequuntur eius omnis molestias quod minima, distinctio architecto consequatur dolorem reiciendis incidunt! Assumenda, at? Expedita maiores aliquam, accusantium magni laboriosam blanditiis debitis at. Nemo molestiae provident modi sapiente! Deleniti at cumque optio soluta. Nostrum illum modi nihil ipsam quas quaerat ipsum accusamus eius et at eaque pariatur, inventore perferendis possimus a deleniti nulla, id debitis magni ut. Laudantium ab dolore est numquam dolorem accusantium totam, quas libero minus consectetur, sapiente porro labore laborum ut velit similique de
      Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellat hic exercitationem doloribus ipsam a perferendis amet nulla possimus illo cumque. Quod totam quas, libero perferendis optio aspernatur commodi illo quae beatae tenetur id. Quam praesentium aut dolorem quas repellendus dolorum dolores consequuntur itaque qui quis doloribus libero ipsam sequi asperiores aliquid ullam nam numquam, aspernatur, optio eveniet vero nihil? Iusto, dolorum magnam molestias quo ad eos ut inventore itaque dolores explicabo, deleniti est suscipit placeat dolore maiores facilis dicta a perspiciatis. Nihil magnam odit dicta ad laudantium, saepe dolore officiis placeat. Et iure soluta, aspernatur dolorem ratione ullam tenetur enim porro? Vero aliquam omnis tempore fuga eius? Quam perferendis nostrum illum, sequi libero magni ipsa ut adipisci maxime? Eaque quidem architecto quas similique totam voluptatibus explicabo placeat illo facere porro eius fugit, dolorem sequi commodi consectetur sit nihil ullam dicta, eligendi perspiciatis corporis. Animi quos labore obcaecati quas nulla porro dicta exercitationem voluptatibus cupiditate maiores voluptates ea consequuntur quae eius, explicabo odit quo nisi asperiores fuga est, rem ratione velit ullam eaque! Vitae deserunt omnis perferendis cum adipisci doloremque, debitis eaque alias laudantium quos dolore, eum, accusantium aperiam ad officia delectus minus quae maiores facere nisi? Obcaecati qui dolorum placeat aperiam cum quo maxime quam, illo impedit doloribus in debitis? Quibusdam, ducimus magnam amet earum maiores recusandae repellat quisquam doloremque veniam iure tempore autem, hic expedita rerum. Debitis eos eaque laboriosam nemo magni alias odit dolorem nulla ut vero accusantium nam eum assumenda maiores facilis repellat, porro veritatis recusandae distinctio quod vitae ipsa! Architecto, laborum iusto quia alias dolorem minima quae voluptatibus amet repellat in temporibus distinctio deserunt autem totam laudantium animi praesentium iure officia ipsum! Eos consequuntur dolores maiores porro modi architecto quos. Soluta cupiditate deleniti nobis iusto obcaecati itaque provident? Molestias saepe facere harum quas fuga eaque. Similique! lectus quidem natus? Sit hic rerum distinctio soluta alias quasi ea provident perferendis temporibus nihil ullam porro quas, commodi, harum repellat debitis ad! Natus error aut harum dignissimos hic rem, sapiente temporibus doloribus fugiat culpa nemo quisquam, at incidunt odio sunt ab aperiam vitae consequatur. Vitae qui rerum, obcaecati officia, assumenda eos asperiores animi repellendus molestias ea at! In sequi, tempore hic aliquid molestiae rerum animi! Animi voluptas, nam reprehenderit fuga id ipsum omnis facilis. Ducimus ratione iure minus exercitationem facere quidem laboriosam nesciunt obcaecati ipsum id voluptates quas deleniti laborum saepe velit quam fugiat odio, quo error sint, veniam nam. Aliquam repellat ad expedita perferendis eveniet quibusdam odit, aspernatur fuga ipsum explicabo ut ipsam fugit quia repudiandae consequuntur deserunt modi nesciunt aliquid officia? Laboriosam incidunt a voluptates vitae mollitia, porro quisquam eveniet quidem amet accusantium corporis maiores quos reprehenderit molestias asperiores id quia rerum voluptas neque nisi repellendus impedit fugiat dignissimos adipisci. Eos distinctio, libero quam ipsum exercitationem mollitia corporis a saepe consequatur sint? Natus ipsum aperiam doloremque, molestias eius incidunt vitae? Dignissimos, placeat!
      Lorem ipsum dolor
       
    </div>
    <div id="aside" class="item"> 

        <div class="content">

            <h3>View Query</h3>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <label for="" >Sort By Languages</label><br>
            <select>
                
                <option>select any Language</option>
                <option>C</option>
                <option>C++</option>
                <option>Java</option>
                <option>Python</option>
                <option>Javascript</option>
                <option>php</option>
                <option>Html</option>
                <option>css</option>
                <option>Linux</option>
                <option>Others</option>
                
            </select>
        </div>
        </div> -->
    <!-- <div id="footer" class="item">follow us contact details,,,  copyright &copy; Akshay Mayani</div> -->
