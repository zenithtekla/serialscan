<?php
    require_once('../model/dbi_con.php');
    
    if(isset($_GET['hakuQ']))
{
    // $t_query_string = $mysqli->real_escape_string($_GET['hakuQ']);
    if($_GET['hakuQ'] == 'ABC') echo "AAAA";
    else echo "BBBB";
}
?>