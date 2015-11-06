<?php
    require_once('../model/dbi_con.php');
    
    if(isset($_POST['qr']))
{
    $qr = $_POST['qr'];
    if (is_scalar($qr))
        echo $qr;
        // echo json_encode($qr, JSON_FORCE_OBJECT);
        // echo json_encode($qr, JSON_PRETTY_PRINT);
    
} 
// die (json_encode (array ('qr'=>'Your script worked fine')));
?>