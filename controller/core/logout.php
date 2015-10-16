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
session_destroy();
echo "username is set to : ". $_SESSION['username'];
printf( '<p class="required">You have been logged out.</p>'
header("refresh:2; url=../view/front.php");
exit('OK');