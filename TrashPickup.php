<!DOCTYPE html>
<html>
<body>

<h2>Trash Pickup Tracker</h2>

<p>Enter the amount of trash you have picked up in pounds below:</p>

<form action='TrashPickup.php' method="post"> 
<input type="number" id="trashPickup" name="trashAmount" placeholder="1.00" step="0.01" min="0" max="1000" required>

<p>Enter the location of the trash that you have picked up below:</p>

<label for="address">Address: </label>
<input type="text" id="address" name="trashLocation" required> <br> <br>

<input type="submit" value="submit">
</form>

<?php

  $servername = "db.luddy.indiana.edu";
  $username = "i494f21_team10";
  $password = "my+sql=i494f21_team10";
  $dbname = "i494f21_team10";


  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(isset($_POST['trashAmount'])){
      $trashAmount = $_POST['trashAmount'];
    }else{
      $trashAmount = 0;
    }
    if(isset($_POST['trashLocation'])){
      $trashLocation = $_POST['trashLocation'];
    }else{
      $trashLocation = "No location given";
    }

    // Create connection
    $conn = mysqli_connect($servername, $username, $password, $dbname);
  
    // Check connection
    if($conn == false){
      die("Error: Could not connect. " . mysqli_connect_error());
    } 
  
    // Attempted insert query execution
    $sql = "INSERT INTO trashPickup (`trashLocation`, `trashAmount`, `userID`) VALUES ('$trashLocation', '$trashAmount', 1)";

    if(mysqli_query($conn, $sql)){
      echo "Records inserted successfully.";
    } else{
      echo "ERROR: Was not able to execute $sql. " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
  }
?>

</body>
</html>
