<?php  
include_once('config/config.php');
include_once('navbar2.php');
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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="project.css">
    <link rel="stylesheet" href="Query.css">
    <!-- <link rel="stylesheet" href="main.css"> -->
    <link rel="stylesheet" href="sidebar.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/devicons/devicon@v2.15.1/devicon.min.css">
    <!-- <link rel="stylesheet" href="Query_ans.css"> -->
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="./Js/jquery.scrollUp.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <title>Project page for ..</title>
</head>

<body>
    <div class="sidenav">
        <div class="side-image">
            <img src="./images/sidenav.jpg">
        </div>

        <!-- <h1>Pure CSS Accordion Menu</h1> -->
        <h3>Projects</h3>
        <h5>Sort by Languages</h5>
        <div class="dropdown">
            <input type="text" class="textBox" placeholder="Dropdown Menu" readonly>
            <div class="option">
                <div onclick="show('C')">
                    <i class="devicon-c-line-wordmark"> C</i>
                </div>

                <div onclick="show('C++')">
                    <i class="devicon-cplusplus-line-wordmark">
                        C++</i>
                </div>

                <div onclick="show('Html')">
                    <i class="devicon-html5-plain-wordmark"> html</i>
                </div>


                <div onclick="show('css')">
                    <i class="devicon-css3-plain-wordmark"> css</i>
                </div>



                <div onclick="show('Javascript')">
                    <i class="devicon-javascript-plain">
                        Javascript</i>

                </div>

                <div onclick="show('Java')">
                    <i class="devicon-java-plain-wordmark"> Java</i>
                </div>


                <div onclick="show('php')">
                    <i class="devicon-php-plain"> php</i>
                </div>

                <div onclick="show('python')">
                    <i class="devicon-python-plain-wordmark">
                        python</i>
                </div>

                <div onclick="show('Linux')">
                    <i class="devicon-linux-plain"> Linux</i>
                </div>
            </div>
        </div>



    </div>
    <div class="main ">
        <div class="container">
            <h2 class="text-center" id="protitle"><b>All Projects</b></h2>
<?php
if(isset($_GET['notpreusr']))
{
echo '<div class="alert alert-danger m-2" role="alert">
Try <a href="http://localhost/Programming_Blog/login.php" class="alert-link">premium</a> version for download projects!
</div>';
}
?>
        </div>
        <div class="project-card d-flex flex-wrap justify-content-center align-items-center" id="box">
<?php
$q = "SELECT * from project";
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
            echo '</button>
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
?>
    </div>
        <footer>
            <div class="footer-content">
                <h4>Programming Blog</h4>
                <p>Learn more about website desingner and get project in all languages</p>
                <p>copyright &copy; 2022 programming blog</p>
                <ul class="socials">
                    <li><a href="#"><i class="fa fa-facebook"> </i>
                        </a></li>
                    <li><a href="#"><i class="fa fa-twitter"> </i>
                        </a></li>
                    <li><a href="#"><i class="fa fa-google-plus"> </i>
                        </a></li>
                    <li><a href="#"><i class="fa fa-youtube"> </i>
                        </a></li>
                    <li><a href="#"><i class="fa fa-linkedin-square">
                            </i> </a></li>
                </ul>
            </div>
        </footer>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3"
        crossorigin="anonymous"></script>
    <script>
        function show(anything) {
            document.querySelector('.textBox').value = anything;
            var language = anything;

            // var lan = $(this).val();
            if (language == "") {
                $("#box").html("");
            } else {
                $("#protitle").html("<b>" + language + " Projects </b>");
                $.ajax({
                    url: "load_project.php",
                    type: "POST",
                    data: {
                        language_name: language
                    },
                    success: function (data) {
                        $("#box").html(data);
                    }
                })
            }
        }

        let dropdown = document.querySelector('.dropdown');
        dropdown.onclick = function () {
            dropdown.classList.toggle('active');
        }

    // load data of languages 
    </script>
</body>
</html>

<!-- <div id="container">

                <div class="product-details">

                    <h1>School Management</h1>
                    <span class="hint-star star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </span>

                    <p class="information">The School Billing System is the best C programming project which is a
                        console-based project which is designed not using graphics. This is the best idea to take this
                        project as a submission during the first year of college which will get affected on your marks.
                    </p>



                    <div class="control">

                        <button class="btn2">
                            <span class="price">₹0</span>
                            <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="buy">Download</span>
                        </button>

                    </div>

                </div>

                <div class="product-image">

                    <img src="./images/project1.jpg" alt="" style="object-fit: cover;">
                    <div class="info">
                        <h2> Description</h2>
                        <ul class="d-flex flex-nowrap flex-column">
                            <li><strong>Height : </strong>5 Ft </li>
                            <li><strong>Shade : </strong>Olive green
                            </li>
                            <li><strong>Decoration: </strong>balls and
                                bells</li>
                            <li><strong>Material:
                                </strong>Eco-Friendly
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div id="container">

                <div class="product-details">

                    <h1>Calculator</h1>
                    <span class="hint-star star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </span>

                    <p class="information">This program takes an arithmetic operator +, -, *, / and two operands from
                        the user. Then, it performs the calculation on the two operands depending upon the operator
                        entered by the user.</p>



                    <div class="control">

                        <button class="btn2">
                            <span class="price">₹0</span>
                            <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="buy">Download</span>
                        </button>

                    </div>

                </div>

                <div class="product-image">

                    <img src="./images/project1.jpg" alt="" style="object-fit: cover;">
                    <div class="info">
                        <h2> Description</h2>
                        <ul class="d-flex flex-nowrap flex-column">
                            <li><strong>Height : </strong>5 Ft </li>
                            <li><strong>Shade : </strong>Olive green
                            </li>
                            <li><strong>Decoration: </strong>balls and
                                bells</li>
                            <li><strong>Material:
                                </strong>Eco-Friendly
                            </li>

                        </ul>
                    </div>
                </div>

            </div>
            <div id="container">

                <div class="product-details">

                    <h1>Library Management</h1>
                    <span class="hint-star star">
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star" aria-hidden="true"></i>
                        <i class="fa fa-star-o" aria-hidden="true"></i>
                    </span>

                    <p class="information">The Library Management System is a type of console-based application without
                        graphics which is developed using c language. The compiler used to make project is code:: Blocks
                        using GCC compiler.</p>



                    <div class="control">

                        <button class="btn2">
                            <span class="price">₹0</span>
                            <span class="shopping-cart"><i class="fa fa-shopping-cart" aria-hidden="true"></i></span>
                            <span class="buy">Download</span>
                        </button>

                    </div>

                </div>

                <div class="product-image">

                    <img src="./images/project1.jpg" alt="" style="object-fit: cover;">
                    <div class="info">
                        <h2> Description</h2>
                        <ul class="d-flex flex-nowrap flex-column">
                            <li><strong>Height : </strong>5 Ft </li>
                            <li><strong>Shade : </strong>Olive green
                            </li>
                            <li><strong>Decoration: </strong>balls and
                                bells</li>
                            <li><strong>Material:
                                </strong>Eco-Friendly
                            </li>

                        </ul>
                    </div>
                </div>
            </div> -->