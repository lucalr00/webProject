<?php
require_once "connection.php";
require_once "session.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit;
}

$fileHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "adminDashboard.html");

$divInfo = '<h2>Welcome back <span id="userName">' . $_SESSION['username'] . '</span></h2>
                       <p>Your role: <span id="userRole">' . $_SESSION['userRole'] . '</span></p>
                       </div>';

echo str_replace("<adminLoginInfo />", $divInfo, $fileHTML);

?>