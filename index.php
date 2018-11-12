<!DOCTYPE html>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8" />
<meta name="description" content="Fundamentals of Data Management" />
<meta name="keywords" content="PHP, MySQL" />
<meta name="author" content="Andrew Gray" />
<link href="styles/style.css" rel="stylesheet" />
<title>Database Management Login</title>
</head>


<body>
<h1> DATABASE MANAGEMENT LOGIN </h1>
<form method="post" action="index.php">

<p><label for="username" >Username</label>
			<input type="text" name="username" id="username"/></p>
            <p><label for="password" >Password</label>
			<input type="password" name="password" id="password"/></p>
<input type="submit" value="Login"/>

</form>


<?php

if (isset($_POST["username"])) {
    $username = $_POST["username"];
    }
else { $username = "";}
if (isset($_POST["password"])) {
    $password = $_POST["password"];
    }
else { $password = "";}

if (($username=="admin") && ($password=="password")) {
    header('location:manage.php');
    exit();
}
else if (($username!="admin") || ($password!= "password"))  {
    echo "<p>The Username or Password is incorrect, try again.</p>";
}
?>

