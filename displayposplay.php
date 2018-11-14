<?php
require 'manage.php';

if (isset($_POST["displayposplay"])) 
{
    $displayposplay = $_POST["displayposplay"];
}


if ($displayposplay!="")
    {
        $query = "SELECT pd.Pos_Name AS Position_Name, concat(pld.First_Name, ' ', pld.Last_Name) AS Player_Name, pd.Game_ID AS Game_ID, concat(gs.Home_T,' vs ',gs.Away_T) AS Game FROM position_data pd INNER JOIN player_data pld ON pd.Player_ID=pld.ID INNER JOIN game_stats gs ON pd.Game_ID = gs.Game_ID WHERE pd.Pos_Name='$displayposplay'";
        $result = mysqli_query($conn,$query);

        if (!$result){
            echo "<p>Something is wrong with",$query,"</p>";
    }

    if(mysqli_num_rows($result)>0)
    {
        
        echo '<table><tr><th>Position Name</th><th>Player Name</th><th>Game ID</th><th>Teams</th></tr>';

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['Position_Name']."</td><td>".$row['Player_Name']."</td><td>".$row['Game_ID']."</td><td>".$row['Game']."</td><tr>";
        }
        
        echo '</table>';
        mysqli_free_result($result);
    }

    else 
    {
        echo '<p>0 Results.</p>';
    }
}
?>