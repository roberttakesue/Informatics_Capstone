<html>
        <head>
                <title> EcoEverything Leaderboard </title>
        </head>

        <body>
                <h2> Emissions Leaderboard Results</h2>
        <p> What leaderboard would you like to see:</p><select name="filter" onchange="location = this.value;">
<! dropdwon that allows user to filter rankings in various areas>
     <option value="Leaderboard_goal.php">Goals</option>
         <option value="Leaderboard_quiz.php">Quiz</option>
     <option value="Leaderboard.php">TrashPickup</option>
     <option value="Leaderboard_emissionscalc.php">Ecological Footprint</option>
    </select>
<!table with appropriate columns >
                <table>
                        <tr>
                                <td>Ranking</td>
                                <td>userID</td>
                                <td> Emission Type</td>
                                </td> Emission Amount(lbs)</td>

                        </tr>
<?php
//establish connection
        $servername = "db.luddy.indiana.edu";
        $username = "i494f21_team10";
        $password = "my+sql=i494f21_team10";
        $dbname = "i494f21_team10";

$conn= mysqli_connect($servername, $username, $password, $dbname);
//select statement that pulls user inputted data from database
$result= mysqli_query($conn, "SELECT userID,emissionsType,emissionsAmt FROM emissions ORDER BY emissionsAmt ASC");

$ranking= 1;
//puts input from database in table
if(mysqli_num_rows($result)) {
        while ($row = mysqli_fetch_array($result)) {
                echo"<tr><td>{$ranking}</td>
                <td>{$row['userID']}</td>
                <td>{$row['emissionsType']}</td>
                <td>{$row['emissionsAmt']}</td></tr>";
                $ranking++;
        }
}
 </table>
        </body>
</html>
