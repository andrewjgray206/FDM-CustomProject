<?php
require 'manage.php';

if (isset($_POST["clubsearch"])) {
    $clubsearch = $_POST["clubsearch"];
}
else {
    echo '<p>Clubsearch is empty...';
    $clubsearch ="";
}

if ($clubsearch!=""){
    $query = "SELECT * FROM team_data WHERE Club='$clubsearch'";
    $result = mysqli_query($conn,$query);

    if (!$result){
        echo "<p>Something is wrong with",$query,"</p>";
    }

    if(mysqli_num_rows($result)>0){
        
        echo '<table><tr><th>Club</th><th>ID</th><th>Team_Name</th><th>Divison</th></tr>';
        while ($row = mysqli_fetch_assoc($result)){
            echo "<tr><td>".$row['Club']."</td><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Division']."</td></tr>";
        }
        echo '</table>';
        mysqli_free_result($result);
    }

    else {
        echo '<p>0 Results.</p>';
    }

}


?>