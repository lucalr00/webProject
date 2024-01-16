<?php
session_start();

if (! isset($_SESSION['connesso'])) {
    $_SESSION['connesso'] = false;
}

if (! isset($_SESSION['userID'])) {
    $_SESSION['userID'] = '';
}

if (! isset($_SESSION['respStatus'])) {
    $_SESSION['respStatus'] = '';
}

if (! isset($_SESSION['inputFault'])) {
    $_SESSION['inputFault'] = false;
}

?>