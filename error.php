<?php
session_start(); //open up a session with the user
include 'includes/tools.php';
$error = $_COOKIE['fancydie'];
if($error == null)
    $error = "This page didn't recieve an error to display. Do you have cookies disabled?"; //errorception
setcookie("fancydie", "", time() - 3600); //delete the cookie
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css"/>

    <link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
    <title><?php echo $teamname ?></title>
</head>
<body>

<div class="container">
    <h1 class="fade-in one"><?php echo $errorheader ?></h1>

    <div class="errorbox fade-in two">
        <h2><?php echo $error; ?></h2>
    </div>
    <h2 class="fade-in three">If you need help right now either find chris (me!) or call 609-533-1214</h2>
    <button class="button fade-in four" onclick="window.location.href='index.php'">Back</button>

</body>

</html>
