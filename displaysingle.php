<?php 
 require 'manage.php';

 if (isset($_POST["table"])) {
    $table = $_POST["table"];
}
else { echo '<p>table is empty</p>';
    $table = "";}
 
 if ($table!=""){
            $query = "SELECT * FROM $table";
            $result = mysqli_query($conn,$query);
            if (!$result){
                echo "<p>Something is wrong with ",$query, "</p>";
                //exit();
            }
             if ($table=="league_data") {
                if(mysqli_num_rows($result)> 0){
                    echo '<table><tr><th>LeagueName</th><th>Area</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['League_Name']."</td><td>".$row['Area']."</td></tr>";
                    }
                    echo '</table>';
                    mysqli_free_result($result);
                }
                else {

                    echo '<p>0 Results.</p>';
                }
            }
            if ($table == "division_data" ){
                if (mysqli_num_rows($result) > 0){
                    echo '<table><tr><th>Division_Name</th><th>League_Name</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['Div_Name']."</td><td>".$row['League_Name']."</td></tr>";
                    }
                    echo '</table>';
                    mysqli_free_result($result);
                }
                else {
                    echo "<p>",$query,"</p>";
                    echo '<p>divison_data is empty.</p>';
                }
            }
            if ($table == "team_data"){
                if (mysqli_num_rows($result)>0){
                    echo '<table><tr><th><ID</th><th>Team Name</th><th>Club Name</th><th>Divison</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Club']."</td><td>".$row['Division']."</th></tr>";
                    }
                    echo '</table>';
                    mysqli_free_result($result);
                }
                else {
                    echo "<p>",$query,"</p>";
                    echo '<p>team_data is empty.</p>';
                }
            }
            if ($table == "club_data"){
                if (mysqli_num_rows($result)>0){
                    echo '<table><tr><th>ID</th><th>Name</th><th>Town</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Town']."</td><tr>";
                    }
                    echo '</table>';
                    mysqli_free_result($result);
                }
                else {
                    echo "<p>",$query,"</p>";
                    echo '<p>club_data is empty.</p>';
                }
            }
            if ($table == "game_stats"){
                if (mysqli_num_rows($result)>0){
                    echo '<table><tr><th>Game ID</th><th>Home Team</th><th>Away team</th><th>Score (Home-Away)</th><tr>';
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['Game_ID']."</td></td>".$row['Home_T']."</td><td>".$row['Away_T']."</td><td>".$row['Score (Home-Away)']."</td><tr>";
                    }
                    echo '</table>';
                    mysqli_free_result($result);
                }
                    else {
                        echo "<p>",$query,"</p>";
                        echo '<p>game_stats is empty.</p>';
                    }
                
            }
            if ($table == "position_data"){
                if (mysqli_num_rows($result)>0){
                    echo '<table><tr><th>Entry ID</th><th>Position Name</th><th>Player ID</th><th>Game ID</th></tr>';
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['Entry_ID']."</td><td>".$row['Pos_Name']."</td><td>".$row['Player_ID']."</td><td>".$row['Game_ID']."</td><tr>";
                    }
                     echo '</table>';
                     mysqli_free_result($result);
                }
                else {
                    echo "<p>",$query,"</p>";
                    echo '<p>position_data is empty.</p>';
                }
            }
            if ($table == "player_data"){
                if (mysqli_num_rows($result)>0){
                    echo '<table><tr><th>Player ID</th><th>First Name</th><th>Last Name</th><th>Team ID</th><tr>';
                    while ($row = mysqli_fetch_assoc($result)){
                        echo "<tr><td>".$row['ID']."</td><td>".$row['First_Name']."</td><td>".$row['Last_Name']."</td><td>".$row['Team_ID']."</td></tr>";
                    }
                    echo '</table>';
                    mysqli_free_result($result);
                }
                else {
                    echo "<p>",$query,"</p>";
                    echo '<p>player_data is empty.</p>';
                }
            }

            mysqli_close($conn);
        }

?>