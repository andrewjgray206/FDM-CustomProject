<?php
require 'manage.php';

if (isset($_POST["countgames"])) 
{
    $countgames = $_POST["countgames"];

if (!isset($_POST["countgames"])) 
{
    echo '<p>countgames is empty...';
    $countgames ="";
}

   else if ($countgames!="")
    {
        $query = "SELECT td.name AS Team_Name, COUNT(case gs.Home_T when '$countgames' then 1 else null end) AS Home_Games, COUNT(case gs.Away_T when '$countgames' then 1 else null end) AS Away_Games FROM team_data td, game_stats gs WHERE td.Name='$countgames'";
        $result = mysqli_query($conn,$query);

        if (!$result){
            echo "<p>Something is wrong with",$query,"</p>";
    }

    if(mysqli_num_rows($result)>0)
    {
        
        echo '<table><tr><th>Team_Name</th><th>Home_Games</th><th>Away_Games</th></tr>';

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['Team_Name']."</td><td>".$row['Home_Games']."</td><td>".$row['Away_Games']."</td><td>";
        }
        
        echo '</table>';
        mysqli_free_result($result);
    }
}
    else 
    {
        echo '<p>0 Results.</p>';
    }
}
?>