<!DOCTYPE html>
<html>
<head>
<meta name="google-signin-client_id" content="813520753419-lapus6k8rtuf3gttjfdamua7g5rh80f8.apps.googleusercontent.com">
<script src="https://apis.google.com/js/platform.js" async defer></script>
		<meta charset="utf-8">	
			<title>Message Board</title>	<link rel="stylesheet" type="text/css" href="https://cgi.luddy.indiana.edu/~team10/style.css">
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
		</style>
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
</head>
<body>
<div class="topnav">
  <a class="active" href="https://cgi.luddy.indiana.edu/~team10/index.html">ecoEVERYTHING</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/emissionsCalculator.php">Emissions Calculator</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/TrashPickup.php">Trash Pickup</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/creategoal.php">Goals</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/quizQuestions.php">Quiz</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/Leaderboard.php">Leaderboards</a>
  <a class="active"  href="https://cgi.luddy.indiana.edu/~team10/messages.php">Message Board</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/events.php">Events</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/timeFact.html">Random Fact</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/recycleYN.php">Recycling Guide</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/repContact.php">State Represenative</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/websiteReview.html">Website Review</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/profile.php">Profile</a>
  <a href="https://cgi.luddy.indiana.edu/~team10/index.html" onclick="signOut();">Sign out</a>
   <div class="g-signin2" data-onsuccess="onSignIn"></div>
</div>
  
<form action='messages.php' method="post">
<p>Hello, </p>
<div id="getName"></div>
<p>Here you can send messages within the community. </p>
<div class = "row">
	<div class = "column">
<label for="titleContent"> Title </label>
<input type="text" id="title" name="title" required>
<br>
<p> Enter your message </p>
<label for="messageContent"></label>
  <textarea id="message" name="message" rows="5" cols="50">
    </textarea>
<br>
<input type="submit" value="submit">


</form>
	</div>
		<table>
                        <tr>	
                                <td>NAME</td>
                                <td>SUBJECT</td>
                                <td>MESSAGE</td>

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
      $title = $_POST['title'];
    }else{
      $title = "No title given";
    }
  }

    // Create con
    $conn = mysqli_connect($servername, $username, $password, $dbname);

    // Check con
    if($conn == false){
      die("Error: Could not connect. " . mysqli_connect_error());
    } 

    $sql = "INSERT INTO messageboard (`messageboardTitle`,`messageboardContent`,`messageboardDate`,`userID`) VALUES ('$title','$message','2022-10-30 00:00:00','1')"; 

    if(mysqli_query($conn, $sql)){
      echo "";
    } else{
      echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
    }

    $sql2 =  mysqli_query($conn, "SELECT userName, messageboardTitle, messageboardContent FROM messageboard, user WHERE LENGTH(messageboardContent) > 0 AND user.userID = messageboard.userID");
$num = 1;
if(mysqli_num_rows($sql2)) {
        while ($row = mysqli_fetch_array($sql2)) {
                echo"
                <tr>
                <td>{$row['userName']}</td>
                <td>{$row['messageboardTitle']}</td>
                <td>{$row['messageboardContent']}</td></tr>";
        }
}
?>
</table>
</div>

<div class="footer" style="font-size:8px">
  <p>INFORMATICS CAPSTONE '21-'22</p>
  <div class="row">
    <div class="column2" style="font-size:6px;">
      <p>Faculty Instructors:</p>
      <p>Logan Paul</p>
      <p>Alexis Peirce Caudell</p>
      <p>Simon Lee</p>
    </div>
    <div class="column2" style="font-size:6px;">
      <p>Associate Instructor: Sravya Garaga</p>
    </div>
    <div class="column2" style="font-size:6px;">
      <p>TEAM 10:</p>
      <p>Joey Kislowski</p>
      <p>Briggs Stoner</p>
    </div>
    <div class="column2" style="font-size:6px;">
      <p>Sam Sutton</p>
      <p>Robert Takesue</p>
    </div>
  </div>
</div>
</body>

</html>
