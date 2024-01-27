<?php
require_once "connection.php";
require_once "session.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit();
}

$fileHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "adminDashboard.html");

$divInfo .= '<h2>Welcome back <span id="userName">' . $_SESSION['username'] . '</span></h2>
                       <h3>Your role: <span id="userRole">' . $_SESSION['userRole'] . '</span></h3>
                       </div>';

echo str_replace("<adminLoginInfo />", $divInfo, $fileHTML);

?>