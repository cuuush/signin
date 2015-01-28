<?php
session_start();
include 'includes/tools.php';
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
<div id="container" class="container fade-in one">

    <div class="fade-in two">
        <h1><?php echo $teamname ?> Sign In</h1>
    </div>

    <div class="fade-in three">
        <h2>Please sign in below.</h2>
    </div>

    <?php
    if ($_SESSION['loginerror'] == "alreadysignedin")
        echo("<h2 class=\"fade-in three\" style=\"color: red;\">You are already signed in</h2>");
    if ($_SESSION['loginerror'] == "alreadysignedout")
        echo("<h2 class=\"fade-in three\" style=\"color: red;\">You are already signed out</h2>");
    $_SESSION['loginerror'] = null;
    ?>
    
    <form name="input" id="form" action="handle.php" method="post">
        <input class="fade-in four" type="text" autocomplete="off" placeholder="ID" name="id" autofocus>

        <br>
        <input class="button fade-in five" id="submit" type="submit" value="Log In" name="login">
        <input class="button fade-in six" id="submit" type="submit" value="Log Out" name="logout">


</form>
        <button class="button fade-in seven" onclick="window.location.href='list.php'">Who is online?</button>
        <button class="button fade-in eight" onclick="window.location.href='lostid.php'">Forgot your ID?</button>
        <br>
        <h3 class="fade-in ten" style="color: #C7C7C7">By Chris</h3>
</div>

</body>
</html>
