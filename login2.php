<?php

define('DB_SERVER', 'db.luddy.indiana.edu');
define('DB_USERNAME', 'i494f21_rtakesue');
define('DB_PASSWORD', 'my+sql=i494f21_rtakesue');
define('DB_NAME', 'i494f21_rtakesue');
 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

$sql= "SELECT * FROM signing WHERE username = '$username' AND password = '$password' ";
$result = mysqli_query($con,$sql);
$check = mysqli_fetch_array($result);
if(isset($check)){
echo 'success';
}else{
echo 'failure';
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>rtakesue itp-05</title>
</head>
<body>
        <h2>Sign In</h2>
        <form action= "apple.html" method="post">
            <div>
                <label>Username</label>
                <input type="text" name="username">
            </div>    
            <div>
                <label>Password</label>
                <input type="password" name="password">
            </div>
            <div>
                <input type="submit" value="Submit">
            </div>
        </form>
    </div>    
</body>
</html>