<?php
require 'manage.php';

if (isset($_POST["divdisplay"])) 
{
    $divdisplay = $_POST["divdisplay"];
}
else 
{
    echo '<p>divdisplay is empty...';
    $divdisplay ="";
}

if ($divdisplay!="")
    {
        $query = "SELECT * FROM team_data WHERE Division='$divdisplay'";
        $result = mysqli_query($conn,$query);

        if (!$result){
            echo "<p>Something is wrong with",$query,"</p>";
    }

    if(mysqli_num_rows($result)>0)
    {
        
        echo '<table><tr><th>ID</th><th>Team_Name</th><th>Divison Name</th></tr>';

        while ($row = mysqli_fetch_assoc($result))
        {
            echo "<tr><td>".$row['ID']."</td><td>".$row['Name']."</td><td>".$row['Division']."</td><td>";
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