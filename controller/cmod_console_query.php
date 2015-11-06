<?php
    require_once('../model/dbi_con.php');
    
    if(isset($_POST['qr']))
{
    // echo str_replace("\n","<br />",$_POST['qr']);
    $qr = $_POST['qr'];
    // echo( $qr );
    $result = $mysqli->query($qr);
    if ($result){
        if (is_scalar($result))
            echo json_encode($result, JSON_PRETTY_PRINT);
        elseif (is_array($result))
            print_r($result);
            elseif (is_object($result))
            {
                foreach($result as $key=>$value){
                    echo json_encode($value, JSON_PRETTY_PRINT);
                }
            }
        $mysqli->close();
    } else die($mysqli->error);
}
?>