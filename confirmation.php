<?php
include_once 'includes/tools.php';
$user = urldecode($_GET['u']);
$action = urldecode($_GET['a']);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>
    
    <meta http-equiv="refresh" content="2;url=index.php" />

    <link rel="stylesheet" href="css/style.css" media="screen" type="text/css"/>

    <link rel="shortcut icon" type="image/png" href="/images/favicon.png"/>
    <title><?php echo $teamname ?></title>
</head>
<body>

<div class="container">
    <h1 class="fade-in one"><?php echo $action == "in" ? "Hi!" : "See Ya!"?></h1>
    <div class="fade-in two">
        <h2><?php echo $action == "in" ? "You're <b>signed in</b>, ".ucwords($user)."!" : "Yor're <b>signed out</b>, ".ucwords($user)."!" ; ?></h2>
    </div>
    <button class="button fade-in four" onclick="window.location.href='index.php'">Not redirected yet?</button>

</body>

</html>
