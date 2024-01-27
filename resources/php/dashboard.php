<?php
require_once "connection.php";
require_once "session.php";

if ($_SESSION['connected'] != true) {
    header('location:login.php');
    exit();
}

$conn = new connection();
$fileHTML = file_get_contents(".." . DIRECTORY_SEPARATOR . "html" . DIRECTORY_SEPARATOR . "adminArea" . DIRECTORY_SEPARATOR . "adminDashboard.html");

if ($conn->isConnected()) {

    $getInfo = $conn->getUserInfo();
    if ($getInfo != null) {

        $divInfo = '<div id="welcomeInfo">';

        foreach ($getInfo as $info) {
            $divInfo .= '<h2>Welcome back <span id="userName">' . $info['Username'] . '</span></h2>
                       <h3>Your role: <span id="userRole">' . $info['Role'] . '</span></h3>
                       </div>';
        }

        echo str_replace("<adminLoginInfo />", $divInfo, $fileHTML);
    } else {
        echo str_replace("<adminLoginInfo />", "User info: not present", $fileHTML);
    }
} else {
    die("Connection error");
}

$conn->closeConnection();

?>