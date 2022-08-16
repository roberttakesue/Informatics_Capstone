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
		<table>
                        <tr>
                                <td>Ranking</td>
                                <td>userID</td>
                                <td> Emission Type</td>
                                <td> Emission Amount(lbs)</td>

                        </tr>
<?php

  $servername = "db.luddy.indiana.edu";
  $username = "i494f21_team10";
  $password = "my+sql=i494f21_team10";
  $dbname = "i494f21_team10";


    // Create con
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check con
    if($conn == false){
      die("Error: Could not connect. " . mysqli_connect_error());
    } 

    $sql =  mysqli_query($conn, "SELECT userID,messageboardTitle, messageboardContent,messageboardDate FROM messageboard");
$ranking = 1;
if(mysqli_num_rows($sql)) {
        while ($row = mysqli_fetch_array($sql)) {
                echo"<tr><td>{$ranking}</td>
                <td>{$row['userID']}</td>
                <td>{$row['messageboardTitle']}</td>
                <td>{$row['messageboardContent']}</td></tr>
                <td>{$row['messageboardDate']}</td></tr>";
                $ranking++;
        }
}


// 	$sql2 = "SELECT * FROM messageboard"
// 	
// 	if(mysqli_query($conn, $sql2)){
//       echo $sql2;
//     } else{
//       echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
//     }
//     // Close connection
//     mysqli_close($conn); 
?>
</table>
</body>


</html>
