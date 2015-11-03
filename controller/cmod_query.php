<?php
    require_once('../model/dbi_con.php');
    
    if(isset($_POST['qr']))
{
    // echo str_replace("\n","<br />",$_POST['qr']);
    $qr = $_POST['qr'];
    // echo( $qr );
    $result = $mysqli->query($qr);
    if ($result){
        echo 'executing the query';
        $result->close();
        $mysqli->close();
    } else die($mysqli->error);
}
?>