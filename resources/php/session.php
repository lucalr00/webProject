<?php
    session_start();

    if(!isset($_SESSION['connesso'])){
        $_SESSION['connesso']=false;
    }

    if(!isset($_SESSION['userID'])){
        $_SESSION['userID']='';
    }
    
    if(!isset($_SESSION['avRfr'])){
        $_SESSION['avRfr']='';
    }
    
?>