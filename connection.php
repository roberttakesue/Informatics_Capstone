<?php

define('DB_SERVER', 'db.luddy.indiana.edu');
define('DB_USERNAME', 'i494f21_team10');
define('DB_PASSWORD', 'my+sql=i494f21_team10');
define('DB_DATABASE', 'i494f21_team10');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_DATABASE);

if(link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}

?>