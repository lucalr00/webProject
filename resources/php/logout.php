<?php
  
   session_start();
   header("location: ../html/login.html");
   unset($_COOKIE);
   session_unset();
   session_destroy();

?>