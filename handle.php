<?php
session_start(); //open up a session with the user
include_once 'includes/tools.php';


// Verify connection with database
    if (mysqli_connect_errno()) {
        fancydie('Couldn\'t connect to the database. Reason: ' . mysqli_connect_error());
    }
/*
 * Process the posted variables / check if they are valid
 */

    //assign and cleanup the id
    $ID = trim(strtolower($_POST['id']));
    //did the user even type an id?
    if ($ID == null) //numeric and nonzero
        fancydie('You did not enter an ID.');

    //check if the user entered "admin"
    if ($ID == "admin"){
        redirect("admin");
    }
        if ($ID == "bye"){ //@todo make config entry for this key. add boolean to use only with authentication?
        logoutall();
    }
        if ($ID == "forcebye"){ //@todo make config entry for this key. add boolean to use only with authentication?
        logoutall(true);
    }

    //get id
    if (!is_numeric($ID) and $ID < 0) //numeric and >0
        fancydie('"'. $ID .'" is an invalid ID.');
        


    //get all data
        $query = "SELECT * FROM students WHERE ID = '$ID'";
        $result = mysqli_query($con, $query);
        if (!$result)
            fancydie('Could not fetch user data from database, ' . mysqli_error($con));
        
    //check if the ID exists
    if (mysqli_num_rows($result) == 0) {
       fancydie('ID '. $ID .' does not exist. Try clicking on "Forgot my ID"');
    }
    
    //get the data into an array
    $row = mysqli_fetch_array($result);

	//boolean - if the user is active
    $active = $row['ACTIVE'];

	// get the user's name
    $name = $row['FULLNAME'];

	//check what the last page told this page to do
    if ($_POST["login"])
		login($ID, $name, $active);
    else if ($_POST["logout"])
        logout($ID, $name, $active, false);
    else
        fancydie('This page was told neither to login nor logout the user' . mysqli_error($query));
        $action = $_POST["login"] ? "in" : "out";
        confirmAction($action, $name);
