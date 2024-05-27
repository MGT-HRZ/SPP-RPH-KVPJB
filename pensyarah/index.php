<?php

        //  If the website is secure
	if (!empty($_SERVER['HTTPS']) && ('on' == $_SERVER['HTTPS'])) {
		$uri = 'https://';
	}
    
        //  Or else the website is local
    else {
		$uri = 'http://';
	}

    //  To declare the variable = http://localhost
    $local = ($uri .= $_SERVER['HTTP_HOST']);

	    //  If using xampp or other local web servers
    if ($local == 'http://localhost') {
	    header('Location: login.php');

	    exit;
    }

        //  If using php web servers exstension
    elseif ($local == 'http://localhost:3000') {
	    header('Location: login.php');

	    exit;
    }

        //  Other general local web servers
    else {
        header('Location: login.php');

        exit;
    }

?>

System is now offline. Something is wrong with the with the website ?



