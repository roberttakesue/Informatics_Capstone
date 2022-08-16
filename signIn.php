<?php session_start();
?>
<html>
	<head>
	  <link rel="stylesheet" type="text/css" href="https://cgi.luddy.indiana.edu/~team10/style.css">
          <meta name="google-signin-client_id" content="813520753419-lapus6k8rtuf3gttjfdamua7g5rh80f8.apps.googleusercontent.com">
          <script src="https://apis.google.com/js/platform.js" async defer></script>	
          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	  <meta charset="utf-8">	
          <title>Sign In</title>

	
	</head>
	<div class="g-signin2" data-onsuccess="onSignIn" data-redirecturi="https://cgi.luddy.indiana.edu/~rtakesue/home.php"></div>

	<script = type"text/javascript">
		function onSignIn(googleUser) {
		var profile = googleUser.getBasicProfile();
	if(profile){
			$.ajax({
					type: 'POST',
					url: 'login.php',
					data: {id:profile.getId(), name:profile.getName(), email:profile.getEmail()}
			}).done(function(data){
				console.log(data);
			window.location.href = 'home.php';
			});
			}
		}
	</script>	
</body>
</html>