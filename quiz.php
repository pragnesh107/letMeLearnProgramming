<?php
include_once('navbar2.php');
include_once('./Js/questions.php');
if(isset($_SESSION['id']))
{
    
}
else{
    $hasuid = 0;
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>course management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="quiz.css">
    <link rel="stylesheet" href="sidebar.css">
    <script src="https://code.jquery.com/jquery-3.6.3.slim.min.js"
        integrity="sha256-ZwqZIVdD3iXNyGHbSYdsmWP//UBokj2FHAxKuSBKDSo=" crossorigin="anonymous"></script>
    <script src="script.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="./Js/jquery.scrollUp.min.js"></script>
    <script src="./Js/questions.php"></script>
</head>

<body>
    <div class="sidenav">
        <div class="side-image">
            <img src="./images/sidenav.jpg">
        </div>

        <!-- <h1>Pure CSS Accordion Menu</h1> -->
        <h3>Languages</h3>
        <div class="accordion">
            <div class="accordion-tab">
                <input id="toggle1" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle1">C</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-tab">
                <input id="toggle2" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle2">C++</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-tab">
                <input id="toggle3" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle3">Java</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>

            <div class="accordion-tab">
                <input id="toggle4" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle4">Php</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-tab">
                <input id="toggle5" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle5">Javascript</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-tab">
                <input id="toggle6" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle6">Jquery</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-tab">
                <input id="toggle7" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle7">Html</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-tab">
                <input id="toggle8" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle8">Css</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-tab">
                <input id="toggle9" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle9">Python</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>
            <div class="accordion-tab">
                <input id="toggle10" type="checkbox" class="accordion-toggle" name="toggle" />
                <label for="toggle10">Linux</label>
                <div class="accordion-content">
                    <ul>
                        <li><a>Quiz 1</a></li>
                        <li><a>Quiz 2</a></li>
                        <li><a>Quiz 3</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <div class="main">
<?php
  if(isset($hasuid))
  {
  echo '<div class="alert alert-danger m-2" role="alert">
  Please <a href="http://localhost/Programming_Blog/login.php" class="alert-link"> login </a> to start quiz!
  </div>';
  }
?>
        <div class="container">
            <h2 class="text-center">Quiz</h2>
        </div>
        <div class="box d-flex justify-content-center align-items-center flex-column overflow-hidden">
            <!-- Quiz Content -->
            <div class="start_btn"><button>Start Quiz</button></div>
            <!-- Info Box -->
            
        <?php
        if(isset($hasuid))
        {
           echo "";
        }
        else{
            echo '<div class="info_box">
                <div class="info-title"><span>Some Rules of this Quiz</span></div>
                <div class="info-list">
                    <div class="info">1. You will have only <span>15 seconds</span> per each question.</div>
                    <div class="info">2. Once you select your answer, it can not be undone.</div>
                    <div class="info">3. You can not select any option once time goes off.</div>
                    <div class="info">4. You can not exit from the Quiz while you are playing.</div>
                    <div class="info">5. You will get points on the basis of your correct answers.</div>
                </div>
                <div class="buttons">
                    <button class="quit">Exit Quiz</button>
                    <button class="restart">Continue</button>
                </div>
            </div>';
        }
        ?>
            <!-- Quiz Box -->
            <div class="quiz_box">
                <header>
                    <div class="title">Awesome Quiz Application</div>
                    <div class="timer">
                        <div class="time_left_txt">Time Left</div>
                        <div class="timer_sec">15</div>
                    </div>
                    <div class="time_line"></div>
                </header>
                <section class="sec1">
                    <div class="que_text">
                        <!-- Here I've inserted question from JavaScript -->
                    </div>
                    <div class="option_list">
                        <!-- Here I've inserted options from JavaScript -->
                    </div>
                </section>

                <!-- footer of Quiz Box -->
                <footer>
                    <div class="total_que">
                        <!-- Here I've inserted Question Count Number from JavaScript -->
                    </div>
                    <button class="next_btn">Next Que</button>
                </footer>
            </div>

            <!-- Result Box -->
            <div class="result_box">
                <div class="icon">
                    <i class="fas fa-crown"></i>
                </div>
                <div class="complete_text">You've completed the Quiz!</div>
                <div class="score_text">
                    <!-- Here I've inserted Score Result from JavaScript -->
                </div>
                <div class="buttons">
                    <button class="restart">Replay Quiz</button>
                    <button class="quit">Quit Quiz</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Inside this JavaScript file I've inserted Questions and Options only -->
    <!-- <script src="./Js/questions.js"></script> -->

    <!-- Inside this JavaScript file I've coded all Quiz Codes -->
    <script src="./Js/quiz.js"></script>
</body>

</html>