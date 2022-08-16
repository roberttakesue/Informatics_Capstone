 <?php
$con = mysqli_connect("db.luddy.indiana.edu","i494f21_team10","my+sql=i494f21_team10","i494f21_team10");

// Check connection
if (mysqli_connect_errno())

   { die("Failed to connect to MySQL: " . mysqli_connect_error());}

else

   { echo "Established Database Connection";}


//variables set for sql input

$sangname = mysqli_real_escape_string($con,$_POST['goalName']);
$sangtype = mysqli_real_escape_string($con,$_POST['goalType']);
$sangcomplete = mysqli_real_escape_string($con,$_POST['goalComplete']);

//insert query to add inputted data into goal table database
$sql  = "INSERT INTO goals(goalName, goalType, goalComplete) VALUES ('$sangname', '$sangtype', '$sangcomplete')";


//looks for errors
if(mysqli_query($con,$sql)) {
        echo "1 record added";
} else {die("SQL Error:" .mysqli_error($con));}
mysqli_close($con);
?>
