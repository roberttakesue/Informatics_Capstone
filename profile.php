<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">
<head>
<link rel="stylesheet" type="text/css" href="https://cgi.luddy.indiana.edu/~team10/style.css">
<meta name="google-signin-client_id" content="813520753419-lapus6k8rtuf3gttjfdamua7g5rh80f8.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
	
	<script>
		function onSignIn(googleUser) {
			var profile = googleUser.getBasicProfile()
		
			console.log(googleUser.getBasicProfile())
			
			var element = document.querySelector('#content')
				
			var image = document.createElement('img')
			image.setAttribute('src', profile.getImageUrl())
			element.append(image)
			
			var element = document.querySelector('#getEmail')
			element.innerText = profile.getEmail();
			
			var name = document.querySelector('#getName')
			name.innerText = profile.getGivenName();
			}
		
		function signOut() {
    var auth2 = gapi.auth2.getAuthInstance();
    auth2.signOut().then(function () {
      console.log('User signed out.');
    });
  }

	</script>
<style>
			.column {
				float: left;
				width: 50%;
				padding: 10px;
				height: 300px;
			}
			.row:after {
				content: "";
				display: table;
				clear: both;
			}
			input[type="date"] {
				position: absolute; right: 560px; top:350px;
			}
			 p {
                        padding: 15px;
                	}
			h4 {
			position:absolute; right: 250px; top:280px;
			}
			.button1 {
  background-color: rgb(67, 232, 107);
  color: white;
  padding: 14px 25px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
}

a:hover, a:active {
  background-color: rgb(67, 232, 107);
}
		</style>

</head>
<title>My Profile</title>
	<body>
<div class="topnav">
  <a href="https://cgi.luddy.indiana.edu/~team10/index.html">ecoEVERYTHING</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/emissionsCalculator.php">Emissions Calculator</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/TrashPickup.php">Trash Pickup</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/creategoal.php">Goals</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/quizQuestions.php">Quiz</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/Leaderboard.php">Leaderboards</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/messages.php">Message Board</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/events.php">Events</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/timeFact.html">Random Fact</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/recycleYN.php">Recycling Guide</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/repContact.php">State Represenative</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/websiteReview.html">Website Review</a>
  <a class="active"  href="https://cgi.luddy.indiana.edu/~team10/profile.php">Profile</a>
	<a href="https://cgi.luddy.indiana.edu/~team10/index.html" onclick="signOut();">Sign out</a>
   <div class="g-signin2" data-onsuccess="onSignIn"></div>
</div>
	<form action='profile.php' method='post' id='profileInfo'

		<div class="">
		</div>
		<h1> <div id="content"></div> Welcome, 
		<div id="getName"></div></h1>
		<div class = "row">
			<div class = "column">
		<span> Email: </span>
		<div id="getEmail"></div>
		<div><?php
    ?></div>
		</form>
<?php

  $servername = "db.luddy.indiana.edu";
  $username = "i494f21_team10";
  $password = "my+sql=i494f21_team10";
  $dbname = "i494f21_team10";
  $message = "";

    // Create con
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check con
    if($conn == false){
      die("Error: Could not connect. " . mysqli_connect_error());
    } 	

?>
		<form action = "profile.php" method = "post">
		<p> Re-Enter your email: </p>
		<input type="text" id="title" name="title" required>
    <br>
    <input type="submit" value="Update Stats">
    
		</form>
		<p id= "score"> your user ID: </p>
		<style>.score {
    display: inline-block;
}</style>
<?php
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['title'])){
      $title = $_POST['title'];
    }else{
      $title = "No message given";
    }
    $sql2 =  mysqli_query($conn, "SELECT user.userID, trashPickup.trashLocation,trashPickup.trashAmount,user.userEmail FROM trashPickup JOIN user ON trashPickup.userID = user.userID WHERE
    user.userEmail = '$title'");
	$num = 1;
	$getuserID = mysqli_query($conn,"SELECT userID FROM user WHERE userEmail = '$title'");
	}
	if(mysqli_num_rows($getuserID)) {
        while ($row = mysqli_fetch_array($getuserID)) {
            echo"{$row['userID']}";
            }}
	?>
</div>
<div class = "column">
		<span> My Trash Pickup </span>
		<a href="https://cgi.luddy.indiana.edu/~team10/TrashPickup.php" class="button1">Record Pickup</a>

		<table>
                        <tr>
                                <td>Location</td>
                                <td>Amount</td>

                        </tr>
<?php
if(mysqli_num_rows($sql2)) {
        while ($row = mysqli_fetch_array($sql2)) {
                echo"
                <tr><td>{$row['trashLocation']}</td>
                <td>{$row['trashAmount']}</td></tr>";
                $num++;
        }
}
?>
</table>
</div>
<div class="column">
		<span> My Goals</span>

		<table>
                        <tr>
                                <td>Name</td>
                                <td>Type</td>

                        </tr>
<?php
    $sql4 =  mysqli_query($conn, "SELECT user.userID, goals.goalType,goals.goalName,user.userEmail FROM goals JOIN user ON goals.userID = user.userID WHERE
    user.userEmail = '$title'");
	$num = 1;
if(mysqli_num_rows($sql4)) {
        while ($row = mysqli_fetch_array($sql4)) {
                echo"
                <tr><td>{$row['goalName']}</td>
                <td>{$row['goalType']}</td></tr>";
                $num++;
        }
}
?>
<a href="https://cgi.luddy.indiana.edu/~team10/creategoal.php" class="button1">Create A Goal</a></div>
</div>
</div>
	</body>

</html>