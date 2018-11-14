<?php
require 'manage.php';

if (isset($_POST["displayplayers"])) 
{
    $displayplayers = $_POST["displayplayers"];
}
else 
{
    echo '<p>displayplayers is empty...';
    $displayplayers ="";
}

if ($displayplayers!="")
    {
        $query = "SELECT pld.ID AS Player_ID, concat(pld.First_Name, ' ', pld.Last_Name) AS Player_Name, td.Name AS Team_Name FROM player_data pld INNER JOIN team_data td ON pld.Team_ID= td.ID WHERE td.Name='$displayplayers'";
        $result = mysqli_query($conn,$query);

        if (!$result){
            echo "<p>Something is wrong with",$query,"</p>";
    }

    if(mysqli_num_rows($result)>0)
    {
        
        echo '<table><tr><th>Player_ID</th><th>Player_Name</th><th>Team_Name</th></tr>';

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['Player_ID']."</td><td>".$row['Player_Name']."</td><td>".$row['Team_Name']."</td><td>";
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