<?php
$_SESSION = array();
$params = session_get_cookie_params();

setcookie( session_name(), '', time() - 42000,
    $params["path"],
    $params["domain"],
    $params["secure"],
    $params["httponly"] //http://stackoverflow.com/questions/11839079/unsetting-a-php-session-with-jquery-ajax
);

unset($_SESSION['is_auth']);
if (isset($_SESSION['username']))
    session_destroy();
if (!isset($_SESSION['username']))
    echo "username is set to : NULL";

printf( '<p class="required">You have been logged out.</p>' );
$_SESSION = array();
header("refresh:2; url=../../view/front.php");
exit('boo bye bye boo');