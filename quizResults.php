<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Quiz Results</title>
</head>

<body>

  <div id="page-wrap">

  <h1>Results</h1>

    <?php

      $answer1 = $_POST['question1-answers'];
      $answer2 = $_POST['question2-answers'];
      $answer3 = $_POST['question3-answers'];
      $answer4 = $_POST['question4-answers'];
      $answer5 = $_POST['question5-answers'];

      $totalCorrect = 0;

      if ($answer1 == "B") { $totalCorrect++; }
      if ($answer2 == "A") { $totalCorrect++; }
      if ($answer3 == "D") { $totalCorrect++; }
      if ($answer4 == "C") { $totalCorrect++; }
      if ($answer5 == "D") { $totalCorrect++; }

      echo "<div id='results'>$totalCorrect / 5 correct</div>";
      
    ?>

  </div>
</body>

</html>
