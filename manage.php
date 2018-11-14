<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Fundamentals of Data Management, D project" />
<meta name="keywords" content="PHP, MySQL" />
<meta name="author" content="Andrew Gray" />
<link href="style.css" rel="stylesheet" />
<title>Basketball DB Management</title>
</head>
<body>
<h1><a href="manage.php">Basketball DB - Data Search</a></h1>
    <form method="post" action="manage.php">    
        <fieldset>
            <legend>Database Search</legend>
                <p><label>Choose a Query option.</label></p> 
                <p><input type="radio" value="displaysingle" name="management" id="displaysingle" required="required"/>Display a table. </p>
                <p><input type="radio" value="clubdata" name="management" id="clubdata" /   >Display all Teams in a specified club. </p>
                <p><input type="radio" value="displaydiv" name="management" id="displaydiv"/>Display all teams in a division. </p>
                <p><input type="radio" value="displayposplay" name="management" id="displayposplay"/>Display players who played in a defined position. </p>
                <p><input type="radio" value="displayplayers" name="management" id="displayplayers"/>Display players in a searched team.</p>
               <p><input type="radio" value="countgames" name="management" id="countgames"/>Count Home and Away games for a team (or all teams). </p>
               <!-----  <p><input type="radio" value="xxxxxxxxxxxxxxx" name="management" id="xxxxxxxxxxxx"/></p>
                <p><input type="radio" value="xxxxxxxxxxxxxxx" name="management" id="xxxxxxxxxxxx"/>Display all games for a team. </p>  ----- THESE were going to be more options if i had time.
            --> 
        </fieldset>
            <p><input type="submit" value ="Enter"/></p>
        </form>
<?php

    $sql_table="";

    if (isset($_POST["management"])) 
    {
        $management = $_POST["management"];
    }
    else { $management = "";}

    require ("settings.php");

    $conn = @mysqli_connect($host,$user,$pwd,$sql_db);

    if (!$conn)
    {
        echo "<p>Database Connection failure.</p>";
    }

    // What happens for each query.

    if ($management == "displaysingle") 
    {
        echo '<form method="post" action="displaysingle.php">';
        echo '<p><label for="table">Choose A table to display </label>';
        echo '<select name="table" id="table">';
        echo '<option value="none">Please Select</option>';
        echo '<option value="league_data">League Data</option>';
        echo '<option value="division_data">Division Data</option>';
        echo '<option value="team_data">Team Data</option>';
        echo '<option value="club_data">Club Data</option>';
        echo '<option value="game_stats">Game Stats</option>';
        echo '<option value="position_data">Position Data</option>';
        echo '<option value="player_data">Player Data</option></select></p>';
        echo '<p><input type="submit" value="ShowMe!"/></form></p>';

        if (isset($_POST["table"])) 
        {
            $table = $_POST["table"];
        }
    }

    if ($management == "clubdata")
    {
        echo '<form method="post" action="clubsearch.php">';
        echo '<p><label for ="clubnsearch">Enter Club Name </label>';
        echo '<input type="text" name="clubsearch" id ="clubsearch"/></p>';
        echo '<p><input type="submit" value="ShowMe!"/></form></p>';

        if (isset($_POST["clubsearch"])) 
        {
            $clubsearch = $_POST["clubsearch"];
        }
    }

    if ($management == "displaydiv")
    {
        echo '<form method="post" action="divdisplay.php">';
        echo '<p><label for ="divdisplay">Enter Divison eg (U17s, Seniors) </label>';
        echo '<input type="text" name="divdisplay" id ="divdisplay"/></p>';
        echo '<p><input type="submit" value="ShowMe!"/></form></p>';

        if (isset($_POST["divdisplay"])) 
        {
            $clubsearch = $_POST["divdisplay"];
        }   
    }

    if ($management == "countgames")
    {
        echo '<form method="post" action="countgames.php">';
        echo '<p><label for ="countgames">What Team would you like to see a game count for? </label>';
        echo '<input type="text" name="countgames" id ="countgames"/></p>';
        echo '<p><input type="submit" value="ShowMe!"/></form></p>';
    }

    if ($management =="displayplayers") //for displaying players via a searched team
    {
        echo '<form method="post" action="displayplayers.php">';
        echo '<p><label for ="displayplayers">What Team would you like to see players for? </label>';
        echo '<input type="text" name="displayplayers" id ="displayplayers"/></p>';
        echo '<p><input type="submit" value="ShowMe!"/></form></p>';
    }

    if ($management=="displayposplay") // for displaying players via position.
    {
        echo '<form method="post" action="displayposplay.php">';
        echo '<p><label for="displayposplay">Choose A table to display </label>';
        echo '<select name="displayposplay" id="table">';
        echo '<option value="none">Please Select</option>';
        echo '<option value="SF">Small Forward</option>';
        echo '<option value="PG">Point Guard</option>';
        echo '<option value="SG">Shooting Guard</option>';
        echo '<option value="PF">Power Forward</option>';
        echo '<option value="C">Centre</option></select></p>';
        echo '<p><input type="submit" value="ShowMe!"/></form></p>';
    }
?>

