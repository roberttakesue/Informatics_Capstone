<!DOCTYPE html>
<html>
<body>
<title>Create a Goal </title>
<h1>Welcome to the goals page of EcoEverything!</h1>
<!php file to store user input>
<form action='creategoal.php' method="post">
<h2>Step 1: Give your Goal a Name</h2>

 <!user inputs goal name here, must be filled out>
Goal Name: <input type="text" id="goalName"  name="goalName" required>

<h2> Step 2: Next, Describe the time frame  goal below</h2>
<!provides dropdown of those options for type of goal>
Goal Type:
<select id="goalType"  name="goalType">
<option value="Daily">Daily</option>
<option value= "Weekly">Weekly</option>
<option value= "Monthly">Monthly</option>
<option value= "Yearly"> Yearly</option>
</select>
<br>

<!user enters date of which the goal will be complete>
<h2>Step 3: Then, what is the wanted completion date  of  the goal?</h2>
Goal Completion Date(YYYY-MM-DD):
<input type="text" id="goalCompletion"  name="goalCompletion" min="1000-01-01" max="3000-12-31">
<br>
<br>
<input type="submit" value="Create Goal">
</form>

<?php

$servername = "db.luddy.indiana.edu";
$username = "i494f21_team10";
$password = "my+sql=i494f21_team10";
$dbname = "i494f21_team10";

if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(isset($_POST['goalName'])){
      $goalName = $_POST['goalName'];
    }else{
      $goalName = "goal1";
}
 if(isset($_POST['goalType'])){
      $goalType = $_POST['goalType'];
    }else{
      $goalType = "Monthly";
}
 if(isset($_POST['goalCompletion'])){
      $goalCompletion = $_POST['goalCompletion'];
    }else{
      $goalCompletion = "2022-03-27";
        echo $goalCompletion;
        }
// Create connection
 $conn = mysqli_connect($servername, $username, $password, $dbname);
    // Check connection
    if($conn == false){
      die("Error: Could not connect. " . mysqli_connect_error());
    }
    // Attempted insert query execution
        echo $goalName.$goalType.$goalCompletion;
        $sql = "INSERT INTO goals (goalName,goalType,goalComplete ,userID) VALUES ('".$goalName."','".$goalType."','".$goalCompletion."',20);";
        if($conn->query($sql)=== TRUE){
        echo "Records inserted successfully.";
        }
        else{
echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
        }

    // Close connection
    mysqli_close($conn);
  }
?>
</body>
</html>

