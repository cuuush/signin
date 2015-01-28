<?php
include '../includes/tools.php';

// Verify connection with database
    if (mysqli_connect_errno()) {
        die("Couldn't connect to the database. Reason: " . mysqli_connect_error());
    }
    
$result = mysqli_query($con,"SELECT fullname FROM students"); 

while($row = mysqli_fetch_array($result)){
    $names[] = $row[0];
}
//var_dump($names);
// get the q parameter from URL
$q = $_REQUEST["q"];

$hint = "";


// lookup all hints from array if $q is different from "" 
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($names as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            $formattedname = ucwords(substr($name, 0, $len). "<i>". substr($name, $len)."</i>");
            if ($hint === "") {
                $hint = "<button class=\"bigbutton\" onclick=\"window.location.href='userinfo.php?user=". urlencode($name) ."'\">". $formattedname ."</button><br>";
            } else {
                $hint .= "<button class=\"bigbutton\" onclick=\"window.location.href='userinfo.php?user=". urlencode($name) ."'\">". $formattedname ."</button><br>";
            }
        }
    }
}

// Output "no suggestion" if no hint was found or output correct values 
if($hint == "")
    echo "<h3>Nothing found</h3>";
else{
    echo('<h3>Names:</h3>');
    echo($hint);
}