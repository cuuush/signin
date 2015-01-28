<?php
session_start();
if($_POST['pass'] != null){
    $_SESSION['pass'] = $_POST['pass'];
    header('Location: index.php');
    die();
}
    
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css"/>

    <link rel="shortcut icon" type="../image/png" href="/images/favicon.png"/>

    <title>MidKnight Inventors</title>
</head>
<body>
<div class="container fade-in one">
        <h2 class="fade-in two">Authentication required</h2>
        <?
        if($_GET['error'] == "wp")
        echo('<h3 class="fade-in two" style="color: red">Incorrect Password</h3>')
        ?>
        <form name="input" action="login.php" method="post">
            <input type="password" class="fade-in three glow" autocomplete="off" placeholder="Password" name="pass" required autofocus> <br>
            <input type="submit" class="fade-in four button" value="Submit" name="submit">
        </form>
            <br>
    <button class="button fade-in five" onclick="window.location.href='../index.php'">Back</button>

</div>
</body>
</html>