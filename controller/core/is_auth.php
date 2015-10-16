<?php

session_start();

// Test the session to see if is_auth flag was set (meaning they logged in successfully)
// If test fails, send the user to login.php and prevent rest of page being shown.
if (!isset($_SESSION["is_auth"]) || !isset($_SESSION["access_level"])) {
	session_destroy();
	printf( '<p class="red">Access NOT authenticated</p>' ); header("refresh:2; url=../view/front.php");
	exit;
}
else if (isset($_REQUEST['logout']) && $_REQUEST['logout'] == "true") {
	// At any time we can logout by sending a "logout" value which will unset the "is_auth" flag.
	// We can also destroy the session if so desired.
	require_once('logout.php');

	// After logout, send them back to login.php
	exit;
}

?>