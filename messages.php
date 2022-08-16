<!DOCTYPE html>
<html>
<head>
<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta charset="utf-8">	
			<title>Message Board</title>	<link rel="stylesheet" type="text/css" href="https://cgi.luddy.indiana.edu/~team10/style.css">
</head>
<body>
<nav>  	
	<a href="https://cgi.luddy.indiana.edu/~team10/index.html""><span id="brand">ecoEVERYTHING</span></a>
			<ul>  		
			<li>
		</li>  		
			<li><a href="https://cgi.luddy.indiana.edu/~team10/events.php">EVENTS</a>
			</li>  		
			<li><a href="https://cgi.luddy.indiana.edu/~team10/Leaderboard.php">LEADERBOARDS</a></li> 
			<li><a href="https://cgi.luddy.indiana.edu/~team10/creategoal.php">GOALS</a></li> 
			<li><a href="https://cgi.luddy.indiana.edu/~team10/TrashPickup.php">TRASH PICKUP</a></li>
			<li><a href="https://cgi.luddy.indiana.edu/~team10/quizQuestions.php">QUIZ</a></li> 
			<li><a href="https://cgi.luddy.indiana.edu/~team10/websiteReview.html">REVIEW</a></li>  	
			<li> <div class="g-signin2" data-onsuccess="onSignIn"></div> </li>
			</ul>  
		</nav>
<form action='messages.php' method="post">
<h2>Create A message</h2>
<label for="titleContent"> Title </label>
<input type="text" id="title" name="title" required>
</br>
<label for="messageContent"> Message </label>
<input type="text" id="message" name="message" required>

<input type="submit" value="submit">


</form>

		<table>
                        <tr>
                                <td>temp</td>
                                <td>temp</td>
                                <td>temp</td>
                                <td>temp</td>

                        </tr>
<?php

  $servername = "db.luddy.indiana.edu";
  $username = "i494f21_team10";
  $password = "my+sql=i494f21_team10";
  $dbname = "i494f21_team10";
  
function time_function(){
        $army_time = date("H:i:sa");
        $normal_time = date("h:i:sa");
         $clock_time = date("H:i:Sa");
// will tell user the time along with environemntal fact

}

  if($_SERVER["REQUEST_METHOD"] == "POST"){
  time_function();
    if(isset($_POST['message'])){
      $message = $_POST['message'];
    }else{
      $message = "No message given";
    }
    if(isset($_POST['title'])){
      $message = $_POST['title'];
    }else{
      $message = "No title given";
    }
  }

  echo $message;

    // Create con
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check con
    if($conn == false){
      die("Error: Could not connect. " . mysqli_connect_error());
    } 

    $sql = "INSERT INTO messageboard (`messageboardTitle`,`messageboardContent`,`messageboardDate`,`userID`) VALUES ('$title','$message','$normal_time','1')"; 

    if(mysqli_query($conn, $sql)){
      echo "Records inserted successfully.";
    } else{
      echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
    }

    $sql2 =  mysqli_query($conn, "SELECT userID,messageboardTitle, messageboardContent,messageboardDate FROM messageboard WHERE LENGTH(messageboardContent) > 0 ");
$num = 1;
if(mysqli_num_rows($sql2)) {
        while ($row = mysqli_fetch_array($sql2)) {
                echo"<tr><td>{$num}</td>
                <td>{$row['userID']}</td>
                <td>{$row['messageboardTitle']}</td>
                <td>{$row['messageboardContent']}</td></tr>
                <td>{$row['messageboardDate']}</td></tr>";
                $num++;
        }
}
?>
</table>
</body>


</html>
