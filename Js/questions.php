
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
<?php include_once('config/config.php'); 


// $ques = "SELECT * FROM quiz_option WHERE `Question_Id` = $x INNER JOIN 
// `quiz_question`
// ON
// quiz_option.Question_Id=quiz_question.Question_Id";

echo  '<script>let questions = [';
for ($i=1; $i <=15; $i++) { 

$ques = "SELECT quiz_question.Question ,quiz_option.Question_Id, quiz_option.Answer , quiz_option.Options
FROM quiz_question,quiz_option 
WHERE quiz_question.Question_Id=quiz_option.Question_Id 
AND quiz_question.Question_Id = $i";

$Q_res = mysqli_query($conn ,$ques);

if (mysqli_num_rows($Q_res) >= 1) {
  while ($row = mysqli_fetch_assoc($Q_res)) {
    $id = $row['Question_Id'];
    $q= $row['Question'];
   $arr[] = $row['Options'];
   if($row['Answer'] == 1)
        $ans= $row['Options'];
  }

  // echo  '<script>let questions = [

  //   {
      echo  '{
    numb:'. $i.',
    question: "'.$q.'",
    answer: "'.$ans.'",
    options: [
      
      "'.$arr[0].'",
      "'.$arr[1].'",
      "'.$arr[2].'",
      "'.$arr[3].'"
    ]
    },';
   
}
$arr = [];
$ans = "";
}
echo '];</script>'; 
?>


  <!-- //  $arr = array();
  //   $a = 0;
  //  for ($i=1; $i <=1; $i++) { 
  //   $arr[$a] = $row['Options'];
  //  $a++;
  //  }


// echo $qu;
// echo $ans;
// echo $arr[0];
// echo $arr[1];
// echo $arr[2];
// echo $arr[3];


// $x++; -->





 <!-- <script>
let questions = [


    {
    numb: 2,
    question: "What does CSS stand for?",
    answer: "Cascading Style Sheet",
    options: [
      "Common Style Sheet",
      "Colorful Style Sheet",
      "Computer Style Sheet",
      "Cascading Style Sheet"
    ]
  },
    {
    numb: 3,
    question: "What does PHP stand for?",
    answer: "Hypertext Preprocessor",
    options: [
      "Hypertext Preprocessor",
      "Hypertext Programming",
      "Hypertext Preprogramming",
      "Hometext Preprocessor"
    ]
  },
    {
    numb: 4,
    question: "What does SQL stand for?",
    answer: "Structured Query Language",
    options: [
      "Stylish Question Language",
      "Stylesheet Query Language",
      "Statement Question Language",
      "Structured Query Language"
    ]
  },
    {
    numb: 5,
    question: "What does XML stand for?",
    answer: "eXtensible Markup Language",
    options: [
      "eXtensible Markup Language",
      "eXecutable Multiple Language",
      "eXTra Multi-Program Language",
      "eXamine Multiple Language"
    ]
  },
  
    {
    numb: 6,
    question: "Your Question is Here",
    answer: "Correct answer of the question is here",
    options: [
      "Option 1",
      "option 2",
      "option 3",
      "option 4"
    ]
  },

];  -->

</script> 
</body>
</html>