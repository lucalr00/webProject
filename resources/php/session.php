<?php
session_start();

if (! isset($_SESSION['connected'])) {
    $_SESSION['connected'] = false;
}

if (! isset($_SESSION['username'])) {
    $_SESSION['username'] = '';
}

if (! isset($_SESSION['userRole'])) {
    $_SESSION['userRole'] = '';
}

if (! isset($_SESSION['respStatus'])) {
    $_SESSION['respStatus'] = '';
}

if (! isset($_SESSION['inputFault'])) {
    $_SESSION['inputFault'] = false;
}

if (! isset($_SESSION['notGranted'])) {
    $_SESSION['notGranted'] = false;
}

?>