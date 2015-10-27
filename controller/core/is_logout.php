<?php
   if($_POST["is_logout"])
   {
   // Server-side
      $is_logout = $_POST["is_logout"];
      if($is_logout)
         echo json_encode(array("is_logout" => true));
   }
?>