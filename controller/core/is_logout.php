<?php
   // Server-side
   $is_logout = $_POST["is_logout"];

   if($is_logout)
     require_once('logout.php');

   echo json_encode(array("is_logout" => true));
?>