<?php
include '../includes/tools.php';

session_start(); 

if($_SESSION['pass'] == null) {
    redirect('admin/login.php');
}

if (md5($_SESSION['pass']) != $adminpassword) {
    redirect('admin/login.php?error=wp');
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
    
    <script>
function showHint(str) {
    if (str.length == 0) { 
        document.getElementById("txtHint").innerHTML = "";
        return;
    } else {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                document.getElementById("txtHint").innerHTML = xmlhttp.responseText;
            }
        }
        xmlhttp.open("GET", "getuser.php?q=" + str, true);
        xmlhttp.send();
    }
}
</script>

</head>
<body>
<div class="container fade-in one">
        <h2 class="fade-in two">Search for a user</h2>
        <h3 class="fade-in three">Start by typing a name in the input field below:</h3>
<form> 
 <input class="fade-in four" type="text" placeholder="Full Name" onkeyup="showHint(this.value)" autofocus>
</form>
<span id="txtHint"></span>

    <button class="button fade-in five" onclick="window.location.href='../index.php'">Back</button>

</div>
</body>
</html>