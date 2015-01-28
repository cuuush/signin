<?php
include_once '../includes/tools.php';

//is the user authenticated?
session_start(); 

if($_SESSION['pass'] == null) {
    header('Location: login.php');
    die();
}

if (md5($_SESSION['pass']) != $adminpassword) {
    header('Location: login.php?error=wp');
    die();
}

// Verify connection with database
    if (mysqli_connect_errno()) {
        die("Couldn't connect to the database. Reason: " . mysqli_connect_error());
    }
$user = urldecode($_GET['user']);

$result = mysqli_query($con,"SELECT * FROM students WHERE fullname = '$user'"); 
$row = mysqli_fetch_array($result);   
$ID = $row['id'];
$active = $row['active'];
$totaltime = $row['totaltime'];
$name = $row['name'];


if (isset($_POST['action'])) {
    switch ($_POST['action']) {
        case 'login':
            signin($ID, $user, $active);
            die();
        case 'logout':
            select();
            die();
		case 'flogout':
            select();
            die;
        default:
        	die();
    }
}
    
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
    "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"/>

    <link rel="stylesheet" href="../css/style.css" media="screen" type="text/css"/>

    <link rel="shortcut icon" type="../image/png" href="/images/favicon.png"/>
    		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $('.button').click(function(){
        var clickBtnValue = $(this).val();
        var ajaxurl = 'userinfo.php',
        data =  {'action': clickBtnValue};
        $.post(ajaxurl, data, function (response) {
            // Response div goes here.
            alert("Action performed successfully.");
    	  });
		 });

		});
		</script>


    <title>MidKnight Inventors</title>
</head>
<body>
<div class="container fade-in one">
        <h2 class="fade-in two">User Information for <?php echo ucwords($user); ?></h2>
		<p>ID: <?php echo $ID; ?></p>
        <p><?php echo ($active == 1 ? "Currently logged in" : "Currently not logged in");?></p>   
		<button type="submit" class="button fade-in five" value="login" >Sign <?PHP echo ucwords($name); ?> in</button>
        
    <button class="button fade-in five" onclick="window.location.href='index.php'">Back</button>

</div>
</body>
</html>