<?php
require_once "session.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit();
}

$response = $_SESSION['respStatus'];
unset($_SESSION['respStatus']);

$fileHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "redirect.html");

if ($_SESSION['notGranted']) {
    unset($_SESSION['notGranted']);
    header('refresh:3;url=dashboard.php');
    $response .= '<div id="refresh"><p>Redirecting in 3 seconds...</p></div>';
    
} elseif ($_SESSION['inputFault']) {
    unset($_SESSION['inputFault']);
    $response .= '<div id="refresh">
                    <p>Automatic redirection disabled</p>
                    <p><a href="socialRoom.php">Back to Manage Social Room</a>';
} else {
    $response .= '<div id="refresh"><p>Redirecting in 3 seconds...</p></div>';
    header('refresh:3;url=socialRoom.php');
}

echo $fileHTML = str_replace('<mes />', $response, $fileHTML);

?>