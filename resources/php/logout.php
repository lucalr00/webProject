<?php
  
   session_start();
   header("location: ../html/logout.html");
   unset($_COOKIE);
   session_unset();
   session_destroy();

?>