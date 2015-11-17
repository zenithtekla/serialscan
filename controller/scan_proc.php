<?php
    require_once('../model/dbi_con.php');
    require_once('../controller/core/is_auth.php');
    
    if(isset($_POST['qr']))
{
    $_SESSION['ss_key'] += 1;
    $qr                     = $_POST['qr'];
    if (is_scalar($qr))
       echo $_SESSION['ss_key'] . ". " . $qr;
        // echo json_encode($qr, JSON_FORCE_OBJECT);
        // echo json_encode($qr, JSON_PRETTY_PRINT);
    
} 
// die (json_encode (array ('qr'=>'Your script worked fine')));
?>